<x-layout>
    <div class="text-center">
        <h1 class="text-2xl">Edit admin account</h1>
        <x-forms.form class="flex flex-col items-center space-y-10" action="/dashboard/profile" method="POST" enctype="multipart/form-data">
            <x-forms.input type="file" name="image" label="Image" />
            <x-forms.input type="string" name="role" label="Role" value="{{ auth()->user()->role }}" />
            <x-forms.button>Submit</x-forms.button>
        </x-forms.form>
    </div>
</x-layout>
