<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ProgrammeItemController;
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

// public routes
Route::get('/', [FrontpageController::class, 'index'])->name('home');

// Route to create the Payment Request in HitPay API
Route::get('/create-payment-requests', [PaymentController::class, 'createPayment'])->name('registration.create-payment');

// Route to callback to handle the after full payment transaction process.
Route::get('/success-payment/{programCode}', [PaymentController::class, 'successPayment'])->name('registration.success-payment');

Route::get('/event/{programCode}', [ProgrammeItemController::class, 'eventProgramme'])->name('event-profile.public');

Route::get('/events', [ProgrammeItemController::class, 'AllEvents'])->name('events.public');

Route::get('/{programmeType}', [ProgrammeController::class, 'index'])->name('programme.public');

// End of Public Routes
// Authenticated Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Admin Routes declaration
    require __DIR__.'/admin.php';

    # REDIRECTION
    Route::get('/admin', function() {
        return redirect()->route('admin.dashboard');
    });
});
