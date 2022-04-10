<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigationback',['warna'=>'bg-white','kata'=>'Tentang Tim'])
    </x-slot>

    <x-slot name="footer">
        {{-- @include('layouts.navigationbawah') --}}
    </x-slot>

    <x-slot name="stylehalaman">
        @livewireStyles
    </x-slot>

    <x-slot name="scripthalaman">
        @livewireScripts
        @include('layouts.scriptsweetalert')
    </x-slot>


    {{-- ================================================================= --}}







    {{-- keterangan tim --}}
    @include('umum.atshow-keterangan-tim',['tim'=>$tim,'isKepalaTim'=>FALSE])

    <br>

    {{-- list anggota --}}
    {{-- @include('umum.atshow-list-anggota',['anggotatims'=>$tim->anggotatims,'isKepalaTim'=>FALSE]) --}}
    <livewire:umum.list-anggota :idTim="$tim->id" :isKepalaTim="FALSE"/>

    <br>

    <hr>


    @if (!$isPegawainyaChief)
    
    <div 
        x-data="{ dropUpOpen: false }" 
        class="container mx-auto py-4">
        
        <div class="font-bold text-gray-500 uppercase f-robotomon text-sm px-4">
            List Pekerjaan : {{$pegawainya->nama_semi_singkat}}
        </div>
        <div class="flex text-gray-600 mt-2">
            <a href="{{ route('task.create.byid.pegawai', ['id_proker'=>$tim->id]) }}" 
                class="bg-green-500 text-white rounded shadow-sm flex-inline
                    items-center space-x-1 mx-4 flex-initial py-1 px-2">
                <span class="material-icons" style="font-size: 16px">
                    add
                </span>
                <span>Tambah</span>
            </a>
        </div>
            @if(!$tim->getTugasByIdPegawai($id_pegawai)->isEmpty())
            
                <div class="flex flex-col my-3" >
                    @foreach ($tim->getTugasByIdPegawai($id_pegawai) as $tgs)
                        <x-tugas-list-atshow
                        :idtugas="$tgs->id" 
                        :judul="$tgs->judul" 
                        :startdate="$tgs->startdate->format('d M')" 
                        :duedate="$tgs->duedate->format('d M')" 
                        :status="$tgs->status"
                        :isKepalaTim="false"
                        :isMilikLogin="$isMilikLogin"
                        />
                    @endforeach
                </div>

                @else

                <x-kosong class="mt-4"/>

            @endif

        <livewire:mytask.dropupworkload :isMy="$isMilikLogin"/>
        
    </div>
        
    @endif









    <br>
    <br>
    <br>
    <br>
</x-app-layout>
