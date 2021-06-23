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

        <livewire:mytask.dropupworkload :isMy="TRUE"/>

    </div>




    <br>
    <br>
    <br>
    <br>
</x-app-layout>
