<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelFiles;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/import-excel', [ExcelFiles::class, 'import']);
