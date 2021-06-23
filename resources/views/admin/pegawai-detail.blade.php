<div>
    
    @if ($pegawaiToDropUp)
    
    <x-organism.dropup-admin>
        
        <x-slot name="pilihanButton">
            <div class="flex space-x-1 px-1">
                <button wire:click="tampilEdit('admin.pegawai-edit',{{$pegawaiToDropUp->id}})" class="flex-auto p-2 rounded bg-yellow-300 shadow-sm focus:outline-none focus:ring-1 ring-yellow-500">Edit</button>
                <button wire:click="$emit('swalToDeleted','terkonfirmasiHapusPegawai',{{$pegawaiToDropUp->id}})" class="flex-auto p-2 rounded bg-red-500 shadow-sm focus:outline-none focus:ring-1 ring-red-500 text-white">Hapus</button>
                <button  wire:click="$emit('swalAndaYakin','terkonfirmasiResetPasswordPegawai',{{$pegawaiToDropUp->id}}, 'Anda akan me-reset password user ini menjadi `password`')" class="flex-auto p-2 rounded bg-green-300 shadow-sm focus:outline-none focus:ring-1 ring-green-500">Reset Password</button>
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
            
            <h5 class="font-bold mb-3 ml-3 uppercase">Detail Pegawai</h5>
            
            <ul class="divide-y-2 divide-gray-100 border-b border-t border-green-100">
                <li class="p-2">
                    <label class="f-roboto text-gray-500 text-sm">nama</label>
                    <div>{{$pegawaiToDropUp->nama}}</div>
                </li>
                <li class="p-2">
                    <label class="f-roboto text-gray-500 text-sm">NIP</label>
                    <div>{{$pegawaiToDropUp->nip}}</div>
                </li>
                <li class="p-2">
                    <label class="f-roboto text-gray-500 text-sm">nomor WA</label>
                    <div>{{$pegawaiToDropUp->nomorwa}}</div>
                </li>
                <li class="p-2">
                    <label class="f-roboto text-gray-500 text-sm">email</label>
                    <div>{{$pegawaiToDropUp->user->email}}</div>
                </li>
                <li class="p-2">
                    <label class="f-roboto text-gray-500 text-sm">username</label>
                    <div>{{$pegawaiToDropUp->user->username}}</div>
                </li>
                <li class="p-2">
                    <label class="f-roboto text-gray-500 text-sm">role</label>
                    <div>{{$pegawaiToDropUp->user->getRoleNames()->first()}}</div>
                </li>
            </ul>
            
        </div>
        
    </x-organism.dropup-admin>
    
    
    
    
    
    
    
    @endif
    {{-- ini adalah isi detial coba --}}
    
    
    
</div>