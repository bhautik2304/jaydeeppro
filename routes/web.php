<?php

use App\Http\Controllers\{userauth};
use Illuminate\Support\Facades\Route;
use App\Models\{menucategury,menu};
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::get('/menu', function () {
    $cate=menucategury::with('product')->get();
    $data=["pro"=>menucategury::with('product')->get()->toArray()];
    return view('menu',["data"=>$data]);
});

// therd party user signup routs(googele,facebook)
Route::get('auth/google',[userauth::class,'GoogelCall']);
Route::get('/auth/callback',[userauth::class,'GoogelSignup']);

// therd party user login routs(googele,facebook)
// Route::get('login/google',[userauth::class,'GoogelCall']);
// Route::get('/auth/callback',[userauth::class,'GoogelSignup']);

Route::get('/test', function () {

    $cate=menucategury::with('product')->get();
 return $cate;
});

Route::get('/logout', function () {
    Auth::logout();
 return redirect('/');
});
