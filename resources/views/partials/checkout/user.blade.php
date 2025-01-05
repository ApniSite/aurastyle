<div class="bg-white border border-gray-200 rounded-xl">
    <div class="flex items-center justify-between h-16 px-6 border-b border-gray-100">
        <h3 class="text-lg font-medium">Customer Details</h3>
    </div>
    <div class="p-6 text-sm text-gray-600">
        @auth
            <h2 class="text-lg font-medium">Welcome {{ Auth::user()->name }},</h2>
        @endauth
        @guest
            <span class="mr-2 text-sm">Get 20% eXtra discount</span>
            <button wire:click="redirectToLogin" class="px-5 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-500">
                {{ __('Sign in to my account!') }}
            </button>
            <span class="ml-2 text-sm">Or</span>
            <label class="inline-flex items-center ml-2 py-2 rounded-lg cursor-pointer hover:bg-gray-50">
                <input class="w-5 h-5 text-green-600 border-gray-100 rounded"
                    type="checkbox" value="1" checked disabled />
                <span class="ml-2 text-xs font-medium">
                    Create my account automatically when the order is placed.
                </span>
            </label>
        @endguest
    </div>
</div>