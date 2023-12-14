<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin_dashboard');
Route::get('/export_excel', [AdminController::class, 'export_excel'])->name('export_excel');
Route::get('/export_pdf', [AdminController::class, 'export_pdf'])->name('export_pdf');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
    Route::get('/show/{book_id}', [MainController::class, 'show'])->name('detail');
    Route::post('/review/create', [ReviewController::class, 'store'])->name('store_review');
    Route::get('/review/{book_id}', [ReviewController::class, 'create'])->name('cerate_review');

});
