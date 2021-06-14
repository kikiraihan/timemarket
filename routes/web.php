<?php

use App\Http\Controllers\CrudProkerController;
use App\Http\Controllers\CrudTaskController;
use App\Http\Controllers\KalenderUtamaController;
use App\Http\Controllers\KepalaTimBoardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// function redirectTohttps() {
//     if($_SERVER[‘HTTPS’]!=”on”) 
//     {
//     $redirect= “https://”.$_SERVER[‘HTTP_HOST’].$_SERVER[‘REQUEST_URI’];
//     header(“Location:$redirect”); 
//     } 
// }




Route::get('/coba', function () 
{
    // $tim=App\Models\Tim::find(1);     
    // $tim->anggotatims()->detach(7);
    // foreach($tim->getTugasByIdPegawai((7)) as $tugasHapus)
    // $tugasHapus->delete();
    
});



Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/setting', function () {
    return view('pengaturanAkun');
})->middleware(['auth'])->name('setting');


// Route::get('/setting', function () {
//     return view('pengaturanAkun');
// })->middleware(['auth'])->name('setting');




// PEGAWAI
Route::get('/pegawai', [PegawaiController::class,'index'])
    ->middleware(['auth'])->name('pegawai');


// HALAMAN TASK
// mytask
Route::get('/workload', [TaskController::class,'workload'])
    ->middleware(['auth'])->name('mytask.workload');
Route::get('/myteam', [TaskController::class,'myteam'])
    ->middleware(['auth'])->name('mytask.myteam');
// they task
Route::get('/they/workload/{id}', [TaskController::class,'theyworkload'])
    ->middleware(['auth'])->name('theytask.workload');
Route::get('/they/team/{id}', [TaskController::class,'theyteam'])
    ->middleware(['auth'])->name('theytask.theyteam');
// show team
Route::get('team/show/{id}/{id_pegawai}', [TaskController::class,'showTeam'])
    ->middleware(['auth'])->name('showteam');

// CRUD TASK
Route::get('/task/create', [CrudTaskController::class,'create'])
->middleware(['role:Chief'])->name('task.create');
Route::get('/task/create-byid/{id_proker}', [CrudTaskController::class,'createById'])
->middleware(['role:Chief|Pegawai'])->name('task.create.byid');
Route::get('/task/edit/{id}', [CrudTaskController::class,'edit'])
->middleware(['role:Chief|Pegawai'])->name('task.edit');


// HALAMAN KEPALA TIM BOARD
Route::get('/katimboard', [KepalaTimBoardController::class,'myteam'])
->middleware(['role:Chief'])->name('Katimboard.myteam');
Route::get('/katimboard/show/{id}', [KepalaTimBoardController::class,'showteam'])
->middleware(['role:Chief|Pegawai'])->name('Katimboard.showteam');

// CRUD PROKER
Route::get('/proker/create', [CrudProkerController::class,'create'])
->middleware(['role:Chief'])->name('proker.create');
Route::get('/proker/edit/{id}', [CrudProkerController::class,'edit'])
->middleware(['role:Chief|Pegawai'])->name('proker.edit');


// HALAMAN KALENDER UTAMA
Route::get('/kalender-utama',KalenderUtamaController::class)
->middleware(['auth'])->name('kalender-utama');



// ADMIN

Route::get('/pegawai/create', function () {
    return view('admin.pegawai-create');
})->middleware(['auth'])->name('pegawai.create');



require __DIR__.'/auth.php';



// debug
// Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//     var_dump($query->sql);
//     var_dump($query->bindings);
//     var_dump($query->time);
// });