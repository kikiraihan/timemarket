<div>
    {{-- Stop trying to control. --}}





    {{-- DROPUP MENU --}}
    <div wire:ignore.self :class="{ 'translate-y-full' : !dropUpOpen , }" class="fixed inset-x-0 bottom-0 z-40
        transform transition translate-y-full duration-200 ease-in-out
        min-w-screen bg-white pb-10 rounded-t-2xl shadow border-t-2 border-gray-200 opacity-95
        flex flex-col space-y-2  justify-between"{{-- h-3/4 --}}
        >


        <div class="flex flex-col">
            <x-tutup-slide-dropup @click="dropUpOpen = false" />

            {{-- {{$tanggal}} --}}
            
            @isset($listTugas)
            <div class="select-none font-bold text-gray-500 capitalize f-robotomon text-sm px-4">
                Pekerjaan khusus
            </div>
            <ul class="flex flex-col">
                @foreach ($listTugas as $item)
                    <x-tugas-list-atkalenderutama :data="$item" :pegawaiYangLogin="$pegawaiYangLogin"/>
                    @if($loop->last)
                        <br>
                    @endif
                @endforeach
            </ul>
            @else
            <hr>
            @endisset

            
            
            @if($tampilRutin)
            <div class="select-none font-bold text-gray-500 capitalize f-robotomon text-sm px-4 pt-2">
                Pekerjaan Rutin 
                <span class="bg-gray-100 text-center rounded-sm font-bold text-gray-400 px-1" style="font-size: 11px;">
                    4 <sub>bobot</sub>
                </span>
            </div>
            <div class="text-sm pl-4">
                Pekerjaan rutin sesuai dengan tupoksi pegawai di masing-masing unit/fungsi.
            </div>

            {{-- <ul class="flex flex-col text-sm">
                <li class="bg-white border-t border-b pl-4 flex space-x-3">1. Misalkan</li>
                <li class="bg-white border-t border-b pl-4 flex space-x-3">2. Misalkan</li>
            </ul> --}}
            @endisset


        </div>

        <br><br><br>
        <br><br>


    </div>


</div>
