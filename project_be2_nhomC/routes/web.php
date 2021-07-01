<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CustomAuthController;

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
})->name('welcome');

Route::get('/data_subject',[SubjectController::class,'getall']);

Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('watchdata', [SubjectController::class, 'getall'])->name('watchdata');

Route::get('add', [SubjectController::class, 'add_view'])->name('add');
Route::post('add_data', [SubjectController::class, 'add'])->name('add_custom');   


