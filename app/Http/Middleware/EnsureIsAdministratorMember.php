<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Team;

class EnsureIsAdministratorMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $team = Team::find(Team::ADMINS_TEAM);
        // if (! $request->user()->belongsToTeam($team)) {
        //     abort(403, 'Access denied');
        // }
        return $next($request);
    }
}
