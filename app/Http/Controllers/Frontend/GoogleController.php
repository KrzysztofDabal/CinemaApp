<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
        $google_user = Socialite::driver('google')->user();
    
        $user = User::updateOrCreate([
            'google_id' => $google_user->id,
        ], [
            'name' => $google_user->user['name'],
            'surname' => $google_user->user['given_name'],
            'email' => $google_user->email,
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(13)),
            'github_token' => $google_user->token,
            'github_refresh_token' => $google_user->refreshToken,
        ]);

        Auth::login($user);

        return redirect()->route('profile.dashboard');
    }
}