<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', WelcomeController::class);

Route::controller(ContactController::class)->group(function () {
    Route::get('/contacts', 'index' )->name('contacts.index');
    Route::get('/contacts/create', 'create')->name('contacts.create');
    Route::get('/contacts/{id}', 'show')->name('contacts.show');   
});




Route::fallback(function () {
    return "<h1>Sorry, the page does not exist</h1>";
});



