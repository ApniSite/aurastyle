<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.storefront')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<x-container>
    <div class="max-w-md p-4 mx-auto border border-gray-300 dark:border-gray-700 rounded-lg">
    <article class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        <h3 class="mb-4 text-lg font-medium">{{ __('Forgot your password? No problem.') }}</h3>
        <p>{{ __('Just enter your email address and we will send you a password reset link.') }}</p>
    </article>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input.label for="email" :value="__('Email')" />
            <x-input.text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            <x-input.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('login') }}" wire:navigate class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                {{ __('Back to sign in') }}
            </a>
            <x-button.primary>
                {{ __('Email Password Reset Link') }}
            </x-button.primary>
        </div>
    </form>
    </div>
</x-container>
