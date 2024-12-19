<footer class="px-2 lg:px-4 border-b border-gray-900 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap mx-auto py-6 text-gray-600 dark:text-gray-300">
        <div class="w-full px-4 sm:w-1/2 lg:w-5/12">
        <x-brand.logo-dark class="h-16 mb-4 hover:text-indigo-600" />
        <p class="max-w-xs mb-4 text-gray-800 dark:text-gray-300">
            This is a classic e-commerce store built with <a href="https://zabrdast.com">Zabrdast</a>.
            We are currently making a tutorial series to show you how we did it!
        </p>
        <x-icon.social class="flex items-center" />
        </div>
        <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
            <h4 class="my-4 text-xl font-bold text-gray-800 dark:text-gray-300">Customer</h4>
            <ul class="space-y-3">
                <li><a href="{{ route('account') }}" class="hover:opacity-75">Order History</a></li>
                <li><a href="javascript:void(0)" class="hover:opacity-75">Track your parcel</a></li>
                <li><a href="{{ route('about') }}" class="hover:opacity-75">About Us</a></li>
                <li><a href="{{ route('contact') }}" class="hover:opacity-75">Contact Us</a></li>
            </ul>
        </div>
        <div class="w-full px-4 lg:w-4/12">
            <h4 class="my-4 text-xl font-bold text-gray-800 dark:text-gray-300">Download App</h4>
            <x-icon.appstore class="sm:flex md:block" />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 text-sm text-gray-500 dark:text-gray-300 border-t border-gray-300">
        <div class="text-center">
            &copy; {{ now()->year }} | <a href="{{ config('app.url') }}" class="font-bold hover:opacity-75">{{ config('app.name') }}</a> | All Rights Reserved
        </div>
        <div class="text-center">
            <a href="{{ route('privacy') }}" class="hover:opacity-75">Privacy Policy</a> | <a href="{{ route('terms') }}" class="hover:opacity-75">Terms and Conditions</a>
        </div>
    </div>
</footer>
