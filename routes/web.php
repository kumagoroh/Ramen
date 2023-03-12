<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\BooksController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log/{message}', function ($message) {
    Log::info("Hello my log, message: $message");
    return view('welcome');
});

Route::get('/exception/{message}', function ($message) {
    throw new Exception("Intentional exception, message: $message");
});

Route::get('person', [PersonController::class, 'index']);

Route::get('person/find',  [PersonController::class, 'find']);
Route::post('person/find', [PersonController::class, 'search']);

Route::get('person/add', [PersonController::class, 'add']);
Route::post('person/add', [PersonController::class, 'create']);

Route::get('person/editindex', [PersonController::class, 'editindex']);
Route::post('person/editindex', [PersonController::class, 'edit']);

Route::get('person/edit', [PersonController::class, 'edit']);
Route::post('person/edit', [PersonController::class, 'update']);

Route::get('person/delindex', [PersonController::class, 'delindex']);
Route::post('person/delindex', [PersonController::class, 'delete']);

Route::get('person/del', [PersonController::class, 'delete']);
Route::post('person/del', [PersonController::class, 'remove']);

Route::get('books', [BooksController::class, 'index']);

Route::get('books/find',  [BooksController::class, 'find']);
Route::post('books/find', [BooksController::class, 'search']);

Route::get('books/add', [BooksController::class, 'add']);
Route::post('books/add', [BooksController::class, 'create']);

Route::get('books/editindex', [BooksController::class, 'editindex']);
Route::post('books/editindex', [BooksController::class, 'edit']);

Route::get('books/edit', [BooksController::class, 'edit']);
Route::post('books/edit', [BooksController::class, 'update']);

Route::get('books/delindex', [BooksController::class, 'delindex']);
Route::post('books/delindex', [BooksController::class, 'delete']);

Route::get('boks/del', [BooksController::class, 'delete']);
Route::post('books/del', [BooksController::class, 'remove']);
