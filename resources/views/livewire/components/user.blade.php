<?php

use App\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="sm:relative" x-data="{ open: false }">
    <button class="grid w-16 h-16 transition border-l border-gray-100 lg:border-l-transparent hover:opacity-75"
            @click="open = !open">
        <span class="sr-only">Account</span>

        <span class="place-self-center">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="sw-4 h-4"
                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </span>
    </button>

    <div class="absolute inset-x-0 top-auto z-50 w-screen max-w-xs mx-auto bg-white border border-gray-100 shadow-xl sm:left-auto rounded-md"
         x-show="open" x-on:click.away="open = false" x-transition x-cloak>
        <div class="divide-y text-sm font-medium text-gray-600 ">
        @guest
        <a href="{{ route('login') }}" class="block underline px-3 py-4 transition hover:bg-gray-100">
            Sign in
        </a>
        <a href="{{ route('register') }}" class="block underline px-3 py-4 transition hover:bg-gray-100">
            Register
        </a>
        @endguest
        <a href="{{ route('profile') }}" class="block underline px-3 py-4 transition hover:bg-gray-100">
            Profile
        </a>
        <a href="{{ route('account') }}" class="block underline px-3 py-4 transition hover:bg-gray-100">
            Orders
        </a>
        @auth
        <button wire:click="logout" class="w-full text-indigo-600 py-4 transition hover:bg-gray-100">
            Not <span class="underline">{{ Auth::user()->name}}</span>? Sign out
        </button>
        @endauth
        </div>
    </div>
</div>
