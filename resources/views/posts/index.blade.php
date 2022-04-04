@extends("layouts.app")

@section("section")
    <div class="mx-auto max-w-7xl">

        <div class="flex justify-between items-center mb-4">
            <h2 class=" mb-3 text-lg flex-1 max-w-6xl border-b-4 border-blue-500">Latest Posts</h2>
            @auth
                <a href="/posts/create" class="bg-blue-500 text-white px-4 py-2 font-semibold">Add a post +</a>
            @endauth
        </div>

        @foreach($posts as $post)
            <article class="bg-white p-4 mb-4">
                <h3 class="text-md mt-2">{{ $post->title  }}</h3>
                <p class="text-sm text-gray-600 mt-1"><span
                        class="bg-orange-500 text-white rounded text-sm px-2">{{ $post->user->name  }}</span> {{ $post->created_at->diffForHumans()  }}
                </p>
                <p class="text-sm text-gray-700">{{ $post->body }}</p>
                <div class="mt-2">
                    @if($post->user_id == auth()->id())
                        <a class="text-blue-500" href="/posts/edit/{{$post->id}}">edit</a> |
                        <a class="text-blue-500" href="/posts/delete/{{$post->id}}">delete</a>
                    @endif
                </div>
            </article>
        @endforeach

    </div>
@endsection
