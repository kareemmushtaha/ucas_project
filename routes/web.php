<?php

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
//
//Route::get('/', function () {
//    return view('homeView');
//});

Route::get('/', 'Show\HomePageController@index');
Route::get('/restaurant/{id}', 'Show\HomePageController@restaurant');

Route::get('/kks', function () {
    return view('RestaurantView');
});
/*---------------------    Start Route Login and Register  ----------------------------*/

Route::group(['namespace' => 'Auth', 'prefix' => 'register'], function () {
    Route::get('/admin', 'RegisterController@showAdminRegisterForm');
    Route::get('/blogger', 'RegisterController@showBloggerRegisterForm');
    Route::post('/admin', 'RegisterController@createAdmin');
    Route::post('/blogger', 'RegisterController@createBlogger');
});

Route::group(['namespace' => 'Auth', 'prefix' => 'login'], function () {

    Route::get('/admin', 'LoginController@showAdminLoginForm');
    Route::get('/blogger', 'LoginController@showBloggerLoginForm');
    Route::post('/admin', 'LoginController@adminLogin');
    Route::post('/blogger', 'LoginController@bloggerLogin');
});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin')->middleware('auth:admin');
Route::view('/blogger', 'blogger')->middleware('auth:blogger');


/*------------------------    Finish Route Login and Register   --------------------------*/

Route::group(['namespace' => 'Admin', 'middleware'=>'auth:admin'], function () {
    Route::Resource('userAdmin', 'userResturentController');
    Route::Resource('servesAllRestaurant', 'servesResturentController');
    Route::Resource('categoryAllRestaurant', 'categoryResturentController');
    Route::post('/searchuser', 'categoryResturentController@search');
    Route::Resource('/AllRestaurant', 'AllRestaurantController');
    Route::Resource('/ImgAllRestaurant', 'ImgRestaurantController');
    Route::Resource('/MealRestaurant', 'MealRestaurantController');
    Route::Resource('/userMeal', 'orderRestaurantController');

});

Route::group(['prefix'=>'Restaurant' ,'namespace' => 'Restaurant', 'middleware'=>'auth:blogger'], function () {
    Route::Resource('/category', 'showCategorysController');
    Route::post('/searchuser', 'showCategorysController@search');
    Route::Resource('/serves', 'servesController');
    Route::Resource('/img', 'imgController');
    Route::Resource('/Ads', 'adsController');
    Route::Resource('/meal', 'mealController');
    Route::Resource('/aboutUs', 'aboutUsController');
    Route::Resource('/OrderRestaurant', 'OrderController');
});

Route::Resource('/test', 'Restaurant\Test');

//Route::get('/category', 'Restaurant\showCategorysController@getCategory')->middleware('auth:blogger');
/* -----------------  Test Relation To Project  --------------- */

Route::get('/AboutUsRestaurant', 'Admin\userResturentController@getAboutUsRestaurant');
Route::get('/AboutUsRestaurantName/{id}', 'Admin\userResturentController@geRestaurantName');

Route::get('/getAllRestaurantByImg', 'Admin\userResturentController@getAllRestaurantByImg');
Route::get('/RestaurantImg/{id}', 'Admin\userResturentController@getImgRestaurant');
Route::get('/getRestaurantByImg/{id}', 'Admin\userResturentController@getRestaurantByImg');

Route::get('/category', 'Admin\userResturentController@getCategory')->middleware('auth:blogger');
Route::get('/getRestaurantByCategory/{id}', 'Admin\userResturentController@getRestaurantByCategory');
Route::get('/getAllRestaurantByCategory', 'Admin\userResturentController@getAllRestaurantByCategory');

Route::get('/getServes/{id}', 'Admin\userResturentController@getServes');
Route::get('/getRestaurantByServes/{id}', 'Admin\userResturentController@getRestaurantByServes');
Route::get('/getAllRestaurantByServes', 'Admin\userResturentController@getAllRestaurantByServes');

Route::get('/getAdds/{id}', 'Admin\userResturentController@getAdds');
Route::get('/getRestaurantByAdd/{id}', 'Admin\userResturentController@getRestaurantByAdd');
Route::get('/getAllRestaurantByAdd', 'Admin\userResturentController@getAllRestaurantByAdd');









Route::get('/add', 'Show\AddsController@index');
Route::get('/detailsAdd/{id}', 'Show\AddsController@show');
Route::get('/addToCart/{meal}', 'Restaurant\mealController@addToCart')->name('cart.add');
Route::get('/shoppingCart', 'Restaurant\mealController@showCart')->name('cart.show');
Route::get('/checkout/{amount}', 'Restaurant\mealController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge', 'Restaurant\mealController@charge')->name('cart.charge');

Route::get('/order', 'Restaurant\OrderController@index')->name('order.index')->middleware('auth');
Route::delete('/meal/{meal}', 'Restaurant\mealController@destroyCart')->name('meal.remove');
