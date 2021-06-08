<div class="p-4 bg-white">
    <div class="pr-3 max-w-sm mx-auto flex items-center space-x-4">
        <div class="flex-shrink-0">
            <img class="h-14 w-h-14 bg-gray-200 rounded-full shadow-sm"
                src="{{$user->gravatar}}">
        </div>
        <div class="flex-1">
            <div class="font-bold text-black">{{$pegawai->nama}}</div>
            <p class="text-sm text-gray-500">{{$unit->nama}}</p>
        </div>
        @if ($route_workload_id!=null)
        <a href="https://wa.me/6282291501085" class="bg-green-400 rounded-full p-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" style="fill:rgb(255, 255, 255);transform:;-ms-filter:"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.403,5.633C16.708,3.936,14.454,3.001,12.053,3 c-4.948,0-8.976,4.027-8.978,8.977c0,1.582,0.413,3.126,1.198,4.488L3,21.116l4.759-1.249c1.312,0.715,2.788,1.092,4.29,1.093h0.004 l0,0c4.947,0,8.975-4.027,8.977-8.977C21.03,9.585,20.098,7.33,18.403,5.633 M12.053,19.445H12.05 c-1.339-0.001-2.652-0.36-3.798-1.041l-0.272-0.162l-2.824,0.741l0.753-2.753l-0.177-0.282c-0.747-1.188-1.141-2.561-1.141-3.971 c0.002-4.114,3.349-7.461,7.465-7.461c1.993,0.001,3.866,0.778,5.275,2.188c1.408,1.411,2.184,3.285,2.183,5.279 C19.512,16.097,16.165,19.445,12.053,19.445 M16.146,13.856c-0.225-0.113-1.327-0.655-1.533-0.73 c-0.205-0.075-0.354-0.112-0.504,0.112s-0.58,0.729-0.711,0.879s-0.262,0.168-0.486,0.056s-0.947-0.349-1.804-1.113 c-0.667-0.595-1.117-1.329-1.248-1.554s-0.014-0.346,0.099-0.458c0.101-0.1,0.224-0.262,0.336-0.393 c0.112-0.131,0.149-0.224,0.224-0.374s0.038-0.281-0.019-0.393c-0.056-0.113-0.505-1.217-0.692-1.666 C9.627,7.787,9.442,7.845,9.304,7.839c-0.13-0.006-0.28-0.008-0.429-0.008c-0.15,0-0.393,0.056-0.599,0.28 C8.07,8.336,7.491,8.878,7.491,9.982c0,1.104,0.804,2.171,0.916,2.321c0.112,0.15,1.582,2.415,3.832,3.387 c0.536,0.231,0.954,0.369,1.279,0.473c0.537,0.171,1.026,0.146,1.413,0.089c0.431-0.064,1.327-0.542,1.514-1.066 c0.187-0.524,0.187-0.973,0.131-1.067C16.52,14.025,16.369,13.968,16.146,13.856"></path></svg>
        </a>
        @endif
    </div>
</div>
<div id="tabTask" class="flex justify-between bg-white border-t">
    <a href="
    {{ $route_workload_id!=null?route($route_workload,['id'=>$route_workload_id]):route($route_workload) }}
    "
        class="flex-1 flex justify-center p-3 border-b-4 focus:border-green-300 focus:outline-none">
        Workload
    </a>
    <a href="
    {{ $route_team_id!=null?route($route_team,['id'=>$route_team_id]):route($route_team) }}
    "
        class="flex-1 flex justify-center p-3 border-b-4 focus:border-green-300 focus:outline-none">
        Team
    </a>
</div>