<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.storefront')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('account', absolute: false), navigate: true);
    }
}; ?>

<x-container>
    <div class="max-w-md p-4 mx-auto border border-gray-300 dark:border-gray-700 rounded-lg">
        <div class="flex flex-col items-center mx-auto text-gray-500 dark:text-gray-300">
            <a href="/" wire:navigate>
                <x-brand.logo-dark class="w-auto h-8 mt-6 mb-6 hover:text-indigo-600"/>
            </a>

            <!-- Social Login Buttons -->
            <div class="w-full space-y-3 mb-6">
                <a href="{{ route('oauth.redirect', ['provider' => 'google']) }}" class="w-full block">
                    <x-button.primary class="w-full justify-center">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                            <path fill="#EA4335" d="M12 5.04c2.17 0 4.1.72 5.63 1.92l4.23-4.23C19.08.44 15.9-.88 12 .88 7.31.88 3.27 3.69 1.23 7.64l4.92 3.82c1.17-3.45 4.39-6.42 5.85-6.42z"/>
                            <path fill="#4285F4" d="M23.49 12.27c0-.79-.07-1.54-.19-2.27H12v4.51h6.47c-.29 1.48-1.14 2.73-2.4 3.58v3h3.86c2.26-2.09 3.56-5.17 3.56-8.82z"/>
                            <path fill="#FBBC05" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.86-3c-1.08.72-2.45 1.15-4.07 1.15-3.13 0-5.78-2.11-6.73-4.96L.33 17.3C2.37 21.25 6.41 24 12 24z"/>
                            <path fill="#34A853" d="M5.27 14.29c-.25-.72-.38-1.49-.38-2.29s.13-1.57.38-2.29V6.69L.33 3.67C-.12 4.99-.33 6.41-.33 7.92c0 1.51.21 2.93.66 4.25l4.94-2.88z"/>
                        </svg>
                        {{ __('Continue with Google') }}
                    </x-button.primary>
                </a>

                <a href="{{ route('oauth.redirect', ['provider' => 'facebook']) }}" class="w-full block">
                    <x-button.secondary class="w-full justify-center !bg-[#1877F2] hover:!bg-[#1874E8]">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        {{ __('Continue with Facebook') }}
                    </x-button.secondary>
                </a>
            </div>
        </div>

    <div class="flex flex-cols items-center justify-center mb-6 relative text-sm">
        <hr class="w-full border">
        <span class="absolute px-4 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300">{{ __('Or') }}</span>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mt-6 mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Username -->
        <div class="mt-4">
            <x-input.label for="username" :value="__('Username')" />
            <x-input.text-input wire:model="form.username" id="username" class="block mt-1 w-full"
                        type="text" name="username" required autofocus autocomplete="username" />
            <x-input.error :messages="$errors->get('form.username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input.label for="password" :value="__('Password')" />
            <x-input.text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                        type="password" name="password" required autocomplete="current-password" />
            <x-input.error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex mt-4 mb-6 text-sm">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="ml-auto underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('register') }}" wire:navigate class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                {{ __('Register a new account') }}
            </a>

            <x-button.primary>{{ __('Sign in') }}</x-button.primary>
        </div>
    </form>
    </div>
</x-container>
