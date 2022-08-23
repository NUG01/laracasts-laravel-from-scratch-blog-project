<nav class="md:flex md:justify-between md:items-center p-8">
  <div>
      <a href="/">
          <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
      </a>
  </div>

  <div class="mt-8 md:mt-0">
      <a href="/" class="text-xs font-bold uppercase">Home Page</a>

      <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
          Subscribe for Updates
      </a>
  </div>
</nav>
<x-layout>

  <section class="px-6 py-8">
<main class="max-w-lg mx-auto mt-10 bg-gray-200 border-gary-300 p-6 rounded-xl">
  <h1 class="text-center font-bold text-xl">Register</h1>
<form method="POST" action="/register" class="mt-10">
@csrf
  <div class="mb-6">
<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
for="name">
Name</label>
<input class="border border-gray-400 p-2 w-full"
type="text" name="name" id="name" required></div>
<div class="mb-6">
<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
for="username">
Username</label>
<input class="border border-gray-400 p-2 w-full"
type="text" name="username" id="username" required></div>
<div class="mb-6">
<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
for="email">
Email</label>
<input class="border border-gray-400 p-2 w-full"
type="email" name="email" id="email" required></div>
<div class="mb-6">
<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
for="password">
Password</label>
<input class="border border-gray-400 p-2 w-full"
type="password" name="password" id="password" required></div>
<div class="mb-6">
<button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</div>
</form>
</main>


  </section>

</x-layout>