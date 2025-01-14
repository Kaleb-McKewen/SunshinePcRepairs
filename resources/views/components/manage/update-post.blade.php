@props(['post'])

<x-layout>
    <!--name,email,password-->
    <section class="my-10 text-center font-bold border-b">
        <h1 class="text-4xl pb-1">Update Post</h1>
    </section>

    <x-forms.form method="POST" action="/blog/edit/{{$post->id}}"> <!-- add enctype="multipart/form-data" for upload-->
        <x-forms.input label="Title" name=title value="{{(old('title')) ? old('title') : $post->title}}" />
        <x-forms.textarea label="Post" name=text value="{{(old('post')) ? old('post') : $post->text}}" />
    
            <x-forms.tags />

        <x-forms.button>Update</x-forms.button>
    </x-forms.form>
    
    
    </x-layout>