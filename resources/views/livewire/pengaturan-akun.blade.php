<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <form wire:submit.prevent="update">



        <div class="container mx-auto p-4 flex flex-col space-y-4">

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm block text-center">Avatar</label>
                <!-- component -->
                <x-upload-avatar wire:model.lazy="avatar" :fotoLama="asset($avatarNoRaw)"/>
            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Nama</label>
                <x-input-plain-kiki wire:model.lazy='nama' id="nama" placeholder="..."/>
                <x-error-input :kolom="'nama'"/>
            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Nip</label>
                <x-input-plain-kiki wire:model.lazy="nip" id="nip" placeholder="..."/>
                <x-error-input :kolom="'nip'"/>
            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Nomor WA</label>
                <x-input-plain-kiki wire:model.lazy="nomorwa" id="nomorwa" placeholder="..."/>
                <x-error-input :kolom="'nomorwa'"/>
            </div>


            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Email</label>
                <x-input-plain-kiki wire:model.lazy="email" id="email" placeholder="..." />
                <x-error-input :kolom="'email'"/>
            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Username</label>
                <x-input-plain-kiki wire:model.lazy="username" id="username" placeholder="..."/>
                <x-error-input :kolom="'username'"/>
            </div>


            <div>
                <input class="shadow p-2 w-full rounded focus:outline-none focus:ring-2 
                                focus:ring-green-300  text-white bg-green-500
                                " type="submit" name="submit" id="submit" value="Simpan">
            </div>

        </div>

    </form>




        <hr>

    <form wire:submit.prevent="gantiPassword">

        <div class="container mx-auto p-4 flex flex-col space-y-4 mt-8">
            <h5>Ganti Password</h5>
            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">Password lama</label>
                <x-input-standar-kiki wire:model.lazy="passwordLama" id="passwordLama" type="password" placeholder="..."/>
                <x-error-input :kolom="'passwordLama'"/>
            </div>

            <div>
                <label class="f-roboto ml-1 text-gray-500 text-sm">New Password</label>
                <x-input-standar-kiki wire:model.lazy="passwordBaru" id="passwordBaru" type="password" placeholder="..."/>
                <x-error-input :kolom="'passwordBaru'"/>
            </div>

            <div>
                <input class="shadow p-2 w-full rounded focus:outline-none focus:ring-2 
                                focus:ring-green-300  text-white bg-green-500
                                " type="submit" name="submitPass" id="submitPass" value="Simpan">
            </div>
        </div>

        

    </form>



</div>
