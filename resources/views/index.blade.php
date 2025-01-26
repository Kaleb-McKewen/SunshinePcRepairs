<x-layout>
<x-header />

@php
    $textArray=["Come stop by our local computer shop!","We are a dedicated team of experienced PC repairers who are qualified to work on a range of devices.","Simply bring in your device and we will do our best to fix it.","Computers can be a pain, let us take away the pain"];
    $textArray2=["We have supported 1000's of customers!","Many 5 star reviews!","If we can't do it no one can, trust us.","Don't hesitate to contact us today, we get very busy before the school term so reach out now!"];
@endphp

<x-text-img imgSide='left' imgName="gallery1.jpg" :txtArray="$textArray"/>
<x-text-img imgSide='right' imgName="gallery2.jpg" :txtArray="$textArray2"/>

<section class="py-10">
    <h1 class="text-2xl text-center font-bold">Read Our Blog</h1>
    <p class="text-center m-5"><a href="{{ route('blog') }}" class="text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Click Here</a></p>
    <h1 class="text-2xl text-center">Full of repairs and tips</h1>
</section>

<section class="py-10">
    <h1 class="text-2xl font-bold text-center">Our Location</h1>
    <x-googlemaps />
</section>

<section class="py-10">
    <h1 class="text-2xl text-center font-bold">Add footer certifications</h1>
</section>

</x-layout>