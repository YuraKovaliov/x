<?php

use App\Http\Controllers\ApiDeskController;
use App\Http\Controllers\CreateTiketController;
use App\Http\Controllers\DeleteTiketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowTiketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::controller(HomeController::class)->group(function (){
    Route::get('/',  'index')->name('home');
    Route::get('/createTiket',  'createTiket')->name('createTiket');
    Route::get('/closeTiket',  'closeTiket')->name('closeTiket');
    Route::post('/selectTiket',  'selectTiket')->name('selectTiket');
    Route::post('/submit-form', 'submitForm');
    Route::patch('/tickets/{id}/open',  'opentiket')->name('tickets.open');
    Route::patch('/tickets/{id}/close',  'close')->name('tickets.close');
    Route::delete('/tickets/{id}',  'delete')->name('tickets.delete');
    Route::get('/api','api');
});


Route::get('/all-tiket',[ApiDeskController::class,'index']);
Route::get('/api/tickets/create', [CreateTiketController::class, 'createTicket']);
Route::get('/api/tickets/delete', [DeleteTiketController::class, 'deleteTicket']);
Route::get('/api/tickets/show', [ShowTiketController::class, 'showTicket']);
