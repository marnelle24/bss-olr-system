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
    
    
    // 2024 updated routes

    # '<domain>.com/admin/***' route group
    Route::prefix('admin')->group(function () {

        # <domain>.com/admin/dashboard
        Route::get('/dashboard', function() {
            return view('dashboard');
        })->name('admin.dashboard');
        
        # <domain>.com/admin/category
        Route::get('/category', function() {
            return view('admin.category');
        })->name('admin.category');

        // PARTNERS ROUTES
        # <domain>.com/admin/partners
        Route::get('/partners', function() {
            return view('admin.partners.index');
        })->name('admin.partners.list');


        Route::get('/partners/{partner_slug}', function($partnerSlug) {
            return view('admin.partners.single', [
                'slug' => $partnerSlug
            ]);
        })->name('admin.partner.single');

        Route::get('/partner/new', function() {
            return view('admin.partners.new');
        })->name('admin.partner.new');

        // END OF PARTNERS ROUTES

        # <domain>.com/admin/programmes
        Route::get('/programmes', function() {
            return view('admin.programme');
        })->name('admin.programme');


        Route::get('/programmes/{program_slug}', function($slug) {
            if (view()->exists('admin.programme.'.$slug)) {
                return view('admin.programme.'.$slug, ['slug' => $slug]); 
            }
            // If the view doesn't exist or item not found, return a 404 page
            return abort(404);
            
        })->name('admin.programme-item');


        # <domain>.com/admin/users
        Route::get('/users', function() {
            return view('admin.users.index');
        })->name('admin.users.lists');
        
        # <domain>.com/admin/user/new
        Route::get('/user/new', function() {
            return view('admin.users.new');
        })->name('admin.users.new');


        # <domain>.com/admin/users/<user_id>
        Route::get('/users/{user_id}', function( $user_id ) {
            return view('admin.users.edit', [
                'user_id' => $user_id
            ]);
        })->name('admin.users.edit');
        

    });
    
    # REDIRECTION
    Route::get('/admin', function() {
        return redirect()->route('admin.dashboard');
    });
    // EOC - 2024 updated routes


    
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
