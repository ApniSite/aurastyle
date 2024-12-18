<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPassword
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke(): void
    {
        if ($user = Auth::user()) {
            if ($email = $user->email) {
                $credentials = ['email' => $email];
                $status = Password::sendResetLink($credentials);
                session()->flash('status', __($status));
            } else {
                session()->flash('error', __('Please save your email address first.'));
            }
        }
    }
}
