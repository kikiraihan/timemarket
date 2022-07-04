<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigationback',['warna'=>'bg-white','kata'=>'Buat Tugas Baru [Pegawai]','link_balik'=>$link_balik])
    </x-slot>

    <x-slot name="footer">
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



    @isset($id_proker)
        <livewire:crudtask.forminput-pegawai :idproker="$id_proker"/>
    @else
        <livewire:crudtask.forminput-pegawai />
    @endisset






    <br><br><br>
    <br><br>

    

</x-app-layout>
