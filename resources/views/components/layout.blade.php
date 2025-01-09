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
                <a href="#" class="-m-1.5 p-1.5">
                  <img class="h-6 max-md:hidden md:h-16 w-auto" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Sunshine PC Repairs Logo">
                </a>
              </div>
              <div class="flex gap-x-2 sm:gap-x-6 md:gap-x-8 text-lg/6 font-semibold text-black">
                <a href="#">Services</a>
                <a href="#">Contact</a>
                <a href="#">About Us</a>
                <a href="#">Portfolio</a>
                <a href="#">Blog</a>
                <!--Add Auth for login condition (signup/login)-->
                <a href="#">Sign up</a>
                <a href="#">Log in <span aria-hidden="true">&rarr;</span></a>
                
              </div>
            </nav>
          </header>  
    </div>

    {{ $slot }}
    
</body>
</html>