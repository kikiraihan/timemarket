<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation_back',['warna'=>'bg-white','kata'=>'Buat Tugas Baru','link_balik'=>$link_balik])
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



    @isset($id_proker)
        <livewire:crudtask.forminput :idproker="$id_proker"/>
    @else
        <livewire:crudtask.forminput />
    @endisset






    <br><br><br>
    <br><br>

    

</x-app-layout>
