<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Volt\Component;
use Lunar\Models\Customer;
use Lunar\Models\CustomerGroup;

new #[Layout('layouts.storefront')] class extends Component
{
    #[Url(as: 'fn')]
    public string $first_name = '';
    #[Url(as: 'ln')]
    public string $last_name = '';
    public string $email = '';
    #[Url(as: 'mn')]
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required_without:email', 'nullable', 'digits_between:10,15', 'unique:'.User::class],
            'email' => ['required_without:phone', 'nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['name'] = implode(' ', [$validated['first_name'], $validated['last_name']]);
        $user = User::create($validated);

        // Create customer
        $customer = Customer::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
        ]);
        $customer->users()->attach($user);

        // Attach customer group
        if ($customerGroup = CustomerGroup::firstWhere('handle', 'new-year-25')) {
            $customer->customerGroups()->attach($customerGroup);
        }

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('account', absolute: false), navigate: true);
    }
}; ?>

<x-container>
    <div class="max-w-md p-4 mx-auto border border-gray-300 dark:border-gray-700 rounded-lg">
        <x-brand.logo-message :message="__('By signing up, you agree to our terms & policy')" />

    <form wire:submit="register" class="flex flex-wrap gap-2">
        <!-- First Name -->
        <div>
            <x-input.label for="first_name" :value="__('First Name*')" />
            <x-input.text-input wire:model="first_name" id="first_name" name="first_name" class="block mt-1 w-full" type="text" required autofocus autocomplete="given_name" />
            <x-input.error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input.label for="last_name" :value="__('Last Name*')" />
            <x-input.text-input wire:model="last_name" id="last_name" name="last_name" class="block mt-1 w-full" type="text" required autofocus autocomplete="family_name" />
            <x-input.error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Mobile Number -->
        <div class="mt-4">
            <x-input.label for="phone" :value="__('Mobile Number*')" />
            <x-input.text-input wire:model="phone" id="phone" name="phone" class="block mt-1 w-full" type="text" autofocus autocomplete="mobile" />
            <x-input.error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input.label for="email" :value="__('Email*')" />
            <x-input.text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" autocomplete="email" />
            <x-input.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input.label for="password" :value="__('Password')" />

            <x-input.text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input.label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input.text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input.error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="w-full flex items-center justify-between mt-4 px-2">
            <a href="{{ route('login') }}" wire:navigate class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                {{ __('Already have an account?') }}
            </a>

            <x-button.primary>
                {{ __('Register') }}
            </x-button.primary>
        </div>
    </form>
    </div>
</x-container>
