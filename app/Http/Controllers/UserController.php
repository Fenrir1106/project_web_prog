<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public static function checkUserHasLogIn(){
        if(Auth::check()){
            return true;
        }
        return false;
    }

    public static function getAuthenticatedUserRole(){
        return Auth::user()->role;
    }

    public function login(Request $request){
        $validated = $request->validate([
            "email" => "required|email:rfc",
            "password" => "required"
        ]);
        $remember_token = $request->has("remember_me") ? true : false;
        if(Auth::attempt($validated)){
            if($remember_token){
                Cookie::queue("remember_email", $request->email, 300);
                Cookie::queue("remember_password", $request->password, 300);
            }
            return redirect()->route("home");
        }

        return back()->withErrors([
            "credential" => "The provided credential doesn't match our record"
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget("remember_email"));
        Cookie::queue(Cookie::forget("remember_password"));
        return redirect()->route("login");
    }

    public function registerNewUser(Request $request){
        $validated = $request->validate([
            "full_name" => "required|min:5",
            "gender" => "required",
            "address" => "required|min:10",
            "email" => "required|email:rfc|unique:users,email",
            "password" => "required|min:6",
            "confirm_password" => "required|same:password",
        ]);

        $user = new User;
        $user->full_name = $request->full_name;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = "member";
        $user->save();

        return redirect()->route("login");
    }
}
