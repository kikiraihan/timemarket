<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    
    <!-- component -->
    <div class="overflow-x-auto bg-white">
        
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-2 px-4 text-left">No</th>
                    <th class="py-2 px-4 text-left">Nama</th>
                    <th class="py-2 px-4 text-center">Aksi</th>
                </tr>
            </thead>


            <tbody class="text-gray-600 text-sm font-light">

                @foreach ($pegawai as $p)
                <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                    
                    <td class="py-3 px-6 text-left ">
                        <span class="font-medium">{{$loop->iteration}} </span>
                    </td>

                    <td class="py-3 px-6 text-left ">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <img class="w-6 h-6 rounded-full object-cover" src="{{$p->user->avatar}}" />
                            </div>
                            <span>{{$p->nama_semi_singkat}}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 ">
                        <div class="flex items-center justify-end">
                            <button @click="dropUpOpen = 1"
                             wire:click="tampilData('admin.pegawai-detail',{{$p->id}})" 
                             class="bg-green-500 p-2 rounded text-gray-100" type="button">
                                Open
                            </button>
                            {{-- wire:click="$emitTo('dropupkalender', 'dropupDipilih',{{json_encode($item['tugas'][$minggu->format('Y-m-d')])}})" --}}
                        </div>
                    </td>

                </tr>
                    
                @endforeach

            </tbody>
        </table>

        


    </div>








    {{-- Drop Up --}}
    @isset($isiDrop)
    
        @include($isiDrop,['pegawai'=>$pegawaiToDropUp])

    @endisset
    




</div>
