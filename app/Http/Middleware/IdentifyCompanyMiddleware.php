<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentifyCompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $domain = $request->getHost();
        $company = Company::whereHas('domains', function ($query) use ($domain) {
            $query->where('domain', $domain)->where('status', true);
        })->first();
        if (! $company) {
            abort(404);
        }
        $request->attributes->add(['company' => $company]);

        return $next($request);
    }
}
