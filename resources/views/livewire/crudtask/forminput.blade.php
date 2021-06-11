<div>
    {{-- The Master doesn't talk, he acts. --}}





    {{-- <div class="text-2xl f-roboto px-4 mt-3">Tugas Baru</div> --}}



    <form wire:submit.prevent="{{$metode}}">

        <div class="container mx-auto flex flex-col space-y-4 py-4">
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm">Program Kerja / Tim</label>
                <select @if($metode=='updateTask') disabled @endif
                    wire:model.lazy="id_proker" id="proker"
                    class="block shadow bg-white text-sm p-2 w-full rounded focus:outline-none 
                    focus:ring-2 focus:ring-green-300" aria-label="Default select example">
                    <option value="" hidden selected>Pilih proker</option>
                    @foreach ($selecttim as $item)
                    <option class="w-full" value="{{$item->id}}">{{$item->nama}}</option>
                    @endforeach
                </select>
                <x-error-input :kolom="'id_proker'"/>
            </div>

            @if($id_pegawai==null)
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm">Pilih PIC</label>
                
                @if ($isTampilSearch)
                <div class="flex shadow">
                    <span class="material-icons-outlined flex items-center pl-2 pr-1 bg-white rounded-l text-gray-500">
                        search
                    </span>
                    <input wire:model.debounce.350ms="search"
                        class="block py-2 pl-1 pr-2 w-full rounded-r  focus:outline-none focus:ring-2 focus:ring-green-300"
                        placeholder="Cari pegawai atau nip" type="text" id="search">
                </div>
                @endif

                <span class="block text-xs mt-2 text-gray-400 pl-1">Ditemukan : {{$selectpegawai->count()}}</span>
            </div>
            <div class="flex flex-row space-x-5 overflow-x-auto horscroll p-4">
                @foreach ($selectpegawai as $item)
                <button type="button" wire:click="pilihPegawai({{$item->id}})" class="flex flex-col items-center">
                    <div class="shadow rounded-full bg-white p-1 w-14 h-14 overflow-hidden">
                        <img src="{{$item->gravatar}}" class="w-full h-14 object-cover">
                    </div>
                    <span class="text-xs f-robotomon">{{$item->nama_semi_singkat}}</span>
                </button>
                @endforeach
            </div>
            @else
            <div class="px-4">
                <label class="f-roboto ml-1 text-gray-500 text-sm">Pilih PIC</label>
                <div class="flex items-center space-x-2 mt-2">
                    <div class="shadow rounded-full bg-white w-14 h-14 overflow-hidden">
                        <img src="{{$selectedPeg->gravatar}}" class="w-full h-14 object-cover">
                    </div>
                    <span class="f-roboto">{{$selectedPeg->nama}}</span>
                </div>
                <button type="button" wire:click="batalkanPic" class="shadow mt-4 bg-red-400 p-2 rounded text-white">Batalkan</button>
            </div>
            @endif
            <x-error-input class="px-4" :kolom="'id_pegawai'"/>


        
        
        </div>




        <hr>

        <div class="container mx-auto p-4 flex flex-col space-y-4">

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Judul</label>
                <input wire:model.lazy="judul" id="judul"
                    class="shadow text-sm  p-2 w-full rounded 
                    focus:outline-none focus:ring-2 focus:ring-green-300"
                    placeholder="Konsumsi kegiatan.." type="text">
                    <x-error-input :kolom="'judul'"/>
                    
                    {{-- @error('password') <span class="text-xs text-red-300">{{ $message }}</span> @enderror --}}

            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Bobot</label>
                <select wire:model.lazy="level" id="level"
                    class="block shadow bg-white text-sm p-2 w-full rounded focus:outline-none 
                    focus:ring-2 focus:ring-green-300" aria-label="Default select example">
                    <option value="" hidden selected>Pilih bobot</option>
                    <option class="w-full" value="1">1</option>
                    <option class="w-full" value="2">2</option>
                    <option class="w-full" value="3">3</option>
                </select>
                <x-error-input :kolom="'level'"/>
            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Start Date</label>
                <input
                    wire:model.lazy="startdate" id="startdate"
                    class="bg-white shadow text-sm  p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-green-300"
                    type="date">
                <x-error-input :kolom="'startdate'"/>
            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Due Date</label>
                <input
                    wire:model.lazy="duedate" id="duedate"
                    class="bg-white shadow text-sm  p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-green-300"
                    type="date">
                <x-error-input :kolom="'duedate'"/>
            </div>


        </div>






        <hr>

        <div class="container mx-auto p-4 flex flex-col space-y-4">
            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Catatan <span
                        class="text-xs">(optional)</span></label>
                <x-textarea-standar-kiki wire:model.lazy="catatan" 
                id="catatan" placeholder="Jangan lupa follow up.."></x-textarea-standar-kiki>
                <x-error-input :kolom="'catatan'"/>
            </div>

            <div>
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
