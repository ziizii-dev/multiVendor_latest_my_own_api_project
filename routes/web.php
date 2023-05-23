<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CompareController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ActiveUserController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\VendorProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 //froent product details all route


 Route::controller(IndexController::class)->group(function(){
    Route::get('/product/details/{id}/{slug}','productDetails');
    Route::get('/','Index');
    Route::get('/vendor/details/{id}','vendorDetails')->name('vendor#details');
    Route::get('/vendor/all','vendorAll')->name('vendor#all');
    Route::get('/product/category/{id}/{slug}','catWiseProduct')->name('category#details');
    Route::get('/product/subcategory/{id}/{slug}','subCatWiseProduct');
    Route::get(' /product/view/model/{id}','productViewAjax');

});

// Route::get('/', function () {
//     return view('frontend.index');
// });
//Group Middleware
Route::middleware(['auth'])->group(function(){
    Route::controller(UserController::class)->group(function(){
            Route::get('/dashboard','userDashboard')->name('dashboard');
            Route::post('/user/profile/store','userProfileStore')->name('user#profileStore');
            Route::get('/user/logout','userLogout')->name('user#logout');
            Route::post('/user/update/password','updatePassword')->name('user#updatePassword');

    });
});//End Middleware

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Admin
Route::middleware(['auth','role:admin'])->group(function(){
Route::controller(AdminController::class)->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard','adminDeshboard')->name('admin#deshboard');
        Route::get('/logout','adminDestroy')->name('admin#logout');
        Route::get('/profile','adminProfile')->name('admin#profile');
        Route::post('/profile/store','adminProfileStore')->name('admin#profileStore');
        Route::get('/change/password','adminChangePassword')->name('admin#changePassword');
        Route::post('/update/password','updatePassword')->name('admin#updatePassword');
    });
});
});//End

//Admin backend Brand
Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(BrandController::class)->group(function(){
        Route::prefix('brand')->group(function(){
            Route::get('/all','allBrand')->name('all#brand');
            Route::get('/add','addBrand')->name('add#brand');
            Route::post('/store','storeBrand')->name('store#brand');
            Route::get('/edit/{id}','editBrand')->name('edit#brand');
            Route::post('/update','updateBrand')->name('update#brand');
            Route::get('/delete/{id}','deleteBrand')->name('delete#brand');

        });
    });

    });

    //Admin backend Category all route
    Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(CategoryController::class)->group(function(){
        Route::prefix('category')->group(function(){
            Route::get('/all','allCategory')->name('all#category');
            Route::get('/add','addCategory')->name('add#category');
            Route::post('/store','storeCategory')->name('store#category');
            Route::get('/edit/{id}','editCategory')->name('edit#category');
            Route::post('/update','updateCategory')->name('update#category');
            Route::get('/delete/{id}','deleteCategory')->name('delete#category');




        });
    });

    });//End
    //Admin backend SubCategory all route
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(SubCategoryController::class)->group(function(){
            Route::prefix('subcategory')->group(function(){
                Route::get('/all','allSubCategory')->name('all#subcategory');
                Route::get('/add','addSubCategory')->name('add#subcategory');
                Route::post('/store','storeSubCategory')->name('store#subcategory');
                Route::get('/edit/{id}','editSubCategory')->name('edit#subcategory');
                Route::post('/update','updateSubCategory')->name('update#subcategory');
                Route::get('/delete/{id}','deleteSubCategory')->name('delete#subcategory');
                Route::get('/ajax/{category_id}','getSubCategory')->name('subcategoryData');

            });
        });

        });//End
    //Admin backend Vendor Active and Inavtive Manage all route
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(AdminController::class)->group(function(){
                Route::get('/inactive/vendor','inactiveVendor')->name('inactive#vendor');
                Route::get('/active/vendor','activeVendor')->name('active#vendor');
                Route::get('/inactive/vendor/detail/{id}','inactiveVendorDetail')->name('inactive#vendorDetails');
                Route::post('/active/vendor/approve','activeVendorApprove')->name('active#vendorApprove');
                Route::get('/active/vendor/detail/{id}','activeVendorDetail')->name('active#vendorDetails');
                Route::post('/inactive/vendor/approve','inactiveVendorApprove')->name('inactive#vendorApprove');

        });

        });//End

        //Admin backend Product  all route
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(ProductController::class)->group(function(){
            Route::prefix('product')->group(function(){
                Route::get('/all','allProduct')->name('all#product');
                Route::get('/add','addProduct')->name('add#product');
                Route::post('/store','storeProduct')->name('store#product');
                Route::get('/edit/{id}','editProduct')->name('edit#product');
                Route::post('/update','updateProduct')->name('update#product');
                Route::post('/update/thambnail','updateProductThambnail')->name('update#productThambnail');
                Route::post('/update/multi/image','updateProductMultiImage')->name('update#productMultiImage');
                Route::get('/update/multi/image/delete/{id}','deleteProductMultiImage')->name('product#multiImgeDelete');
                Route::get('/inactive/{id}','productInactive')->name('product#inactive');
                Route::get('/active/{id}','productActive')->name('product#active');
                Route::get('/delete/{id}','deleteProduct')->name('delete#product');
                  // For Product Stock
                Route::get('/stock' , 'ProductStock')->name('product.stock');
        });
    });

        });//End

        //Admin backend Sliderr  all route
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(SliderController::class)->group(function(){
            Route::prefix('slider')->group(function(){
                Route::get('/all','allSlider')->name('all#slider');
                Route::get('/add','addSlider')->name('add#slider');
                Route::post('/store','storeSlider')->name('store#slider');
                Route::get('/edit/{id}','editSlider')->name('edit#slider');
                Route::post('/update','updateSlider')->name('update#slider');
                Route::get('/delete/{id}','deleteSlider')->name('delete#slider');
        });
    });//sliderController End
    //Admin backend Bannner all routes
    Route::controller(BannerController::class)->group(function(){
        Route::prefix('banner')->group(function(){
            Route::get('/all','allBanner')->name('all#banner');
            Route::get('/add','addBanner')->name('add#banner');
            Route::post('/store','storeBanner')->name('store#banner');
            Route::get('/edit/{id}','editBanner')->name('edit#banner');
            Route::post('/update','updateBanner')->name('update#banner');
            Route::get('/delete/{id}','deleteBanner')->name('delete#banner');

    });
});//bannerController End

//Coupon controller start
Route::controller(CouponController::class)->group(function(){
    Route::prefix('coupon')->group(function(){
        Route::get('/all','allCoupon')->name('all#coupon');
        Route::get('/add','addCoupon')->name('add#coupon');
        Route::post('/store','storeCoupon')->name('store#coupon');
        Route::get('/edit/{id}','editCoupon')->name('edit#coupon');
        Route::post('/update','updateCoupon')->name('update#coupon');
        Route::get('/delete/{id}','deleteCoupon')->name('delete#coupon');

});
});//couponController End

//Shipping controller start
Route::controller(ShippingAreaController::class)->group(function(){
    Route::prefix('shipping')->group(function(){
        Route::get('/all','allDivision')->name('all#division');
        Route::get('/add','addDivision')->name('add#division');
        Route::post('/store','storeDivision')->name('store#division');
        Route::get('/edit/{id}','editDivision')->name('edit#division');
        Route::post('/update','updateDivision')->name('update#division');
        Route::get('/delete/{id}','deleteDivision')->name('delete#division');
        Route::get('/all/district','allDistrict')->name('all#district');
        Route::get('/add/district','addDistrict')->name('add#district');
        Route::post('/store/district','storeDistrict')->name('store#district');
        Route::get('/edit/district/{id}','editDistrict')->name('edit#district');
        Route::post('/update/district','updateDistrict')->name('update#district');
        Route::get('/delete/district/{id}','deleteDistrict')->name('delete#district');

        Route::get('/all/state','allState')->name('all#state');
        Route::get('/add/state','addState')->name('add#state');
        Route::post('/store/state' , 'StoreState')->name('store#state');
        Route::get('/edit/state/{id}' , 'EditState')->name('edit#state');
        Route::post('/update/state','UpdateState')->name('update#state');
        Route::get('/delete/state/{id}' , 'DeleteState')->name('delete#state');

});
});//ShippingController End

//Shipping controller Ajax start
Route::controller(ShippingAreaController::class)->group(function(){
        Route::get('/district/ajax/{division_id}' , 'GetDistrict');

});//ShippingController End in mdd ware

Route::controller(OrderController::class)->group(function(){
    Route::get('/pending/order' , 'PendingOrder')->name('pending.order');
    Route::get('/admin/order/details/{order_id}' , 'AdminOrderDetails')->name('admin.order.details');
    Route::get('/admin/confirmed/order' , 'AdminConfirmedOrder')->name('admin.confirmed.order');
    Route::get('/admin/processing/order' , 'AdminProcessingOrder')->name('admin.processing.order');
    Route::get('/admin/delivered/order' , 'AdminDeliveredOrder')->name('admin.delivered.order');
    Route::get('/pending/confirm/{order_id}' , 'PendingToConfirm')->name('pending-confirm');
    Route::get('/confirm/processing/{order_id}' , 'ConfirmToProcess')->name('confirm-processing');
    Route::get('/processing/delivered/{order_id}' , 'ProcessToDelivered')->name('processing-delivered');
    Route::get('/admin/invoice/download/{order_id}' , 'AdminInvoiceDownload')->name('admin.invoice.download');

});//OrderController in admin mdd ware

Route::controller(ReturnController::class)->group(function(){
    Route::get('/return/request' , 'ReturnRequest')->name('return.request');
    Route::get('/return/request/approved/{order_id}' , 'ReturnRequestApproved')->name('return.request.approved');
    Route::get('/complete/return/request' , 'CompleteReturnRequest')->name('complete.return.request');



});//ReturnController in admin mmd ware

 // Report All Route
 Route::controller(ReportController::class)->group(function(){
    Route::get('/report/view' , 'ReportView')->name('report.view');
    Route::post('/search/by/date' , 'SearchByDate')->name('search-by-date');
    Route::post('/search/by/month' , 'SearchByMonth')->name('search-by-month');
    Route::post('/search/by/year' , 'SearchByYear')->name('search-by-year');
    Route::get('/order/by/user' , 'OrderByUser')->name('order.by.user');
    Route::post('/search/by/user' , 'SearchByUser')->name('search-by-user');

});//ReportControlle in admin mdd ware

Route::controller(ActiveUserController::class)->group(function(){
    Route::get('/all/user' , 'AllUser')->name('all-user');
    Route::get('/all/vendor' , 'AllVendor')->name('all-vendor');

});//ActiveUserController in admin mmd ware
//Blog category
Route::controller(BlogController::class)->group(function(){
    Route::get('/admin/blog/category' , 'AllBlogCateogry')->name('admin.blog.category');
    Route::get('/admin/add/blog/category' , 'AddBlogCateogry')->name('add.blog.categroy');
    Route::post('/admin/store/blog/category' , 'StoreBlogCateogry')->name('store.blog.category');
    Route::get('/admin/edit/blog/category/{id}' , 'EditBlogCateogry')->name('edit.blog.category');
    Route::post('/admin/update/blog/category' , 'UpdateBlogCateogry')->name('update.blog.category');
    Route::get('/admin/delete/blog/category/{id}' , 'DeleteBlogCateogry')->name('delete.blog.category');


});//BlogController in admin mdd ware

//Blog Post
Route::controller(BlogController::class)->group(function(){
    Route::get('/admin/blog/post' , 'AllBlogPost')->name('admin.blog.post');
    Route::get('/admin/add/blog/post' , 'AddBlogPost')->name('add.blog.post');
    Route::post('/admin/store/blog/post' , 'StoreBlogPost')->name('store.blog.post');
    Route::get('/admin/edit/blog/post/{id}' , 'EditBlogPost')->name('edit.blog.post');
    Route::post('/admin/update/blog/post' , 'UpdateBlogPost')->name('update.blog.post');
    Route::get('/admin/delete/blog/post/{id}' , 'DeleteBlogPost')->name('delete.blog.post');

});//BlogController in admin mdd ware
// Admin Reviw All Route
Route::controller(ReviewController::class)->group(function(){
    Route::get('/pending/review' , 'PendingReview')->name('pending.review');
    Route::get('/review/approve/{id}' , 'ReviewApprove')->name('review.approve');
    Route::get('/publish/review' , 'PublishReview')->name('publish.review');
    Route::get('/review/delete/{id}' , 'ReviewDelete')->name('review.delete');

   });// ReviewController in admin mmd ware
   // Site Setting All Route
Route::controller(SiteSettingController::class)->group(function(){
    Route::get('/site/setting' , 'SiteSetting')->name('site.setting');
    Route::post('/site/setting/update' , 'SiteSettingUpdate')->name('site.setting.update');
    Route::get('/seo/setting' , 'SeoSetting')->name('seo.setting');
    Route::post('/seo/setting/update' , 'SeoSettingUpdate')->name('seo.setting.update');
   });
// Site Setting All Route
//Roel Admin All Route
Route::controller(RoleController::class)->group(function(){
    Route::get('/all/permission' , 'AllPermission')->name('all.permission');
    Route::get('/add/permission' , 'AddPermission')->name('add.permission');
    Route::post('/store/permission' , 'StorePermission')->name('store.permission');
    Route::get('/edit/permission/{id}' , 'EditPermission')->name('edit.permission');
    Route::post('/update/permission' , 'UpdatePermission')->name('update.permission');
    Route::get('/delete/permission/{id}' , 'DeletePermission')->name('delete.permission');
   });//RoleController in admin mdd ware

// Roles All Route
Route::controller(RoleController::class)->group(function(){
    Route::get('/all/roles' , 'AllRoles')->name('all.roles');
    Route::get('/add/roles' , 'AddRoles')->name('add.roles');
    Route::post('/store/roles' , 'StoreRoles')->name('store.roles');

    Route::get('/edit/roles/{id}' , 'EditRoles')->name('edit.roles');
    Route::post('/update/roles' , 'UpdateRoles')->name('update.roles');
    Route::get('/delete/roles/{id}' , 'DeleteRoles')->name('delete.roles');
    Route::get('/add/roles/permission' , 'AddRolesPermission')->name('add.roles.permission');
    Route::post('/role/permission/store' , 'RolePermissionStore')->name('role.permission.store');
    Route::get('/all/roles/permission' , 'AllRolesPermission')->name('all.roles.permission');
    Route::get('/admin/edit/roles/{id}' , 'AdminRolesEdit')->name('admin.edit.roles');
    Route::post('/admin/roles/update/{id}' , 'AdminRolesUpdate')->name('admin.roles.update');
    Route::get('/admin/delete/roles/{id}' , 'AdminRolesDelete')->name('admin.delete.roles');
   });// in admin mmd ware

   // Admin User All Route
Route::controller(AdminController::class)->group(function(){
    Route::get('/all/admin' , 'AllAdmin')->name('all.admin');
    Route::get('/add/admin' , 'AddAdmin')->name('add.admin');
    Route::post('/admin/user/store' , 'AdminUserStore')->name('admin.user.store');
    Route::get('/edit/admin/role/{id}' , 'EditAdminRole')->name('edit.admin.role');
    Route::post('/admin/user/update/{id}' , 'AdminUserUpdate')->name('admin.user.update');
    Route::get('/delete/admin/role/{id}' , 'DeleteAdminRole')->name('delete.admin.role');

   });//admin admine

 });// Admin Middleware End

        //Vendor Dashboard //Vendor all routes
Route::middleware(['auth','role:vendor'])->group(function(){

Route::controller(VendorController::class)->group(function(){
    Route::prefix('vendor')->group(function(){
        Route::get('/dashboard','vendorDeshboard')->name('vendor#deshboard');
        Route::get('/logout','vendorDestroy')->name('vendor#logout');
        Route::get('/profile','vendorProfile')->name('vendor#profile');
        Route::post('/profile/store','vendorProfileStore')->name('vendor#profileStore');
        Route::post('/profile/store','vendorProfileStore')->name('vendor#profileStore');
        Route::get('/change/password','vendorChangePassword')->name('vendor#changePassword');
        Route::post('/update/password','updatePassword')->name('vendor#updatePassword');
    });
});//End vendorcontroller
//Vendor AddProductController start
Route::controller(VendorProductController::class)->group(function(){
    Route::prefix('vendor')->group(function(){
        Route::get('/all/product','vendorAllProduct')->name('vendor#allProduct');
        Route::get('/add/product','vendorAddProduct')->name('vendor#addProduct');
        Route::get('/subcategory/ajax/{category_id}','vendorGetSubCategory')->name('vendor#subcategoryData');
        Route::post('/store/product','vendorStoreProduct')->name('vendor#Storeproduct');
        Route::get('/edit/product/{id}','vendorEditProduct')->name('vendor#editProduct');
        Route::post('/update/product','vendorUpdateProduct')->name('vendor#updateProduct');
        Route::post('/update/product/thambnail','vendorUpdateProductThambnail')->name('vendor#updateProductThambnail');
        Route::post('/update/product/multiImage','vendorUpdateProductMultiImage')->name('vendor#updateProductMultiImage');
        Route::get('/delete/product/multiImage/{id}','vendorDeleteProductMultiImage')->name('vendor#productMultiImgeDelete');
        Route::get('/inactive/{id}','vendorInactiveProduct')->name('vendor#productInactive');
        Route::get('/active/{id}','vendorActiveProduct')->name('vendor#productActive');
        Route::get('/delete/{id}','vendorDeleteProduct')->name('vendor#deleteProduct');

    });
});//End vendorProductcontroller
Route::controller(VendorOrderController::class)->group(function(){
    Route::get('/vendor/order' , 'VendorOrder')->name('vendor.order');
    Route::get('/vendor/return/order' , 'VendorReturnOrder')->name('vendor.return.order');
    Route::get('/vendor/complete/return/order' , 'VendorCompleteReturnOrder')->name('vendor.complete.return.order');
    Route::get('/vendor/order/details/{order_id}' , 'VendorOrderDetails')->name('vendor.order.details');
});//VendorOrderController in vendor mmd-ware

Route::controller(ReviewController::class)->group(function(){
    Route::get('/vendor/all/review' , 'VendorAllReview')->name('vendor.all.review');

   });//ReviewController in vendor mmd ware


});//End Vendor Middleware

Route::get('admin/login',[AdminController::class,'adminLogin'])->name('admin#login')->middleware(RedirectIfAuthenticated::class);
Route::get('vendor/login',[VendorController::class,'vendorLogin'])->name('vendor#login')->middleware(RedirectIfAuthenticated::class);
Route::get('become/vendor',[VendorController::class,'becomeVendor'])->name('become#vendor');
Route::post('vendor/register',[VendorController::class,'vendorRegister'])->name('vendor#register');

Route::controller(CartController::class)->group(function(){
    Route::post('/cart/data/store/{id}','addToCart');
    Route::get('/product/mini/cart','addMiniCart');
    Route::get('/minicart/product/remove/{rowId}','removeMiniCart');
    Route::post('/dcart/data/store/{id}','addToCartDetails');
});


Route::controller(WishlistController::class)->group(function(){
    Route::post('/add-to-wishlist/{product_id}','addToWishList');
});
Route::controller(CompareController::class)->group(function(){
    Route::post('/add-to-compare/{product_id}','addToCompare');

});

 //User backend SubCategory all route
 Route::middleware(['auth','role:user'])->group(function(){
    Route::controller(WishlistController::class)->group(function(){
        Route::get('wishlist','allWishList')->name('all#wishlist');
        Route::get(' /get/wishlist/product','getWishlistProduct');
        Route::get('/wishlist/remove/{id}','wishlistRemove');

    });//end wishlist
    Route::controller(CompareController::class)->group(function(){
        Route::get('/compare','allCompare')->name('all#compare');
        Route::get(' /get/compare/product','getCompareProduct');
        Route::get('/compare/remove/{id}','compareRemove');


    });//end wishlist
    Route::controller(CheckoutController::class)->group(function(){
        Route::get('/district-get/ajax/{division_id}' , 'DistrictGetAjax');
        Route::get('/state-get/ajax/{district_id}' , 'StateGetAjax');
        Route::post('/checkout/store' , 'CheckoutStore')->name('checkout.store');

    });//End CheckoutController
     // Stripe All Route
Route::controller(StripeController::class)->group(function(){
    Route::post('/stripe/order' , 'StripeOrder')->name('stripe.order');
    Route::post('/cash/order' , 'CashOrder')->name('cash.order');


});
Route::controller(AllUserController::class)->group(function(){
    Route::get('/user/account/page' , 'UserAccount')->name('user.account.page');
    Route::get('/user/change/password' , 'UserChangePassword')->name('user.change.password');
    Route::get('/user/order/page' , 'UserOrderPage')->name('user.order.page');
    Route::get('/user/order_details/{order_id}' , 'UserOrderDetails');
    Route::get('/user/invoice_download/{order_id}' , 'UserOrderInvoice');
    Route::post('/return/order/{order_id}' , 'ReturnOrder')->name('return.order');
    Route::get('/return/order/page' , 'ReturnOrderPage')->name('return.order.page');
      // Order Tracking
   Route::get('/user/track/order' , 'UserTrackOrder')->name('user.track.order');
   Route::post('/order/tracking' , 'OrderTracking')->name('order.tracking');

}); //AllUserController in user mdd ware

// Frontend Blog Post All Route
Route::controller(ReviewController::class)->group(function(){
    Route::post('/store/review' , 'StoreReview')->name('store.review');

   });//ReviewController in user mmd ware

    });//End user middleware

// Search All Route search for frontend
Route::controller(IndexController::class)->group(function(){
    Route::post('/search' , 'ProductSearch')->name('product.search');
   Route::post('/search-product' , 'SearchProduct');

   });//IndexCotroller for searching  no user mdd ware
   //Shop Page All Routes

   Route::controller(ShopController::class)->group(function(){
    Route::get('shop/' , 'ShopPage')->name('shop.page');
    Route::post('/shop/filter' , 'ShopFilter')->name('shop.filter');

   });//ShopController for searching  no user mdd ware



    /// Frontend Coupon Option no middleware
    Route::controller(CartController::class)->group(function(){
        Route::get('/mycart','myCart')->name('mycart');
        Route::get('/get/cart/product/','getCartProduct');
        Route::get('/cart/remove/{rowId}' , 'cartRemove');
        Route::get('/cart/decrement/{rowId}' , 'cartDecrement');
        Route::get('/cart/increment/{rowId}' , 'cartIncrement');
        Route::post('/coupon-apply',  'CouponApply');
        Route::get('/coupon-calculation',  'CouponCalculation');
        Route::get('/coupon-remove','CouponRemove');

        Route::get('/checkout',  'CheckoutCreate')->name('checkout');


    });////user no middleware for frontend

// Frontend Blog Post All Route no middleware
Route::controller(BlogController::class)->group(function(){
    Route::get('/blog' , 'AllBlog')->name('home.blog');
    Route::get('/post/details/{id}/{slug}' , 'BlogDetails');
    Route::get('/post/category/{id}/{slug}' , 'BlogPostCategory');

   });


