<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HotelPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelPricesApi;
use App\Http\Controllers\RecordVisitAndEvents;

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
    return view('contact');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/privacy', function () {
    return view('privacy', ['app_url' => env('APP_URL')]);
});

// HOTEL PRICE SEARCH
Route::get('/hotels/prices', function (Request $request) {

    $checkin_from = ! is_null(Carbon::parse($request->checkin_from)) ? Carbon::parse($request->checkin_from) : Carbon::parse(date('Y-m-d', time()))->addDays(1);
    $checkin_to = ! is_null(Carbon::parse($request->checkin_to)) ? Carbon::parse($request->checkin_to) : Carbon::parse($checkin_from)->copy()->addDays(6);
    $children_ages = !is_null($request->children_ages) ? json_decode($request->children_ages) : [];
    $total_adults = !is_null($request->total_adults) ? $request->total_adults : 2;
    $total_children = !is_null($request->total_children) ? $request->total_children : 0;

    return HotelPricesApi::getHotelPricesByBookingEngine($request->url_hash, $checkin_from->format('Y-m-d'), $checkin_to->format('Y-m-d'), $total_adults, $total_children, $children_ages);

});

// STORE EVENT
Route::get('/events/store', function (Request $request) {
    // Record just a regular visit
    
    $event = new RecordVisitAndEvents;
    $event->store($request, 'BOOKING_CLICK', (isset($request->event) ? $request->event : []));
});

// HOTELS
Route::get('/hotels', function () {
    return view('hotels_list', ['hotels' => HotelPage::getHotelList()]);
});
Route::get('/hotel/rush-creek-lodge-at-yosemite', function () {
    return view('hotel', HotelPage::getHotelPageData('rush-creek-lodge-at-yosemite'));
});
Route::get('/hotel/stanyan-park-san-francisco', function () {
    return view('hotel', HotelPage::getHotelPageData('stanyan-park-san-francisco'));
});
Route::get('/hotel/barcelona-hotel-colonial', function () {
    return view('hotel', HotelPage::getHotelPageData('barcelona-hotel-colonial'));
});
Route::get('/hotel/hayes-valley-inn', function () {
    return view('hotel', HotelPage::getHotelPageData('hayes-valley-inn'));
});
