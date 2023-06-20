<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingPageLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = [
            [1, 1, 'https://www.booking.com/hotel/us/rush-creek-lodge-at-yosemite.en-us.html'],
            [1, 2, 'https://www.expedia.com/Groveland-Hotels-Rush-Creek-Lodge-At-Yosemite.h11958966.Hotel-Information'],
            [1, 3, 'https://www.hotels.com/ho383686912/rush-creek-lodge-at-yosemite-groveland-united-states-of-america/?expediaPropertyId=11958966'],
            [1, 6, 'https://www.kayak.com/hotels/Rush-Creek-Lodge-at-Yosemite,Groveland-c22511-h2486270-details'],
            [2, 1, 'https://www.booking.com/hotel/us/stanyan-park-san-francisco.en-us.html'],
            [2, 2, 'https://www.expedia.com/San-Francisco-Hotels-Stanyan-Park-Hotel.h24363.Hotel-Information'],
            [2, 3, 'https://www.hotels.com/ho545932/stanyan-park-hotel-san-francisco-united-states-of-america/?expediaPropertyId=24363'],
            [2, 6, 'https://www.kayak.com/hotels/Stanyan-Park-Hotel,San-Francisco-c13852-h17021-details'],
            [3, 1, 'https://www.booking.com/hotel/es/barcelona-colonial.html'],
            [3, 2, 'https://www.expedia.com/Barcelona-Hotels-Hotel-Barcelona-Colonial.h2814317.Hotel-Information'],
            [3, 3, 'https://www.hotels.com/ho339008/hotel-barcelona-colonial-barcelona-spain/?expediaPropertyId=2814317'],
            [3, 6, 'https://www.kayak.com/hotels/Barcelona-Hotel-Colonial,Barcelona-c22567-h307779-details'],
            [4, 1, 'https://www.booking.com/hotel/us/hayes-valley-inn.en-gb.html'],
            [4, 2, 'https://www.expedia.com/San-Francisco-Hotels-Hayes-Valley-Inn.h25059435.Hotel-Information'],
            [4, 3, 'https://www.hotels.com/ho802901920/hayes-valley-inn-san-francisco-united-states-of-america/?expediaPropertyId=25059435'],
            [4, 6, 'https://www.kayak.com/hotels/Hayes-Valley-Inn,San-Francisco-c13852-h145577-details'],
        ];

        foreach ($i as $item) {
            DB::table('booking_page_links')->insert([
                [
                    'updated_at' => date("Y-m-d H:i:s"),
                    'hotel_page_id' => $item[0],
                    'booking_engine_id' => $item[1],
                    'link' => $item[2],
                ],
            ]);
        }
        

    }
}
