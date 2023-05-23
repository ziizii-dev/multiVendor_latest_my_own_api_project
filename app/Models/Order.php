<?php

namespace App\Models;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
       public function division(){
        return $this->belongsTo(ShipDivision::class,'division_id','id')->where('delete_status',1);
    }

     public function district(){
        return $this->belongsTo(ShipDistricts::class,'district_id','id')->where('delete_status',1);
    }

     public function state(){
        return $this->belongsTo(ShipState::class,'state_id','id')->where('delete_status',1);
    }
     public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    // public function vendor(){
    //     return $this->belongsTo(Vendor::class,'vendor_id','id');
    // }
}
