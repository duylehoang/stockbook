<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function () {
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin')->name('login.post');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::prefix('admin')->group(function () {
    // Dashborad
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Category
    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::get('/categories/create', 'CategoryController@create')->name('category.create');
    Route::post('/categories', 'CategoryController@store')->name('category.store');
    Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::put('/categories/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/categories/{id}', 'CategoryController@delete')->name('category.delete');

    // Gallery
    Route::get('/galleries', 'GalleryController@index')->name('gallery.index');
    Route::get('/galleries/create', 'GalleryController@create')->name('gallery.create');
    Route::post('/galleries', 'GalleryController@store')->name('gallery.store');
    Route::get('/galleries/{id}/edit', 'GalleryController@edit')->name('gallery.edit');
    Route::put('/galleries/{id}', 'GalleryController@update')->name('gallery.update');
    Route::delete('/galleries/{id}', 'GalleryController@delete')->name('gallery.delete');
    // Images frame 
    Route::get('galleries/image-frame', 'GalleryController@getImageFrame')->name('gallery.frame');

    // Blog
    Route::get('/blogs', 'BlogController@index')->name('blog.index');
    Route::get('/blogs/create', 'BlogController@create')->name('blog.create');
    Route::post('/blogs', 'BlogController@store')->name('blog.store');
    Route::get('/blogs/{id}/edit', 'BlogController@edit')->name('blog.edit');
    Route::put('/blogs/{id}', 'BlogController@update')->name('blog.update');
    Route::delete('/blogs/{id}', 'BlogController@delete')->name('blog.delete');
    Route::post('/blogs/image', 'BlogController@uploadBlogImage')->name('blog.image');

    // Contact
    Route::get('/contacts', 'ContactController@index')->name('contact.index');
    Route::get('/contacts/{id}/edit', 'ContactController@edit')->name('contact.edit');
    Route::put('/contacts/{id}', 'ContactController@update')->name('contact.update');
    Route::delete('/contacts/{id}', 'ContactController@delete')->name('contact.delete');

    // User
    Route::delete('/users/{id}', 'UserController@delete')->name('user.delete');

    // Setting
    Route::get('/setting', 'SettingController@index')->name('setting.index');
    Route::post('/setting/mail', 'SettingController@updateMail')->name('setting.mail');
    Route::post('/setting/profile', 'SettingController@updateProfile')->name('setting.profile');
    Route::post('/setting/password', 'SettingController@changePassword')->name('setting.change_password');
    Route::get('/setting/users/{id}/active', 'SettingController@activeUser')->name('setting.active_user');

    // Clear cache
    Route::get('cache/view-clear', 'SettingController@viewClear')->name('setting.view_clear');
    Route::get('cache/route-clear', 'SettingController@routeClear')->name('setting.route_clear');
    Route::get('cache/cache-clear', 'SettingController@cacheClear')->name('setting.cache_clear');
    Route::get('cache/config-clear', 'SettingController@configClear')->name('setting.config_clear');
});

// Client page
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/blogs', 'HomeController@blogs')->name('home.blog');
Route::get('/blogs/{slug}', 'HomeController@blogDetail')->name('home.blog.detail');
Route::get('/about', 'HomeController@about')->name('home.about');
Route::get('/contact', 'HomeController@contact')->name('home.contact');
Route::post('/contact/send', 'HomeController@sendContact')->name('home.contact.send');