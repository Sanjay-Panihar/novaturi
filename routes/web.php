<?php

use App\Http\Middleware\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\Front\AddressController;
use App\Http\Controllers\Front\DesignController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\StripeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PhonePecontroller;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EvenCategoryController;
use App\Http\Controllers\EventController;
use App\Models\Category;
use App\Models\EvenCategory;
use App\Models\Mockupcategory;
use App\Http\Controllers\Mockups\MockupscategoryController;
use App\Http\Controllers\Mockups\MockupssectionController;
use App\Http\Controllers\Mockups\MockupsController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('Shipping', function () {
    return view('FAQ');
});

Route::get('T&C', function () {
    return view('T&C');
});

Route::get('ReturnExchangeCancellation', function () {
    return view('returncancel');
});



Route::get('Privacy-Policy', function () {
    return view('Privacy-Policy');
});



Route::get('/',[IndexController::class,'homepage'])->name('home');

Route::match(['get', 'post'], 'contact', [IndexController::class, 'contact'])->name('contact');

Route::group(['middleware'=>['admin']],function(){
    //admin controller starts----------------------------------------------
    Route::get('AdminDashboard',[AdminController::class,'AdminDashboard'])->name('AdminDashboard');
    Route::get('Addadmin',[AdminController::class,'Addadmin'])->name('Addadmin');
    Route::get('logout',[AdminController::class,'logout'])->name('logout');
    Route::match(['get', 'post'], 'admin-update-password', [AdminController::class, 'updateAdminPassword'])->name('updateAdminPassword');
    Route::get('updateAdminPassword',[AdminController::class,'updateAdminPassword'])->name('updateAdminPassword');
   ///admin controller ends---------------------------------------------------------

   // section controller starts ------------------------------------------------

    Route::get('Sections',[SectionController::class,'sections'])->name('sections');
    Route::post('update-section-status',[SectionController::class,'updatesectionstatus'])->name('updatesectionstatus');
    Route::get('delete-section/{id}',[SectionController::class,'deletesection'])->name('deletesection');
    Route::match(['get', 'post'], 'Add-Edit-section', [SectionController::class, 'AddEditSection'])->name('AddEditSection');
    // section controller ends -----------------------------------------------------------
    
    // mockupsection ----------------------------------------------------------------------------------------------
    Route::get('MockupSections',[MockupssectionController::class,'Mockupsections'])->name('Mockupsections');
    //Route::post('update-section-status',[SectionController::class,'updatesectionstatus'])->name('updatesectionstatus');
    Route::get('delete-mockupsection/{id}',[MockupssectionController::class,'deletemockupsection'])->name('deletemockupsection');
    Route::match(['get', 'post'], 'Add-Edit-Mockupsection', [MockupssectionController::class, 'AddEditMockupSection'])->name('AddEditMockupSection');
    ///mockupsection-end-----------------------------------------------------------------------------------------------

    ///mockupscategory---------------------------------------------------------------------------------------------------------------
    Route::get('mockupscategories',[MockupscategoryController::class,'mockupcategories'])->name('Categories'); 
    Route::get('delete-mockupscategory/{id}',[MockupscategoryController::class,'mockupdeletecategory'])->name('mockupdeletecategory');
    Route::match(['get', 'post'], 'Add-Edit-Mockcategory/{id?}', [MockupscategoryController::class, 'AddEditMockupcategory'])->name('AddEditMockupcategory');
    ///mockupcategory end-------------------------------------------------------------------------------------------------------------
    
    ///// mockups products section ///////////------------------------------------------------------------------------///////////////////////////
    Route::get('Mockuproducts',[MockupsController::class,'Mockuproducts'])->name('Mockuproducts'); 
    //Route::post('update-product-status',[MockupsController::class,'updateproductstatus'])->name('updateproductstatus');
    Route::get('delete-mockuproduct/{id}',[MockupsController::class,'deletemockuproduct'])->name('deletemockuproduct'); 
    Route::match(['get', 'post'], 'Add-Edit-MockupProduct/{id?}', [MockupsController::class, 'AddEditmockupsproduct'])->name('AddEditmockupsproduct');  
    //Route::match(['get', 'post'], 'Add-image/{id?}', [MockupsController::class, 'Addimage'])->name('Addimage'); 

   ////end mocks section /////////---------------------------////////////----------------------------------//////////////////////////
   
   // categories---------------------///////////////----------------------------------/////////////-------------
    Route::get('Categories',[CategoryController::class,'Categories'])->name('Categories'); 
    Route::get('delete-category/{id}',[CategoryController::class,'deletecategory'])->name('deletecategory');
    Route::match(['get', 'post'], 'Add-Edit-category/{id?}', [CategoryController::class, 'AddEditcategory'])->name('AddEditcategory');
    Route::match(['get', 'post'], 'business-category/{id?}', [CategoryController::class, 'AddEditcategory'])->name('business-category');
   /////////////////////----------------end-----------------------------------------/////////
    ////product section ////////////////-----------------------------------------------------------------------
    Route::get('products',[ProductController::class,'products'])->name('products'); 
    Route::post('update-product-status',[ProductController::class,'updateproductstatus'])->name('updateproductstatus');
    Route::get('delete-product/{id}',[ProductController::class,'deleteproduct'])->name('deleteproduct'); 
    Route::match(['get', 'post'], 'Add-Edit-Product/{id?}', [ProductController::class, 'AddEditproduct'])->name('AddEditproduct');  
    Route::match(['get', 'post'], 'Add-image/{id?}', [ProductController::class, 'Addimage'])->name('Addimage'); 
    
    ///////------------------------end-------------------------------------------------------------------------
    ////--------------------------- vendor details update -------------------//////////////
    Route::match(['get', 'post'], 'update-vendor-details/{slug}', [AdminController::class, 'updateVendorDetails'])->name('updateVendorDetails');

    Route::get('formpage', function(){ return view('Admin.setting.formlogin'); });

    /////-----------------------------------vendor details end-----------------------///////////////////////
    ////--------------------------view admins, sub admins, vendor---------------------////////////
    Route::get('admin/{type?}',[AdminController::class,'admins'])->name('admins');
    ///////---------------------------------view vendor------------------------------------/////////
    Route::get('view-vendor-details/{id}',[AdminController::class,'viewvendordetails'])->name('viewvendordetails');
    ////////-----------------------------------//////////////////---------------------------/////////////////

    //////////////////////---------------------------------------------------------------------/////////////////////
    ////////////////------------------------------Attributes-------------------------------------/////////////////////
    Route::match(['get','post'],'Add-attribute/{id}', [ProductController::class, 'Addattributes'])->name('Addattributes');
    /////////////----------------------------------------end---------------------------------------------------/////////
 
    ///////////////////////////////admin order view///////////////////////////////////
    Route::get('order',[OrdersController::class,'orders'])->name('orders');
    Route::get('view/orders/{id}',[OrdersController::class,'ordersdetails'])->name('ordersdetails');

    ////////////////////////////order status update //////////////////////////////
    Route::post('update-order-status',[OrdersController::class,'orderstatus'])->name('orderstatus');
    
    //////////////////////////////////////////////// events related urls/////////////////////////////////////////////////////////////////

    Route::get('EventCategory',[EvenCategoryController::class,'Eventcategory'])->name('Eventcategory');
    Route::get('delete-eventcategory/{id}',[EvenCategoryController::class,'deleteventcategory'])->name('deleteventcategory');
    Route::match(['get', 'post'], 'Add-EventCategory',[EvenCategoryController::class,'AddEventcategory'])->name('AddEventcategory');
    Route::get('AllEvent',[EventController::class,'AllEvent'])->name('AllEvent');
    Route::get('delete-event/{id}',[EventController::class,'deletevent'])->name('deletevent');
    Route::match(['get', 'post'], 'Add-Event',[EventController::class,'AddEvent'])->name('AddEvent');
    
    
});
  Route::get('admindetails',[AdminController::class,'admindetails'])->name('admindetails');

 Route::match(['get', 'post'], 'AdminLogin', [AdminController::class, 'index'])->name('admin');
 //Route::match(['get', 'post'], 'AdminLogin', 'AdminController@index');

////////////////////////////////vendor section//////////////////////////////////////////////

Route::get('Vendor login and registration',[VendorController::class,'Vendorloginfun'])->name('Vendorloginfun'); 

Route::POST('Vendor/registration',[VendorController::class,'Vendor_registration'])->name('Vendor_registration'); 

//////// confirm  vendor account
Route::get('vendor/confirm/{code}',[VendorController::class,'Confirm_vendor'])->name('Confirm_vendor');
//////////////////////////////////////vendorsection end////////////////////////////////
Route::group(['middleware'=>['auth']],function(){
     /////////user acoount//////////
     Route::match(['get', 'post'], 'user/account', [UserController::class, 'useraccount'])->name('useraccount');
     Route::match(['get', 'post'], 'checkout', [ProductsController::class, 'checkout'])->name('checkout');
 
     /////////// get delivery address////////////////////
     
     Route::post('get-delivery-address',[AddressController::class,'getdeliveryaddress'])->name('getdeliveryaddress');
     Route::post('save-delivery-address',[AddressController::class,'savedeliveryaddress'])->name('savedeliveryaddress');
     ///////////////////remove-delivery-address
     Route::post('remove-delivery-address',[AddressController::class,'removedeliveryaddress'])->name('removedeliveryaddress');
     /////////thanks page //////////////////////////////////
     route::get('Thanks',[ProductsController::class,'Thanks'])->name('Thanks');
         /////updatewishlist
    Route::post('update-wishlist',[ProductsController::class,'addProductWishlist'])->name('Add-wishlist');

    ///wishlist page 
    route::get('wishlist',[ProductsController::class,'viewwishlist'])->name('view-wishlist');
    
    // user order view
    route::get('user/orders/{id?}',[OrderController::class,'userorder'])->name('user-order');

    ///// stripe redirect 
    route::get('stripe',[StripeController::class,'stripe'])->name('stripe');


    /// payroute
    route::post('pay',[StripeController::class,'pay'])->name('payment');
    route::get('success',[StripeController::class,'success'])->name('success');
    route::get('error',[StripeController::class,'error'])->name('error');       

    
 });
    ///phonepe/////
    route::get('phonepe',[PhonePecontroller::class,'phonepe'])->name('phonepe');

    route::get('phonepe-response',[PhonePecontroller::class,'response'])->name('response');
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
     Route::get('Customer/login/registration',[ UserController::class,'userloginfunction'])->name('login'); 
     ///Route::get('Customer/login/registration',['as'=>'login','uses'=>'UserController@userloginfun']); 
     Route::post('Customer/registration',[UserController::class,'user_registration'])->name('user_registration'); 
     Route::post('Customer/login',[UserController::class,'user_login'])->name('user_login');
 
     Route::get('Customer/logout',[UserController::class,'userlogout'])->name('userlogout'); 
     ///user forget password ///////
     Route::match(['get', 'post'], 'user/forgot-password', [UserController::class, 'userforgotpassword'])->name('userforgotpassword');
     
 
  
 //////// confirm  user account
 Route::get('Customer/confirm/{code}',[UserController::class,'Confirm_user'])->name('admin');
 ////////////////////////////////////// end////////////////////////////////



//////////////////////-----------------------front product -------------------------------///////////////
 $catUrls = Category::select('url')->where('category_status',1)->get()->pluck('url')->toArray();
 //dd($catUrls); die;
 foreach($catUrls as $key => $url){
    Route::get('/'.$url,[ProductsController::class,'listing']); 
 }
 Route::get('/search', [ProductController::class, 'listing']);

 
/////////////////////--------------------------------end---------- ----------------------////////////////////////

//////////////////////-----------------------front mockups product -------------------------------///////////////

$catUrls = Mockupcategory::select('url')->where('category_status',1)->get()->pluck('url')->toArray();
//dd($catUrls); die;
foreach($catUrls as $key => $url){
   Route::get('/'.$url,[MockupsController::class,'mockuplisting']); 
}

Route::get('mockupsproduct/{id}',[MockupsController::class,'mockupsedit'])->name('mockupsedit');


/////////////////////--------------------------------end---------- ----------------------////////////////////////

////////////////////---------------------------view product----------------------------------///////////////////////////////////
Route::get('product/{id}',[ProductsController::class,'detail'])->name('detail');

Route::post('get-product-price',[ProductsController::class,'getproductprice'])->name('admin');



//////////////////////////////////////////---------t-shirt design --------------------------------///////////////////////////////////



////////////////////////////-------------------------cart-------------------------------/////////////////////////
Route::post('cart/add',[ProductsController::class,'cartadd'])->name('cartadd');
/////////////////////////////////////////////--------end-----------------------///////////////////////////////////

Route::get('shoping-cart',[ProductsController::class,'cart'])->name('cart');

/////  ----    filter route -------/////////

Route::get('filters',[FilterController::class,'filters'])->name('filters');
Route::get('filter-values',[FilterController::class,'filtervalues'])->name('filtervalues');
Route::match(['get', 'post'], 'add-edit-filter/{id?}', [FilterController::class, 'addeditfilter'])->name('addeditfilter');
Route::match(['get', 'post'], 'add-edit-filter-value/{id?}', [FilterController::class, 'addeditfiltervalue'])->name('addeditfiltervalue');


////////------------------view vendors ---------------------------------//////////////////////////////


// Route::get('Supliers',[VendorController::class,'Supliers'])->name('admin');

/////////////////////////////////---- update admin Status- active and inactive---------------////////////////////////////////////////

//Route::match(['get', 'post'], 'update_admin-status', [AdminController::class, 'updateadminstatus'])->name('admin');

Route::post('/admin/update-admin-status',[AdminController::class,'updateadminstatus'])->name('updateadminstatus');
/////////////////////////////////////////////////////////end////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('suppliers/{Business_Category}',[IndexController::class,'suppliers'])->name('suppliers');
///////---------------------------------view vendor------------------------------------/////////
Route::get('view-supliers-details/{id}',[IndexController::class,'viewsupliersdetails'])->name('viewsupliersdetails');
////////-----------------------------------//////////////////---------------------------/////////////////

///event inside page///////-----------------------
Route::get('view-event-details/{id}',[EventController::class,'vieweventsdetails'])->name('vieweventsdetails');

//////////////////////-------------------cart delete item-----------------------///////////////////////////////////////////

Route::post('cart/delete',[ProductsController::class,'cartDelete'])->name('cart-delete');


    
    $catUrls = Mockupcategory::select('url')->where('category_status',1)->get()->pluck('url')->toArray();
      //dd($catUrls); die;
    foreach($catUrls as $key => $url){
       Route::get('/'.$url,[MockupsController::class,'mockuplisting']); 
    }


///////////////////////////////event ////////////////////////////////////////////////
$catUrls = EvenCategory::select('url')->where('status',1)->get()->pluck('url')->toArray();
//dd($catUrls); die;
foreach($catUrls as $key => $url){
   Route::get('/'.$url,[EventController::class,'eventgrid']); 
}





