<div>
    {{-- The Master doesn't talk, he acts. --}}




    {{-- <div class="text-2xl f-roboto px-4 mt-3">Tugas Baru</div> --}}



    <form wire:submit.prevent="{{$metode}}">

        <div class="container mx-auto p-4 flex flex-col space-y-4">

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Judul</label>
                <input wire:model.lazy="judul" id="judul"
                    class="shadow text-sm  p-2 w-full rounded 
                    focus:outline-none focus:ring-2 focus:ring-green-300"
                    placeholder="Konsumsi kegiatan.." type="text">
                    <x-error-input :kolom="'judul'"/>
                    
                    {{-- @error('password') <span class="text-xs text-red-300">{{ $message }}</span> @enderror --}}

            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Load</label>
                <select wire:model.lazy="level" id="level"
                    class="block shadow bg-white text-sm p-2 w-full rounded focus:outline-none 
                    focus:ring-2 focus:ring-green-300" aria-label="Default select example">
                    <option value="" hidden selected>Pilih bobot</option>
                    <option class="w-full" value="1">1</option>
                    <option class="w-full" value="2">2</option>
                    <option class="w-full" value="3">3</option>
                </select>
                <x-error-input :kolom="'level'"/>
            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Tanggal mulai</label>
                <input
                    wire:model.lazy="startdate" id="startdate"
                    class="bg-white shadow text-sm  p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-green-300"
                    type="date">
                <x-error-input :kolom="'startdate'"/>
            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Tanggal batas akhir</label>
                <input
                    wire:model.lazy="duedate" id="duedate"
                    class="bg-white shadow text-sm  p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-green-300"
                    type="date">
                <x-error-input :kolom="'duedate'"/>
            </div>


        </div>






        <hr>

        <div class="container mx-auto p-4 flex flex-col space-y-4">
            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Catatan <span
                        class="text-xs">(optional)</span></label>
                <x-textarea-standar-kiki wire:model.lazy="catatan" 
                id="catatan" placeholder="Jangan lupa follow up.."></x-textarea-standar-kiki>
                <x-error-input :kolom="'catatan'"/>
            </div>

            <div>
                <input class="shadow p-2 w-full rounded focus:outline-none focus:ring-2 
                @if($metode=="updateTask")
                focus:ring-yellow-300  text-white bg-yellow-500
                @else
                focus:ring-green-300  text-white bg-green-500
                @endif
                " type="submit" name="submit" id="submit" value="Simpan">
            </div>
        </div>

        

    </form>



</div>
