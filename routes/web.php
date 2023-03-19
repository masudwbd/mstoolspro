<?php

use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\SearchController;
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

//ticket
Route::get('/open-ticket',  [App\Http\Controllers\Frontend\UserController::class, 'open_ticket'])->name('user.open_ticket');
Route::get('/create-ticket',  [App\Http\Controllers\Frontend\UserController::class, 'create_ticket'])->name('user.create.ticket');
Route::post('/store-ticket',  [App\Http\Controllers\Frontend\UserController::class, 'store_ticket'])->name('user.ticket.store');
Route::get('/show-ticket/{id}',  [App\Http\Controllers\Frontend\UserController::class, 'show_ticket'])->name('user.ticket.show');


//stripe payment
Route::post('/payment/{id}',  [StripeController::class, 'payment'])->name('payment');
Route::get('/payment-success/{session_id}',  [StripeController::class, 'success'])->name('payment.success');
Route::get('/payment-cancel',  [StripeController::class, 'cancel'])->name('payment.cancel');


//store reviews
Route::post('/store-review',  [ReviewController::class, 'store'])->name('review.store');


//blog page
Route::get('/blogs-list',  [HomeController::class, 'blogs'])->name('frontend.blogs.all');

//about us page
Route::get('/about-us',  [HomeController::class, 'about_us'])->name('frontend.about_us');

//contact us page
Route::get('/contact-us',  [HomeController::class, 'contact_us'])->name('frontend.contact_us');
Route::post('/contact-message-store',  [HomeController::class, 'contact_message_store'])->name('contact.message.store');


//search
Route::get('/search', [SearchController::class, 'search'])->name('search');

