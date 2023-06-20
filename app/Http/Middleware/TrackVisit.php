<?php

namespace App\Http\Middleware;

use App\Http\Controllers\RecordVisitAndEvents;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Record just a regular visit
        $event = new RecordVisitAndEvents;
        $event->store($request, 'VISIT', []);

        return $next($request);
    }
}
