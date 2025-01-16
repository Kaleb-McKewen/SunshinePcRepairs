<x-layout>
    <!--name,email,password-->
    <section class="my-10 text-center font-bold border-b">
        <h1 class="text-4xl pb-1">Login</h1>
    </section>

    <x-forms.form method="POST" action="login"> <!-- add enctype="multipart/form-data" for upload-->
        <x-forms.input label="Email" name=email />
        <x-forms.input label="Password" name="password" autocomplete="on" type="password" />

        <x-forms.button>Log In</x-forms.button>
    </x-forms.form>


</x-layout>
