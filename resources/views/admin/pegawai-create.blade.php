<div>

    <x-organism.dropup-admin>

        <x-slot name="pilihanButton">
            <div class="flex space-x-1 px-1">
                {{-- <button wire:click="tampilData('admin.pegawai-detail',{{$idToDropup}})" class="flex-auto p-2 rounded bg-gray-300 shadow-sm focus:outline-none focus:ring-1 ring-gray-500">Batal</button> --}}
                <button wire:click="newPegawai()" class="flex-auto p-2 rounded bg-green-300 shadow-sm focus:outline-none focus:ring-1 ring-green-500">Simpan</button>
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

            
    
            <h5 class="font-bold mb-3 ml-3 uppercase">Tambah Pegawai</h5>

            <ul class="divide-y-2 divide-gray-100 border-b border-t border-green-100">
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">nama</label>
                    <x-input-standar-kiki wire:model="nama" placeholder="masukan nama.." />
                    <x-error-input :kolom="'nama'"/>
                </li>
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">nip</label>
                    <x-input-standar-kiki wire:model="nip" placeholder="masukan nip.." />
                    <x-error-input :kolom="'nip'"/>
                </li>
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">nomorwa</label>
                    <x-input-standar-kiki wire:model="nomorwa" placeholder="masukan nomorwa.." />
                    <x-error-input :kolom="'nomorwa'"/>
                </li>
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">email</label>
                    <x-input-standar-kiki wire:model="email" placeholder="masukan email.." />
                    <x-error-input :kolom="'email'"/>
                </li>
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">username</label>
                    <x-input-standar-kiki wire:model="username" placeholder="masukan username.." />
                    <x-error-input :kolom="'username'"/>
                </li>
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">Role</label>
                    <x-select-standar-kiki wire:model="role">
                        <option value="" hidden selected>Pilih</option>
                        <option class="w-full" value="Pegawai">Pegawai</option>
                        <option class="w-full" value="Chief">Chief (Kepala Tim)</option>
                        <option class="w-full" value="KPw">Kepala Perwakilan</option>
                    </x-select-standar-kiki>
                    <x-error-input :kolom="'role'"/>
                </li>

            </ul>
            

            

        </div>
        
    </x-organism.dropup-admin>

    
    {{-- ini adalah isi detial coba --}}
</div>