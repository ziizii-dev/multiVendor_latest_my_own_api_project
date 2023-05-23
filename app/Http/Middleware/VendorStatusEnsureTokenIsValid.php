<?php


namespace App\Http\Middleware;


use Closure;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class VendorIsValid
{
   /**
    * Handle an incoming request.
    *
    * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    */
   public function handle(Request $request, Closure $next): Response
   {
       $token = Vendor::where('id',  $request->vendor_id)->first(['auth_token','status']);
       if (!isset($token)) {
           return Response()->json([
               'error' => true,
               'authorize' => true,
               'message' => "Vendor doesn't exists"
           ]);
       } else {
           if ($token->auth_token == $request->bearerToken()) {
               if($token->status == 1){
                   return $next($request);
               }else{
                   return Response()->json([
                       'error' => true,
                       'authorize' => true,
                       'message' => "Please wait admin will check and approve your account",
                   ]);
               }
           } else {
               return Response()->json([
                   'error' => true,
                   'authorize' => false,
                   'message' => "Unauthorized,Invalid token",
               ]);
           }
       }
   }
}



