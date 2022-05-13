<x-slot name="header">
    @include('layouts.navigation',['warna'=>'bg-white'])
</x-slot>

<x-slot name="footer">
    @unlessrole('Admin')
    @include('layouts.navigationbawah')
    @endunlessrole
</x-slot>


<x-slot name="scripthalaman">
</x-slot>

<x-slot name="stylehalaman">
</x-slot>

<div>

    {{-- The whole world belongs to you. --}}


    <!-- info bar -->
    <div class="container mx-auto py-4 px-3 bg-gradient-to-b from-gray-200 to-gray-100 mb-24">

        <div class="flex justify-between items-center">
            <div class="f-fjalla font-bold text-2xl capitalize text-gray-700">
                Dashboard
            </div>
        </div>

        <div class="mt-6 flex justify-between items-center">
            <div class="font-bold text-gray-500 f-robotocon text-xl">
                Pegawai
            </div>
            <span class="mr-2 text-xs">
                Workload {{$posisi->year}}
            </span>
        </div>

        {{-- ================================================================ --}}

        <div class="bg-white shadow-md rounded overflow-x-auto">
            <div
                class="min-w-max w-full flex justify-around align-items-center space-x-2 py-2 text-sm bg-gray-100 font-bold text-gray-500">
                <div>Nama</div>
                <div>Bulan</div>
            </div>

            @foreach ($untukDashboard as $item)
            <div class="flex space-x-1 pl-3 py-1 w-full">
                <span class="material-icons 
                text-gray-400 
                text-base">
                    fiber_manual_record
                </span>
                <span class="f-robotomon text-gray-400">
                    {{$item->nama}}
                </span>
            </div>
            
            @foreach ($item->anggotaunits as $ag)
                <div class="min-w-max w-full grid lg:grid-cols-4 lg:px-4 justify-around align-items-center space-x-2 my-2">
                    <span class="text-right">{{$ag->nama_semi_singkat}}</span>
                    <div class="col-span-3">
                        <div class="grid grid-cols-12 align-items-center space-x-0">
                            @for ($i = 1; $i <= 12; $i++)

                                @php
                                    $jumlahHari=$this->getJumlahWeekdayDalamBulan(
                                        $posisi->year,
                                        $i
                                    );
                                
                                    $iniTot=$ag->getTugasDalamBulan($i,$posisi->year);
                                    $tot=0;
                                    if($iniTot->isNotEmpty())
                                    {
                                        $iniTot=$this->pecahHariBulan($iniTot,FALSE,$i,$posisi->year);
                                        foreach ($iniTot as $t) 
                                        {
                                            $tot=$tot+$t;
                                        }
                                    }
                                    $tot=$tot+($jumlahHari*4);//menambahkan dengan tugas rutin
                                    $max=$jumlahHari*12;
                                @endphp

                                {{-- <div>
                                    <span style="font-size: 10px" class="
                                        rounded-full w-4 h-4 flex items-center justify-center font-bold 
                                        @if ($tot==0)
                                        text-gray-400 
                                        @elseif($tot <= ($max*0.5))
                                        text-gray-500 bg-green-200 
                                        @elseif($tot <= ($max*0.75))
                                        text-gray-200 bg-yellow-400
                                        @else
                                        text-gray-200 bg-red-400 
                                        @endif
                                        ">
                                        {{$i}}
                                    </span>
                                    <sub class="diagonal-fractions">
                                        {{$tot}}
                                        /{{$max}}
                                    </sub> 
                                </div> --}}

                                <div class="px-0.5">
                                    <div class="flex flex-col">
                                        <span class="text-center text-xs">
                                            {{$i}}
                                            <span class="material-icons 
                                                        text-gray-200
                                                        " style="font-size: 9px">
                                                circle
                                            </span>
                                        </span>
                                        <div class="flex-1">
                                
                                            <div class="flex flex-col flex-wrap">
                                                <span class="
                                                    @if ($tot==0)
                                                    text-gray-400 
                                                    @elseif($tot <= ($max*0.5))
                                                    text-gray-500 bg-green-200 
                                                    @elseif($tot <= ($max*0.75))
                                                    text-gray-600 bg-yellow-200
                                                    @else
                                                    text-gray-400 bg-red-200 
                                                    @endif
                                                        px-0.5 text-center rounded-sm font-bold"
                                                    style="font-size: 11px;">
                                                    {{$tot}} <br>
                                                    <sub>{{$max}}</sub>
                                                    
                                                </span>
                                            </div>
                                
                                        </div>
                                    </div>
                                </div>
                                
                            @endfor
                            {{-- <span class="material-icons text-base">
                                people
                            </span> --}}
                        </div>
                    </div>
                </div>
            @endforeach
            
            @endforeach
        </div>






        
        <br>
        {{-- ================================================================ --}}

        <div class="mt-6 flex flex-col lg:flex-row justify-between lg:items-center">
            <div class="font-bold text-gray-500 f-robotocon text-xl">
                Statistik
            </div>
            <span class="mr-2 text-xs">
                *Workload (Khusus dan Rutin) oleh Pegawai yang hanya memiliki pekerjaan khusus pada bulan Jan-Des {{$posisi->year}}
            </span>
        </div>

        <div class="bg-white shadow-md rounded overflow-x-auto">
            <div
                class="min-w-max w-full flex justify-around align-items-center space-x-2 py-2 text-sm bg-gray-100 font-bold text-gray-500">
                {{-- <div>Status</div> --}}
                <div>Total Workload</div>
                <div>Max Workload</div>
                <div>Pegawai Terlibat</div>
                {{-- <div>Mean</div> --}}
            </div>

            @foreach ($workloadSetahun as $item)
            <div class="flex space-x-1 pl-3 py-1 w-full">
                <span class="material-icons 
                @if ($item['total']==0)
                text-gray-400 
                @elseif($item['total'] <= ($item['maxworkload']*0.5))
                text-green-400 
                @elseif($item['total'] <= ($item['maxworkload']*0.75))
                text-yellow-400 
                @else
                text-red-400 
                @endif
                text-base">
                    fiber_manual_record
                </span>
                <span class="f-robotomon text-gray-400">
                    {{$item['bulan']}}
                </span>
            </div>
            <div class="min-w-max w-full flex justify-around align-items-center space-x-2 my-2">
                <span>{{$item['total']}}</span>
                <span>{{$item['maxworkload']}}</span>
                <div class="flex align-items-center space-x-1">
                    <span>{{$item['pegawaiBertugas']}}</span>
                    <span class="material-icons text-base">
                        people
                    </span>
                </div>
                {{-- <span>{{round(($item['total']/($item['maxworkload']==0?1:$item['maxworkload']))*100)."%"}}</span> --}}
            </div>
            @endforeach


        </div>

    </div>
</div>
