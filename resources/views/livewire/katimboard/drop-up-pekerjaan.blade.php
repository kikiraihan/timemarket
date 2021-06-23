<div>


    {{-- DROPUP MENU --}}
    <div wire:ignore.self :class="{ 'translate-y-full' : !dropUpOpen , }" class="fixed inset-x-0 bottom-0 z-10
        transform transition translate-y-full duration-200 ease-in-out
        min-w-screen bg-white pb-10 rounded-t-2xl shadow border border-gray-200 opacity-95
        flex flex-col  justify-between"{{-- h-3/4 --}}
        >

        <span @click="dropUpOpen = false" class="w-full text-center rounded-2xl cursor-pointer select-none ">
            <span class="material-icons-outlined">
                expand_more
            </span>
        </span>

        <br>

        @if ($idToDropup)

        <a href="{{ route('task.edit', ['id'=>$idToDropup]) }}" 
            @click="dropUpOpen = false"
            class="flex-initial  text-gray-500 flex  pl-3  space-x-3 py-5">
            <span class="material-icons-outlined" style="font-size: 18px">
                edit
            </span>
            <Span>Edit pekerjaan ini</Span>
        </a>

        
        <button type="button"
            @click="dropUpOpen = false"
            wire:click="$emit('swalToDeleted','terkonfirmasiHapusPekerjaan',{{$idToDropup}})"
            class="flex-initial  text-gray-500 flex  pl-3  space-x-3 py-5">
            <span class="material-icons-outlined" style="font-size: 18px">
                delete
            </span>
            <Span>Hapus pekerjaan ini</Span>
        </button>

        
        @else


        <div class="text-center">
            wait..
        </div>

        @endif


    </div>




</div>
