<footer class="bg-white border-t border-gray-400 shadow">
    <div class="container mx-auto py-8">

        <div class="w-full mx-auto md:flex block space-x-4 max-w-5xl">
            
            <div class="w-full md:w-2/4 mb-7 md:mb-0 px-5 md:px-0">
                <h3 class="font-bold text-gray-900">
                    Tentang
                </h3>
                <p class="text-justify text-sm">
                    Time market adalah aplikasi human resource management pada Kantor Perwakilan <a class="text-sky-700 " href="https://www.bi.go.id/id/tentang-bi/profil/organisasi/Pages/Kantor-Perwakilan-Gorontalo.aspx">Bank Indonesia</a>  Provinsi Gorontalo.
                </p>
            </div>

            <div class="flex w-full md:w-1/4 mb-7 md:mb-0">
                <div class="px-8">
                    <h3 class="font-bold text-gray-900">
                        Instagram
                    </h3>
                    <ul class="list-reset items-center text-sm pt-3">
                        @foreach ([
                            ['link'=>'https://www.instagram.com/bank_indonesia_gorontalo/?hl=id', 'icon'=>'fab fa-instagram', 'title'=>'@bank_indonesia_gorontalo','warna'=>'purple'],
                        ] as $item)
                            <li class="text-{{$item['warna']}}-900 text-gray-600 items-center flex space-x-2">
                                <i class="{{$item['icon']}} text-lg"></i>
                                <a class="no-underline hover:text-underline py-1 text-xs" href="{{$item['link']}}">
                                    {{$item['title']}}
                                </a>
                            </li>
                            
                        @endforeach
                </div>
            </div>

            <div class="flex w-full md:w-1/4 mb-7 md:mb-0">
                <div class="px-8">
                    <h3 class="font-bold text-gray-900">Media sosial lainnya</h3>
                    <ul class="list-reset items-center text-sm pt-3">
                        @foreach ([
                            ['link'=>'https://www.youtube.com/channel/UCjIVcCJeU-cCkX1jxLBA15Q', 'icon'=>'fab fa-youtube', 'title'=>'Bank Indonesia Gorontalo','warna'=>'red'],
                        ] as $item)
                            <li class="text-{{$item['warna']}}-900 text-gray-600 items-center flex space-x-2">
                                <i class="{{$item['icon']}} text-lg"></i>
                                <a class="no-underline hover:text-underline py-1 text-xs" href="{{$item['link']}}">
                                    {{$item['title']}}
                                </a>
                            </li>
                            
                        @endforeach
                </div>
            </div>
        </div>



    </div>
</footer>