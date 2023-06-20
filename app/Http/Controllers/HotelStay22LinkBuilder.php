<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelStay22LinkBuilder extends Controller
{
    private $adults;
    private $children;
    private $children_ages;
    private $date_start;
    private $date_end;
    private $hotel_page_id;
    private $booking_engine_id;

    public function setTotalAdults(int $adults)
    {
        $this->adults = $adults;
    }

    public function setTotalChildren(int $children)
    {
        $this->children = $children;
    }

    public function setChildrenAges(array $children_ages)
    {
        $this->children_ages = $children_ages;
    }

    public function setDateStart(string $date_start)
    {
        $this->date_start = $date_start;
    }

    public function setDateEnd(string $date_end)
    {
        $this->date_end = $date_end;
    }

    public function setHotelPageId(int $hotel_page_id)
    {
        $this->hotel_page_id = $hotel_page_id;
    }

    public function setBookingEngineId(int $booking_engine_id)
    {
        $this->booking_engine_id = $booking_engine_id;
    }

    public function getHotelLinkPage()
    {
        $link = DB::table('booking_page_links')
            ->select('booking_page_links.link', 'booking_engines.code')
            ->join('booking_engines', 'booking_engines.id', '=', 'booking_page_links.booking_engine_id')
            ->where('booking_page_links.hotel_page_id', $this->hotel_page_id)
            ->where('booking_page_links.booking_engine_id', $this->booking_engine_id)
            ->get()
            ->first();

        if (isset($link->link)) {
            $final_link = $this->addHotelLinkParams($link->code, $link->link);

            // Build with Stay22 link
            return $this->constructURL(env('LIAS_STAY22_LINK'), ['link' => $final_link]);
        }

        return null;
    }

    private function addHotelLinkParams(string $code, string $link)
    {
        switch ($code) {
            case "BOOKINGCOM":
                return $this->addParamsForBookingCom($link);
                break;
            case "EXPEDIA":
                return $this->addParamsForExpedia($link);
                break;
            case "HOTELSCOM":
                return $this->addParamsForHotelsCom($link);
                break;
            case "KAYAK":
                return $this->addParamsForKayak($link);
                break;
        }
    }

    private function addParamsForBookingCom($link)
    {
        $parameters = [
            'checkin' => $this->date_start,
            'checkout' => $this->date_end,
            'group_adults' => $this->adults,
            'group_children' => $this->children,
            'age' => $this->children_ages,
        ];

        return $this->constructURL($link, $parameters);
    }
    private function addParamsForExpedia($link)
    {

        // Expedia format
        $ages = 'a' . $this->adults;

        foreach ($this->children_ages as $a) {
            $ages .= ':c' . $a;
        };

        $parameters = [
            'chkin' => Carbon::parse($this->date_start)->format('n/d/Y'),
            'chkout' => Carbon::parse($this->date_end)->format('n/d/Y'),
            'rm1' => $ages
        ];

        return $this->constructURL($link, $parameters);
    }
    private function addParamsForHotelsCom($link)
    {

        // Expedia format
        $ages = 'a' . $this->adults;

        foreach ($this->children_ages as $a) {
            $ages .= ':c' . $a;
        };

        $parameters = [
            'dateSelectedByUser' => 'true',
            'chkin' => Carbon::parse($this->date_start)->format('n/d/Y'),
            'chkout' => Carbon::parse($this->date_end)->format('n/d/Y'),
            'startDate' => Carbon::parse($this->date_start)->format('n/d/Y'),
            'endDate' => Carbon::parse($this->date_end)->format('n/d/Y'),
            'rm1' => $ages
        ];

        return $this->constructURL($link, $parameters);

    }
    private function addParamsForKayak($link)
    {

        $ages = '';
        foreach ($this->children_ages as $a) {
            $ages .= '-' . $a;
        }

        $link .= '/' . Carbon::parse($this->date_start)->format('Y-m-d') . '/' . Carbon::parse($this->date_end)->format('Y-m-d') . '/' . $this->adults . 'adults/' . $this->children . 'children' . $ages;

        return $link;
    }

    public function constructURL($link, $data)
    {
        $params = array();
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                // Handle nested arrays
                foreach ($value as $item) {
                    $params[] = urlencode($key) . '=' . urlencode($item);
                }
            } else {
                // Encode the key and value, and add to the params array
                $params[] = urlencode($key) . '=' . urlencode($value);
            }
        }
        $sep = ((strpos($link, "?") !== false) ? '&' : '?');
        return $link . $sep . implode('&', $params);
    }
}
