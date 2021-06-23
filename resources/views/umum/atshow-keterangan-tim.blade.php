<div class="container mx-auto py-4 shadow bg-white rounded-b-xl">
    <div class="flex flex-col space-y-2">
        

        

        <div class="w-full grid grid-cols-2 px-3">
            <div class="font-bold text-xl flex items-center">
                {{$tim->nama}}
            </div>
            
            {{-- cek user login apakah anggotatim  --}}
            @if (Auth::user()->pegawai->isMeAnggotaTim($tim->id))

                <div class="flex items-center justify-end">
                    

                    @if ($isKepalaTim or ($tim->id_koordinator== Auth::user()->pegawai->id))

                    <a href="{{ route('proker.edit', ['id'=>$tim->id]) }}" 
                        class="ml-2 w-9 h-9 bg-white rounded-full shadow-md
                        flex items-center justify-center">
                        <span class="material-icons-outlined text-gray-500" style="font-size: 14px">
                            edit
                        </span>
                    </a>

                    {{-- <a href="{{ route('proker.hapus', ['id'=>$tim->id]) }}" 
                        class="ml-2 w-9 h-9 bg-white rounded-full shadow-md
                        flex items-center justify-center">
                        <span class="material-icons-outlined text-gray-500" style="font-size: 14px">
                            hapus
                        </span>
                    </a> --}}

                    @else
                    <span class="shadow-sm font-bold rounded bg-gray-400 px-1 py-0.5 capitalize text-gray-50 "
                    style="font-size: 10px;">
                        Anggota
                    </span> 
                    
                    @endif  

                </div> 
            @else
            
                <div class="block text-right">
                    <span class="shadow-sm font-bold rounded bg-gray-400 px-1 py-0.5 capitalize text-gray-50 "
                    style="font-size: 10px;">
                        Read only
                    </span> 
                </div>
            @endif

            

        </div>




        <div class="grid grid-cols-2 gap-3 py-3 mb-3 px-4  ">

            <div class="w-full text-sm col-span-2">
                <span class="font-bold">Judul Proker : </span>
                <span>{{$tim->judul_project}}</span>
            </div>
            <div class="w-full text-sm">
                <span class="material-icons-outlined text-sm">
                    query_builder
                </span>
                <span>
                    {{$tim->target_pelaksanaan}}
                </span>
            </div>
            <div class="w-full text-sm block text-right">
                <span class="text-xs">Status : </span>
                <span class="shadow-sm font-bold rounded-full bg-blue-100 px-1.5 capitalize text-gray-600"
                    style="font-size: 9px;">
                    {{$tim->status}}
                </span>
            </div>
            <div class="w-full text-sm">
                <span class="material-icons-outlined text-sm">
                    record_voice_over
                </span>
                <span>
                    {{$tim->kepala_nama}}
                </span>
            </div>
            <div class="w-full text-sm block text-right space-x-2">
                <span class="shadow-sm bg-yellow-100 text-center rounded font-bold text-gray-500 px-1 py-0.5 align-middle" style="font-size: 11px;">
                    {{$tim->iku}}
                </span>
                <span class="shadow-sm bg-indigo-400 text-center rounded font-bold text-gray-50 px-1 py-0.5 capitalize" style="font-size: 11px;">
                    Jangka {{$tim->jangka}}
                </span>
                
            </div>
            
        </div>

        

        <div class="w-full px-4 text-xs pt-4">
            <div class="text-sm font-bold">Deskripsi :</div>
            <span>
                <span>{{$tim->deskripsi}}</span>
            </span>
        </div>
    </div>


</div>