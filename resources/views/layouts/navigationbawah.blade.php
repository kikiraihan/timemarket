<nav id="navbarMobile" class="fixed bottom-0 inset-x-0 bg-white 
        flex justify-between text-xs text-gray-700 
        f-scp z-10 ">
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
            person_search
        </span>
        <span class="block">
            Pegawai
        </span>
    </a>
    <a href="{{ route('dashboard') }}" class="w-full text-center block p-3 hover:bg-green-300">
        <span class="block material-icons-outlined text-3xl">
            dashboard
        </span>
        <span class="block">
            Dashboard
        </span>
    </a>
    
    @role('Pegawai')
    <a href="{{ route('mytask.workload') }}" class="w-full text-center block p-3 hover:bg-green-300">
        <span class="block material-icons-outlined text-3xl">
            perm_contact_calendar
        </span>
        <span class="block">
            My Task
        </span>
    </a>
    @endrole
    @role('Chief')
    <a href="{{ route('Katimboard.myteam') }}" class="w-full text-center block p-3 hover:bg-green-300">
        <span class="block material-icons-outlined text-3xl">
            psychology
        </span>
        <span class="block">
            Teamboard
        </span>
    </a>
    @endrole

    <a href="{{ route('beranda') }}" class="w-full text-center block p-3 hover:bg-green-300">
        <span class="block material-icons-outlined text-3xl">
            home
        </span>
        <span class="block">
            Beranda
        </span>
    </a>
</nav>
