<div>
    
    @if ($timToDropUp)
    
    <x-organism.dropup-admin>
        
        <x-slot name="pilihanButton">
            <div class="flex space-x-1 px-1">
                <button @click="dropUpOpen = false" class="flex-auto p-2 rounded bg-gray-300 shadow-sm focus:outline-none focus:ring-1 ring-gray-500">Kembali</button>
                <button wire:click="$emit('swalToDeleted','terkonfirmasiHapusProker',{{$timToDropUp->id}})" class="flex-auto p-2 rounded bg-red-500 shadow-sm focus:outline-none focus:ring-1 ring-red-500 text-white">Hapus</button>
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
            
            <h5 class="font-bold mb-3 ml-3 uppercase">Detail Proker</h5>
            
            <ul class="divide-y-2 divide-gray-100 border-b border-t border-green-100">
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Judul</label>
                    <div>{{$timToDropUp->judul_project}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Nama Tim</label>
                    <div>{{$timToDropUp->nama}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Deskripsi</label>
                    <div>{{$timToDropUp->deskripsi}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Target Pelaksanaan</label>
                    <div>{{$timToDropUp->target_pelaksanaan}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Jangka</label>
                    <div>{{$timToDropUp->jangka}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">IKU</label>
                    <div>{{$timToDropUp->iku}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Status</label>
                    <div>{{$timToDropUp->status}}</div>
                </li>
                <li class="px-2 py-4">
                    <label class="f-roboto text-gray-500 text-sm">Kepala Proker</label>
                    <div>{{$timToDropUp->kepala->nama}}</div>
                </li>
            </ul>
            
        </div>
        
    </x-organism.dropup-admin>
    
    
    
    
    
    
    
    @endif
    {{-- ini adalah isi detial coba --}}
    
    
    
</div>