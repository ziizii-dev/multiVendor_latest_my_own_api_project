<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\UserEnsureTokenIsValid;
use App\Http\Middleware\AdminEnsureTokenIsValid;
use App\Http\Controllers\API\USER\UserController;
use App\Http\Middleware\VendorEnsureTokenIsValid;
use App\Http\Controllers\API\ADMIN\AdminController;
use App\Http\Controllers\API\USER\UserCartController;
use App\Http\Controllers\API\VENDOR\VendorController;
use App\Http\Controllers\API\USER\UserIndexController;
use App\Http\Controllers\API\USER\UserOrderController;
use App\Http\Controllers\API\ADMIN\AdminBrandController;
use App\Http\Controllers\API\ADMIN\AdminBannerController;
use App\Http\Controllers\API\ADMIN\AdminCouponController;
use App\Http\Controllers\API\ADMIN\AdminReportController;
use App\Http\Controllers\API\ADMIN\AdminSliderController;
use App\Http\Controllers\API\ADMIN\AdminProductController;
use App\Http\Controllers\API\USER\Blog\UserBlogController;
use App\Http\Controllers\API\VENDOR\VendorBrandController;
use App\Http\Controllers\API\ADMIN\AdminCategoryController;
use App\Http\Controllers\API\USER\RegisteredUserController;
use App\Http\Controllers\API\ADMIN\AdminDashboardController;
use App\Http\Controllers\API\VENDOR\VendorProductController;
use App\Http\Controllers\API\ADMIN\AdminBlogManageController;
use App\Http\Controllers\API\ADMIN\AdminRegisteredController;
use App\Http\Controllers\API\VENDOR\VendorCategoryController;
use App\Http\Controllers\API\ADMIN\AdminReturnOrderController;
use App\Http\Controllers\API\ADMIN\AdminSiteSettingController;
use App\Http\Controllers\API\ADMIN\AdminSubCategoryController;
use App\Http\Controllers\API\VENDOR\VendorDashboardController;
use App\Http\Controllers\API\ADMIN\AdminReviewManageController;
use App\Http\Controllers\API\ADMIN\AdminStockProductController;
use App\Http\Controllers\API\VENDOR\VendorRegisteredController;
use App\Http\Controllers\API\VENDOR\VendorOrderManageController;
use App\Http\Controllers\API\VENDOR\VendorReturnOrderController;
use App\Http\Controllers\API\VENDOR\VendorSubCategoryController;
use App\Http\Controllers\API\ADMIN\SHIPPING\AdminStateController;
use App\Http\Controllers\API\VENDOR\VendorReviewManageController;
use App\Http\Controllers\API\VENDOR\VendorStockProductController;
use App\Http\Controllers\API\ADMIN\SHIPPING\AdminDistrictController;
use App\Http\Controllers\API\ADMIN\SHIPPING\AdminDivisionController;
use App\Http\Controllers\API\ADMIN\USER_MANAGE\UserManageController;
use App\Http\Controllers\API\ADMIN\PERMISSION_ROLE\AdminRoleController;
use App\Http\Controllers\API\ADMIN\ORDER_MANAGE\AdminOrderManageController;
use App\Http\Controllers\API\ADMIN\BLOG_MANAGE\AdminCatBlogManageController;
use App\Http\Controllers\API\ADMIN\BLOG_MANAGE\AdminBlogPostManageController;
use App\Http\Controllers\API\ADMIN\PERMISSION_ROLE\AdminPermissionController;
use App\Http\Controllers\API\ADMIN\VENDOR_MANAGE\AdminVendorManageController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//User Start
//User Register Routes start
Route::post('register',[RegisteredUserController::class,'register']);

    Route::post('login',[RegisteredUserController::class,'login']);
    Route::group(['middleware' => UserEnsureTokenIsValid::class], function () {
    Route::post('logout',[RegisteredUserController::class,'logout']);
    Route::get('user/detail/{id}',[UserController::class,'userDetail']);
    Route::get('user',[RegisteredUserController::class,'user']);
    Route::resource('user/profile/detail',UserController::class);
    Route::post('user/password/update',[UserController::class,'userPasswordUpdate']);
    Route::controller(UserOrderController::class)->group(function(){
        Route::post('/user/order/page/{user_id}','UserOrderPage');
        Route::get('/user/order_details/{order_id}' , 'UserOrderDetails');
       // Route::get('/user/invoice_download/{order_id}' , 'UserOrderInvoice');
        Route::post('/user/return/order/{order_id}' , 'ReturnOrder');
        Route::get('user/return/order/page/{user_id}' , 'ReturnOrderPage');
          // Order Tracking
       Route::post('/user/order/tracking' , 'OrderTracking');
    });

});//End user middleware
Route::get('user/blog/all/category',[UserBlogController::class,'AllBlogCategory']);//no mdd
Route::get('user/blog/all/post',[UserBlogController::class,'AllBlogPost']);//no mdd
Route::get('user/post/blog/details/{id}/{slug}',[UserBlogController::class,'BlogDetails']);//no mdd
Route::get('user/cat/blog/details/{id}/{slug}',[UserBlogController::class,'BlogPostCategory']);//no mdd

    Route::controller(UserIndexController::class)->group(function(){
    Route::get('/','Index');
    Route::get('/product/details/{id}/{slug}','productDetails');
    Route::get('/vendor/details/{id}','vendorDetails');
    Route::get('/vendor/all','vendorAll');
    Route::get('/product/category/{id}/{slug}','catWiseProduct');
    Route::get('/product/view/model/{id}','productViewAjax');
    Route::post('/search','ProductSearch');
    Route::post('/search-product' , 'SearchProduct');
    Route::get('/product/subcategory/{id}/{slug}','subCatWiseProduct');
});

// Route::controller(UserCartController::class)->group(function(){
//     Route::post('user/cart/data/store/{id}','addToCart');
//     Route::get('user/product/mini/cart','addMiniCart');
//     Route::get('user/minicart/product/remove/{rowId}','removeMiniCart');
//     Route::post('user/dcart/data/store/{id}','addToCartDetails');
// });

//User Section End
//////////////////////////////////
//Vendor Register All Routes Start
//////////////
Route::post('vendor/register',[VendorRegisteredController::class,'register']);
Route::post('vendor/login',[VendorRegisteredController::class,'login']);
Route::group(['prefix' => 'vendor', 'middleware' => VendorEnsureTokenIsValid::class], function () {
    Route::post('/logout', [VendorRegisteredController::class, 'logout']);
    Route::get('/user/list',[VendorRegisteredController::class,'user']);
    Route::get('/dashboard/{vendor_id}',[VendorDashboardController::class,'vendorDeshboard']);

     Route::resource('/product',VendorProductController::class);
     Route::get('/products/{vendor_id}',[VendorProductController::class,"index"]);


     Route::post('/update/product/multiImage/{vendor_id}/{multiImg_id}',[VendorProductController::class,'vendorUpdateProductMultiImage']);
    Route::post('/detail/product/multiImage/{vendor_id}/{product_id}',[VendorProductController::class,'detailProductMultiImage']);


    Route::post('/update/product/thambnail/{product_id}',[VendorProductController::class,'vendorUpdateProductThambnail']);
    Route::post('/update/product/multiImage/{id}',[VendorProductController::class,'vendorUpdateProductMultiImage']);
    Route::post('/detail/product/multiImage/{product_id}',[VendorProductController::class,'detailProductMultiImage']);
    Route::post('/inactive/product/{id}',[VendorProductController::class,'vendorInactiveProduct']);
    Route::post('/active/product/{id}',[VendorProductController::class,'vendorActiveProduct']);
    Route::get('/brand/{vendor_id}',[VendorBrandController::class,"index"]);
    Route::resource('/brand',VendorBrandController::class);
    Route::resource('/category',VendorCategoryController::class);
    Route::resource('/profile/detail',VendorController::class);
    Route::get('/detail/{id}',[VendorController::class,'vendorDetail']);
    Route::post('/profile/update/{id}',[VendorController::class,'update']);
    Route::post('/password/update',[VendorController::class,'vendorPasswordUpdate']);
    Route::resource('/subcategory',VendorSubCategoryController::class);
    Route::get('/pending/order/{vendor_id}',[VendorOrderManageController::class,'VendorPendingOrder']);
    Route::get('/confirm/order/{vendor_id}',[VendorOrderManageController::class,'VendorConfirmOrder']);
    Route::get('/processing/order/{vendor_id}',[VendorOrderManageController::class,'VendorProcessingOrder']);
    Route::get('/delivered/order/{vendor_id}',[VendorOrderManageController::class,'VendorDeliveredOrder']);
    Route::get('/order/pending/detail/{vendor_id}/{order_id}',[VendorOrderManageController::class,'VendorPendingDetail']);
    Route::post('/order/pending/to/confirm',[VendorOrderManageController::class,'VendorPendingToConfirmOrder']);
    Route::get('/order/confirm/detail/{vendor_id}/{order_id}',[VendorOrderManageController::class,'VendorConfirmDetail']);
    Route::post('/order/confirm/to/processing',[VendorOrderManageController::class,'VendorConfirmOrderToProcessing']);
    Route::get('/order/processing/detail/{vendor_id}/{order_id}',[VendorOrderManageController::class,'VendorProcessingDetail']);
    Route::post('/order/processing/to/deliverd',[VendorOrderManageController::class,'VendorProcessingOrderToDeliverd']);
    Route::get('/order/deliverd/detail/{vendor_id}/{order_id}',[VendorOrderManageController::class,'VendorDeliverdDetail']);

    Route::get('/review/{vendor_id}',[VendorReviewManageController::class,'PendingReview']);
    Route::get('/review/approve/{vendor_id}/{id}',[VendorReviewManageController::class,'ReviewApprove']);
    Route::get('/public/review/{vendor_id}',[VendorReviewManageController::class,'PublishReview']);
    Route::get('/delete/review/{vendor_id}/{id}',[VendorReviewManageController::class,'ReviewDelete']);
    Route::get('/stock/products/{vendor_id}',[VendorStockProductController::class,'VendorProductStock']);
    Route::get('/return/order/{vendor_id}',[VendorReturnOrderController::class,'VendorReturnOrder']);
    Route::get('/return/order/approve/{order_id}',[VendorReturnOrderController::class,'VendorReturnRequestApproved']);
    Route::get('/return/order/complete/{vendor_id}',[VendorReturnOrderController::class,'VendorCompleteReturnRequest']);


});//End vendor middleware
//Vendor Section End
/////////////

//Admin Register All Rotes Start
Route::group(['prefix' => 'admin', 'middleware' => AdminEnsureTokenIsValid::class], function () {
    Route::get('/user/list',[AdminRegisteredController::class,'user']);
    Route::post('/logout',[AdminRegisteredController::class,'logout']);
    Route::resource('/product',AdminProductController::class);
    Route::post('/update/product/thambnail/{product_id}',[AdminProductController::class,'adminUpdateProductThambnail']);
    Route::post('/update/product/multiImage/{id}',[AdminProductController::class,'adminUpdateProductMultiImage']);
    Route::post('/detail/product/multiImage/{product_id}',[AdminProductController::class,'detailProductMultiImage']);
    Route::post('/inactive/product/{id}',[AdminProductController::class,'adminInactiveProduct']);
    Route::post('/active/product/{id}',[AdminProductController::class,'adminActiveProduct']);
    Route::get('/vendor/list',[AdminProductController::class,'vendorAll']);
    Route::resource('/brand',AdminBrandController::class);
    Route::resource('/category',AdminCategoryController::class);
    Route::get('/detail/{id}',[AdminController::class,'adminDetail']);
    Route::resource('/profile/detail',AdminController::class);
    Route::post('/password/update',[AdminController::class,'adminPasswordUpdate']);
    Route::post('/user/store',[AdminController::class,'AdminUserStore']);
    Route::get('/all',[AdminController::class,'AllAdmin']);
    Route::post('/user/update/{admin_id}',[AdminController::class,'AdminUserUpdate']);
    Route::post('/delete/role/{id}',[AdminController::class,'DeleteAdminRole']);

    Route::resource('/subcategory',AdminSubCategoryController::class);
    Route::resource('/slider',AdminSliderController::class);
    Route::resource('/banner',AdminBannerController::class);
    Route::resource('/coupon',AdminCouponController::class);
    Route::resource('/shipping/division',AdminDivisionController::class);
    Route::resource('/shipping/district',AdminDistrictController::class);
    Route::resource('/shipping/state',AdminStateController::class);
    Route::get('/active/vendor',[AdminVendorManageController::class,'activeVendor']);
    Route::post('/inactive/vendor/approve',[AdminVendorManageController::class,'inactiveVendorApprove']);
    Route::get('/inactive/vendor',[AdminVendorManageController::class,'inactiveVendor']);
    Route::post('/active/vendor/approve',[AdminVendorManageController::class,'activeVendorApprove']);
    Route::get('/order/pending',[AdminOrderManageController::class,'PendingOrder']);
    Route::get('/order/details/{order_id}',[AdminOrderManageController::class,'AdminOrderDetails']);
    Route::get('/order/confirm',[AdminOrderManageController::class,'AdminConfirmedOrder']);
    Route::get('/order/processing',[AdminOrderManageController::class,'AdminProcessingOrder']);
    Route::get('/order/deliver',[AdminOrderManageController::class,'AdminDeliveredOrder']);
    Route::post('/order/pending/to/confirm/{order_id}',[AdminOrderManageController::class,'PendingToConfirm']);
    Route::post('/order/confirm/to/processing/{order_id}',[AdminOrderManageController::class,'ConfirmToProcess']);
    Route::post('/order/processing/to/deliver/{order_id}',[AdminOrderManageController::class,'ProcessToDelivered']);
    Route::post('/invoice/downloaded/{order_id}',[AdminOrderManageController::class,'AdminInvoiceDownload']);
    Route::get('/return/request',[AdminReturnOrderController::class,'ReturnRequest']);
    Route::get('/return/order/approve/{order_id}',[AdminReturnOrderController::class,'ReturnRequestApproved']);
    Route::get('/complete/return/order',[AdminReturnOrderController::class,'CompleteReturnRequest']);
    Route::post('/report/searchByDate',[AdminReportController::class,'SearchByDate']);
    Route::post('/report/searchByMonth',[AdminReportController::class,'SearchByMonth']);
    Route::post('/report/searchByYear',[AdminReportController::class,'SearchByYear']);
    Route::get('/report/orderbyuser',[AdminReportController::class,'OrderByUser']);
    Route::post('/report/searchByUser',[AdminReportController::class,'SearchByUser']);
    Route::get('/user/manage/allusers',[UserManageController::class,'AllUser']);
    Route::get('/user/manage/allvendors',[UserManageController::class,'AllVendor']);
    Route::resource('/cat/blog/manage',AdminCatBlogManageController::class);
    Route::resource('/blog/post/manage',AdminBlogPostManageController::class);
    Route::get('/dashboard',[AdminDashboardController::class,'adminDeshboard']);
    Route::get('/review',[AdminReviewManageController::class,'PendingReview']);
    Route::get('/review/approve/{id}',[AdminReviewManageController::class,'ReviewApprove']);
    Route::get('/public/review',[AdminReviewManageController::class,'PublishReview']);
    Route::get('/delete/review/{id}',[AdminReviewManageController::class,'ReviewDelete']);
    Route::get('/site/setting',[AdminSiteSettingController::class,'SiteSetting']);
    Route::post('/site/setting/update',[AdminSiteSettingController::class,'SiteSettingUpdate']);
    Route::get('/seo/setting/',[AdminSiteSettingController::class,'SeoSetting']);
    Route::post('/seo/setting/update',[AdminSiteSettingController::class,'SeoSettingUpdate']);
    Route::get('/stock/products',[AdminStockProductController::class,'ProductStock']);
    Route::resource('/role/permission',AdminPermissionController::class);
    Route::resource('/role',AdminRoleController::class);
    Route::get('/permission/group',[AdminRoleController::class,'AddRolesPermission']);
    Route::post('/store/role/permission/',[AdminRoleController::class,'RolePermissionStore']);
    Route::post('/role/permission/update/{id}',[AdminRoleController::class,'AdminRolesPermissionUpdate']);



});//admin register routes end middleware
Route::post('admin/register',[AdminRegisteredController::class,'register']);
Route::post('admin/login',[AdminRegisteredController::class,'login']);

//Admin All Rotes End
///////////////////////
