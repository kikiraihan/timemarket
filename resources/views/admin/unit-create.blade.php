<div>

    <x-organism.dropup-admin>

        <x-slot name="pilihanButton">
            <div class="flex space-x-1 px-1">
                <button wire:click="newUnit()"
                    class="flex-auto p-2 rounded bg-green-300 shadow-sm focus:outline-none focus:ring-1 ring-green-500">Simpan</button>
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



            <h5 class="font-bold mb-3 ml-3 uppercase">Tambah Unit</h5>

            <ul class="divide-y-2 divide-gray-100 border-b border-t border-green-100">
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">nama unit</label>
                    <x-input-standar-kiki wire:model="nama" placeholder="masukan nama.." />
                    <x-error-input :kolom="'nama'" />
                </li>
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">singkatan</label>
                    <x-input-standar-kiki wire:model="singkatan" placeholder="masukan singkatan.." />
                    <x-error-input :kolom="'singkatan'" />
                </li>
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">deskripsi</label>
                    <x-input-standar-kiki wire:model="deskripsi" placeholder="masukan deskripsi.." />
                    <x-error-input :kolom="'deskripsi'" />
                </li>









                <li class="p-2">

                    {{-- awal edit kepala unit --}}
                    @if($id_kanit==null)
                    {{-- belum terpilih --}}
                    <div>
                        <label class="f-roboto ml-1 text-gray-500 text-sm flex items-center space-x-1">
                            <span class="material-icons-outlined text-sm">
                                record_voice_over
                            </span>
                            <span>Pilih Kepala</span>
                        </label>
                        <div class="flex shadow">
                            <span
                                class="material-icons-outlined flex items-center pl-2 pr-1 bg-white rounded-l text-gray-500">
                                search
                            </span>
                            <input wire:model.debounce.350ms="searchKanit"
                                class="block py-2 pl-1 pr-2 w-full rounded-r  focus:outline-none focus:ring-2 focus:ring-green-300"
                                placeholder="Masukan nama atau nip" type="text">
                        </div>

                        @if ($searchKanit)
                        <span class="block text-xs mt-2 text-gray-400 pl-1">Ditemukan :
                            {{$alternatifKanit->count()}}</span>
                        @endif
                    </div>

                    <div class="flex flex-row space-x-5 overflow-x-auto horscroll p-4">
                        @if ($searchKanit)
                        @foreach ($alternatifKanit as $item)
                        <div wire:click="pilihKanit({{$item->id}})" class="flex flex-col items-center cursor-pointer">
                            <div class="shadow rounded-full bg-white w-14 h-14  overflow-hidden">
                                <img src="{{$item->avatar}}" class="w-14 h-14 object-cover">
                            </div>
                            <span class="text-xs f-robotomon">{{$item->nama_semi_singkat}}</span>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    @else
                    {{-- terpilih --}}
                    <div>
                        <label class="f-roboto ml-1 text-gray-500 text-sm flex items-center space-x-1">
                            <span class="material-icons-outlined text-sm">
                                record_voice_over
                            </span>
                            <span>Pilih Kepala Unit</span>
                        </label>
                        <div class="flex items-center space-x-2 mt-2">
                            <div class="shadow rounded-full bg-white w-14 h-14 overflow-hidden">
                                <img src="{{$selectedKanit->avatar}}" class="w-14 h-14 object-cover">
                            </div>
                            <span class="f-roboto">{{$selectedKanit->nama}}</span>
                        </div>
                        <button type="button" wire:click="batalkanKanit"
                            class="shadow mt-4 bg-red-400 p-2 rounded text-white">Batalkan</button>
                    </div>
                    @endif
                    <x-error-input class="px-4" :kolom="'id_kanit'" />
                    {{-- akhir edit kepala unit --}}


                </li>











                <li class="p-2">


                    {{-- awal edit kepala tim --}}
                    @if($id_katim==null)
                    {{-- belum terpilih --}}
                    <div>
                        <label class="f-roboto ml-1 text-gray-500 text-sm flex items-center space-x-1">
                            <span class="material-icons-outlined text-sm">
                                record_voice_over
                            </span>
                            <span>Pilih Kepala Tim</span>
                        </label>
                        <div class="flex shadow">
                            <span
                                class="material-icons-outlined flex items-center pl-2 pr-1 bg-white rounded-l text-gray-500">
                                search
                            </span>
                            <input wire:model.debounce.350ms="searchKatim"
                                class="block py-2 pl-1 pr-2 w-full rounded-r  focus:outline-none focus:ring-2 focus:ring-green-300"
                                placeholder="Masukan nama atau nip" type="text">
                        </div>

                        @if ($searchKatim)
                        <span class="block text-xs mt-2 text-gray-400 pl-1">Ditemukan :
                            {{$alternatifKatim->count()}}</span>
                        @endif

                    </div>

                    <div class="flex flex-row space-x-5 overflow-x-auto horscroll p-4">
                        @if ($searchKatim)
                        @foreach ($alternatifKatim as $item)
                        <div wire:click="pilihKatim({{$item->id}})" class="flex flex-col items-center cursor-pointer">
                            <div class="shadow rounded-full bg-white w-14 h-14  overflow-hidden">
                                <img src="{{$item->avatar}}" class="w-14 h-14 object-cover">
                            </div>
                            <span class="text-xs f-robotomon">{{$item->nama_semi_singkat}}</span>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    @else
                    {{-- terpilih --}}
                    <div>
                        <label class="f-roboto ml-1 text-gray-500 text-sm flex items-center space-x-1">
                            <span class="material-icons-outlined text-sm">
                                record_voice_over
                            </span>
                            <span>Pilih Kepala Tim</span>
                        </label>
                        <div class="flex items-center space-x-2 mt-2">
                            <div class="shadow rounded-full bg-white w-14 h-14 overflow-hidden">
                                <img src="{{$selectedKatim->avatar}}" class="w-14 h-14 object-cover">
                            </div>
                            <span class="f-roboto">{{$selectedKatim->nama}}</span>
                        </div>
                        <button type="button" wire:click="batalkanKatim"
                            class="shadow mt-4 bg-red-400 p-2 rounded text-white">Batalkan</button>
                    </div>
                    @endif
                    <x-error-input class="px-4" :kolom="'id_katim'" />
                    {{-- akhir edit kepala tim --}}


                </li>






























                {{-- <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">Kepala Unit</label>
                    <x-select-standar-kiki wire:model="id_kanit">
                        <option value="" hidden selected>Pilih</option>
                        
                        <option class="w-full" value="Pegawai">Pegawai</option>
                    
                    </x-select-standar-kiki>
                    <x-error-input :kolom="'role'"/>
                </li>
                <li class="p-2">
                    <label class="f-roboto ml-1 text-gray-500 text-sm">Kepala Tim</label>
                    <x-select-standar-kiki wire:model="id_koordinator">
                        <option value="" hidden selected>Pilih</option>

                        <option class="w-full" value="Pegawai">Pegawai</option>

                    </x-select-standar-kiki>
                    <x-error-input :kolom="'role'"/>
                </li> --}}

            </ul>




        </div>

    </x-organism.dropup-admin>


    {{-- ini adalah isi detial coba --}}
</div>
