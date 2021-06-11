<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}




    <form wire:submit.prevent="{{$metode}}">
        
        <div class="container mx-auto flex flex-col space-y-4 py-4">
    
            @if ($metode=="updateProker")
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm">Status</label>
                <x-select-standar-kiki wire:model.lazy="status" id="status">
                    <option value="" hidden selected>Pilih status</option>
                    <option class="w-full" value="not start">not start</option>
                    <option class="w-full" value="on going">on going</option>
                    <option class="w-full" value="done">done</option>
                </x-select-standar-kiki>
                <x-error-input :kolom="'status'"/>
            </div>
            @endif
    
            <div class="px-4 grid grid-cols-2 gap-3">
                <div>
                    <label class="f-roboto ml-1 text-gray-500 text-sm">Jangka</label>
                    <x-select-standar-kiki wire:model.lazy="jangka" id="jangka">
                        <option value="" hidden selected>Pilih</option>
                        <option class="w-full" value="panjang">Panjang</option>
                        <option class="w-full" value="pendek">Pendek</option>
                    </x-select-standar-kiki>
                    <x-error-input :kolom="'jangka'"/>
                </div>
    
                <div>
                    <label class="f-roboto ml-1 text-gray-500 text-sm">IKU</label>
                    <x-select-standar-kiki wire:model.lazy="iku" id="iku">
                        <option value="" hidden selected>Pilih</option>
                        <option class="w-full" value="IKU">IKU</option>
                        <option class="w-full" value="Non-IKU">Non-IKU</option>
                    </x-select-standar-kiki>
                    <x-error-input :kolom="'iku'"/>
                </div>
            </div>
    
    
            
    
            @role('Chief')
            {{-- awal edit kepala tim --}}
            @if($id_kepala==null)
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm flex items-center space-x-1">
                    <span class="material-icons-outlined text-sm">
                        record_voice_over
                    </span>
                    <span>Pilih Kepala</span>
                </label>
                <div class="flex shadow">
                    <span class="material-icons-outlined flex items-center pl-2 pr-1 bg-white rounded-l text-gray-500">
                        search
                    </span>
                    <input wire:model.debounce.350ms="search"
                        class="block py-2 pl-1 pr-2 w-full rounded-r  focus:outline-none focus:ring-2 focus:ring-green-300"
                        placeholder="Masukan nama atau nip" type="text" id="search">
                </div>
                
                @if ($search)
                <span class="block text-xs mt-2 text-gray-400 pl-1">Ditemukan : {{$selectkepala->count()}}</span>
                @endif
    
            </div>
            
            <div class="flex flex-row space-x-5 overflow-x-auto horscroll p-4">
                @if ($search)
                @foreach ($selectkepala as $item)
                <div wire:click="pilihKepala({{$item->id}})" class="flex flex-col items-center cursor-pointer">
                    <div class="shadow rounded-full bg-white w-14 h-14  overflow-hidden">
                        <img src="{{$item->avatar}}" class="w-14 h-14 object-cover">
                    </div>
                    <span class="text-xs f-robotomon">{{$item->nama_semi_singkat}}</span>
                </div>
                @endforeach
                @endif
            </div>
            
            @else
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm flex items-center space-x-1">
                    <span class="material-icons-outlined text-sm">
                        record_voice_over
                    </span>
                    <span>Pilih Kepala</span>
                </label>
                <div class="flex items-center space-x-2 mt-2">
                    <div class="shadow rounded-full bg-white w-14 h-14 overflow-hidden">
                        <img src="{{$selectedKep->avatar}}" class="w-14 h-14 object-cover">
                    </div>
                    <span class="f-roboto">{{$selectedKep->nama}}</span>
                </div>
                <button type="button" wire:click="batalkanKepala" class="shadow mt-4 bg-red-400 p-2 rounded text-white">Batalkan</button>
            </div>
            @endif
            <x-error-input class="px-4" :kolom="'id_kepala'"/>
            {{-- akhir edit kepala tim --}}
            @endrole
    
    
    
        </div>
    
        <hr>
        
        <div class="container mx-auto flex flex-col space-y-4 py-4">
    
    
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm">Nama Singkat Tim</label>
                <x-input-standar-kiki wire:model.lazy='nama' id="nama" placeholder="BBM,INFO"/>
                <x-error-input :kolom="'nama'"/>
            </div>
    
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm">Judul Proker</label>
                <x-input-standar-kiki wire:model.lazy='judul_project' id="judul_project" placeholder="Bahan Bakar Minyak"/>
                <x-error-input :kolom="'judul_project'"/>
            </div>
    
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm flex items-center space-x-1">
                    <span class="material-icons-outlined text-sm">
                        query_builder
                    </span>
                    <span>Waktu Pelaksanaan</span>
                </label>
                <x-input-standar-kiki wire:model.lazy='target_pelaksanaan' id="target_pelaksanaan" placeholder="Minggu pertama awal bulan"/>
                <x-error-input :kolom="'target_pelaksanaan'"/>
            </div>
    
    
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm">Deskripsi <sup>(opsional)</sup></label>
                <x-textarea-standar-kiki wire:model.lazy="deskripsi" id="deskripsi" placeholder="Deskripsikan dengan singkat kegiatan.."></x-textarea-standar-kiki>
                <x-error-input :kolom="'deskripsi'"/>
            </div>
    
            
    
            
    
            
    
    
    
    
    
    
    
    
    
            <br><br>
            <div class="px-4">
                <input class="shadow p-2 w-full rounded focus:outline-none focus:ring-2 
                @if($metode=="updateTask")
                focus:ring-yellow-300  text-white bg-yellow-500
                @else
                focus:ring-green-300  text-white bg-green-500
                @endif
                " type="submit" name="submit" id="submit" value="Simpan">
            </div>
    
    
    
    
    
        
        </div>
    
    </form>










</div>
