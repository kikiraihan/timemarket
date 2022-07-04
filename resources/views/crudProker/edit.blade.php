<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation_back',['warna'=>'bg-white','kata'=>'Edit Proker'])
    </x-slot>

    <x-slot name="footer">
        {{-- @include('layouts.navigationbawah') --}}
    </x-slot>

    <x-slot name="stylehalaman">
        @livewireStyles
        <style>
            .horscroll::-webkit-scrollbar{
                width: 0;
            }
        </style>
    </x-slot>

    <x-slot name="scripthalaman">
        @livewireScripts
        @include('layouts.scriptsweetalert')
    </x-slot>


    <livewire:crudproker.forminput :idToUpdate="$idToUpdate"/>



</x-app-layout>
