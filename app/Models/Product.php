<?php

namespace App\Models;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];
    // public function multiImages(){
    //     return $this->belongsTo(MultiImg::class);
    // }
    public function vendor(){
            return $this->belongsTo(User::class,'vendor_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id')->where('status',1);
}
public function brand(){
    return $this->belongsTo(Brand::class,'brand_id','id')->where('status',1);
}
public function subcategory(){
    return $this->belongsTo(SubCategory::class,'subcategory_id','id')->where('status',1);
}
//for api project vendor
public function vendorone(){
    return $this->belongsTo(Vendor::class,'vendor_id','id')->where('delete_status',1);
}

}
