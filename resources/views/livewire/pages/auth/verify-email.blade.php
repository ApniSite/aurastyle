<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.storefront')] class extends Component
{
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('account', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<x-container>
    <div class="max-w-md p-4 mx-auto border border-gray-300 dark:border-gray-700 rounded-lg">
    <article class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        <h3 class="mb-4 text-lg font-medium">{{ __('Thanks for signing up!') }}</h3>
        <p class="mb-4">{{ __('Please go to your email inbox and verify your email address by clicking on "Verify Email Address"!') }}</p>
        <p>{{ __('If you didn\'t receive the email in a few minutes, we will gladly send you another.') }}</p>
    </article>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="flex items-center justify-between mt-4">
        <button wire:click="logout" type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            {{ __('Sign Out') }}
        </button>

        <x-button.primary wire:click="sendVerification">
            {{ __('Resend Verification Email') }}
        </x-button.primary>
    </div>
    </div>
</x-container>
