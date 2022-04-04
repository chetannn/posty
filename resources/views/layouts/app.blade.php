<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 antialiased flex flex-col min-h-screen h-full">

<nav class="shadow-md py-4 bg-white">

    <div class="mx-auto max-w-7xl">
        <div class="flex items-center justify-between">
            <a class="text-xl font-bold">Posty</a>

            <div class="flex items-center gap-4">

                @auth
                    <a href="/posts">Posts</a>
                    <a href="#">{{ auth()->user()->name }}</a>

                    <form method="post" action="/logout">
                        @csrf
                        <button class="bg-blue-500 text-white px-4 py-2" type="submit">Logout</button>
                    </form>

                @elseauth
                    <a href="/login">Login</a>
                    <a href="/register" class="bg-blue-500 text-white px-4 py-2">Get Started</a>
                @endauth


            </div>
        </div>

    </div>
</nav>

<main class="mt-[4rem] flex-1">
   @yield("section")
</main>
</body>
</html>
