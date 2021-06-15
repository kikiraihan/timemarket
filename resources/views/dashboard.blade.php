<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation',['warna'=>'bg-green-200'])
    </x-slot>

    <x-slot name="footer">
        @unlessrole('Admin')
        @include('layouts.navigationbawah')
        @endunlessrole
    </x-slot>

    
    <x-slot name="scripthalaman">
        
    </x-slot>

    <x-slot name="stylehalaman">
        
    </x-slot>


    <livewire:dashboard />

</x-app-layout>
