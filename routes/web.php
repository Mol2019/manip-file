<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('file-import-export', [App\Http\Controllers\FileController::class, 'fileImportExport']);
Route::post('file-import', [App\Http\Controllers\FileController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [App\Http\Controllers\FileController::class, 'fileExport'])->name('file-export');
