<div>
    {{-- Stop trying to control. --}}





    {{-- DROPUP MENU --}}
    <div wire:ignore.self :class="{ 'translate-y-full' : !dropUpOpen , }" class="fixed inset-x-0 bottom-0 z-40
        transform transition translate-y-full duration-200 ease-in-out
        min-w-screen bg-white pb-10 rounded-t-2xl shadow border-t-2 border-gray-200 opacity-95
        flex flex-col space-y-2  justify-between"{{-- h-3/4 --}}
        >


        <div class="flex flex-col">
            <span @click="dropUpOpen = false" class="w-full text-center rounded-2xl cursor-pointer ">
                <span class="material-icons-outlined">
                    {{-- drag_handle --}}
                    expand_more
                    {{-- close --}}
                </span>
            </span>

            @isset($listTugas)
            <ul class="flex flex-col">
                @foreach ($listTugas as $item)
                    <x-tugas-list-atkalenderutama :data="$item" :pegawaiYangLogin="$pegawaiYangLogin"/>
                @endforeach
            </ul>
            @endisset


        </div>

        <br><br><br>
        <br><br>


    </div>


</div>
