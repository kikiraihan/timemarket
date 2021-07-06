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

            @isset($listTugas)
            <ul class="flex flex-col">
                @foreach ($listTugas as $item)
                    <x-tugas-list-atkalenderutama :data="$item" :pegawaiYangLogin="$pegawaiYangLogin"/>
                @endforeach
            </ul>
            @endisset

            
            <div class="font-bold text-gray-500 capitalize f-robotomon text-sm px-4 mt-10">
                Rutinitas 
                <span class="bg-gray-100 text-center rounded-sm font-bold text-gray-400 px-1" style="font-size: 11px;">
                    3 bobot
                    {{-- <sub>/12</sub> --}}
                    
                </span>
            </div>
            {{-- <ul class="flex flex-col">
                <li class="bg-white border-t border-b pl-4 flex space-x-3">1. Misalkan</li>
            </ul> --}}


        </div>

        <br><br><br>
        <br><br>


    </div>


</div>
