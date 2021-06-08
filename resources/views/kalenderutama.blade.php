<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation',['warna'=>'bg-white'])
    </x-slot>

    <x-slot name="footer">
        @include('layouts.navigationbawah')
    </x-slot>

    <x-slot name="stylehalaman">
        @livewireStyles
    </x-slot>

    <x-slot name="scripthalaman">
        @livewireScripts
    </x-slot>



    

    
<div x-data="{ dropUpOpen: false }">
    
    <livewire:kalenderutama/>

    <livewire:dropupkalender :isEditAble="true" :pegawaiYangLogin="$pegawaiYangLogin"/>
    
</div>


    
    
    <br><br><br><br>

</x-app-layout>
