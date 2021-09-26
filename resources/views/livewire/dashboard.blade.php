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
                Workload
            </div>
            <span class="mr-2 text-xs">
                (Pekerjaan Khusus {{$posisi->year}})
            </span>
        </div>
        
        {{-- ================================================================ --}}

        <div class="bg-white shadow-md rounded overflow-x-auto">
            <div
                class="min-w-max w-full flex justify-around align-items-center space-x-2 py-2 text-sm bg-gray-100 font-bold text-gray-500">
                {{-- <div>Status</div> --}}
                <div>Total</div>
                <div>Max Total</div>
                <div>PBK</div>
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
            </div>
            @endforeach


        </div>

    </div>
</div>
