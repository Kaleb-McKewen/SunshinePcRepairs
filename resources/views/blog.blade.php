<x-layout>
    <section class="my-10 text-center font-bold border-b">
        <h1 class="text-4xl">Blog</h1>

    </section>
    @foreach ($posts as $post)
        <x-post-card :$post />
    @endforeach
    
</x-layout>
