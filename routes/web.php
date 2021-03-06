<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

Route::get('/{any?}', function () {
    // Redis::set("name", "Gabr");
    // $name = Redis::get("name");
    // dd($name);
    return view('vue');
});

Route::post('send-mail', function () {
    Mail::to("mhmudhsham8@gmail.com")->queue(new OrderShipped);
    return redirect(url("/"));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get("dump", function() {
//     $user = User::orderBy("id", "asc")->first();
//     $user2 = User::orderBy("id", "desc")->first();

//     dump($user);
//     dump($user2);

//     return "Completed";
// });

Route::get('login/github', [LoginController::class, 'redirectToProvider']);
Route::get('login/github/callback', [LoginController::class, 'handleProviderCallback']);

Route::get("alpha", function () {
    return view("alpha");
});

Route::get('beta', function () {
    return view("beta");
});

Route::get('visit-form', function () {
    return view("test-form");
});

Route::post('visit-form', function (Request $request) {
    dd($request->all());
});

Route::resource('cars', CarController::class);

Route::resource('posts', PostController::class);
