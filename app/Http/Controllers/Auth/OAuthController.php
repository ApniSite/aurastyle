<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as OAuth2User;
use App\Models\User;
use App\Models\SocialAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class OAuthController extends Controller
{
    /**
     * Redirect the user to the OAuth Provider.
     *
     * @param  string $provider
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @param  string $provider
     */
    public function callback($provider)
    {
        try {
            /** @var OAuth2User $socialUser */
            $socialUser = Socialite::driver($provider)->user();

            $user = $this->findOrCreateUser($provider, $socialUser);

            Auth::login($user);

            return redirect()->intended(route('account', absolute: false));
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Authentication failed. Please try again.');
        }
    }

    /**
     * Find or create a user based on the OAuth provider information.
     */
    public function findOrCreateUser($provider, OAuth2User $socialUser)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderId($socialUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::updateOrCreate([
                'email' => $socialUser->getEmail(),
            ], [
                'name' => $socialUser->getName(),
                'email_verified_at' => now(),
            ]);

            $user->socialAccounts()->create([
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
            ]);

            return $user;
        }
    }
}