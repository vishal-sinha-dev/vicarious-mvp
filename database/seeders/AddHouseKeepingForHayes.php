<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddHouseKeepingForHayes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_page_offering')->insert([
            [
                'updated_at' => date("Y-m-d H:i:s"),
                'hotel_page_id' => 4,
                'offering_id' => 20,
            ],
        ]);
    }
}
