<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordVisitAndEvents extends Controller
{
    public function store(Request $request, string $eventType = null, array $eventData) {

        // Send into DB
        DB::table('visits_events')->insert([
            'updated_at' => date("Y-m-d H:i:s"),
            'event_type' => $eventType,
            'token' => $request->session()->token(),
            'fingerprint' => $request->fingerprint(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->headers->get('referer'),
            'path' => $request->path(),
            'uri' => $request->getRequestUri(),
            'query' => json_encode($request->query()),
            'event_data' => json_encode($eventData),
        ]);

    }
}
