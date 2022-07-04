<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation_back',['warna'=>'bg-white','kata'=>'Edit Tugas'])
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


    <livewire:crudtask.forminput :idToUpdate="$idToUpdate"/>




    <br><br><br>
    <br><br>

    

</x-app-layout>
