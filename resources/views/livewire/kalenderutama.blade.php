<div>
    {{-- The best athlete wants his opponent at his best. --}}    

    

    <div class="container mx-auto">
        <div class="flex items-center justify-between px-3 space-x-2 bg-green-100 py-2 shadow-inner sticky top-0">{{--  --}}
            <div class="text-gray-500 f-roboto">
                {{-- <span class="font-bold">
                    {{$seminggu[0]->format('M')}} 
                    {{$seminggu[0]->format('Y')}},
                    <span class="text-sm">
                        Week {{$seminggu[0]->weekOfMonth}}
                    </span>
                </span>
                <span class="text-xs">
                    ({{$seminggu[0]->format("d M")}} -
                    {{$seminggu[6]->format("d M")}})
                </span> --}}
                <span class="font-bold">
                    {{$seminggu[0]->format('Y')}}
                </span>
                <span>
                    @if ($seminggu[0]->format('M')==$seminggu[6]->format('M'))
                    {{substr($seminggu[0]->monthName,0,3)}}
                    @else
                    {{substr($seminggu[0]->monthName,0,3)}} - {{substr($seminggu[6]->monthName,0,3)}}
                    @endif
                </span>
            </div>
            <div class="items-center flex space-x-3">
                <span>
                    <x-atom.button-table-with-faicon wire:click="exportExcell" class="px-1.5 py-0.5 bg-green-50 text-green-500" :icon="'fas fa-download'">Export</x-atom.button-table-with-faicon>
                </span>
                <span class="text-xs text-gray-500 f-robotomon">
                    Minggu ke {{$seminggu[0]->weekOfMonth}}
                </span>
                <span class="animate-pulse text-xs" wire:loading>
                    {{-- Loading.. --}}
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
                <span class="bg-green-50 border rounded-lg px-1" style="padding-top: 2px;">
                    <button type="button" wire:click="decrementWeek"
                        class="leading-none rounded-lg transition ease-in-out duration-100 
                        inline-flex cursor-pointer select-none	 hover:bg-gray-200 p-1 items-center">
                        <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <div class="border-r inline-flex h-6"></div>
                    <button type="button" wire:click="incrementWeek"
                        class="leading-none rounded-lg transition ease-in-out duration-100 
                        inline-flex cursor-pointer select-none	 hover:bg-gray-200 p-1 items-center">
                        <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </span>
            </div>
        </div>
        {{-- sticky top-0 --}}

        
        <div class="w-full f-robotomon">
            {{-- content-center justify-center h-96  --}}
            <div class="w-full sticky top-12 shadow">
                <div class="grid grid-cols-8 w-full text-xs font-bold text-gray-400">
                    <span class=" bg-white" ></span>
                    @foreach ($seminggu as $m)
                    <span class="
                        @if ($m->dayName=='Minggu' or $m->dayName=="Sabtu")
                            text-red-300
                        @endif
                        pt-1 text-center border-l border-r border-gray-200 bg-white
                    ">
                        {{substr($m->dayName,0,3)}}
                    </span>
                    @endforeach
                </div>
                <div class="grid grid-cols-8 w-full text-lg font-bold text-gray-400">
                    <span class=" bg-white" ></span>
                    @foreach ($seminggu as $m)
                    <span class="
                        @if ($m->dayName=='Minggu' or $m->dayName=="Sabtu")
                            text-red-300
                        @endif
                        text-center border-l border-r border-gray-200 bg-white
                    ">
                        {{$m->day}}
                    </span>
                    @endforeach
                </div>
            </div>

            

            <div class="w-full overflow-hidden">
                @foreach ($list as $item)
                <div class="grid grid-cols-8 w-full text-sm">
                    <div class="p-1 text-center text-gray-300">
                        {{-- <img class="rounded bg-white w-10 h-10 flex justify-center items-center" src="{{$item['pegawai']->user->gravatar}}"> --}}
                        <div class="rounded bg-white p-1 w-10 h-10 flex justify-center items-center select-none" style="color: #{{$item['pegawai']->random_color}}">
                            {{$item['pegawai']->nama_singkat_dua}}
                        </div>
                    </div>
                    
                    
                    @foreach ($seminggu as $minggu)
                    
                        {{-- kotak tanggal --}}
                        <div class=" bg-white text-center text-gray-500 border border-gray-200 f-roboto cursor-pointer select-none"> 
                            {{-- @isset($item['tugas'][$minggu->format('Y-m-d')]) cursor-pointer select-none	" @else " @endisset> --}}

                            


                                @isset($item['tugas'][$minggu->format('Y-m-d')])
                                    
                                    @php
                                        if($minggu->dayOfWeek==0 or $minggu->dayOfWeek==6)
                                        {
                                            $workload=0;
                                            $tampilRutin=false;
                                        }
                                        else
                                        {
                                            $workload=4;
                                            $tampilRutin=true;
                                        }

                                        foreach ($item['tugas'][$minggu->format('Y-m-d')] as $tm)
                                        {
                                            $workload=$workload+$tm->level;
                                        }
                                    @endphp

                                <div class=" flex flex-col space-y-0" @click="dropUpOpen = 1" wire:click="$emitTo('dropupkalender', 'dropupDipilih',{{json_encode($item['tugas'][$minggu->format('Y-m-d')])}}, {{json_encode($minggu->format('Y-m-d'))}}, {{json_encode($tampilRutin)}}, {{json_encode($item['pegawai']->nama)}} )">


                                    <div class="flex-1">
                                        <div class="flex items-center justify-end space-x-1">
                                            <span style="font-size: 10px" class="rounded-full w-4 h-4 
                                            text-gray-100 flex items-center justify-center font-bold
                                                @if ($workload==0)
                                                bg-gray-300
                                                @elseif ($workload<=6)
                                                bg-green-400
                                                @elseif ($workload<=9)
                                                bg-yellow-400
                                                @else
                                                bg-red-400
                                                @endif
                                                ">{{$workload}}
                                            </span>

                                            {{-- <span class="material-icons
                                                @if ($workload==0)
                                                text-gray-200
                                                @elseif ($workload<=4)
                                                text-green-300
                                                @elseif ($workload<=8)
                                                text-yellow-300
                                                @else
                                                text-red-300
                                                @endif
                                                " 
                                            style="font-size: 12px">
                                                circle
                                            </span> --}}
                                            {{-- @if ($workload<=12 && $workload>8)
                                            <span class="material-icons text-yellow-300 absolute animate-ping" style="font-size: 16px">
                                                circle
                                            </span>
                                            @endif --}}
                                            
                                        </div>
                                    </div>
                                    

                                    @foreach ($item['tugas'][$minggu->format('Y-m-d')] as $tugashariini)
                                        <div class="flex-1">
                                            <div class="flex flex-col flex-wrap">
                                                <span class="
                                                text-center font-bold ml-1 
                                                bg-gray-100
                                                text-gray-400
                                                "
                                                style="font-size: 10px;">
                                                    {{-- {{$tugashariini->judul}}
                                                    - --}}
                                                    {{$tugashariini->namatim}}. 
                                                    {{-- {{$tugashariini->level}} --}}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach


                                    
                                    


                                </div>     
                                
                                
                                
                                @else

                                
                                    @if(!($minggu->dayOfWeek==0 or $minggu->dayOfWeek==6))
                                    <div class="flex items-center justify-end space-x-1 h-full" @click="dropUpOpen = 1" wire:click="$emitTo('dropupkalender', 'dropupDipilih', null, {{json_encode($minggu->format('Y-m-d'))}}, true, {{json_encode($item['pegawai']->nama)}} )">
                                        <span style="font-size: 10px" class="rounded-full w-4 h-4 text-gray-100 flex items-center justify-center font-bold bg-green-200">
                                            4
                                        </span>
                                    </div>
                                    @endif
                                            

                                @endisset

                            


                        </div>

                    @endforeach
                    
                </div>
                @endforeach
            </div>


        </div>
        
        
    </div>
    



</div>
