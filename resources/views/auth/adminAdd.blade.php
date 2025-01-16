@props(['users'])

<x-layout>
    <div class="mt-5 m-auto max-w-3xl">
        <h1 class="text-2xl mb-4">Add Admins</h1>

        <table class="text-md w-full text-left rtl:text-right border border-gray-300">
            <tr class="border border-gray-3 *:px-1">
                <th class="">User Name</th>
                <th >User ID</th>
                <th class="text-right">Promote user to admin role</th>
            </tr>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border border-gray-3 *:px-1">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->id }}</td>
                        <td><x-forms.form method="POST" action="/dashboard/admin/{{$user->id}}" class="px-0 space-y-1">
                            <div class="float-right">
                            <x-forms.button>Promote</x-forms.button>
                            </div>
                        </x-forms.form></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</x-layout>
