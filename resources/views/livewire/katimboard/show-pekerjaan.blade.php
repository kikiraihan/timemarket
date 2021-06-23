<div>
    

    <div 
        x-data="{ dropUpOpen: false }" 
        class="container mx-auto py-4">


        <div class="container mx-auto py-4">
            <div class="flex justify-between items-center mb-5">
                <div class="font-bold text-gray-500 uppercase f-robotomon text-sm px-4">
                    Pekerjaan anggota
                </div>
                <div class="flex items-center justify-start space-x-1 px-4 text-xs">
                    {{-- <span class="material-icons-outlined" style="font-size: 16px">
                        task
                    </span> --}}
                    <span>{{$tim->tugasanggotatims->count()}} Task</span>
                </div>
            </div>
            
            <div class="flex text-gray-600 mb-6">
                <a href="{{ route('task.create.byid', ['id_proker'=>$tim->id]) }}" class="bg-green-500 text-white rounded shadow-sm flex items-center space-x-1 mx-4 flex-initial py-1 px-2">
                    <span class="material-icons" style="font-size: 16px">
                        add
                    </span>
                    <span>Tambah</span>
                </a>

                <button class="f-robotomon flex items-center justify-between space-x-1 px-4 text-xs
                    flex-1 border-b-4 border-gray-100 focus:border-green-300 focus:outline-none py-1.5">
                    <span class="material-icons-outlined" style="font-size: 16px">
                        sort
                    </span>
                    <span>anggota</span>
                </button>

                <button class="f-robotomon flex items-center justify-between space-x-1 px-4 text-xs
                    flex-1 border-b-4 border-gray-100 focus:border-green-300 focus:outline-none py-1.5">
                    <span class="material-icons-outlined" style="font-size: 16px">
                        sort
                    </span>
                    <span>waktu</span>
                </button>
                
            </div>

            
            @foreach ($tim->tugasanggotatims->groupBy('id_pegawai') as $item)
            <div class="flex flex-col my-3" >
                    @foreach ($item->sortBy('duedate') as $tgs)
                        
                        @if ($loop->first)
                            <span class="px-4">{{$tgs->pegawai->nama}}</span>
                        @endif

                        <x-tugas-list-atshow
                        :idtugas="$tgs->id" 
                        :judul="$tgs->judul" 
                        :startdate="$tgs->startdate->format('d M')" 
                        :duedate="$tgs->duedate->format('d M')" 
                        :status="$tgs->status"
                        :isKepalaTim="true"
                        />
                    @endforeach
            </div>
            @endforeach

        </div>

    


    

        

        <livewire:katimboard.drop-up-pekerjaan />

    </div>

</div>
