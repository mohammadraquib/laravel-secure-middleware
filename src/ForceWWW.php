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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(substr($request->header('host'), 0, 4) !== 'www.') {
            $wwwHost = 'www.' . $request->header('host');
            $request->headers->set('host', $wwwHost);
            return redirect($request->path(), 302, [], true);
        }
        return $next($request);
    }
}
