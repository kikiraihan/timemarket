<x-slot name="header">
    @include('layouts.navigation',['warna'=>'bg-white','kata'=>'my team'])
</x-slot>

<x-slot name="footer">
    @unlessrole('Admin')
    @include('layouts.navigationbawah')
    @endunlessrole
</x-slot>

<x-slot name="stylehalaman">
    @livewireStyles
</x-slot>

<x-slot name="scripthalaman">
    @livewireScripts
    @include('layouts.scriptsweetalert')
</x-slot>

{{-- ================================================================= --}}

<div>
    {{-- top --}}
    <div class="p-4 bg-white rounded-b shadow">
        <div class="pr-3 max-w-sm mx-auto flex items-center space-x-4">
            <div class="flex-shrink-0">
                <img class="h-14 w-14 bg-gray-200 rounded-full shadow-sm object-cover" src="{{$user->avatar}}">
            </div>
            <div class="flex-1">
                <div class="font-bold text-black">{{$pegawai->nama}}</div>
                <p class="text-sm text-gray-500">{{$unit->nama}}</p>
            </div>
        </div>
    </div>

    {{-- isi --}}
    <div>
        <div class="container mx-auto py-4">
            <div class="font-bold text-gray-500 uppercase f-robotomon text-sm px-4">
                Unit
            </div>

            @foreach ($pegawai->mengkoordinirunit as $u)
            <div class="bg-white border px-4 flex space-x-2 py-1">

                <div class="flex-auto grid grid-cols-2 mx-auto  items-center gap-2">
                    <div class="text-sm">
                        {{ $u->nama }}
                    </div>
                    <div class="text-right flex-1 text-gray-500 text-xs">
                        @if ($pegawai->is_kepala_unit)
                        Kepala
                        @else
                        Anggota
                        @endif
                    </div>
                </div>

            </div>
            @endforeach
        </div>


        <div class="container mx-auto py-4">
            <div class="flex justify-between">
                <span class="font-bold text-gray-500 uppercase f-robotomon text-sm px-4">
                    Program Kerja
                </span>

                <button wire:click="gantiMode" class="flex items-center justify-center bg-white px-2 text-sm rounded mb-1 shadow hover:bg-yellow-100 space-x-1">
                    @if ($mode=='open')
                    <span class="material-icons-outlined text-gray-500 text-sm">
                        edit
                    </span>
                    <span>Edit Mode</span>
                    @else
                    <span class="material-icons-outlined text-gray-500 text-sm">
                        visibility
                    </span>
                    <span>View Mode</span>
                    @endif
                </button>
            </div>

            <div class="flex flex-col">
                @forelse ($proker as $item)
                <div class="bg-white border pl-4 flex space-x-3">

                    <div class="flex-auto grid grid-cols-4 mx-auto py-3 items-center gap-2">
                        <div class="text-sm col-span-3">
                            {{$item->nama}} : {{$item->judul_project}}
                        </div>
                        <div class="flex-1 text-gray-500 text-xs text-right">
                            <span class="text-xs px-1 rounded flex items-center space-x-1 justify-end">
                                <span class="material-icons-outlined text-sm">
                                    record_voice_over
                                </span>
                                <span class="hidden sm:inline">Chief</span>
                            </span>
                        </div>
                        <p class="text-left flex-1 flex space-x-2 text-gray-500 text-xs col-span-3">
                            <span class="flex flex-wrap space-x-1 items-center">
                                <span class="material-icons text-sm">
                                    query_builder
                                </span>
                                <span>
                                    {{$item->target_pelaksanaan}}
                                </span>
                            </span>
                            <span class="bg-yellow-100 text-center rounded-sm font-bold text-gray-500 px-1 align-middle"
                                style="font-size: 11px;">
                                {{$item->iku}}
                            </span>
                            <span class="bg-indigo-300 text-center rounded-sm font-bold text-gray-50 px-1 capitalize"
                                style="font-size: 11px;">
                                {{$item->jangka}}
                            </span>

                        </p>
                        <p class="text-right flex-1 text-xs">
                            <span class="font-bold rounded-full text-gray-100 bg-blue-400  px-1.5 py-0.5 capitalize"
                                style="font-size: 9px;">
                                {{$item->status}}
                            </span>
                        </p>
                    </div>

                    @if ($mode=='open')
                    <a href="{{ route('Katimboard.showteam', ['id'=>$item->id]) }}"
                        class=" flex-initial text-gray-500 p-1 flex flex-wrap content-center ">
                        <span class="material-icons-outlined" style="font-size: 18px">
                            navigate_next
                        </span>
                    </a>
                    @elseif($mode=="edit")
                    <div class="flex flex-row">
                        <a href="{{ route('proker.edit', ['id'=>$item->id]) }}" 
                            class=" flex-initial text-gray-500 bg-yellow-200 px-3 flex flex-wrap content-center ">
                            <span class="material-icons-outlined" style="font-size: 18px">
                                edit
                            </span>
                        </a>
                        <button wire:click="$emit('swalToDeletedWithMessage','fixHapusProker',{{$item->id}},'Seluruh data terkait proker akan dihapus, anda yakin?')"
                            class=" flex-initial text-gray-500 bg-red-200 px-3 flex flex-wrap content-center ">
                            <span class="material-icons-outlined" style="font-size: 18px">
                                delete
                            </span>
                        </button>
                    </div>
                    @endif


                </div>
                @empty
                <div>
                    kosong
                </div>
                @endforelse

            </div>

        </div>
    </div>

    <div class="flex justify-end">
        <a href="{{ route('proker.create') }}"
            class="rounded-full h-12 w-12 text-green-500 mr-5 mt-2 bg-white shadow flex justify-center items-center">
            <span class="material-icons-outlined p-1">
                add
            </span>
        </a>
    </div>


    <br>
    <br>
    <br>
    <br>


</div>
