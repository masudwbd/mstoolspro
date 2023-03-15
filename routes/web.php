<?php

use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\ToolListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
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




// tools 
Route::get('/all-tools',[ToolListController::class,'alltools'])->name('tools.all');
Route::get('/free-tools',[ToolListController::class,'freetools'])->name('tools.free');
Route::get('/paid-tools',[ToolListController::class,'paidtools'])->name('tools.paid');
Route::get('/tools-category/{id}',[ToolListController::class,'categorytools'])->name('tools.category');
Route::get('/tool-details/{id}', [App\Http\Controllers\Frontend\ToolDetailsController::class, 'index'])->name('tool.details');

//download tool
Route::get('/tool-details/{id}', [App\Http\Controllers\Frontend\ToolDetailsController::class, 'index'])->name('tool.details');
Route::get('/download/{id}',  [App\Http\Controllers\Frontend\DownloadController::class, 'download'])->name('download');


//user profile
Route::get('/user',  [App\Http\Controllers\Frontend\UserController::class, 'index'])->name('user.profile');
Route::post('/user-image-add',  [App\Http\Controllers\Frontend\UserController::class, 'store_picture'])->name('user.picture.add');
Route::post('/user-image-update',  [App\Http\Controllers\Frontend\UserController::class, 'update_picture'])->name('user.picture.update');


//stripe payment
Route::post('/payment/{id}',  [StripeController::class, 'payment'])->name('payment');
Route::get('/payment-success',  [StripeController::class, 'success'])->name('payment.success');
Route::get('/payment-cancel',  [StripeController::class, 'cancel'])->name('payment.cancel');


//store reviews
Route::post('/store-review',  [ReviewController::class, 'store'])->name('review.store');