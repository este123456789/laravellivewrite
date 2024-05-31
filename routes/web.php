<?php

use Illuminate\Support\Facades\Route;
use App\Models\Medication;
use App\Http\Controllers\MedicationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/detail/id/{id}',[MedicationController::class,'detail'] );
Route::get('/medications',[MedicationController::class,'alljson'] );
Route::any('/guardar',[MedicationController::class,'save'] );

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        $medication = Medication::all(); 

        return view('livewire.show-medications', ['medication' => $medication]);
    })->name('dashboard');
});
