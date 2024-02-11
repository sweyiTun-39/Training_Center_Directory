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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/about', 'AboutController@index')->name('about');

//Route::get('/allposts', 'AllpostsController@index')->name('allposts');

Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/categorypage', 'CategoryPageController@index')->name('categorypage'); 

Route::resource('post','PostController');

Route::resource('allposts','AllpostsController');

Route::resource('getpost','GetPostController');


Route::resource('category','CategoryController');

Route::resource('expired','ExpiredController');

Route::resource('partnerexpired','PartnerExpiredController');

Route::get('/suject','SubjectController@index');

Route::resource('subject','SubjectController');

Route::resource('user','UserController');

Route::resource('partner','PartnerController');

Route::resource('comment','CommentController');

Route::resource('message','MessageController');

Route::post('getcomments','CommentController@getcomments')->name('getcomments');

Auth::routes();

Route::resource('enrollment','EnrollmentController');
Route::get('enrollment/create','EnrollmentController@create');

Route::post('/getsubposts','GetPostController@getsubposts')->name('getsubposts');

Route::get('/getsubjects','SubjectController@getsubjects');

Route::post('/getposts','GetPostController@getposts')->name('getposts');

Route::get('/getpost','GetPostController@show');

Route::get('/getpostdetail','GetPostController@getpostdetail')->name('getpostdetail');

Route::get('/enrollment','PartnerController@enrollments');

Route::resource('postadminshow','PostadminshowController');
Route::post('postrating','Post_ratingController@rating');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/updatestatus','PostController@updatestatus')->name('updatestatus');
Route::resource('/file','FileController');
