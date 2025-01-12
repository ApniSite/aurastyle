<x-app-layout>
    <x-slot name="title">{{ 'Page not found | ' . config('app.name') }}</x-slot>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center">
        <div class="max-w-xl mx-auto p-8 text-lg text-center text-gray-800 dark:text-gray-300">
            <div class="flex flex-col items-center gap-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                </svg>
                <h2 class="">This style has gone out</h2>
                <div class="ml-4 text-gray-500 uppercase tracking-wider">{{ $exception->getMessage() }}</div>
                <x-button.primary><a href="/">Explore other styles</a></x-button.primary>
            </div>
        </div>
    </div>
</x-app-layout>