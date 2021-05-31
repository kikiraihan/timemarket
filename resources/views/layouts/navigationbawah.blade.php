<nav id="navbarMobile" class="fixed bottom-0 inset-x-0 bg-white 
        flex justify-between text-xs text-gray-700 
        f-scp  ">
    <a href="{{ route('kalender-utama') }}" class="w-full text-center block p-3 hover:bg-green-300">
        <span class="block material-icons-outlined text-3xl">
            edit_calendar
        </span>
        <span class="block">
            Kalender
        </span>
    </a>
    <a href="{{ route('pegawai') }}" class="w-full text-center block p-3 hover:bg-green-300">
        <span class="block material-icons-outlined text-3xl">
            people_alt
        </span>
        <span class="block">
            Pegawai
        </span>
    </a>
    <a href="{{ route('mytask.workload') }}" class="w-full text-center block p-3 hover:bg-green-300">
        <span class="block material-icons-outlined text-3xl">
            perm_contact_calendar
        </span>
        <span class="block">
            My Task
        </span>
    </a>
    <a href="{{ route('dashboard') }}" class="w-full text-center block p-3 hover:bg-green-300">
        <span class="block material-icons-outlined text-3xl">
            home
        </span>
        <span class="block">
            Beranda
        </span>
    </a>
</nav>
