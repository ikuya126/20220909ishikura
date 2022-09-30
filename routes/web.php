<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/',[TaskController::class,'index'])->middleware('auth');
Route::post('/create',[TaskController::class,'create']);
Route::put('/{id}',[TaskController::class,'update']);
Route::delete('/{id}',[TaskController::class,'delete']);
Route::get('/findpage',[TaskController::class,'findpage'])->name('findpage');
Route::get('/find',[TaskController::class,'find']);
Route::get('/logout',[TaskController::class,'logout']);

