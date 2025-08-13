<?php

namespace App\Exceptions;
 use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
  
public function register()
{
    $this->renderable(function (NotFoundHttpException $e) {
        $req = request();

        // Basic request context
        $data = [
            'url'        => $req->fullUrl(),
            'method'     => $req->method(),
            'referrer'   => $req->headers->get('referer') ?? 'Direct/None',
            'ip'         => $req->ip(),
            'user_agent' => $req->userAgent(),
        ];

        // Ignore noisy paths (optional)
        $ignorePaths = [
            '/favicon.ico', '/robots.txt', '/apple-touch-icon', '/browserconfig.xml',
        ];
        foreach ($ignorePaths as $p) {
            if (str_contains($data['url'], $p)) {
                return response()->view('errors.404', [], 404);
            }
        }

        // Ignore common bots (optional)
        $botHints = ['bot', 'crawler', 'spider', 'curl', 'python-requests', 'HeadlessChrome'];
        $ua = strtolower($data['user_agent'] ?? '');
        foreach ($botHints as $hint) {
            if ($ua && str_contains($ua, $hint)) {
                // comment out the next line if you do want to log bots
                return response()->view('errors.404', [], 404);
            }
        }

        // Rate-limit duplicate 404 logs (avoid spam bursts)
        $fingerprint = sha1(json_encode([$data['url'], $data['referrer'], $data['user_agent']]));
        $cacheKey = "404:$fingerprint";
        if (! Cache::add($cacheKey, true, now()->addMinutes(5))) {
            // We've logged this combo recently; skip logging.
            return response()->view('errors.404', [], 404);
        }

        Log::channel('http404')->warning('HTTP 404', $data);

        // Return a proper 404 for SEO
        return response()->view('errors.404', [], 404);
    });
}

}
