<?php
use Illuminate\Support\Facades\Input;
use App\Users_play;
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
// Fontend
Route::get('/', 'HomeController@index')->name('Home');

Route::get('/reward', 'HomeController@reward')->name('Reward');

Route::get('/registers', 'HomeController@registers')->name('Registers');

Route::post('/store', 'HomeController@store')->name('Registers.store');

Route::get('/decorate/{choice}/{child}/{id}', 'HomeController@decorate')->name('decorate');

Route::get('/share', 'HomeController@share')->name('Share');
Route::get('/share/{name}', 'PhotoController@sharePage');

Route::get('/gallery', 'HomeController@gallery')->name('Gallery');
// Route::post('/gallery', 'HomeController@gallery')->name('Gallery');

Route::get('/content', 'HomeController@content')->name('Content');

Route::get('/result', 'HomeController@result')->name('Result');
// Backend
Route::get('/admin', function () {
    return view('auth.login');
});

Auth::routes();
// home
// Route::get('/admin/home', 'backend\AdminController@index')->name('backend.home');
// // user play
// Route::resource('/admin/users', 'backend\UsersController');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/uploadpic', 'PhotoController@uploadpic');

Route::get('/update', 'HomeController@updateUser');

Route::get('/update_info', 'HomeController@update');
//login with facebook
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::group(['prefix' => 'admin'], function() {

	Route::get('/dashboard','AdminController@index')->name('admin.dashboard');
	Route::get('/','Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/','Admin\LoginController@login');
	Route::resource('/content','BackOffice\ContentController');
});
Route::post('/logout', 'AdminController@logout')->name('admin.logout');
