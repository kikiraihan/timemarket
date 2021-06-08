<div>


    <div class="container mx-auto py-4">

        <div class="px-4 flex justify-between">
            <div class="font-bold text-gray-500 uppercase f-robotomon text-sm">
                Anggota @if (!$isKepalaTim) lain @endif
            </div>
            <span class="text-xs">{{$anggotatims->count()}} Org</span>
        </div>
    
        <div class="flex flex-row space-x-5 overflow-x-auto horscroll p-4">
            @foreach ($anggotatims as $p)

            @if ($mode=='hapus' and $p->id!=$tim->id_kepala and $isKepalaTim)
            <button wire:click="$emit('swalToDeletedWithMessage','konfirmasiHapusAnggotaTim',{{$p->id}},'Data seluruh tugasnya dalam tim juga akan dihapus!')"
                type="button"  class="flex flex-col items-center focus:outline-none focus:ring-2 focus:ring-red-300">
                <div class="shadow rounded-full bg-white p-1 w-14 h-14 overflow-hidden">
                    <img src="{{$p->gravatar}}" class="w-full h-14 object-cover">
                </div>
                <span class="text-xs f-robotomon">{{$p->nama_semi_singkat}}</span>
            </button>
            @else
            <span class="flex flex-col items-center">
                <div class="
                    @if ($p->id==$tim->id_kepala ) border-2 border-blue-300 @endif 
                    shadow rounded-full bg-white p-1 w-14 h-14 overflow-hidden
                    ">
                    <img src="{{$p->gravatar}}" class="w-full h-14 object-cover">
                </div>
                <span class="text-xs f-robotomon">
                    @if ($p->id==$tim->id_kepala ) 
                    <span class="material-icons-outlined" style="font-size: 10px">
                        record_voice_over
                    </span>
                    @endif 
                    {{$p->nama_semi_singkat}}
                </span>
            </span>
            @endif 

            @endforeach
        </div>
    
        


        @if ($isKepalaTim)

            @if($mode=="input")
            
                
                @if ($id_pegawai==null)
                <div class="px-4">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">Tambah Anggota</label>
                    <div class="flex shadow">
                        <span class="material-icons-outlined flex items-center pl-2 pr-1 bg-white rounded-l text-gray-500">
                            search
                        </span>
                        <input wire:model.debounce.350ms="search"
                            class="block py-2 pl-1 pr-2 w-full rounded-r  focus:outline-none focus:ring-2 focus:ring-green-300"
                            placeholder="Cari pegawai atau nip" type="text" id="search">
                    </div>
                </div>
                
                <div class="flex flex-row space-x-5 overflow-x-auto horscroll p-4">
                    @isset($pegawaiDitemukan)
                        @foreach($pegawaiDitemukan as $item)
                        <button type="button" wire:click="pilihPegawai({{$item->id}})" class="flex flex-col items-center">
                            <div class="shadow rounded-full bg-white p-1 w-14 h-14 overflow-hidden">
                                <img src="{{$item->gravatar}}" class="w-full h-14 object-cover">
                            </div>
                            <span class="text-xs f-robotomon">{{$item->nama_semi_singkat}}</span>
                        </button>
                        @endforeach
                    @endisset
                </div>
                @else
                <div class="px-4">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">Anggota akan ditambahkan, tekan ya untuk simpan!</label>
                    <div class="flex items-center space-x-2 mt-2">
                        <div class="shadow rounded-full bg-white w-14 h-14 overflow-hidden">
                            <img src="{{$selectedPeg->gravatar}}" class="w-full h-14 object-cover">
                        </div>
                        <span class="f-roboto">{{$selectedPeg->nama}}</span>
                    </div>
                </div>
                @endif {{-- mode id_pegawai == null --}}



                <div class="flex space-x-2 justify-between px-4 mt-4">
                    
                    <button wire:click="inputBatal" type="button" class="bg-gray-200 p-2 rounded shadow-sm space-x-1 focus:outline-none focus:ring-green-300 focus:ring-2 w-full">
                        <span>Batal</span>
                    </button>
                
                    @if ($id_pegawai)
                    <button wire:click="TambahPegawai" type="button" class="bg-green-500 text-white p-2 rounded shadow-sm space-x-1 focus:outline-none focus:ring-green-300 focus:ring-2 w-full">
                        <span>Ya</span>
                    </button>
                    @endif
                    
                </div>
            

            @else

                
                @if($mode=="hapus")
                <label class="f-roboto ml-1 text-gray-500 text-sm px-4">Pilih anggota di atas yang akan dihapus </label>
                <div class="flex space-x-2 justify-between px-4 mt-4">
                    <button wire:click="hapusBatal" type="button" class="bg-gray-200 p-2 rounded shadow-sm space-x-1 focus:outline-none focus:ring-green-300 focus:ring-2 w-full">
                        <span>Batal</span>
                    </button>
                </div>
                
                @else
                <div class="w-full px-4 flex space-x-2">
                    <button wire:click="inputMulai" type="button" class="bg-green-500 text-white px-2 py-1 rounded shadow-sm flex items-center space-x-1 focus:outline-none focus:ring-green-300 focus:ring-2">
                        <span class="material-icons" style="font-size: 16px">
                            person_add
                        </span>
                        <span>Tambah</span>
                    </button>
                    <button wire:click="hapusMulai" type="button" class="bg-red-500 text-white px-2 py-1 rounded shadow-sm flex items-center space-x-1 focus:outline-none focus:ring-green-300 focus:ring-2">
                        {{-- <span class="material-icons" style="font-size: 16px">
                            trash
                        </span> --}}
                        <span>Hapus</span>
                    </button>
                </div>

                @endif


            @endif {{-- mode input --}}



        @endif {{-- kepala tim --}}


    
    </div>


</div>
