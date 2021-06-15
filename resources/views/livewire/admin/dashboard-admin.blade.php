<div>
    {{-- The whole world belongs to you. --}}



    
    <!-- welcome tron -->
    <div class="flex flex-col p-4 justify-start text-center h-60 bg-green-200 bg-no-repeat bg-bottom space-y-2" 
    style="background-image: url('{{asset("assets_kiki/vector/TimeTwoColor.svg")}}');background-size: 14rem;">
        
            <span class=" f-roboto text-xs">
                Selamat Datang,
            </span>
            <span class="text-2xl f-fjalla font-black text-gray-700">
                {{$userlogin->username}}
            </span>
        
    </div>


    <!-- info bar -->
    <div class="container mx-auto p-4 bg-gradient-to-b from-green-200 to-gray-100 mb-24">
        
        <div class="grid grid-cols-2 gap-4  ">
            
            <div>
                <div class="grid grid-cols-2 p-3 mx-auto bg-white rounded-xl shadow-md items-center gap-2">
                    <div>
                        <span class="material-icons text-6xl text-green-400">groups</span>
                        <!-- <img class="w-24" src="public/vector/Completed_task _Outline.svg"> -->
                    </div>
                    <div class="text-3xl text-right self-end font-medium text-gray-800 f-nunito diagonal-fractions">
                        {{$jumPegawai}}
                    </div>
                    <p class="text-right flex-1 text-gray-500 col-span-2">Jumlah Pegawai!</p>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-2 p-3 mx-auto bg-white rounded-xl shadow-md items-center gap-2">
                    <div class="">
                        <span class="material-icons text-6xl text-yellow-300">
                            group_work
                        </span>
                    </div>
                    <div class="text-3xl text-right self-end font-medium text-gray-800 f-nunito diagonal-fractions">
                        {{$jumUnit}}
                    </div>
                    <p class="text-right flex-1 text-gray-500 col-span-2">Jumlah Unit Kerja!</p>
                </div>
            </div>

            
            
        </div>

    </div>
</div>
