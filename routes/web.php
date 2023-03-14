<?php

use App\Http\Controllers\Frontend\ToolListController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Auth::routes(['verify' => true]);



Route::get('/logout', [HomeController::class, 'logout'])->name('logout');


//home page urls

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');




// free tools 

Route::get('/free-tools',[ToolListController::class,'freetools'])->name('tools.free');
Route::get('tool-details/{id}/', [App\Http\Controllers\Frontend\ToolDetailsController::class, 'index'])->name('tool.details');
