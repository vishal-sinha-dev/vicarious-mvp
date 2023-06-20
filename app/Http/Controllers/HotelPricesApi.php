<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\HotelPricesResource;
use App\Http\Controllers\HotelStay22LinkBuilder;

class HotelPricesApi extends Controller
{
    public static function getHotelPricesByBookingEngine(
        string $hotel_url_hash = null, 
        string $checkin_from = null, 
        string $checkin_to = null,
        int $total_adults,
        int $total_children,
        array $children_ages   
    )
    {

        // Show loading spinner longer
        sleep(1);

        // Check url_hash
        $count = DB::table('hotel_pages')
            ->where('url_hash', $hotel_url_hash)
            ->count(); 
            
        $prices = DB::table('hotel_daily_prices')
            ->select(DB::raw('hotel_pages.id as hotel_page_id, booking_engines.id as booking_engine_id, booking_engines.code as booking_engine, round(avg(nightly_price), 0) as nightly_price, round(sum(nightly_price), 0) as total_price,  min(is_available) as is_available'))
            ->join('hotel_pages', 'hotel_pages.id', '=', 'hotel_daily_prices.hotel_page_id')
            ->leftJoin('booking_engines', 'hotel_daily_prices.booking_engine_id', '=', 'booking_engines.id')
            ->where('check_in_date', '>=', Carbon::parse($checkin_from)->format('Y-m-d'))
            ->where('check_in_date', '<=', Carbon::parse($checkin_to)->subDay(1)->format('Y-m-d'))
            ->where('url_hash', $hotel_url_hash)
            ->groupBy('booking_engines.code', 'booking_engines.id', 'hotel_pages.id')
            ->get();

        if ($prices->count() > 0) {
            $engines = DB::table('booking_engines')
                ->select(DB::raw('booking_engines.id as booking_engine_id, code as booking_engine, 0 as nightly_price, 0 as total_price, 0 as is_available'))
                ->where('enabled', true)
                ->get();

            foreach ($engines as $engine) {
                if ($engine->nightly_price == 0 && $engine->booking_engine !== $prices->first()->booking_engine) {
                    $engine->hotel_page_id = $prices->first()->hotel_page_id;
                    $engine->nightly_price = $prices->first()->nightly_price;
                    $engine->total_price = $prices->first()->total_price;
                    $engine->is_available = $prices->first()->is_available;
                }
            }
            $prices = $prices->merge($engines);
        }

        $results = $prices->unique('booking_engine');

        // Build links
        $stay22 = new HotelStay22LinkBuilder;
        $stay22->setTotalAdults($total_adults);
        $stay22->setTotalChildren($total_children);
        $stay22->setChildrenAges($children_ages);
        $stay22->setDateStart($checkin_from);
        $stay22->setDateEnd($checkin_to);
        
        foreach ($results as $result) {
            $stay22->setHotelPageId($result->hotel_page_id);
            $stay22->setBookingEngineId($result->booking_engine_id);
            $result->link = $stay22->getHotelLinkPage();
        }

        return HotelPricesResource::collection($results);
    }
}
