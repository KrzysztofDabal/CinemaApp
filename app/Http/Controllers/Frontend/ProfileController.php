<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function dashboard(){
        $user = Auth::user();
        return view('frontend.profile.dashboard', compact('user'));
    }

    public function profile_update_form(){
        $user = Auth::user();
        return view('frontend.profile.profile_update_form', compact('user'));
    }

    public function profile_update(Request $request, $user_id){
        $user = Auth::user();
        if($user->id != $user_id){
            return redirect()->route('profile.dashboard');
        }
        else{
            $user->update($request->all());

            return redirect()->route('profile.dashboard');
        }

    }

    public function password_update_form(){
        $user = Auth::user();
        return view('frontend.profile.password_update_form', compact('user'));
    }

    public function password_update(Request $request, $user_id){
        $user = Auth::user();
        if($user->id != $user_id){
            return redirect()->route('profile.dashboard');
        }
        else{
//            $user->update($request->all());

            return redirect()->route('profile.dashboard');
        }

    }
}
