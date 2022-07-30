<?php

use App\Http\Controllers\{userauth,pagemanage,adminroutescontroller};
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [pagemanage::class,'index'])->name('home');
Route::get('about', [pagemanage::class,'about'])->name('about');

Route::get('auth/login',[userauth::class,'login']);
// app auth
Route::post('auth/login',[userauth::class,'login']);
Route::post('auth/registration',[userauth::class,'register'])->name('register');
Route::get('auth/resetpassword',[userauth::class,'GoogelCall'])->name('reset');
// social auth
Route::get('auth/google',[userauth::class,'GoogelCall']);
Route::get('auth/callback',[userauth::class,'GoogelSignup']);

Route::middleware(['auth', 'second'])->group(function () {

});

Route::get('admin/',[adminroutescontroller::class,'index'])->name('adminhome');


Route::get('/menu', function () {
    $cate=menucategury::with('product')->get();
    $data=["pro"=>menucategury::with('product')->get()->toArray()];
    return view('menu',["data"=>$data]);
})->name('menu');

// therd party user signup routs(googele,facebook)

// therd party user login routs(googele,facebook)
// Route::get('login/google',[userauth::class,'GoogelCall']);
// Route::get('/auth/callback',[userauth::class,'GoogelSignup']);

Route::post('/test', function () {

//     $cate=menucategury::with('product')->get();
//  return $cate;
return "hello";
});

Route::get('/logout', function () {
    session()->put('login',false);
    session()->forget('user');
 return redirect('/');
})->name('logout');
