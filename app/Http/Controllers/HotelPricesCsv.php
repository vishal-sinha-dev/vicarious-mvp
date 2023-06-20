<?php

namespace App\Http\Controllers;

use League\Csv\Reader;
use Illuminate\Http\Request;

class HotelPricesCsv extends Controller
{
    public static function getRecords() {
        
        $csv = Reader::createFromPath(storage_path() . '/app/hotel_prices_csvs/bookingcom.csv', 'r');
        $csv->setHeaderOffset(0);

        return $csv->getRecords();

    }
}
