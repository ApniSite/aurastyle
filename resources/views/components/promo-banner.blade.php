<section  {{ $attributes }}>
  <div class="max-w-screen-xl mx-auto grid grid-cols-2 sm:grid-cols-9 gap-2 md:gap-2.5 mx-auto text-white">
    <!-- Row 1: Boxes -->
    <a href="{{ route('collection.view', ['slug' => 'ladies']) }}" class="group overflow-hidden col-span-2 sm:col-span-5 text-center">
    <span>
        <img alt="Women dress sale" src="{{ asset('images/banner-women-sale-2025.webp') }}" alt="" class="transition-transform duration-300 group-hover:scale-105">
    </span>
    </a>
    <a href="{{ route('register') }}" class="group overflow-hidden col-span-1 sm:col-span-2 text-center flex bg-teal-500 bg-opacity-60">
    <div>
        <img alt="Register for 50% discount" src="{{ asset('images/banner-discount-2025.webp') }}" class="min-h-full transition-transform duration-300 group-hover:scale-105">
    </div>
    </a>
    <a href="{{ route('collection.view', ['slug' => 'men']) }}" class="group overflow-hidden col-span-1 sm:col-span-2 text-center">
    <span>
        <img alt="Men's Collection" src="{{ asset('images/banner-men-2025.webp') }}" class="min-h-full transition-transform duration-300 group-hover:scale-105" >
    </span>
    </a>
    <!-- Row 2: Boxes -->
    <a href="{{ route('collection.view', ['slug' => 'kids']) }}" class="group overflow-hidden col-span-1 sm:col-span-2 text-center">
    <span class="relative">
        <img alt="New Kids Collection" src="{{ asset('images/banner-kids-collection.webp') }}" class="min-h-full transition-transform duration-300 group-hover:scale-105">
    </span>
    </a>
    <a href="{{ route('register') }}" class="group overflow-hidden col-span-1 sm:col-span-2 text-center">
    <span>
        <video class="min-h-full object-cover" autoplay loop muted><source src="{{ asset('images/banner-new-discount-50.mp4') }}" type="video/mp4" />New Discount 50%</video>
    </span>
    </a>
    <a href="{{ route('register') }}" class="flex group overflow-hidden col-span-2 sm:col-span-5 text-center">
    <div class="m-auto py-2">
    <h1 class="text-black text-3xl font-extrabold sm:text-5xl">
        Welcome to
        <span class="text-gray-500">{{ strtolower(config('app.name')) }}</span>
        Store
        <span role="img" aria-hidden="true">👋</span>
    </h1>
        <!-- <img alt="New Backpack" src="{{ asset('images/banner-backpack.webp') }}"> -->
    </div>
    </a>
  </div>
</section>