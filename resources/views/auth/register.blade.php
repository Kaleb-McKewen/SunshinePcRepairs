<x-layout>
<!--name,email,password-->
<section class="my-10 text-center font-bold border-b">
    <h1 class="text-4xl pb-1">Register</h1>
</section>

<x-forms.form method="POST" action="register"> <!-- add enctype="multipart/form-data" for upload-->
    <x-forms.input label="Name" name=name />
    <x-forms.input label="Email" name=email />
    <x-forms.input label="Password" name="password" type="password" />
    <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />

    <x-forms.button>Create Account</x-forms.button>
    <!--Add pfp-->
</x-forms.form>


</x-layout>