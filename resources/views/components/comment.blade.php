@props(['post'])

<x-layout>
    <section class="mt-5 m-auto max-w-3xl text-center">
        <h1 class="text-xl mb-3">New Comment</h1>
        <x-forms.form method="POST" action="{{ route('newCommentSubmit', $post) }}">
            <x-forms.textarea label="Comment:" name=text />
            <x-forms.button>Submit</x-forms.button>
        </x-forms.form>
        
    </section>

</x-layout>
