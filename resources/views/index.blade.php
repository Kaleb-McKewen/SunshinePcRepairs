<x-layout>
<x-header />

@php
    $textArray=["Come stop by our local computer shop!","We are a dedicated team of experienced PC repairers who are qualified to work on a range of devices.","Simply bring in your device and we will do our best to fix it.","Computers can be a pain, let us take away the pain"];
    $textArray2=["We have supported 1000's of customers!","Many 5 star reviews!","If we can't do it no one can, trust us.","Don't hesitate to contact us today, we get very busy before the school term so reach out now!"];
@endphp

<x-text-img imgSide='left' imgName="gallery1.jpg" :txtArray="$textArray"/>
<x-text-img imgSide='right' imgName="gallery2.jpg" :txtArray="$textArray2"/>

</x-layout>