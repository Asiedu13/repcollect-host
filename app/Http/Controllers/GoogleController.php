<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $findUser = User::where('google_id', $user->id)->first();

            if($findUser){
                Auth::login($findUser);
               return redirect()->route("dashboard");

            } else {
                $newUser = User::firstOrNew([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('chickensoup123')
                ]);
                
                $newUser->save();

                Auth::login($newUser);

                return redirect()->route('dashboard');
            }

            // return redirect()->intended('me.index');

        } catch(Exception $e) {
        //     //TODO: log error
            // dd($e->getMessage());

            return redirect()->route('register');
        }
    }
}
