<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation',['warna'=>'bg-white','kata'=>'my team'])
    </x-slot>

    <x-slot name="footer">
        @include('layouts.navigationbawah')
    </x-slot>

    <x-slot name="stylehalaman">
        {{-- @livewireStyles --}}
    </x-slot>

    <x-slot name="scripthalaman">
        {{-- @livewireScripts --}}
    </x-slot>



    {{-- ================================================================= --}}


    {{-- top --}}
    <div class="p-4 bg-white rounded-b shadow">
        <div class="pr-3 max-w-sm mx-auto flex items-center space-x-4">
            <div class="flex-shrink-0">
                <img class="h-14 w-h-14 bg-gray-200 rounded-full shadow-sm" src="{{$user->gravatar}}">
            </div>
            <div class="flex-1">
                <div class="font-bold text-black">{{$pegawai->nama}}</div>
                <p class="text-sm text-gray-500">{{$unit->nama}}</p>
            </div>
        </div>
    </div>


    @include('umum.isiteam-katimboard',[
        'proker'=>$proker,
        'pegawai'=>$pegawai
    ])






    <br>
    <br>
    <br>
    <br>





</x-app-layout>
