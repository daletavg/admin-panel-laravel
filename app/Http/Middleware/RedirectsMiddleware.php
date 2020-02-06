<?php

namespace App\Http\Middleware;

use App\Repository\RedirectsRepository;
use Closure;

class RedirectsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private $redirectRepository;

    public function __construct(RedirectsRepository $redirectsRepository)
    {
        $this->redirectRepository=$redirectsRepository ;
    }

    public function handle($request, Closure $next)
    {
        $url = getUrlWithoutHost(getNonLocaledUrl());

        if ($redirect = $this->redirectRepository->findByUrl($url)) {

            return redirect($redirect->to, $redirect->code);
        }

        return $next($request);
    }
}
