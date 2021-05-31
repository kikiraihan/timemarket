<div>



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
                        class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1"
                        :class="{'cursor-not-allowed opacity-25': month == 11 }">
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
                        <x-tanggal-kalender :tgl="$tgl" :ini="$ini"/>
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

            <div class="border rounded-lg px-1 bg-white" style="padding-top: 2px;">
                <button type="button" wire:click="decrementDay" @if (1 == $posisiHarian->day) disabled @endif
                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center"
                    :class="{'cursor-not-allowed opacity-25': month == 0 }">
                    <span class="material-icons-outlined">
                        keyboard_arrow_left
                    </span>
                </button>
                <div class="border-r inline-flex h-6"></div>
                <button type="button" wire:click="incrementDay" @if ($posisiHarian->daysInMonth == $posisiHarian->day) disabled @endif
                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1"
                    :class="{'cursor-not-allowed opacity-25': month == 11 }">
                    <span class="material-icons-outlined">
                        keyboard_arrow_right
                    </span>
                </button>
            </div>
        </div>


        <div>

            <div class="flex flex-col" >

                @forelse($harian as $item)
                        <x-tugas-list 
                        :judul="$item->judul" 
                        :startdate="$item->startdate->format('d M')" 
                        :duedate="$item->duedate->format('d M')" 
                        :workload="$item->level" 
                        :prosingkat="$item->tim->singkatan" 
                        :status="$item->status"/>
                @empty
                        <div class="bg-white border p-4 flex flex-col  items-center pt-3 pb-5">
                            <img src="{{ asset('assets_kiki\vector\Spotlight _TwoColor.svg') }}" class="w-full md:w-72">
                            <span class="px-4 f-robotomon capitalize text-sm">
                                kosong..
                            </span>
                        </div>
                @endforelse

                <!-- garis akhir -->
                <div>
                    <div class="h-3 relative w-full  overflow-hidden">
                        <div class="w-full h-full bg-gray-200 absolute"></div>
                        <div id="bar" class="h-full 
                        @if ($harian->sum("level")<=4)
                        bg-green-400
                        @elseif ($harian->sum("level")<=8)
                        bg-yellow-400
                        @else
                        bg-red-400
                        @endif
                        absolute w-{{$harian->sum("level")}}/12"></div>
                        {{-- <div id="bar" class="h-full bg-yellow-300 relative w-4/12"></div> --}}
                    </div>
                </div>

            </div>
        </div>

        



    </div>





    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


</div>
