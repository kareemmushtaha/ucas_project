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

Route::get('/', function () {
    return view('homeView');
});

/*---------------------    Start Route Login and Register  ----------------------------*/

Route::group(['namespace' => 'Auth', 'prefix' => 'login'], function () {

    Route::get('/admin', 'LoginController@showAdminLoginForm');
    Route::get('/blogger', 'LoginController@showBloggerLoginForm');
    Route::post('/admin', 'LoginController@adminLogin');
    Route::post('/blogger', 'LoginController@bloggerLogin');
});

Route::group(['namespace' => 'Auth', 'prefix' => 'register'], function () {
    Route::get('/admin', 'RegisterController@showAdminRegisterForm');
    Route::get('/blogger', 'RegisterController@showBloggerRegisterForm');
    Route::post('/admin', 'RegisterController@createAdmin');
    Route::post('/blogger', 'RegisterController@createBlogger');
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

});

Route::Resource('/userMeal', 'Admin\orderRestaurantController');



Route::group(['prefix'=>'Restaurant' ,'namespace' => 'Restaurant', 'middleware'=>'auth:blogger'], function () {
    Route::Resource('/category', 'showCategorysController');
    Route::post('/searchuser', 'showCategorysController@search');
    Route::Resource('/serves', 'servesController');
    Route::Resource('/img', 'imgController');
    Route::Resource('/Ads', 'adsController');
    Route::Resource('/meal', 'mealController');
});




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
