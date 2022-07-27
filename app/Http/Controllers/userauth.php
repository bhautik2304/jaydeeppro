<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class userauth extends Controller
{
    //
    public function GoogelCall()
    {
        # code...
        return Socialite::driver('google')->redirect();
    }

    //Registration Function
    public function GoogelSignup(User $user)
    {
        # code...
        $GoogelUser = Socialite::driver('google')->user();
        $users=$user->select("*")->where('Googel_id',$GoogelUser->id)->get();
        $usersdata=$users->toArray();
        if(!$usersdata){

            // Auth::login($users);

            return redirect('/');

        }
        $user->token;
        $user = User::updateOrCreate([
            'Googel_id' => $GoogelUser->id,
            'name' => $GoogelUser->name,
            'password' => Hash::make($GoogelUser->name.$GoogelUser->id),
            'email' => $GoogelUser->email,
            'avatar' => $GoogelUser->avatar,
            'email_verified_at'=>today(),
            'googel_tocken'=>$GoogelUser->token
        ]);
        session()->put(['user' => $GoogelUser->name]);
        return redirect('/');

    }

    public function login(Request $req)
    {
        # code...
        $user=User::where('mobaile',$req->input('mobaile'))->first();
        if(!$user){
            return "no user found";
        }
        session()->put('login', true);
        session()->put('user', $user->toArray());
        return $user;
    }
}
