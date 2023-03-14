<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ToolsController;
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

Route::get('/admin-home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('verified')->middleware('is_admin');

Route::group(['prefix'=>'settings'],function(){
    Route::get('/',[SettingsController::class,'index'])->name('settings.index');
    Route::post('update/{id}',[SettingsController::class,'update'])->name('settings.update');
});

Route::group(['prefix'=>'categories'],function(){
    Route::get('/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/add',[CategoryController::class,'add'])->name('categories.add');
    Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{id}',[CategoryController::class,'edit']);
    Route::post('update',[CategoryController::class,'update'])->name('categories.update');
    Route::get('delete/{id}',[CategoryController::class,'delete'])->name('categories.delete');
});

Route::group(['prefix'=>'tools'],function(){
    Route::get('/',[ToolsController::class,'index'])->name('tools.index');
    Route::get('/add',[ToolsController::class,'add'])->name('tools.add');
    Route::post('/store',[ToolsController::class,'store'])->name('tools.store');
    Route::get('/edit/{id}',[ToolsController::class,'edit']);
    Route::post('update',[ToolsController::class,'update'])->name('tools.update');
    Route::get('delete/{id}',[ToolsController::class,'delete'])->name('tools.delete');
});
