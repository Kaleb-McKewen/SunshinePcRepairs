<x-layout>
    <section class="mt-10 text-center font-bold border-b">
        <h1 class="text-4xl pb-1">Contact Us</h1>
    </section>
    <article>
        <img class="opacity-20 absolute h-full xl:h-auto object-cover"
            src={{ Vite::asset('resources/images/gallery3.jpg') }} alt="background image" />

        <div class="flex flex-col lg:flex-row justify-between">
            <div class="bg-blue-600 lg:w-1/2 rounded-lg text-center m-5 lg:m-20">
                <h2 class="text-3xl">Phone</h2>
                <p class="">Contact info</p>
                <h2 class="text-3xl">Email</h2>
                <p>Contact info</p>
            </div>
            <div class="bg-blue-600 lg:w-1/2 rounded-lg text-center m-5 lg:m-20">
                <h2 class="text-3xl">Open times</h2>
                <p>Contact info</p>
                
            </div>


        </div>
        <div class="bg-blue-600 rounded-lg text-center m-5 lg:m-20 flex flex-col lg:flex-row justify-between">
            <div class="lg:w-2/3 xl:w-1/2 rounded-lg text-center m-5">
                <x-googlemaps />
            </div>
            <div class="lg:w-1/3 xl:w-1/2 rounded-lg text-center m-5">
                <h2 class="text-3xl">Our Address</h2>
                <p>Contact info</p>
            </div>


        </div>
    </article>
</x-layout>
