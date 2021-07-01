<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
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
    return view('welcome');
});

Route::get('/data_subject', function () {
    return "data_subject";
});
## View 
Route::get('/subjects',[SubjectController::class,'index'])->name('subject');

## Create
Route::get('/subject/create', [SubjectController::class,'create'])->name('subject.create');
Route::post('/subject/store', [SubjectController::class,'store'])->name('subject.store');

## Update
Route::get('/subject/store/{subject_id}', [SubjectController::class,'edit'])->name('subject.edit');
Route::post('/subject/update/{subject_id}', [SubjectController::class,'update'])->name('subject.update');

## Delete
Route::get('/subject/delete/{subject_id}', [SubjectController::class,'destroy'])->name('subjects.delete');

