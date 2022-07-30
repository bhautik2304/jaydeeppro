<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,cart};
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
    public function register(Request $req)
    {
        # code...
        $user=new User;
        $user->name=$req->input('name');
        $user->mobaile=$req->input('mobaile');
        $user->password=Hash::make($req->input('password'));
        $user->email=$req->input('email');
        $user->save();

        $cartdata=[
            "product"=>cart::where("userid",$req->user_id)
                           ->with('menu')
                           ->get(),
            "cart_totale"=>cart::where("userid",$req->user_id)->sum('totale_price'),
        ];
        session()->put('cart', $cartdata);

        session()->put('login', true);
        session()->put('user', $user->toArray());
        return redirect()->route('menu');
        // return redirect()->route('named_route', ['parameterKey' => 'value']);
        // return "hello";
    }
    public function login(Request $req)
    {
        # code...
        $user=User::where('mobaile',$req->input('mobaile'))->first();
        if(!$user){
            return redirect()->back()->withErrors('')->withInput();
        }
        if(!$user || !Hash::check($req->input('pass'),$user->password)){
            return redirect()->back()->withErrors('')->withInput();
        }
        $cartdata=[
            "product"=>cart::where("userid",$user->id)
                           ->with('menu')
                           ->get()->toArray(),
            "cart_totale"=>cart::where("userid",$user->id)->sum('totale_price'),
        ];
        session()->put('cart', $cartdata);
        session()->put('login', true);
        session()->put('user', $user->toArray());
         return redirect('/menu');
    }
}
