<div class="container mx-auto py-4">
    <div class="font-bold text-gray-500 uppercase f-robotomon text-sm px-4">
        Unit
    </div>

    <div class="bg-white border px-4 flex space-x-2 py-1">
        <!-- <div class="flex-initial  flex flex-wrap content-center">
            <span class="material-icons text-gray-400 text-sm">
                fiber_manual_record
            </span>
            <span class="font-medium ">
                4
            </span>
        </div> -->
        <div class="flex-auto grid grid-cols-2 mx-auto  items-center gap-2">
            <div class="text-sm">
                {{ $pegawai->unit[0]->nama }}
            </div>
            <div class="text-right flex-1 text-gray-500 text-xs">
                @if ($pegawai->is_kepala_unit)
                    Kepala
                @else
                    Anggota
                @endif
            </div>
        </div>
    </div>
</div>

<!-- content bawah workload -->
<div class="container mx-auto py-4">
    <div class="font-bold text-gray-500 uppercase f-robotomon text-sm px-4">
        Program Kerja
    </div>

    
    <div>
        <div class="flex flex-col">        
            @foreach ($proker as $item)
                <x-proker-list :item="$item" :idpegawai="$pegawai->id"/>
            @endforeach
        </div>
    </div>
</div>