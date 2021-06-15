
<div>
    
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    




    <div class="rounded shadow bg-white py-1">
        <div class="flex justify-between m-2 items-center">
            <h3 class="f-roboto font-bold uppercase text-green-500">Tabel unit</h3>
            <button 
                @click="dropUpOpen = 1"
                wire:click="tampilInput()"
                class="rounded shadow bg-green-400 text-white p-1
                focus:outline-none focus:ring-2 focus:ring-green-400
                flex items-center justify-center">
                <span class="material-icons-outlined">
                    add
                </span>
                <span class="pr-1">tambah unit</span>
            </button>
        </div>
        
        <!-- component -->
        <div class="overflow-x-auto bg-white">
            
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-2 px-6 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Nama</th>
                        <th class="py-2 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
    
    
                <tbody class="text-gray-600 text-sm font-light">
    
                    @foreach ($units as $u)
                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                        
                        <td class="py-3 px-6 text-left ">
                            <span class="font-medium">{{$u->id}}</span>
                        </td>
    
                        <td class="py-3 px-6 text-left ">
                            <div class="flex items-center">
                                <span>{{$u->nama}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 ">
                            <div class="flex items-center justify-end">
                                <button @click="dropUpOpen = 1"
                                 wire:click="tampilData({{$u->id}})" 
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
    
        <div class="px-1">
            {{ $units->links() }}
        </div>


    </div>


    {{-- Drop Up --}}
    @isset($isiDrop)
        
    @include($isiDrop)

    @endisset





</div>



