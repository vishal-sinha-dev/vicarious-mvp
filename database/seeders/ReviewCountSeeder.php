<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $affected = DB::table('hotel_pages')
              ->where('id', 1)
              ->update(['review_count' => 893]);

        $affected = DB::table('hotel_pages')
              ->where('id', 2)
              ->update(['review_count' => 531]);

        $affected = DB::table('hotel_pages')
              ->where('id', 3)
              ->update(['review_count' => 1513]);

        $affected = DB::table('hotel_pages')
              ->where('id', 4)
              ->update(['review_count' => 305]);
              
        
    }
}
