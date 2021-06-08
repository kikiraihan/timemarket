<div class="container mx-auto py-4">

    <div class="font-bold text-gray-500 uppercase f-robotomon text-sm px-4">
        Anggota @if (!$isKepalaTim) lain @endif
    </div>

    <div class="flex flex-row space-x-5 overflow-x-auto horscroll p-4">
        @foreach ($anggotatims as $p)
        <a href="{{ route('theytask.workload', ['id'=>$p->id]) }}"  class="flex flex-col items-center">
            <div class="shadow rounded-full bg-white p-1 w-14 h-14 overflow-hidden">
                <img src="{{$p->gravatar}}" class="w-full h-14 object-cover">
            </div>
            <span class="text-xs f-robotomon">{{$p->nama_semi_singkat}}</span>
        </a>
        @endforeach
    </div>

    @if ($isKepalaTim)
    <div class="w-full px-4">
        <button type="button" class="bg-green-500 text-white p-2 rounded shadow-sm flex items-center space-x-1">
            <span class="material-icons" style="font-size: 16px">
                person_add
            </span>
            <span>Tambah</span>
        </button>
    </div>
    @endif

</div>