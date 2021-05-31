<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigationback',['warna'=>'bg-white','kata'=>'Task'])
    </x-slot>

    <x-slot name="footer">
        {{-- @include('layouts.navigationbawah') --}}
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
        "route_workload"=>"theytask.workload",
        "route_workload_id"=>$pegawai->id,
        "route_team"=>"theytask.theyteam",
        "route_team_id"=>$pegawai->id,
    ])


    <livewire:mytask.myworkload :idpegawai="$pegawai->id"/>
    

</x-app-layout>
