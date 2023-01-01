<?php

namespace App\Http\Middleware;

use App\Models\Lecturer;
use Closure;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class EnsureLecturerLogin
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
        $lecturer = Lecturer::query()->where('user_id', auth()->user()->id);

        if (isEmpty($lecturer)) {
            return back();
        }
        else {
            return $next($request);
        }
    }
}
