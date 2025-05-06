<x-base-layout>
    <x-slot name="title">Benutzer bearbeiten: {{ $user->name }}</x-slot>
    @include('pages.admin.users.form')
</x-base-layout>
