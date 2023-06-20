<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HotelPricesCsv;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // HOTELS
        $id = DB::table('hotel_pages')->insertGetId(
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'hotel_name' => 'Rush Creek Lodge at Yosemite',
                'url_hash' => 'rush-creek-lodge-at-yosemite',
                'address' => '34001 Highway 120, Groveland, 95321, USA',
                'description' => 'Surrounded by a forest, Rush Creek Lodge at Yosemite features seasonal outdoor pool, and children\'s playground. The accommodations features two hot tubs.Yosemite\'s Highway 120 West entrance is 0.5 mi away. All units are air conditioned and feature a seating area. Every unit has a private bathroom with free toiletries. Bed linen is provided. Rush Creek Lodge at Yosemite also includes a hot tub for families and a hot tub for adults only. Guests can enjoy a drink at the on-site bar, while special diet menus and packed lunches are available on request.',
                'image_1' => '1.jpg',
                'image_2' => '2.jpg',
                'image_3' => '3.jpg',
                'google_map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.0349615160767!2d-119.88427562353014!3d37.81265007197591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8096dc0812ab59cb%3A0x584ff9f1f59784ef!2sRush%20Creek%20Lodge%20and%20Spa%20at%20Yosemite!5e0!3m2!1sen!2sus!4v1686701351253!5m2!1sen!2sus',
            ]
        );
        $id = DB::table('hotel_pages')->insertGetId(
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'hotel_name' => 'Stanyan Park Hotel',
                'url_hash' => 'stanyan-park-san-francisco',
                'address' => '750 Stanyan Street, Haight-Ashbury, San Francisco, CA 94117, USA',
                'description' => 'Listed on the National Register of Historic Places, Stanyan Park Hotel offers Victorian-style rooms with free WiFi. It serves a daily expanded continental breakfast. Golden Gate Park is steps away. A flat-screen TV, ironing facilities and an private bathroom with free toiletries and a hairdryer and provided in each room at this completely nonsmoking hotel. Each suite includes kitchen facilities. A wine & cheese hour and evening tea service on weekday evenings is featured. A 24-hour reception greets guests of Stanyan Park Hotel. The property is handicapped accessible.',
                'image_1' => '1.jpg',
                'image_2' => '2.jpg',
                'image_3' => '3.jpg',
                'google_map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.934385740414!2d-122.45570382353173!3d37.76813667198693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808587516f128105%3A0xb5b6c8166d8e0800!2sStanyan%20Park%20Hotel!5e0!3m2!1sen!2sus!4v1686701337361!5m2!1sen!2sus',
            ],
        );
        $id = DB::table('hotel_pages')->insertGetId(
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'hotel_name' => 'Barcelona Hotel Colonial',
                'url_hash' => 'barcelona-hotel-colonial',
                'address' => 'Layetana, 3, Ciutat Vella, 08003 Barcelona, Spain',
                'description' => 'This elegant hotel is set in Barcelona’s Gothic Quarter, in an impressive, colonial, stone building with a clock tower. It is a 10-minute walk from Barcelona Cathedral and Barceloneta Beach. Hotel Colonial’s bright, air-conditioned rooms feature wooden floors. They are soundproofed and have a flat-screen TV and mini-bar. You can hire the safe, and the private bathroom comes with a hairdryer and amenities. A buffet breakfast is served in the Colonial Hotel café. Guests can relax with a free newspaper in the stylish lounge, with its white leather sofas, where Wi-Fi is free of charge.',
                'image_1' => '1.jpg',
                'image_2' => '2.jpg',
                'image_3' => '3.jpg',
                'google_map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.6223270247465!2d2.175852489941975!3d41.38228949730116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2ff17e20343%3A0x3abc2e193652e5f9!2sHotel%20Colonial%20Barcelona!5e0!3m2!1sen!2sus!4v1686701309511!5m2!1sen!2sus',
            ],
        );
        $id = DB::table('hotel_pages')->insertGetId(
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'hotel_name' => 'Hayes Valley Inn',
                'url_hash' => 'hayes-valley-inn',
                'address' => '417 Gough Street, San Francisco, CA 94102, USA',
                'description' => 'Located in San Francisco’s charming Hayes Valley neighborhood, Hayes Valley Inn is just 5 minutes’ walk from attractions such as the San Francisco War Memorial Opera House and San Francisco City Hall. All rooms at the inn offer free WiFi and shared bathrooms, located in the hallway.',
                'image_1' => '1.jpg',
                'image_2' => '2.jpg',
                'image_3' => '3.jpg',
                'google_map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.550966642237!2d-122.42576732353142!3d37.77712577198486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858098beb30d01%3A0x54923b90a25fcc4d!2sHayes%20Valley%20Inn!5e0!3m2!1sen!2sus!4v1686701372636!5m2!1sen!2sus',
            ],
        );

        // OFFERS
        DB::table('offerings')->insert([
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-person-swimming',
                'label' => 'Outdoor swimming pool',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-wifi',
                'label' => 'Free WiFi',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-ban-smoking',
                'label' => 'Non-smoking rooms',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-dumbbell',
                'label' => 'Fitness center',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-fork-knife',
                'label' => 'Restaurant',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-wheelchair',
                'label' => 'Facilities for disabled guests',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-spa',
                'label' => 'Spa',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-mug-hot',
                'label' => 'Tea/Coffee Maker in All Rooms',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-martini-glass-citrus',
                'label' => 'Bar',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-family',
                'label' => 'Family rooms',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-phone-office',
                'label' => '24-hour front desk',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-elevator',
                'label' => 'Elevator',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-square-parking',
                'label' => 'Private Parking',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-square-parking',
                'label' => 'Free Parking',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-washing-machine',
                'label' => 'Laundry',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-fan',
                'label' => 'Air conditioning',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-heat',
                'label' => 'Heating',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-fan',
                'label' => 'Air conditioning',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-solid fa-pan-frying',
                'label' => 'Good Breakfast',
            ],
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'icon_font_awesome_class' => 'fa-sharp fa-light fa-broom',
                'label' => 'Daily housekeeping ',
            ],
        ]);

        // HOTEL OFFERINGS
        $i = [
            [1, 1],
            [14, 1],
            [2, 1],
            [3, 1],
            [4, 1],
            [5, 1],
            [6, 1],
            [7, 1],
            [8, 1],
            [9, 1],
            [2, 2],
            [10, 2],
            [3, 2],
            [6, 2],
            [11, 2],
            [20, 2],
            [12, 2],
            [17, 2],
            [13, 3],
            [2, 3],
            [3, 3],
            [11, 3],
            [6, 3],
            [12, 3],
            [15, 3],
            [16, 3],
            [17, 3],
            [19, 3],
            [2, 4],
            [3, 4],
        ];

        foreach ($i as $item) {
            DB::table('hotel_page_offering')->insert([
                [
                    'updated_at' => date("Y-m-d H:i:s"),
                    'hotel_page_id' => $item[1],
                    'offering_id' => $item[0],
                ],
            ]);
        }

        // HOTEL PRICES
        $prices = HotelPricesCsv::getRecords();

        foreach ($prices as $price) {
            DB::table('hotel_daily_prices')->insert([
                [
                    'updated_at' => date("Y-m-d H:i:s"),
                    'hotel_page_id' => $price['booking_page_id'],
                    'booking_engine_id' => $price['booking_engine_id'],
                    'check_in_date' => $price['checkin'],
                    'is_available' => $price['available'] == 'TRUE' ? 1 : 0,
                    'nightly_price' => $price['avgPriceFormatted'],
                ],
            ]);
        }

        // BOOKING ENGINES
        $i = [
            ['Booking.com', 'BOOKINGCOM', 'bookingcom.png', true],
            ['Expedia', 'EXPEDIA', 'expedia.png', true],
            ['Hotels.com', 'HOTELSCOM', 'hotelscom.png', true],
            ['Vrbo', 'VRBO', 'vrbo.png', false],
            ['Tripadvisor.com', 'TRIPADVISOR', 'tripadvisor.png', false],
            ['Kayak.com', 'KAYAK', 'kayak.png', true],
        ];

        foreach ($i as $item) {
            DB::table('booking_engines')->insert([
                [
                    'updated_at' => date("Y-m-d H:i:s"),
                    'name' => $item[0],
                    'code' => $item[1],
                    'logo_dir' => $item[2],
                    'enabled' => $item[3],
                ],
            ]);
        }
    }
}
