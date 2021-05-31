<div class=" p-4 bg-white">
    <div class="pl-0 max-w-sm mx-auto flex items-center space-x-4">
        <div class="flex-shrink-0">
            <img class="h-14 w-h-14 bg-gray-200 rounded-full shadow-sm"
                src="{{$user->gravatar}}">
        </div>
        <div class="flex-1">
            <div class="font-bold text-black">{{$pegawai->nama}}</div>
            <p class="text-sm text-gray-500">{{$unit->nama}}</p>
        </div>
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