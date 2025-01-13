@props(['label', 'name'])

<div>
    @if ($label)
        <!--Add label-->
        <x-forms.label :$name :$label />
    @endif

    <div class="mt-1">
        {{ $slot }}
        <!--Display error-->
        <x-forms.error :error="$errors->first($name)" />
    </div>
</div>
