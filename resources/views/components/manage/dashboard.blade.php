<x-layout>
    <section class="my-10 text-center font-bold border-b">
        <h1 class="text-4xl">Dashboard</h1>
    </section>

    <div class="flex flex-col md:flex-row justify-center">
        <x-large-link link="/dashboard/admin">Manage Admins</x-large-link>
        <x-large-link link="/blog/new">New Post</x-large-link>
    </div>
    
    <div class="flex flex-col md:flex-row justify-center">
        <x-large-link link="/blog/manage">Manage Your Posts</x-large-link>
        <x-large-link link="#">Future Features</x-large-link>
    </div>
</x-layout>