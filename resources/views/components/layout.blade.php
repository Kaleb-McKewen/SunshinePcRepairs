<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunshine PC Repairs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <!--Navigation Bar-->
    <div>
        <header class="bg-white">
            <nav class="mx-auto flex items-center justify-between max-md:justify-center p-3 lg:px-8" aria-label="Global">
                <div class="flex max-md:hidden">
                    <a href="{{ route('index') }}" class="-m-1.5 p-1.5">
                        <img class="h-6 max-md:hidden md:h-16 w-auto"
                            src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Sunshine PC Repairs Logo">
                    </a>
                </div>
                <div class="flex gap-x-2 sm:gap-x-6 md:gap-x-8 text-lg/6 font-semibold text-black">
                    <a href="#">Services</a>
                    <a href="{{ route('contact') }}">Contact</a>
                    <a href="#">About Us</a>
                    <a href="#">Portfolio</a>
                    <a href="{{ route('blog') }}">Blog</a>



                    @auth
                        <!--If user is admin-->
                        @if (auth()->user()->isAdmin())
                          <a href="/dashboard">Dashboard</a>
                            <!--<a href="/blog/new">New Post</a>-->
                        @endif
                        <form method="POST" action="/logout">
                            @csrf
                            @method('DELETE')

                            <button>Log Out</button>
                        </form>
                    @endauth
                    @guest
                        <a href="/register">Sign up</a>
                        <a href="/login">Log in <span aria-hidden="true">&rarr;</span></a>
                    @endguest


                </div>
            </nav>
        </header>
    </div>
    @if (session('message'))
    <div class="flex justify-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <span class="font-medium">Success:</span> {{ session('message') }}
    </div>
  @endif

  @if (session('bad_message'))
    <div class="flex justify-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
      <span class="font-medium">Error:</span> {{ session('bad_message') }}
    </div>
  @endif

    {{ $slot }}

</body>

</html>
