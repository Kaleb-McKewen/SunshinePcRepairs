@props(['post'])

<div class=" py-3 flex m-auto max-w-3xl">

    <article class="border-b basis-full">
        <div class="gap-x-4 text-xs">
            <time class="">{{ $post->created_at }}</time>
        </div>

        <div class="flex justify-between mt-3 items-center">
            <h3 class="text-lg/6 font-semibold group-hover:text-gray-600">
                <a href="/blog/{{ strtolower($post->id) }}">
                    {{ $post->title }}
                </a>
            </h3>
            <div class="flex py-2">
                <form method="POST" action="/blog/delete/{{ $post->id }}">
                    @csrf
                    @method('DELETE')
                    <a href="#"
                        class="bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                    <button type="submit"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                </form>
            </div>

        </div>

    </article>

    <!-- More posts... -->

</div>
