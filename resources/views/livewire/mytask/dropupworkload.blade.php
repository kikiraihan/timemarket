<div>



    {{-- DROPUP MENU --}}
    <div wire:ignore.self :class="{ 'translate-y-full' : !dropUpOpen , }" class="fixed inset-x-0 bottom-0 z-10
        transform transition translate-y-full duration-200 ease-in-out
        min-w-screen bg-white pb-10 rounded-t-2xl shadow border border-gray-200 opacity-95
        flex flex-col space-y-2  justify-between"{{-- h-3/4 --}}
        >


        @isset($tugasDetail)
        <div class="flex flex-col">
            <x-tutup-slide-dropup @click="dropUpOpen = false" />

            <div class="w-full grid grid-cols-2 px-3 f-robotomon mb-4 text-xs">
                <div class="font-bold">
                    Detail
                </div>
                <div class="text-right">
                    Id : {{$tugasDetail->id}}
                </div>
            </div>

            <div class="w-full px-4 text-lg">
                {{-- <span>Judul : </span> --}}
                <span>{{$tugasDetail->judul}}</span>
                <span class="font-bold rounded-full bg-blue-100 px-1.5 capitalize text-gray-600" style="font-size: 9px;">
                    {{$tugasDetail->status}}
                </span>
            </div>

            
            

            <div class="grid grid-cols-2 grid-rows-2 gap-3 py-3 my-3 grid-flow-col px-4 bg-green-50">
                
                <div class="w-full text-sm">
                    <span>Proker : </span>
                    <span>{{$tugasDetail->tim->nama}}</span>
                </div>
                <div class="w-full text-sm">
                    <span>Bobot : </span>
                    {{-- <span class="bg-gray-100 text-center rounded font-bold text-gray-600 px-2 py-1">
                        {{$tugasDetail->level}} <sub>/12</sub>
                    </span> --}}
                    <span>{{$tugasDetail->level}}</span>
                </div>
                <div class="w-full text-sm">
                    <span>Start : </span>
                    <span>{{$tugasDetail->startdate->format("d M Y")}}</span>
                </div>
                <div class="w-full text-sm">
                    <span>Due : </span>
                    <span>{{$tugasDetail->duedate->format("d M Y")}}</span>
                </div>
            </div>

            <div class="w-full px-4 text-sm items-center flex space-x-1">
                {{-- <span class="material-icons text-gray-500" style="font-size: 18px;">
                    person
                </span> --}}
                <span>Kepala Proker :</span>
                <span>{{$tugasDetail->tim->kepala_nama}}</span>
            </div>

            <div class="w-full px-4 text-xs pt-4">
                <div class="text-sm font-bold">Catatan :</div>
                <div class="text-justify leading-relaxed">{{$tugasDetail->catatan}}</div>
            </div>
        </div>
        @endisset

        
        <br><br><br>
        <br><br>

        @if($isMy && isset($tugasDetail))
        
            @if ($tugasDetail->status!="done")
                <div class="w-full px-3 block">
                    <button
                        wire:click="$emit('swalAndaYakinCeklis','setDoneCeklis','Tugas ini akan ditandai selesai dan dipindahkan ke halaman tugas selesai!')"
                        class=" p-2 bg-green-500 text-white rounded shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-green-300">
                        <span class="material-icons text-sm">
                            check_circle
                        </span>
                        Tandai Selesai
                    </button>
                </div>
            @elseif($tugasDetail->status=="done")
                <div class="w-full px-3 block">
                    <button
                        wire:click="$emit('swalAndaYakinCeklis','setOnGoingCeklis','Status tugas selesai akan dibatalkan, dan kembali menjadi on going!')"
                        class=" p-2 bg-red-500 text-white rounded shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-green-300">
                        <span class="material-icons text-sm">
                            cancel
                        </span>
                        Batalkan selesai
                    </button>
                </div>
            @endif
        

        @endif

        
        
        @if ($brAdd)
            <br>
            <br>
        @endif
        



    </div>




</div>
