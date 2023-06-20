<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelPricesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'checkin_from' => $request->checkin_from,
            'checkin_to' => $request->checkin_to,
            'booking_engine' => $this->booking_engine,
            'nightly_price' => number_format($this->nightly_price, 0),
            'total_price' => number_format($this->total_price, 0),
            'is_available' => $this->is_available,
            'link' => $this->link,
        ];
    }
}
