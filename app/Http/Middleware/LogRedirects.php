<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRedirects
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response->isRedirection()) {
            Log::channel('redirects')->info('HTTP Redirect', [
                'from'     => $request->fullUrl(),
                'to'       => $response->headers->get('Location'),
                'status'   => $response->getStatusCode(),
                'referrer' => $request->headers->get('referer') ?? 'Direct/None',
                'ip'       => $request->ip(),
                'agent'    => $request->userAgent(),
            ]);
        }

        return $response;
    }
}
