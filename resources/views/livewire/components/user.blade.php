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

    <div class="absolute right-0 z-50 w-screen sm:max-w-xs sm:left-auto"
         x-show="open" x-on:click.away="open = false" x-transition x-cloak>
        <ul class="p-2 space-y-1 text-sm font-medium text-gray-800 bg-white border border-gray-100 shadow-xl rounded-xl">
        @guest
        <li class="bg-gray-100"><a href="{{ route('login') }}" class="flex items-center px-3 py-4">
            Sign in
        </a></li>
        <li class="bg-gray-100"><a href="{{ route('register') }}" class="flex items-center px-3 py-4">
            Register
        </a></li>
        @endguest
        <li class="bg-gray-100"><a href="{{ route('account') }}" class="flex items-center px-3 py-4">
            Orders
        </a></li>
        <li class="bg-gray-100"><a href="{{ route('profile') }}" class="flex items-center px-3 py-4">
            Profile
        </a></li>
        @auth
        <button wire:click="logout" class="w-full text-indigo-600 py-4">
            Not <span class="underline">{{ Auth::user()->name}}</span>? Sign out
        </button>
        @endauth
        </ul>
    </div>
</div>
