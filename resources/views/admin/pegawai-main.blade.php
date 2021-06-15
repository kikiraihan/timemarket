<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation',['warna'=>'bg-white'])
    </x-slot>

    <x-slot name="footer">
        {{-- @include('layouts.navigationbawah') --}}
    </x-slot>


    
    <x-slot name="stylehalaman">
        @livewireStyles
    </x-slot>

    <x-slot name="scripthalaman">
        @livewireScripts
        @include('layouts.scriptsweetalert')
    </x-slot>


    
    


    <div  x-data="{ dropUpOpen: false }" class="container mx-auto my-2 mb-14">

        <livewire:admin.pegawai-crud-main />
        
    </div>




</x-app-layout>
