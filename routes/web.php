<?php

use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Route;
use Database\Factories\DocumentFactory;
use App\Http\Controllers\DocumentController;

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
});


// ------------------- Main routes -------------------
Route::get('/list', [DocumentController::class, 'index'])->name('documentList');
Route::get('/list/{id}', [DocumentController::class, 'show'])->name('documentView');
Route::get('/assign/{userId}', [DocumentController::class, 'assignDocument'])->name('assignDocument');
Route::get('/clear', [DocumentController::class, 'clearAssignments'])->name('clearAssignments');
Route::get('/expire', [DocumentController::class, 'checkExpiration'])->name('checkExpiration');





// ------------------- Fake Data -------------------
Route::get('/document-factory', function() {
    return DocumentFactory::new()->create();
});

Route::get('/user-factory', function() {
    return UserFactory::new()->create();
});