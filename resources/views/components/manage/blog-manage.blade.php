<x-layout>
    <section class="my-10 text-center font-bold border-b">
        <h1 class="text-4xl pb-1">{{ $title ?? 'Blog' }}</h1>

    </section>

    @if($posts->isEmpty())
    <div class="flex flex-col items-center">
        <h1 class="text-2xl mb-5">You have no posts</h1>
        <x-large-link link="{{ url()->previous() }}">Go Backs</x-large-link>
    </div>
    @else
    @foreach ($posts as $post)
        <x-manage.post-card-manage :$post> </x-manage.post-card-manage>
    @endforeach
    @endif
</x-layout>
