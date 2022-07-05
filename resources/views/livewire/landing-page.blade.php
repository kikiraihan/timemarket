<x-slot name="stylehalaman">
    {{-- Stop trying to control. --}}
    
    @livewireStyles
    <style>
        /* Browser mockup code
            * Contribute: https://gist.github.com/jarthod/8719db9fef8deb937f4f
            * Live example: https://updown.io
        */

        .browser-mockup {
            border-top: 2em solid rgba(230, 230, 230, 0.7);
            position: relative;
            /* height: 60vh; */
        }

        .browser-mockup:before {
            display: block;
            position: absolute;
            content: "";
            top: -1.25em;
            left: 1em;
            width: 0.5em;
            height: 0.5em;
            border-radius: 50%;
            background-color: #f44;
            box-shadow: 0 0 0 2px #f44, 1.5em 0 0 2px #9b3, 3em 0 0 2px #fb5;
        }

        .browser-mockup>* {
            display: block;
        }

    </style>
</x-slot>
<x-slot name="scripthalaman">
    @livewireScripts
    {{-- @include('layouts.scriptsweetalert') --}}
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    {{-- untuk counter --}}
    <script>
        const counters = document.querySelectorAll('.value');
        const speed = 200;

        counters.forEach( counter => {
        const animate = () => {
            const value = +counter.getAttribute('akhi');
            const data = +counter.innerText;
            
            const time = value / speed;
            if(data < value) {
                counter.innerText = Math.ceil(data + time);
                setTimeout(animate, 1);
                }else{
                counter.innerText = value;
                }
            
        }
        
        animate();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.livewire.emit('terkonfirmasiInisiasiNilai')
        });
    </script>
</x-slot>






<div class="container w-full md:max-w-4xl mx-auto pt-20">

    <section class="bg-gray-100 border-b pt-8" wire:ignore>
        <div class="text-center px-3 lg:px-0">
            <h1 class="my-4 text-4xl lg:text-5xl font-black leading-tight">
                Selamat <span class="text-lime-600"> Datang </span> 🙏🏻
            </h1>
            <p class="leading-normal text-gray-800 text-base md:text-xl lg:text-2xl mb-8">
                Time Market | BI Inovasi
            </p>
        </div>
        <!-- This is an example component -->
        <div class="max-w-2xl mx-auto px-4 md:px-0">

            <div id="default-carousel" class="relative" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="overflow-hidden relative shadow-lg h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <span class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
                        <img src="{{ asset('asset_landing/1.jpeg') }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2">
                    </div>
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('asset_landing/kpw.jpeg') }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('asset_landing/l.jpeg') }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2">
                    </div>
                    
                </div>
                <!-- Slider indicators -->
                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="2"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="hidden">Previous</span>
                    </span>
                </button>
                <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="hidden">Next</span>
                    </span>
                </button>
            </div>
        </div>

        {{-- counter --}}
        <div class="items-center w-full mx-auto content-end px-12 my-14 flex space-x-2 justify-center">
            <div class="container  mx-auto grid">
            
            
                <!-- Cards -->
                <div class="grid gap-4 grid-cols-2">
                    <!-- Card -->
                    @foreach ([
                        ['icon'=>'fas fa-users','title'=>'Pegawai','counter'=>$peg,'warna'=>'blue'],
                        ['icon'=>'fas fa-shoe-prints','title'=>'Aktivitas','counter'=>$ak,'warna'=>'orange'],
                    ] as $item)
                    <div class="flex items-center p-2 rounded-lg justify-center">
                        <div class="p-3 mr-4 text-{{$item['warna']}}-500 bg-{{$item['warna']}}-100 rounded-full dark:text-{{$item['warna']}}-100 dark:bg-{{$item['warna']}}-500">
                            <i class="{{$item['icon']}}"></i>
                        </div>
                        <div>
                            <p class="mb-2 if @if ($item['title']=='Non Penerima Aktif') text-xs @else text-sm @endif font-medium text-gray-600 dark:text-gray-400">
                                {{$item['title']}}
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 value" akhi='{{$item['counter']}}'>
                                0
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
    
            </div>
            
        </div>


        <div class="text-center mb-44">
            <a class="cursor-pointer bg-gradient-to-r from-orange-300 to-amber-300 hover:underline text-gray-800 font-extrabold rounded py-3 px-4 shadow-lg" href="{{ route('login') }}">
                <span class="text-xl">Masuk</span>
            </a>
        </div>


    </section>

    {{-- <section class="bg-gray-100 border-b py-8">
        <h2 class="w-full my-2 text-4xl font-black leading-tight text-center text-gray-800">
            Aktivitas
        </h2>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto bg-gradient-to-r from-cyan-500 to-blue-500 w-64 opacity-25 my-0 py-0 rounded-t">
            </div>
        </div>

        <div class="items-center w-full mx-auto content-end px-12 mb-14 ">
            <div class="browser-mockup flex-1 bg-white rounded shadow-xl md:col-span-2">
                @include('layouts.landing.layar-absen',['isiTabel'=>$absensi,'sekarang'=>$sekarang])
            </div>
        </div>
    </section> --}}


</div>
