<?php

namespace MohdRaquib\SecureMiddleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceNonWWW
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(substr($request->header('host'), 0, 4) === 'www.') {
            $nonWwwHost = str_replace('www.', '', $request->header('host'));
            $request->headers->set('host', $nonWwwHost);
            return redirect($request->getRequestUri(), 302, [], true);
        }
        return $next($request);
    }
}
