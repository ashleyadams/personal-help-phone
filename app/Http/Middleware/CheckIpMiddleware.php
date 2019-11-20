<?php

namespace App\Http\Middleware;

use Closure;

class CheckIpMiddleware
{

    private $allowedIPs = ['127.0.0.1', '172.21.0.1'];

    // Disabled because its not supported :(
    // https://support.twilio.com/hc/en-us/articles/223183868-Which-IP-addresses-will-Twilio-s-requests-come-from-
    private $enabled = false;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($this->enabled && !in_array($request->ip(), $this->allowedIPs)) {

            // The client isn't who we expect, so the response does not need to be in any particular format/type
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
