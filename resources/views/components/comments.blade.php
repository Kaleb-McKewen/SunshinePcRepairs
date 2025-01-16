@props(['comments','post'])

<section class="mt-5 flex flex-col m-auto max-w-3xl">
<h1 class="text-xl mb-3">Comments:</h1>
<a href="{{route('newComment', ['post' => $post->id])}}" class="bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add your own</a>
@foreach ($comments as $comment)
    <div class="pb-3 space-y-3 border-b">
        <p>Comment from: {{$comment->user->name}}</p>
        <p>{{ $comment->text }}</p>
        
        @if(auth()->user() && auth()->user()->id === $comment->user->id)
        <form method="POST" action="{{ route('deleteComment', [$comment]) }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="float-right focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
        </form>
    @endif
    </div>
    
@endforeach
</section>
