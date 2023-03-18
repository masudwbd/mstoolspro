<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessagesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\ToolsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\OrderController;
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


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'is_admin'], function(){

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
    
    Route::group(['prefix'=>'freetools'],function(){
        Route::get('/',[ToolsController::class,'index'])->name('tools.index');
        Route::get('/add',[ToolsController::class,'add'])->name('tools.add');
        Route::post('/store',[ToolsController::class,'store'])->name('tools.store');
        Route::get('/edit/{id}',[ToolsController::class,'edit']);
        Route::post('update',[ToolsController::class,'update'])->name('tools.update');
        Route::get('delete/{id}',[ToolsController::class,'delete'])->name('tools.delete');
    });

    Route::group(['prefix'=>'ticket'],function(){
        Route::get('/admin-ticket',[TicketController::class,'index'])->name('admin.ticket.index');
        Route::get('/admin-ticket-show/{id}',[TicketController::class,'ticket_show'])->name('admin.ticket.show');
        Route::post('/admin-ticket-reply',[TicketController::class,'ticket_reply'])->name('admin.ticket.reply');
        // Route::get('/admin-ticket-close/{id}',[TicketController::class,'ticket_close'])->name('admin.ticket.close');
        // Route::get('/ticket-delete/{id}/',[TicketController::class,'destroy'])->name('ticket.delete');
        // Route::get('edit/{id}/',[PageController::class,'edit'])->name('page.edit');
        // Route::post('update/{id}/',[PageController::class,'update'])->name('page.update');
    });

    
    //orders
    Route::get('/orders',  [OrderController::class, 'index'])->name('orders.all');
    Route::get('/orders-delivered',  [OrderController::class, 'delivered'])->name('order.delivered');
    Route::get('/orders-not-delivered',  [OrderController::class, 'not_delivered'])->name('order.not.delivered');


    //blogs

    Route::get('/blogs',  [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog-add',  [BlogController::class, 'add'])->name('blog.add');
    Route::post('/blog-store',  [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog-edit/{id}',  [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog-update',  [BlogController::class, 'update'])->name('blog.update');
    Route::get ('/blog-delete/{id}',  [BlogController::class, 'delete'])->name('blog.delete');


    //users
    Route::get('/all-users',  [UserController::class, 'index'])->name('users.index');


    //contact messages
    Route::get('/contact-messages',  [ContactMessagesController::class, 'index'])->name('contact.messages.index');

});
