@props(['label', 'name', 'value'=>''])

@php
//defaults that can be changed
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/15 border border-white/50 px-5 py-4 w-full',
        'rows'=>"15",
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}>{{$value}}</textarea>
</x-forms.field>
