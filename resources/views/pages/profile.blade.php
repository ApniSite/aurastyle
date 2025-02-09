{{-- <?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.storefront')] class extends Component
{
}; ?> --}}
<x-app-layout>
    <div class="max-w-screen-xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-md">
                <livewire:profile.update-profile-information-form />
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-md">
                <livewire:profile.update-password-form />
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-md">
                <livewire:profile.delete-user-form />
            </div>
        </div>
    </div>
</x-app-layout>
