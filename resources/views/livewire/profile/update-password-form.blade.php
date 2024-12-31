<?php

use App\Actions\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }

    public function resetPassword(ResetPassword $resetPassword): void
    {
        $resetPassword();
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <div>
            <x-input.label for="update_password_current_password" :value="__('Current Password')" />
            <x-input.text-input wire:model="current_password" id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input.error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input.label for="update_password_password" :value="__('New Password')" />
            <x-input.text-input wire:model="password" id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input.label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-input.text-input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input.error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-button.primary>{{ __('Save') }}</x-button.primary>

            <x-input.action-message class="me-3" on="password-updated">
                {{ __('Saved.') }}
            </x-input.action-message>
        </div>
    </form>

    <div class="mt-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Reset Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('If you have an email in account, we will email you a password reset link.') }}
        </p>
    </div>

    <div class="mt-6">
        <x-input.error :messages="session('error')" class="mb-4" />
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-button.primary wire:click="resetPassword">{{ __('Send reset password link') }}</x-button.primary>
    </div>
</section>
