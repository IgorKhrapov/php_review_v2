<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Это место, где вы можете зарегистрировать веб-маршруты для вашего приложения.
| Эти маршруты загружаются через RouteServiceProvider и все они
| принадлежат к группе middleware 'web'. Создайте что-то потрясающее!
|
*/

// Маршрут для входа на сайт
Route::get('/', 'App\Http\Controllers\MainController@enter')->name('enter');
Route::post('/enter/check', 'App\Http\Controllers\MainController@enter_check');

// Маршруты для административной панели
Route::get('/admin', 'App\Http\Controllers\MainController@admin')->name('admin');
Route::get('/admin/{id}/delete-user', 'App\Http\Controllers\MainController@deleteUser')->name('delete-user');

// Маршруты для регистрации нового пользователя
Route::get('/register', 'App\Http\Controllers\MainController@register')->name('register');
Route::post('/register', 'App\Http\Controllers\MainController@register');
Route::post('/register/check', 'App\Http\Controllers\MainController@register_check');

// Маршрут для домашней страницы пользователя
Route::get('/home', 'App\Http\Controllers\MainController@home')->name('home');

// Маршрут для страницы "О нас"
Route::get('/about', 'App\Http\Controllers\MainController@about')->name('about');

// Маршруты для страницы отзывов
Route::get('/review', 'App\Http\Controllers\MainController@review')->name('review');
Route::post('/review/check', 'App\Http\Controllers\MainController@review_check');

// Маршруты для управления отзывами пользователя
Route::get('/myreview', 'App\Http\Controllers\MainController@myreview')->name('myreview');
Route::get('/myreview/{id}', 'App\Http\Controllers\MainController@update')->name('update');
Route::get('/myreview/{id}/delete', 'App\Http\Controllers\MainController@delete')->name('delete');
Route::post('/myreview/{id}/update', 'App\Http\Controllers\MainController@updateSubmit')->name('update-submit');

// Маршрут для выхода из системы
Route::get('/logout', function(){
    Auth::logout(); // Осуществляет выход пользователя из системы
    return redirect('/'); // После выхода перенаправляет на главную страницу
})->name('logout');
