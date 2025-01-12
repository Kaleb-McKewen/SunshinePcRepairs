<x-layout>
    <section class="my-10 text-center font-bold border-b">
        <h1 class="text-4xl pb-1">{{ $title ?? 'Blog' }}</h1>

    </section>
    @foreach ($posts as $post)
        <x-manage.post-card-manage :$post> </x-manage.post-card-manage>
    @endforeach
    
</x-layout>
