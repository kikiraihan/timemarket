<div>

    {{-- <form action=""> --}}
        <div class="flex shadow-sm ">
            <span class="material-icons-outlined flex items-center pl-2 pr-1 bg-white rounded-l text-gray-500">
                search
            </span>
            <input wire:model.debounce.750ms="search"
                class="block py-2 pl-1 pr-2 w-full rounded-r focus:outline-none"
                placeholder="cari pegawai atau nip" type="text" name="search" id="search">{{-- focus:ring-2 focus:ring-green-300 --}}
        </div>

    {{-- </form> --}}


    @if ($search==null)
        <span class="block text-xs mt-2 text-gray-400 pl-2"> Ditemukan {{$jumlah_pegawai}} pegawai </span>

        {{-- ada kse komen dlu soalnya ba loading --}}
        {{-- @foreach ($unit as $u)
        <div class="p-2 f-opensans my-4">
            <span class="font-semibold uppercase text-sm block mb-3 f-robotocon text-gray-500">{{$u->singkatan}}</span>

            <div class="space-y-3">
                @foreach ($u->anggotaunits as $agu)
                <x-pegawai-list :idpegawai="$agu->pegawai->id" :gravatar="$agu->pegawai->user->gravatar" :nama="$agu->pegawai->nama" :unit="$agu->pegawai->nip" />
                @endforeach
            </div>
        </div>
        @endforeach --}}


    @else

        <span class="block text-xs mt-2 text-gray-400 pl-2"> Ditemukan {{$jumlah_pegawai}} pegawai </span>
        <div class="p-2 f-opensans my-4">
            <div class="space-y-3">
                @foreach ($pegawaisearch as $peg)
                <x-pegawai-list :idpegawai="$peg->id" :gravatar="$peg->user->gravatar" :nama="$peg->nama" :unit="$peg->anggotaunit->unit->singkatan.' - '.$peg->nip" />{{-- $peg->anggotaunit->unit->singkatan.' - '. --}}
                @endforeach
            </div>
        </div>

    @endif
</div>
