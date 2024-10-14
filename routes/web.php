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

// testing only
// Route::get('/create-permission', function () {
    
//     $user = App\models\User::find(2);
//     $user->assignRole('user');
//     $user->givePermissionTo('programme-create');
//     $user->givePermissionTo('programme-read');
//     $user->givePermissionTo('programme-update');
//     $user->givePermissionTo('programme-delete');

//     Spatie\Permission\Models\Permission::create(['name' => 'dashboard-read']);
//     Spatie\Permission\Models\Role::create(['name' => 'organizer']); // create role

// });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

        // testing only
        // Route::get('/create-roles', function () {
        //     $user = App\models\User::find(auth()->user()->id);
        //     $user->assignRole('administrator');
        // });
    
    // 2024 updated routes

    # '<domain>.com/admin/***' route group
    Route::prefix('admin')->group(function () {

        # <domain>.com/admin/dashboard
        Route::get('/dashboard', function() {
            if(auth()->user()->can('dashboard-read'))
                return view('dashboard');

            return abort(404);

        })->name('admin.dashboard');
        
        # <domain>.com/admin/category
        Route::get('/category', function() {
            if(auth()->user()->can('category-read'))
                return view('admin.category');
        
            return abort(404);

        })->name('admin.category');

        // PARTNERS ROUTES
        # <domain>.com/admin/partners
        Route::get('/partners', function() {
            if(auth()->user()->can('partner-read'))
                return view('admin.partners.index');
            
            return abort(404);

        })->name('admin.partners.list');

        Route::get('/partners/{partner_slug}', function($partnerSlug) {
            if(auth()->user()->can('partner-update'))
                return view('admin.partners.single', [ 'slug' => $partnerSlug ]);

            return abort(404);

        })->name('admin.partner.single');

        Route::get('/partner/new', function() {
            if(auth()->user()->can('partner-create'))
                return view('admin.partners.new');

            return abort(404);

        })->name('admin.partner.new');

        // END OF PARTNERS ROUTES

        # <domain>.com/admin/programmes
        Route::get('/programmes', function() {
            if(auth()->user()->can('programme-read'))
                return view('admin.programme');
            
            return abort(404);

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
            if(auth()->user()->can('user-read'))
                return view('admin.users.index');
            
            return abort(404);

        })->name('admin.users.lists');
        
        # <domain>.com/admin/user/new
        Route::get('/user/new', function() {
            if(auth()->user()->can('user-create'))
                return view('admin.users.new');
        
            return abort(404);

        })->name('admin.users.new');


        # <domain>.com/admin/users/<user_id>
        Route::get('/users/{user_id}', function( $user_id ) {
            if(auth()->user()->can('user-update'))
                return view('admin.users.edit', [ 'user_id' => $user_id ]);
        
            return abort(404);

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
