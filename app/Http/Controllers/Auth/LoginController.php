<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $github_user = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            "provider_id" => $github_user->getId(),
        ], [
            "email" => $github_user->getEmail(),
            "name" => $github_user->getName(),
        ]);

        // log the user in
        auth()->login($user, true);

        // redirect to dashboard
        return redirect('dashboard');
    }
}
