@props(['link'])
<div class="md:w-1/4 p-5">
    <a href="{{$link}}" class="flex justify-center items-center bg-blue-500 md:h-16 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">{{ $slot }}</a>
</div>