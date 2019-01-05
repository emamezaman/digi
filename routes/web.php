<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
//cd desktop/digikala  
 //php artisan serve
|
*/
Route::Group(['middleware'=>'throttle:60,1'],function(){


//========================== route group admin ===============================

  Route::Group(['prefix'=>'admin','middleware'=>['check_admin', 'load_admin_data'] ],function(){

  Route::get('','admin\AdminController@index');

  Route::resource('category','admin\CategoryController',['except'=>['show']]);

  Route::post('category/del_img/{id}','admin\CategoryController@del_img');

  Route::resource('slider','admin\SliderController');

  Route::post('slider/del_img/{id}','admin\SliderController@del_img');

  Route::get('product/add-review','admin\ProductController@add_review_form');

  Route::post('product/add-review','admin\ProductController@review_store');

  Route::resource('product','admin\ProductController');

  Route::get('product/gallery/{id}','admin\ProductController@gallery');

  Route::post('product/product_gallery/{id}','admin\ProductController@upload')

  ->name('product_gallery.upload');

  Route::post('product/del_img/{id}','admin\ProductController@del_img');

  Route::get('filter','admin\FilterController@index')->name('filter.index');

  Route::post('filter','admin\FilterController@store');

  Route::get('add-filter-product/{product_id}','admin\ProductController@add_filter_form');

  Route::post('add-filter-product','admin\ProductController@add_filter_store');

  Route::get('item','admin\ItemController@index');

  Route::post('item','admin\ItemController@store');

  Route::get('add-item-product/{product_id}','admin\ProductController@add_item_form');

  Route::post('add-item-product','admin\ProductController@add_item_store');

  route::resource('amazing','admin\AmazingController',['except'=>'show']);

  route::get('group_delete','admin\AmazingController@allDelete');

  Route::resource('service','admin\ServiceController');

  route::post('service/get_price','admin\ServiceController@get_price');

  route::post('service/set_price','admin\ServiceController@set_price');

  Route::resource('ostan','OstanController');

  Route::resource('shar','SharController');

  Route::resource('order','admin\OrderController');

  Route::get('user/set_status','admin\OrderController@setStatus');

  Route::resource('user','admin\UserController');

  Route::get('statistics','admin\AdminController@statistics');

  Route::get('comment','admin\CommentController@index');

  Route::POST('ajax_set_status_comment','admin\CommentController@set_status');

  Route::DELETE('remove_comment/{id}','admin\CommentController@remove_comment');

  Route::DELETE('remove_score/{id}','admin\CommentController@remove_score');

  Route::get('question','admin\QuestionController@index');

  Route::POST('ajax_set_status_question','admin\QuestionController@set_status');

  Route::DELETE('remove_question/{id}','admin\QuestionController@remove_question');

  Route::post('add_answers','admin\QuestionController@add_answers');

  Route::get('setting/pay','admin\AdminController@pay_setting_form');

  Route::post('setting/pay','admin\AdminController@save_pay_setting');

  Route::resource('discount/order','admin\DiscountController');
  Route::resource('gift_cart/order','admin\GiftCartController');

});


//============================route index===============================
Route::middleware('statistics')->Group(function(){

Route::get('/','SiteController@index');

Route::get('product/{code}/{title}','SiteController@show');

Route::get('compare/{product1}/{product2?}/{product3?}/{product4?}','SiteController@compare');

Route::get('category/{cat1}','SearchController@show_product_cat1');

Route::get('search','SiteController@search');

});



Route::get('product/add_review','SiteController@add_review_form');

Route::post('service/set_service','SiteController@set_service');

Route::post('cart','SiteController@addCart');

Route::get('cart','SiteController@showCart');

Route::post('site/del_ajax_cart','SiteController@delProductCart');

Route::post('site/set_ajax_cart','SiteController@setProductCart');

Route::post('site/auth_check','SiteController@authCheck');

Route::get('shipping','ShopController@shipping');

Route::post('shop/get_shar','ShopController@getShar');

Route::post('shop/add_address','ShopController@add_address');

Route::post('shop/edit_address_form','ShopController@edit_address_form');

Route::post('shop/update_address/{id}','ShopController@update_address');

Route::DELETE('shop/delete_address/{id}','ShopController@delete_address');

// Route::post('shop/save_order_info','ShopController@save_order_info');

Route::match(['get','post'],'shop/review','ShopController@review');

Route::get('payment','ShopController@payment');

Route::post('payment','ShopController@pay');

Route::get('test','SiteController@test');

Route::get('user/order','ShopController@show_order');

Route::get('user/order/print','ShopController@print_order');

Route::get('create_barcode','ShopController@create_barcode');

Route::get('create_pdf_file','ShopController@create_pdf');


Route::get('admin_login','admin\AdminController@showLogin');

Route::get('search/{cat1}/{cat2}/{cat3}','SearchController@search');

Route::post('ajax/search_filter_product','SearchController@ajax_search');

Route::get('category/{cat1}/{cat2}','SearchController@category');

Route::get('category/{cat1}/{cat2}/{cat3}','SearchController@show_product');

Route::get('category/{cat1}/{cat2}/{cat3}/{cat4}','SearchController@show_product_cat4');

Route::Group(['middleware'=>'auth'],function(){

Route::get('Addcomment/{product_id}','SiteController@comment_form');

Route::post('site/add_score','SiteController@store_score');

Route::post('site/add_comment','SiteController@store_comment');

Route::post('site/add_question','SiteController@add_question');

ROUTE::GET('user','UserController@index');

ROUTE::GET('user/my_order','UserController@my_orders');

ROUTE::GET('user/gift_cart','UserController@gift_cart');
});

route::get('test','SiteController@test');

Route::post('site/ajax_get_tab_data','SiteController@ajax_comment');

Route::post('ajax_get_product_cat','SiteController@ajax_get_product_cat');

Route::POST('order','ShopController@update_order');

Route::get('order','ShopController@update_order2');

Route::POST('site_check_discount_code','ShopController@check_discount_code');

Route::POST('site_check_gift_code','ShopController@check_gift_code');

//cd desktop/digikala php artisan serve
//php artisan serve
Auth::routes();
});

Route::get('email', 'TestController@email')->middleware('auth');
Route::get('sms', 'TestController@sms')->middleware('auth');
Route::get('captcha1','TestController@captcha_get');
// Route::post('captcha1','TestController@captcha_post');
Route::get('user-pdf','TestController@user_pdf');
