<div class="container mx-auto py-4 shadow bg-white rounded-b-xl">
    <div class="flex flex-col space-y-2">
        

        <div class="w-full grid grid-cols-2 px-3">
            <div class="font-bold text-xl">
                {{$tim->nama}}
            </div>
            
            @if (Auth::user()->pegawai->isMeAnggotaTim($tim->id))
            <div class="flex items-center justify-end">
                <span class="shadow-sm font-bold rounded @if ($isKepalaTim)bg-blue-400 @else bg-gray-400 @endif px-1.5 py-1 capitalize text-gray-50 "
                    style="font-size: 10px;">
                    @if ($isKepalaTim)
                    Anda kepala tim
                    @else
                    Anda anggota
                    @endif
                </span>   

                @if ($isKepalaTim)
                <a href="{{ route('proker.edit', ['id'=>$tim->id]) }}" 
                    class="ml-2 w-7 h-7 bg-yellow-500 rounded-full text-white shadow-sm 
                    flex items-center justify-center">
                    <span class="material-icons-outlined text-white" style="font-size: 14px">
                        edit
                    </span>
                </a>
                @endif

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
                <span class="shadow-sm bg-yellow-100 text-center rounded-sm font-bold text-gray-500 px-1 py-0.5 align-middle" style="font-size: 11px;">
                    {{$tim->iku}}
                </span>
                <span class="shadow-sm bg-indigo-400 text-center rounded-sm font-bold text-gray-50 px-1 py-0.5 capitalize" style="font-size: 11px;">
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