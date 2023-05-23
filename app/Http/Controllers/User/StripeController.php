<?php

namespace App\Http\Controllers\User;

use Auth;
use Carbon\Carbon;

use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\OrderComplete;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class StripeController extends Controller
{

    //For Stripe order
    public function StripeOrder(Request $request){

        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }
            \Stripe\Stripe::setApiKey('sk_test_51MivPgHcSTXg8zdO45m9DGQ1QeW2ri0PUhC6d3myvzYmiMRHni7CqDNgR77eLs6boU5MSLOwDNCMKlZHmAlnXNPQ00TpuiyqX3');


        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount*100,
          'currency' => 'usd',
          'description' => ' My Shop',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);

       //dd($charge);
       $order_id = Order::insertGetId([
        'user_id' => Auth::id(),
        'district_id' => $request->district_id,
        'division_id' => $request->division_id,
        'state_id' => $request->state_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'adress' => $request->address,
        'post_code' => $request->post_code,
        'notes' => $request->notes,

        'payment_type' => $charge->payment_method,
        'payment_method' => 'Stripe',
        'transaction_id' => $charge->balance_transaction,
        'currency' => $charge->currency,
        'amount' => $total_amount,
        'order_number' => $charge->metadata->order_id,

        'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
        'order_date' => Carbon::now()->format('d F Y'),
        'order_month' => Carbon::now()->format('F'),
        'order_year' => Carbon::now()->format('Y'),
        'status' => 'pending',
        'created_at' => Carbon::now(),
    ]);
         // Start Send Email

         $invoice = Order::findOrFail($order_id);

         $data = [
             'invoice_no' => $invoice->invoice_no,
             'amount' => $total_amount,
             'name' => $invoice->name,
             'email' => $invoice->email,

         ];


         Mail::to($request->email)->send(new OrderMail($data));

         // End Send Email


    $carts = Cart::content();
        foreach($carts as $cart){

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'vendor_id' => $cart->options->vendor,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' =>Carbon::now(),

            ]);

        } // End Foreach

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

    }// End Method

    //Cash On Delivery Order Start
    public function CashOrder(Request $request){
        $user = User::where('role','admin')->get();
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',

            'currency' => 'Usd',
            'amount' => $total_amount,


            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),

        ]);

         // Start Send Email

         $invoice = Order::findOrFail($order_id);

         $data = [
             'invoice_no' => $invoice->invoice_no,
             'amount' => $total_amount,
             'name' => $invoice->name,
             'email' => $invoice->email,

         ];


         Mail::to($request->email)->send(new OrderMail($data));

         // End Send Email

    $carts = Cart::content();
        foreach($carts as $cart){

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'vendor_id' => $cart->options->vendor,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' =>Carbon::now(),

            ]);

        } // End Foreach

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );
       $data= Notification::send($user, new OrderComplete($request->name));

        return redirect()->route('dashboard')->with($notification);

    }// End Method

}
