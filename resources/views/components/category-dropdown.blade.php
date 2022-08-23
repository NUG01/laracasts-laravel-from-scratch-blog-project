<x-dropdown>
    <x-slot name="trigger">
      <button class="py-2 pl-3 pr-9d text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">{{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
        <x-down-arrow class="absolute pointer-events-none" style="right: 12px;"></x-down-arrow>
      </button>
    </x-slot>
    
    <x-dropdown-item href="/">All</x-dropdown-item>
@foreach($categories as $category)
<x-dropdown-item href="/categories/{{ $category->slug }}" :active=true>{{ ucwords($category->name) }}</x-dropdown-item>
{{-- <a href="/categories/{{ $category->slug }}" class="block text-left px-3 text-sm leading-5 hover:bg-gray-300 focus:bg-gray-300 {{ isset($currentCategory)&&$currentCategory->is($category)?'bg-blue-500 text-white':'' }}">{{ ucwords($category->name) }}</a> --}}
@endforeach
  </x-dropdown>