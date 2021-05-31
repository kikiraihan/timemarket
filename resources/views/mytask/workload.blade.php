<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation',['warna'=>'bg-white','kata'=>'my task'])
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



    {{-- ================================================================= --}}

    @include('layouts.tabtask',[
        'user'=>$user,
        "pegawai"=>$pegawai,
        // "ag"=>$ag,
        "unit"=>$unit,
        "route_workload"=>"mytask.workload",
        "route_workload_id"=>null,
        "route_team"=>"mytask.myteam",
        "route_team_id"=>null,
    ])


    <livewire:mytask.myworkload :idpegawai="$pegawai->id"/>
    

</x-app-layout>
