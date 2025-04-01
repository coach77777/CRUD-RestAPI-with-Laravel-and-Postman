<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SclassController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SectionController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Student Class Routes

Route::get('/class', [SclassController::class, 'Index']);
Route::post('/class/store', [SclassController::class, 'Store']);
Route::get('/class/edit/{id}', [SclassController::class, 'Edit']);
Route::post('/class/update/{id}', [SclassController::class, 'Update']);
Route::delete('/class/delete/{id}', [SclassController::class, 'Delete']);


// Student Class Routes
Route::get('/subject', [SubjectController::class, 'Index']);
Route::post('/subject/store', [SubjectController::class, 'Store']);
Route::get('/subject/edit/{id}', [SubjectController::class, 'Edit']);
Route::post('/subject/update/{id}', [SubjectController::class, 'Update']);
Route::delete('/subject/delete/{id}', [SubjectController::class, 'Delete']);


// SSection Class Routes
Route::get('/section', [SectionController::class, 'Index']);
Route::post('/section/store', [SectionController::class, 'Store']);
Route::get('/section/edit/{id}', [SectionController::class, 'Edit']);
Route::post('/section/update/{id}', [SectionController::class, 'Update']);
Route::delete('/section/delete/{id}', [SectionController::class, 'Delete']);
