<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelPage extends Controller
{
    public static function getHotelPageData($url_hash)
    {

        $hotel = DB::table('hotel_pages')
            ->select('hotel_pages.url_hash as url_hash', 'hotel_name', 'address', 'description', 'url_hash', 'image_1', 'image_2', 'image_3', 'google_map_url', 'review_count')
            ->join('hotel_page_offering', 'hotel_page_offering.hotel_page_id', '=', 'hotel_pages.id')
            ->join('offerings', 'offerings.id', '=', 'hotel_page_offering.offering_id')
            ->where('hotel_pages.url_hash', $url_hash)
            ->get()->first();

        $offerings = DB::table('hotel_pages')
            ->select('icon_font_awesome_class', 'label')
            ->join('hotel_page_offering', 'hotel_page_offering.hotel_page_id', '=', 'hotel_pages.id')
            ->join('offerings', 'offerings.id', '=', 'hotel_page_offering.offering_id')
            ->where('hotel_pages.url_hash', $url_hash)
            ->select('icon_font_awesome_class', 'label')
            ->get();

        $hotel = [
            'hotel_url_hash' => $hotel->url_hash,
            'hotel_name' => $hotel->hotel_name,
            'address' => $hotel->address,
            'description' => $hotel->description,
            'url_hash' => $hotel->url_hash,
            'image_1' => $hotel->image_1,
            'image_2' => $hotel->image_2,
            'image_3' => $hotel->image_3,
            'google_map_url' => $hotel->google_map_url,
            'review_count' => $hotel->review_count,
            'offerings' => $offerings->toArray(),
        ];

        return $hotel;

    }

    public static function getHotelList() {
        return DB::table('hotel_pages')
        ->select('hotel_name', 'address', 'description', 'url_hash', 'image_1', 'image_2', 'image_3', 'google_map_url')
        ->get();
    }
}
