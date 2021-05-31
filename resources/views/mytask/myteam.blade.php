<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation',['warna'=>'bg-white'])
    </x-slot>

    <x-slot name="footer">
        @include('layouts.navigationbawah')
    </x-slot>

    <x-slot name="stylehalaman">
        {{-- @livewireStyles --}}
    </x-slot>

    <x-slot name="scripthalaman">
        {{-- @livewireScripts --}}
    </x-slot>



    {{-- ================================================================= --}}

    @include('layouts.tabtask',[
        'user'=>$user,
        "pegawai"=>$pegawai,
        // "ag"=>$ag,
        "unit"=>$unit,
    ])

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
                    Seksi Kehumasan
                </div>
                <div class="text-right flex-1 text-gray-500 text-xs">
                    Kepala
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
                    <!-- 1 -->
                    <div class="bg-white border py-3 px-4 flex space-x-2">
                        <div class="flex-auto grid grid-cols-2 mx-auto  items-center gap-2">
                            <div class="text-sm">
                                {{$item->nama}}
                            </div>
                            <div class="self-end text-right flex-1 text-gray-500 text-xs">
                                <button class="">
                                    <span class="material-icons-outlined">
                                        arrow_forward_ios
                                    </span>
                                </button>
                            </div>
                            <p class="text-left flex-1 text-gray-500" style="font-size: 10px;">
                                Due Date : {{$item->duedate}}
                            </p>
                            <p class="text-right flex-1 text-gray-500 text-xs">
                                3/5 Tugas
                            </p>
                        </div>
                    </div>    
                @endforeach
                

                
            </div>
        </div>


        
    </div>



</x-app-layout>
