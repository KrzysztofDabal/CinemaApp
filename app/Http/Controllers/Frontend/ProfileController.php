<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function dashboard(){
        return view('frontend.profile.dashboard');
    }

    public function profile_data(){
        $user = Auth::user();
        return view('frontend.profile.profile_data', compact('user'));
    }

    public function profile_update_form(){
        $user = Auth::user();
        return view('frontend.profile.profile_update_form', compact('user'));
    }

    public function profile_update(){
        return redirect()->route('profile.data');
    }
}
