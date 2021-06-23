<div>
    
    @if ($unitToDropUp)
    
    <x-organism.dropup-admin>
        
        <x-slot name="pilihanButton">
            <div class="flex space-x-1 px-1">
                <button wire:click="tampilEdit({{$unitToDropUp->id}})" class="flex-auto p-2 rounded bg-yellow-300 shadow-sm focus:outline-none focus:ring-1 ring-yellow-500">Edit</button>
                <button wire:click="$emit('swalToDeleted','terkonfirmasiHapusUnit',{{$unitToDropUp->id}})" class="flex-auto p-2 rounded bg-red-500 shadow-sm focus:outline-none focus:ring-1 ring-red-500 text-white">Hapus</button>
            </div>
        </x-slot>
        
        <div class="flex flex-col">
            <div class="text-right pr-3 pt-3">
                <span @click="dropUpOpen = false" class="w-full text-gray-300 rounded-2xl cursor-pointer">
                    <span class="material-icons-outlined">
                        close
                    </span>
                </span>
                
            </div>
            
            <h5 class="font-bold mb-3 ml-3 uppercase">Detail Unit</h5>
            
            <ul class="divide-y-2 divide-gray-100 border-b border-t border-green-100">
                <li class="px-2 py-4">
                    {{-- <span>nama unit : </span> --}}
                    <label class="f-roboto text-gray-500 text-sm">Nama Unit</label>
                    <div>{{$unitToDropUp->nama}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Singkatan</label>
                    <div>{{$unitToDropUp->singkatan}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Deskripsi</label>
                    <div>{{$unitToDropUp->deskripsi}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Kepala Unit</label>
                    <div>{{$unitToDropUp->kepala->nama}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Kepala Tim</label>
                    <div>{{$unitToDropUp->koordinator->nama}}</div>
                </li>
            </ul>
            
        </div>
        
    </x-organism.dropup-admin>
    
    
    
    
    
    
    
    @endif
    {{-- ini adalah isi detial coba --}}
    
    
    
</div>