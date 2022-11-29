<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function provider(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
        $google_user = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'google_id' => $google_user->id,
        ], [
            'name' => $google_user['given_name'],
            'surname' => $google_user['family_name'],
            'email' => $google_user->email,
            'password' => Hash::make($google_user->id.'!'.$google_user->name.'@'.$google_user->id),
            'github_token' => $google_user->token,
            'github_refresh_token' => $google_user->refreshToken,
        ]);

        Auth::login($user);

        return redirect()->route('profile.dashboard');
    }
}
