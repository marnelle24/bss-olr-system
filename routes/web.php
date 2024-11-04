<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-payment-requests', [PaymentController::class, 'createPayment'])->name('registration.create-payment');

Route::get('/event/{programCode}', function ($programCode) {
    $bss_event = [];
    // $response = Http::get('https://www.biblesociety.sg/wp-json/bss/v1/bss-events?programCode=' . $programCode.'_');
    
    // temporary data so that it wont keep on fetching API request to BSS site
    $response = '
    {
            "id": "420",
            "wp_post_id": "0",
            "programId": "0",
            "programCode": "D6FI202501_",
            "category": "family, children",
            "lastId": "15",
            "chequeCode": "D6 INDIVIDUAL 2025",
            "chequeHandler": "Joyder Ng",
            "title": "<strong>D6 Family Conference 2025 (25 \u2013 26 July 2025) - Individual<\/strong>",
            "startDate": "2025-07-25",
            "endDate": "2025-07-26",
            "startTime": "09:30:00",
            "endTime": "17:00:00",
            "activeUntil": "2025-01-01 00:00:00",
            "customDate": "25-26 July 2025 <br>\r\n9.30 - 5pm",
            "price": "160",
            "venue": "Paya Lebar Methodist Church,  5 Boundary Rd, Singapore 549954",
            "thumb": "https:\/\/www.biblesociety.sg\/wp-content\/uploads\/2024\/08\/TN-D6-2025-updated.jpg",
            "a3_poster": "https:\/\/www.biblesociety.sg\/wp-content\/uploads\/2024\/08\/2025-D6-POSTER-Tier-2-300ppi.jpg",
            "description": "D6 is an annual family ministry conference focusing on generational discipleship in our churches and homes. The goal of the D6 movement is to equip families and churches to pass on a spiritual legacy to future generations. <br\/><br\/>\r\n\r\nWe meet to understand how we can best apply the principles of Deuteronomy 6 in our ministries, contexts and homes. D6 is an annual family ministry conference focusing on generational discipleship in our churches and homes. The goal of the D6 movement is to equip families and churches to pass on a spiritual legacy to future generations. <br\/><br\/>\r\n\r\nWe meet to understand how we can best apply the principles of Deuteronomy 6 in our ministries, contexts and homes. D6 is an annual family ministry conference focusing on generational discipleship in our churches and homes. The goal of the D6 movement is to equip families and churches to pass on a spiritual legacy to future generations. <br\/><br\/>\r\n\r\nWe meet to understand how we can best apply the principles of Deuteronomy 6 in our ministries, contexts and homes.",
            "full_description": "",
            "note": "",
            "views": "224",
            "order": "3",
            "limit": "-1",
            "invitation_only": "0",
            "promocode": "0",
            "attendance": "0",
            "adminFee": "0",
            "last_update": "2024-10-10 05:52:55",
            "email": "family.min@biblesociety.sg",
            "settings": "{\"extraInfo\":{\"Ministry\":{\"order\":11,\"placeholder\":\"\",\"type\":\"text\",\"label\":\"Ministry\"},\"Nationality\":{\"type\":\"text\",\"order\":12,\"required\":true,\"placeholder\":\"\",\"label\":\"Nationality\"},\"Age\":{\"type\":\"select\",\"order\":13,\"label\":\"Age\",\"option\":{\"Below 21\":\"Below 21\",\"21 - 30\":\"21 - 30\",\"31 - 40\":\"31 - 40\",\"41 - 50\":\"41 - 50\",\"51 - 60\":\"51 - 60\",\"Above 60\":\"Above 60\"}}},\"hide\":\"certificateName,address1, address2,postcode\",\"internationalEvents\":true,\"removeRequired\":[\"address1\",\"address2\"],\"speaker\":\"\"}",
            "customizedForm": "",
            "isGroup": "0",
            "imported": "1"
    }';

    
    $bss_event = json_decode($response, true);
    $bss_event['settings'] = json_decode($bss_event['settings'], true);
    $bss_event['extraFields'] = $bss_event['settings']['extraInfo'];
    
    // if ($response->successful()) 
    //     $bss_event = $response->json();
    // else
    //     $bss_event = [];

    return view('event-single', [ 'bss_event' => $bss_event ]);

})->name('event-profile.public');


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

    // Route::get('/admin/settings/speakers', function() {
    //     return view('/admin/speakers');
    // })->name('settings.admin.speakers');

    // Route::get('/admin/settings/promos', function() {
    //     return view('/admin/promos');
    // })->name('settings.admin.promos');

});
