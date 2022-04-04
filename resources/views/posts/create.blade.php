
@extends("layouts.app")

@section("section")

    @if ($errors->any())
<div class="mx-auto max-w-3xl bg-white p-4 mb-4">
    @foreach($errors->all() as $error)
    <ul>
        <li class="font-semibold text-red-500 text-sm mb-2">{{ $error  }}</li>
    </ul>
    @endforeach
</div>
@endif

<div class="mx-auto max-w-3xl bg-white p-4">
    <h2 class="border-b-4 border-blue-500 mb-3 text-lg">Create a Post</h2>

    <form class="w-full" method="post" action="/posts">

        @csrf

        <div class="w-full mb-2">
            <label class="w-full block text-gray-800" for="title">Title</label>
            <input name="title" placeholder="Title..." class="w-full border border-gray-200 block focus:outline-none focus:border-blue-500 px-4 py-2" id="title" type="text" />
            @error('title')
            <strong class="font-semibold text-red-500 text-sm">Please fill the required field</strong>
            @enderror
        </div>

        <div class="w-full mb-2">
            <label class="w-full block text-gray-800" for="body">Body</label>

            <textarea name="body" placeholder="Body..." rows="4" cols="4" id="body" class="w-full border border-gray-200 block focus:outline-none focus:border-red-500 px-4"></textarea>

            @error('body')
            <strong class="font-semibold text-red-500 text-sm">Please fill the required field</strong>
            @enderror

        </div>

        <div>
            <button class="bg-blue-500 px-4 py-3 text-white font-bold" type="submit">Create</button>
        </div>
    </form>

</div>
@endsection
