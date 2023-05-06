<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactNoteController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\NestedRules;

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


Route::get('/contacts',[ContactController::class, 'index' ])->name('contacts.index');
Route::post('/contacts',[ContactController::class, 'store' ])->name('contacts.store');

Route::get('/contacts/create',[ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{id}',[ContactController::class, 'show'])->name('contacts.show');   
Route::get('/contacts/{id}/edit',[ContactController::class, 'edit'])->name('contacts.edit');   
Route::put('/contacts/{id}',[ContactController::class, 'update'])->name('contacts.update');   

Route::resource('/companies', CompanyController::class);
Route::resources([
    '/tags' => TagController::class,
    '/task' => TaskController::class
]);
Route::resource('/activities', ActivityController::class)->except([
    'index',
    'show'
]);

// Nested
Route::resource('/contacts.notes', ContactNoteController::class)->shallow();

Route::fallback(function () {
    return "<h1>Sorry, the page does not exist</h1>";
});



