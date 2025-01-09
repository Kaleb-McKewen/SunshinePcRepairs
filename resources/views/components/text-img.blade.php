@props([
    'imgSide'=>'left',
    'imgName',
    'txtArray',
    ])


@if ($imgSide == 'left')
<div class="flex flex-col lg:flex-row">
    <div class="lg:w-1/2">
        <img src="{{ Vite::asset('resources/images/'.$imgName) }}" alt="Sunshine PC Repairs Logo">
    </div>
    <div class="lg:w-1/2 p-5 m-auto">
        <ul class="list-disc pl-10 space-y-4 xl:space-y-12 2xl:space-y-20 text-2xl">
            @foreach ($txtArray as $txt)
                <li>{{$txt}}</li>
            @endforeach
        </ul>
    </div>
</div>
@else
<div class="flex flex-col-reverse lg:flex-row">
    <div class="lg:w-1/2 p-5 m-auto">
        <ul class="list-disc pl-10 space-y-4 xl:space-y-12 2xl:space-y-20 text-2xl">
            @foreach ($txtArray as $txt)
                <li>{{$txt}}</li>
            @endforeach
        </ul>
    </div>
    <div class="lg:w-1/2">
        <img src="{{ Vite::asset('resources/images/'.$imgName) }}" alt="Sunshine PC Repairs Logo">
    </div>
    
</div>

@endif