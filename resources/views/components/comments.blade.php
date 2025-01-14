@props(['comments'])

<section class="mt-5">
<h1 class="text-xl mb-3">Comments:</h1>
@foreach ($comments as $comment)
    <div class="pb-3 space-y-3 border-b">
        <p>{{ $comment->text }}</p>
        <p>From: {{$comment->user->name}}</p>
    </div>
@endforeach
</section>
