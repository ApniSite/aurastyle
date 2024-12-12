@props(['brand'])

<a href="{{ route('brand.view', $brand->defaultUrl->slug) }}" class="group flex justify-center text-center relative overflow-hidden rounded-md">
    <img src="{{ $brand->media()->where('custom_properties->primary', false)->first()?->getUrl() }}" alt="{{ $brand->name }}" 
        class="object-cover transition-transform duration-300 group-hover:-rotate-6 group-hover:scale-105">
    <div class="absolute top left bg-gray-900 w-full h-full opacity-25"></div>
    <div class="absolute top left h-full w-full flex items-center justify-center p-8">
        <img src="{{ $brand->thumbnail?->getUrl() }}" alt="{{ $brand->name }}" class="flex-shrink-0">
    </div>
</a>