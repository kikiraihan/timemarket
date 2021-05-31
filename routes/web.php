<?php

use App\Http\Controllers\myTaskController;
use App\Http\Controllers\PegawaiController;
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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// PEGAWAI
Route::get('/pegawai', [PegawaiController::class,'index'])
    ->middleware(['auth'])->name('pegawai');


// mytask
Route::get('/workload', [myTaskController::class,'workload'])
    ->middleware(['auth'])->name('mytask.workload');

Route::get('/myteam', [myTaskController::class,'myteam'])
    ->middleware(['auth'])->name('mytask.myteam');

// they task
Route::get('/they/workload/{id}', [myTaskController::class,'theyworkload'])
    ->middleware(['auth'])->name('theytask.workload');
Route::get('/they/team/{id}', [myTaskController::class,'theyworkload'])
    ->middleware(['auth'])->name('theytask.theyteam');

// kalender utama
Route::get('/kalender-utama', function () {
    return view('kalenderutama');
})->middleware(['auth'])->name('kalender-utama');

require __DIR__.'/auth.php';
