<?php

namespace App\Http\Middleware;

use App\Models\Shuffle;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class ParticipantShuffleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $shuffle = Shuffle::find($request->shuffle_id);
        if ($shuffle->status != 'opened') {
            return response()->error("Shuffle is not opened yet.", 403);
        } else if ((Carbon::now() < $shuffle->started_at) || (Carbon::now() > $shuffle->ended_at)) {
            return response()->error("Shuffle is ended", 403);
        }

        return $next($request);
    }
}
