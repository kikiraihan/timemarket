<div>
    
    @if ($pegawai)
    
    <x-organism.dropup-admin>
        
        <x-slot name="pilihanButton">
            <div class="flex space-x-1 px-1">
                <button wire:click="tampilEdit('admin.pegawai-edit',{{$pegawai->id}})" class="flex-auto p-2 rounded bg-green-300 shadow-sm focus:outline-none focus:ring-1 ring-green-500">Edit</button>
                <button class="flex-auto p-2 rounded bg-green-300 shadow-sm focus:outline-none focus:ring-1 ring-green-500">Hapus</button>
                <button class="flex-auto p-2 rounded bg-green-300 shadow-sm focus:outline-none focus:ring-1 ring-green-500">Reset Password</button>
            </div>
        </x-slot>
        
        <div class="flex flex-col">
            <div class="text-right pr-3 pt-3">
                <span @click="dropUpOpen = false" class="w-fulltext-gray-300 rounded-2xl cursor-pointer">
                    <span class="material-icons-outlined">
                        close
                    </span>
                </span>
                
            </div>
            
            <h5 class="font-bold mb-3 ml-3 uppercase">Detail Pegawai</h5>
            
            <ul class="divide-y-2 divide-gray-100 border-b border-t border-green-100">
                <li class="p-2">
                    <span>nama: </span>
                    <span>{{$pegawai->nama}}</span>
                </li>
                <li class="p-2">
                    <span>NIP: </span>
                    <span>{{$pegawai->nip}}</span>
                </li>
                <li class="p-2">
                    <span>nomor WA: </span>
                    <span>{{$pegawai->nomorwa}}</span>
                </li>
                <li class="p-2">
                    <span>email: </span>
                    <span>{{$pegawai->user->email}}</span>
                </li>
                <li class="p-2">
                    <span>username: </span>
                    <span>{{$pegawai->user->username}}</span>
                </li>
            </ul>
            
        </div>
        
    </x-organism.dropup-admin>
    
    
    
    
    
    
    
    @endif
    {{-- ini adalah isi detial coba --}}
    
    
    
</div>