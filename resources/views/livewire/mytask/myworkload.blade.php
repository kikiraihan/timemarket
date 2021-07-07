<div>

    {{-- KALENDER BULAN --}}
    <div class="container mx-auto py-5 px-3 antialiased sans-serif">
        <div class="font-bold text-gray-500 mb-4 uppercase f-robotomon text-sm">
            Kalender
        </div>
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="flex items-center justify-between py-2 px-6">
                <div>
                    <span class=" font-bold text-gray-800">{{$posisi->monthName}}</span>
                    <span class="ml-1  text-gray-600 font-normal">{{$posisi->year}}</span>
                    <span class="animate-pulse text-xs" wire:loading wire:target="getKalenderSebulan">
                        Loading..
                    </span>
                </div>
                <div class="border rounded-lg px-1" style="padding-top: 2px;">
                    <button type="button" wire:click="decrementMonth"
                        class="leading-none rounded-lg transition ease-in-out duration-100 
                        inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center">
                        <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <div class="border-r inline-flex h-6"></div>
                    <button type="button" wire:click="incrementMonth"
                        class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1">
                        <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-row flex-wrap w-full f-robotomon">
                {{-- content-center justify-center h-96  --}}
                <div class="grid grid-cols-7 w-full text-xs font-bold text-gray-400 pt-2
                ">
                    <span class="text-center border border-gray-100">Min</span>
                    <span class="text-center border border-gray-100">Sen</span>
                    <span class="text-center border border-gray-100">Sel</span>
                    <span class="text-center border border-gray-100">Rab</span>
                    <span class="text-center border border-gray-100">Kam</span>
                    <span class="text-center border border-gray-100">Jum</span>
                    <span class="text-center border border-gray-100">Sab</span>
                </div>

                <div class="grid grid-cols-7 w-full text-sm">

                    @foreach ($kalender['blankdays'] as $item)
                    <div class="p-1 border border-gray-100 text-center  text-gray-300">{{$item}}</div>
                    @endforeach

                    @foreach ($kalender['no_of_days'] as $tgl=>$ini)
                    
                    {{-- href="#beban" --}}
                    <button  wire:click="pindah({{$tgl}})" class="cursor-pointer focus:outline-none focus:bg-yellow-100 ">
                        @if ($kalender['carbon'][$tgl]=="Minggu" or $kalender['carbon'][$tgl]=="Sabtu")
                            <x-tanggal-kalender :tgl="$tgl" :ini="($ini)"/>
                        @else
                            <x-tanggal-kalender :tgl="$tgl" :ini="($ini+4)"/>
                        @endif
                        {{-- {{$tgl}} --}}
                    </button>

                    @endforeach
                </div>
            </div>
        </div>

    </div>


    <!-- content bawah workload -->
    <div class="container mx-auto py-4" >{{-- id="beban" --}}
        <div class="font-bold text-gray-500 uppercase f-robotomon text-sm px-4">
            Beban Kerja
            <button class="material-icons-outlined text-sm">
                help_outline
            </button>
        </div>

        <div class="flex items-center justify-between py-2 px-4">
            <div>
                <span class="text-sm "><span class="font-extrabold ">{{$posisiHarian->dayName}}, {{$posisiHarian->day}}</span> {{$posisiHarian->monthName}} {{$posisiHarian->year}}</span>
                {{-- <span  class=" font-bold text-gray-800">Minggu</span>
                <span  class="ml-1  text-gray-600 font-normal">1</span> --}}
            </div>

            {{-- <div class="border rounded-lg px-1 bg-white" style="padding-top: 2px;">
                <button type="button" wire:click="decrementDay" @if (1 == $posisiHarian->day) disabled @endif
                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center">
                    <span class="material-icons-outlined">
                        keyboard_arrow_left
                    </span>
                </button>
                <div class="border-r inline-flex h-6"></div>
                <button type="button" wire:click="incrementDay" @if ($posisiHarian->daysInMonth == $posisiHarian->day) disabled @endif
                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1">
                    <span class="material-icons-outlined">
                        keyboard_arrow_right
                    </span>
                </button>
            </div> --}}
        </div>


        <div>
            
            <div class="flex flex-col" >

                @forelse($harian['tugason'] as $item)
                    <x-tugas-list 
                    :idtugas="$item->id" 
                    :judul="$item->judul" 
                    :startdate="$item->startdate->format('d M')" 
                    :duedate="$item->duedate->format('d M')" 
                    :workload="$item->level" 
                    :prosingkat="$item->tim->nama" 
                    :status="$item->status"/>
                @if ($loop->last)

                        @php
                            if (
                                $posisiHarian->dayName=="Minggu" or 
                                $posisiHarian->dayName=="Sabtu"
                                )
                                $penambah=0;
                            else
                                $penambah=4;
                        @endphp
                        <!-- garis akhir -->
                        <div>
                            <div class="h-3 relative w-full  overflow-hidden">
                                <div class="w-full h-full bg-gray-200 absolute"></div>
                                <div id="bar" class="h-full 
                                    @if (($harian['tugason']->sum("level")+$penambah) <= 6)
                                        bg-green-400
                                    @elseif (($harian['tugason']->sum("level")+$penambah) <= 9)
                                        bg-yellow-400
                                    @else
                                        bg-red-400
                                    @endif
                                absolute w-{{$harian['tugason']->sum("level")+$penambah}}/12"></div>
                                {{-- <div id="bar" class="h-full bg-yellow-300 relative w-4/12"></div> --}}
                            </div>
                        </div>
                @endif
                @empty

                    @empty($harian['done'])
                    <x-kosong/>
                    @endempty
                    
                @endforelse

                
            </div>
        </div>

        



        {{-- TUGAS DONE --}}

        @empty($harian['done'])
        @else
        <div class="flex items-center justify-between py-2 px-4 mt-4">
            <span class="text-sm font-bold">
                Done list
            </span>
        </div>

        <div>
            <div class="flex flex-col">
                @forelse($harian['done'] as $item)
                <x-tugas-list-done 
                        :judul="$item->judul" 
                        :status="$item->status"/>
                @empty
                @endforelse
            </div>
        </div>
        @endempty




    </div>

    





    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>
