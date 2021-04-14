<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
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
    return view('welcome');
});

Route::get('/wall', function() {
    return redirect('/wall/en');
})->name('wall');

Route::get('/wall/{lang}', [BlogController::class, "index"]);
Route::get('/wall/kz', [BlogController::class, "index"])->name('wall/kz');
Route::get('/wall/en', [BlogController::class, "index"])->name('wall/en');
Route::get('/wall/ru', [BlogController::class, "index"])->name('wall/ru');


Route::post('/login/login', [BlogController::class, 'login_user']);
Route::get('/login', function() {
    return redirect('login/en');
})->name('login');
Route::get('/login/{lang}', [BlogController::class, "loginIndex"]);
Route::get('/login/kz', [BlogController::class, "loginIndex"])->name('login/kz');
Route::get('/login/en', [BlogController::class, "loginIndex"])->name('login/en');
Route::get('/login/ru', [BlogController::class, "loginIndex"])->name('login/ru');

Route::post('/register/register', [BlogController::class, 'register_user']);
Route::get('/register', function() {
    return redirect('register/en');
})->name('register');
Route::get('/register/{lang}', [BlogController::class, "registerIndex"]);
Route::get('/register/kz', [BlogController::class, "registerIndex"])->name('register/kz');
Route::get('/register/en', [BlogController::class, "registerIndex"])->name('register/en');
Route::get('/register/ru', [BlogController::class, "registerIndex"])->name('register/ru');

Route::post('/wall/tweet', [BlogController::class, 'tweet']);

Route::get('/profile/{lang}', [BlogController::class, 'profileIndex']);
Route::get('/profile/kz', [BlogController::class, "profileIndex"])->name('profile/kz');
Route::get('/profile/en', [BlogController::class, "profileIndex"])->name('profile/en');
Route::get('/profile/ru', [BlogController::class, "profileIndex"])->name('profile/ru');

Route::get('/profile', function(){
    return redirect('/profile/en');
})->name('profile');

Route::post('profile/setProfImage', [BlogController::class, 'setProfImage']);

Route::get('/email', function() {
    return new WelcomeMail();
});