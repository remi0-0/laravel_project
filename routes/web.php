<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ContactController;

// Route::get('/', function () {
//     return view('index');
// });

Route::view('/', 'index');
Route::get('/', [TopController::class, 'index'])->name('top');

//to do list
Route::prefix('plans')
->name('plans.') //ルート名
->controller(PlanController::class) 
->group(function(){
    Route::get('/', 'index')->name('index'); //名前つきルート
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/finish/{id}', 'finish')->name('finish');
    Route::get('/complete', 'complete')->name('complete');
    Route::get('/restore/{id}', 'restore')->name('restore');
});

//お問い合わせ
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact/sendmail', [ContactController::class, 'sendmail']);
Route::get('/contact/complate', [ContactController::class, 'complate'])->name('contact.complate');
