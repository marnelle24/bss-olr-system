<?php

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    
    // Admin Routes declaration
    require __DIR__.'/admin.php';
    
    # REDIRECTION
    Route::get('/admin', function() {
        return redirect()->route('admin.dashboard');
    });
    
    //=========================================
    // code below to be deleted/updated
    //=========================================

    Route::get('/admin/settings/speakers', function() {
        return view('/admin/speakers');
    })->name('settings.admin.speakers');

    Route::get('/admin/settings/promos', function() {
        return view('/admin/promos');
    })->name('settings.admin.promos');

});
