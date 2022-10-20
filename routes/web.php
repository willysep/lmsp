<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LettersController;

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
    return view('home', [
        'contentHeader' => 'Dashboard',
        'breadcrumb' => 'Home',
        'breadcrumbLink' => '/',
        'active' => []
    ]);
});

Route::resource('letter', LettersController::class);
Route::get('letter/type/{typeCode}', [LettersController::class, 'typeShow'])->name('letter.type');
Route::post('letter/cancel', [LettersController::class, 'cancel'])->name('letter.cancel');
Route::post('letter/upload', [LettersController::class, 'upload'])->name('letter.upload');
