@props(['post'])

<div class=" my-3 flex flex-col m-auto max-w-3xl">
    
        <article class="border-b flex basis-full flex-col items-start justify-between">
          <div class="flex items-center gap-x-4 text-xs">
            <time class="">{{$post->created_at}}</time>
            @foreach ($post->tags as $tag)
              <x-tag :name="$tag->name" />
            @endforeach
            
          </div>
          <div class="group relative">
            <h3 class="mt-3 text-lg/6 font-semibold group-hover:text-gray-600">
              <a href="/blog/{{ strtolower($post->id) }}">
                <span class="absolute inset-0"></span>
                {{ $post->title }}
              </a>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm/6">{{ $post->text }}</p>
          </div>
          <div class="relative mt-8 flex items-center gap-x-4">
            <img src="/images/{{ $post->user->image }}" alt="profile picture" class="size-14 rounded-full bg-gray-50">
            <div class="text-sm/6">
              <p class="font-semibold">
                <a href="/blog/user/{{ $post->user->id }}">
                  <span class="absolute inset-0"></span>
                  {{ $post->user->name }}
                </a>
              </p>
              <p>{{ $post->user->role }}</p>
            </div>
          </div>
        </article>
        
          
        
        
  

  </div>