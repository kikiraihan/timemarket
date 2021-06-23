<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigationback',['warna'=>'bg-white','kata'=>'Tentang Tim','link_balik'=>$link])
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


    {{-- ================================================================= --}}







    {{-- keterangan tim --}}
    @include('umum.atshow-keterangan-tim',['tim'=>$tim,'isKepalaTim'=>TRUE])

    <br>

    {{-- list anggota --}}
    {{-- @include('umum.atshow-list-anggota',['anggotatims'=>$tim->anggotatims,'isKepalaTim'=>TRUE]) --}}
    <livewire:umum.list-anggota :idTim="$tim->id" :isKepalaTim="TRUE" />

    <br>

    <hr>


    {{-- list pekerjaan anggota --}}
    <div 
        x-data="{ dropUpOpen: false }" 
        class="container mx-auto py-4">

        <livewire:katimboard.show-pekerjaan :idtim="$tim->id" />    

        {{-- <livewire:katimboard.drop-up-pekerjaan /> --}}
        <div :class="{ 'translate-y-full' : !dropUpOpen , }" class="fixed inset-x-0 bottom-0 z-10
        transform transition translate-y-full duration-200 ease-in-out
        min-w-screen bg-white pb-10 rounded-t-2xl shadow border border-gray-200 opacity-95
        flex flex-col space-y-2  justify-between"{{-- h-3/4 --}}
        >

        coba
        
        </div>

    </div>




    <br>
    <br>
    <br>
    <br>
</x-app-layout>
