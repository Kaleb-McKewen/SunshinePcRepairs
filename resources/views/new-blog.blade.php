<x-layout>
    <!--name,email,password-->
    <section class="my-10 text-center font-bold border-b">
        <h1 class="text-4xl pb-1">New Post</h1>
    </section>
    
    <x-forms.form method="POST" action="/blog/new"> <!-- add enctype="multipart/form-data" for upload-->
        <x-forms.input label="Title" name=title value="{{old('title')}}" />
        <x-forms.textarea label="Post" name=text value="{{old('post')}}" />

        
    
        <x-forms.button>Submit</x-forms.button>
    </x-forms.form>
    
    
    </x-layout>