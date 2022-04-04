@extends("layouts.app")

@section("section")
<div class="mx-auto max-w-xl bg-white p-4">
    <h2 class="mb-6 text-xl border-b-2 border-blue-500">Login</h2>

    <form class="w-full" method="post" action="/login">

        @csrf

        <div class="w-full mb-2">
            <label class="w-full block text-gray-800" for="email">Email</label>
            <input name="email" placeholder="Email..." class="w-full border border-gray-200 block focus:outline-none focus:border-blue-500 px-4 py-2" id="email" type="email" />
        </div>

        <div class="w-full mb-2">
            <label class="w-full block text-gray-800" for="password">Password</label>
            <input name="password" placeholder="Password..." class="w-full border border-gray-200 block focus:outline-none focus:border-blue-500 px-4 py-2" id="password" type="password" />
        </div>

        <div class="w-full">
            <button class="bg-blue-500 px-2 py-3 w-full text-white font-bold" type="submit">Login</button>
        </div>
    </form>
</div>
@endsection
