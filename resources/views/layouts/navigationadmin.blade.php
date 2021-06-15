<nav class="flex justify-between px-4 py-1 {{$warna}} shadow items-center">
    <div class="inline-flex items-center ">
        @isset($kata)
            <span class="f-robotocon capitalize text-lg ">{{$kata}}</span>
            {{-- text-green-500 --}}
        @else
        <img src="{{ asset('assets_kiki/TIME_MARKET_logo.svg') }}" class="transform w-32">
        @endisset
    </div>
    <div class="inline-flex items-center justify-center space-x-2">
        @role('Chief')
        <a href="{{ route('task.create') }}" class="shadow flex items-center rounded-full text-green-600 h-9 w-9 justify-center">
            <span class="material-icons-outlined p-1">
                add
            </span>
        </a>
        @endrole

        <button type="button" class="
        ini-tombol-sidebar
        p-2 rounded-md
        text-green-600  hover:bg-gray-100 
        focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white
        " aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!-- Hamburger -->
            <span class="material-icons-outlined block text-3xl">
                menu
            </span>
            <!-- x -->
            <span class="material-icons-outlined hidden text-3xl">
                close
            </span>            
        </button>
    </div>
</nav>



<!-- sidebar -->
<div class="ini-sidebar min-h-screen w-64 px-2 py-7 bg-gradient-to-br from-white to-green-100 mb-24
absolute inset-y-0 left-0 transform -translate-x-full transition duration-200 ease-in-out z-10
">
<!-- md:relative md:translate-x-0  -->
    <div class="flex items-center space-x-2">
        <span class="bg-white my-2">
            <img src="{{Auth::user()->avatar}}" class="object-cover w-16 h-16 shadow rounded-full">
        </span>
        <span class="py-2 text-sm f-roboto">
            {{Auth::user()->username}} <br>
            <span class="f-robotomon text-xs">{{Auth::user()->email}}</span><br>
            <span class="bg-blue-400 f-roboto text-xs text-gray-50 p-0.5 rounded">
                {{Auth::user()->getRoleNames()[0]}}
            </span>
        </span>
    </div>
    <hr>
    <br>
    
    {{-- <a href="#" class="block py-2.5 px-4 hover:bg-green-300 transition duration-200 rounded">
        <span class="material-icons-outlined ">notifications</span>
        Notifikasi
    </a>
    <a href="#" class="block py-2.5 px-4 hover:bg-green-300 transition duration-200 rounded">
        <span class="material-icons-outlined ">admin_panel_settings</span>
        Administrator
    </a> --}}

    @hasanyrole('Admin|Pegawai')
    <a href="{{ route('pegawai.crud') }}" class="block py-2.5 px-4 hover:bg-green-300 transition duration-200 rounded">
        <span class="material-icons-outlined ">table_rows</span>
        Data Pegawai
    </a>
    @endhasanyrole

    <a href="{{ route('setting') }}" class="block py-2.5 px-4 hover:bg-green-300 transition duration-200 rounded">
        <span class="material-icons-outlined ">manage_accounts</span>
        Setting
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="#" class="block py-2.5 px-4 hover:bg-green-300 transition duration-200 rounded"
        :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            <span class="material-icons-outlined ">logout</span>
            {{ __('Log Out') }}
        </a>
    </form>

    

</div>


<script>
    // ambil semua
    const btn = document.querySelector('.ini-tombol-sidebar');
    const sidebar = document.querySelector('.ini-sidebar');

    // toggle
    toggle_burger();

    function toggle_burger()
    {
        btn.addEventListener('click', ()=>{
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('shadow');
        })
    }
</script>