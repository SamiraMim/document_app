<?php

use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Route;
use Database\Factories\DocumentFactory;
use App\Http\Controllers\DocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



// ------------------- Main routes -------------------
Route::get('/', [DocumentController::class, 'index']);
Route::get('/list/assigned', [DocumentController::class, 'getAssignedDocuments'])->name('getAssignedDocuments');
Route::get('/panel/{userId}/{id}', [DocumentController::class, 'documentView'])->name('documentView');
Route::post('/panel/status/{id}', [DocumentController::class, 'updateDocumentStatus'])->name('updateDocumentStatus');

Route::get('/assign/{userId}', [DocumentController::class, 'assignDocument'])->name('assignDocument');
Route::get('/panel/{userId}', [DocumentController::class, 'getUserAssignment'])->name('getUserAssignment');

Route::get('/clear', [DocumentController::class, 'clearAssignments'])->name('clearAssignments');
Route::get('/expire', [DocumentController::class, 'checkExpiration'])->name('checkExpiration');





// ------------------- Fake Data -------------------
Route::get('/document-factory', function() {
    return DocumentFactory::new()->create();
});

Route::get('/user-factory', function() {
    return UserFactory::new()->create();
});