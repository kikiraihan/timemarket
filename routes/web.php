<?php

use App\Http\Controllers\CrudProkerController;
use App\Http\Controllers\CrudTaskController;
use App\Http\Controllers\KalenderUtamaController;
use App\Http\Controllers\KepalaTimBoardController;
use App\Http\Controllers\TaskController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Fullpage\Katimboard;
use App\Http\Livewire\LandingPage;
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
    dd(App\Models\Unit::with('anggotaunits.tugasanggotatims')->get());
});



Route::get('/', LandingPage::class)->name('landing');

Route::get('/beranda', function () {
    return view('beranda');
})->middleware(['auth'])->name('beranda');


Route::get('/setting', function () {
    return view('pengaturanAkun');
})->middleware(['auth'])->name('setting');




// PEGAWAI
Route::get('/pegawai', function () {
    return view('pegawai');
})->middleware(['auth'])->name('pegawai');


// HALAMAN TASK
// mytask
Route::get('/workload', [TaskController::class,'workload'])
    ->middleware(['auth','role:Pegawai'])->name('mytask.workload');
Route::get('/myteam', [TaskController::class,'myteam'])
    ->middleware(['auth','role:Pegawai'])->name('mytask.myteam');
// they task
Route::get('/they/workload/{id}', [TaskController::class,'theyworkload'])
    ->middleware(['auth','role:KPw|Chief|Pegawai'])->name('theytask.workload');
Route::get('/they/team/{id}', [TaskController::class,'theyteam'])
    ->middleware(['auth','role:KPw|Chief|Pegawai'])->name('theytask.theyteam');
// show team
Route::get('team/show/{id}/forpegawai/{id_pegawai}', [TaskController::class,'showTeam'])
    ->middleware(['auth','role:KPw|Chief|Pegawai'])->name('showteam');

// CRUD TASK
Route::get('/task/create', [CrudTaskController::class,'create'])
->middleware(['auth','role:Chief'])->name('task.create');
Route::get('/task/create-byid/{id_proker}', [CrudTaskController::class,'createById'])
->middleware(['auth','role:Chief|Pegawai'])->name('task.create.byid');
Route::get('/task/create-byid/{id_proker}/pegawai', [CrudTaskController::class,'createByIdForPegawai'])
->middleware(['auth','role:Chief|Pegawai'])->name('task.create.byid.pegawai');
Route::get('/task/edit/{id}', [CrudTaskController::class,'edit'])
->middleware(['auth','role:Chief|Pegawai'])->name('task.edit');


// HALAMAN KEPALA TIM BOARD
Route::get('/katimboard', Katimboard::class)
->middleware(['auth','role:Chief'])->name('Katimboard.myteam');
Route::get('/katimboard/show/{id}', [KepalaTimBoardController::class,'showteam'])
->middleware(['auth','role:Chief|Pegawai'])->name('Katimboard.showteam');

// CRUD PROKER
Route::get('/proker/create', [CrudProkerController::class,'create'])
->middleware(['auth','role:Chief'])->name('proker.create');
Route::get('/proker/edit/{id}', [CrudProkerController::class,'edit'])
->middleware(['auth','role:Chief|Pegawai|Admin'])->name('proker.edit');
// Route::get('/proker/delete/{id}', [CrudProkerController::class,'delete'])
// ->middleware(['auth','role:Chief|Pegawai'])->name('proker.hapus');


// HALAMAN KALENDER UTAMA
Route::get('/kalender-utama',KalenderUtamaController::class)
->middleware(['auth'])->name('kalender-utama');



// HALAMAN DASHBOARD
Route::get('/dashboard', Dashboard::class)
->middleware(['auth'])->name('dashboard');





// ADMIN
Route::get('/pegawai/crud', function () {
    return view('admin.pegawai-main');
})->middleware(['auth','role:Admin'])->name('pegawai.crud');

Route::get('/unit/crud', function () {
    return view('admin.unit-main');
})->middleware(['auth','role:Admin'])->name('unit.crud');

Route::get('/proker/crud', function () {
    return view('admin.proker-main');
})->middleware(['auth','role:Admin'])->name('proker.crud');





require __DIR__.'/auth.php';



// debug
// Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//     var_dump($query->sql);
//     var_dump($query->bindings);
//     var_dump($query->time);
// });