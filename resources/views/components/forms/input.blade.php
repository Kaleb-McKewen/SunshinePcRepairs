@props(['label', 'name', 'value'=>''])

@php
//defaults that can be changed
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/15 border border-white/50 px-5 py-4 w-full',
        'value' => $value
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>
