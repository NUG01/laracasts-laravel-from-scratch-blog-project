<!doctype html>
<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
<style>
    html {
        scroll-behavior: smooth
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <nav class="md:flex md:justify-between md:items-center p-6">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>
                <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
            @else
                {{-- @guest --}}
                <a href="/register" class="text-s font-bold uppercase mr-5">Register</a>
                <a href="/login" class="text-s font-bold uppercase">Log In</a>
            @endauth
            <a href="#newsletter"
                class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    <div class="flex items-center w-full justify-center p-12">
        <div class="max-w-sm bg-gray-200 pt-6 pl-12 pb-6 pr-12 rounded-xl">
            <form method="POST" action="/admin/posts">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title

                    </label>
                    <input value="{{ old('title') }}" class="border border-gray-400 p-2 w-full" type="text"
                        name="title" id="title" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug

                    </label>
                    <input value="{{ old('slug') }}" class="border border-gray-400 p-2 w-full" type="text"
                        name="slug" id="slug" required>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Excerpt

                    </label>
                    <textarea value="{{ old('excerpt') }}" class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" required></textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Body

                    </label>
                    <textarea value="{{ old('body') }}" class="border border-gray-400 p-2 w-full" name="body" id="body" required></textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                        Category

                    </label>
                    <select id="category_id" name="category_id">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>



                <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Submit</button>

            </form>

        </div>
    </div>


    <footer id="newsletter"
        class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <input id="email" name="email" type="text" placeholder="Your email address"
                            class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none" />

                        @error('email')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
    <x-flash />
</body>
