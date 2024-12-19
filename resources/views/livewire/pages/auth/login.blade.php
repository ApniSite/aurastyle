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
                <x-brand.logo-dark class="w-auto h-16 mb-4 hover:text-indigo-600"/>
            </a>
            <p class="mt-2 mb-4 text-sm">{{ __('Sign in with your mobile number or email') }}</p>
        </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Username -->
        <div>
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
        <div class="flex mt-4 text-sm">
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

        <div class="flex items-center justify-end mt-4">
            <x-button.primary>{{ __('Sign in') }}</x-button.primary>
        </div>
    </form>

    <div class="flex flex-cols items-center justify-center mt-6 relative text-sm">
        <hr class="w-full border">
        <span class="absolute px-4 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300">{{ __('Or') }}</span>
    </div>

        <div class="mt-6 text-center">
            <a href="{{ route('register') }}" wire:navigate class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                {{ __('Register a new account') }}
            </a>
        </div>
    </div>
</x-container>
