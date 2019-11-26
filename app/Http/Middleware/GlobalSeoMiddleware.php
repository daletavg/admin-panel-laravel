<?php

namespace App\Http\Middleware;

use App\Repository\GlobalSeoSettingsRepository;
use Closure;

class GlobalSeoMiddleware
{
    private $globalSeoRepository;
    /**
     * GlobalSeoMiddleware constructor.
     * @param GlobalSeoSettingsRepository $repository
     */
    public function __construct(GlobalSeoSettingsRepository $repository)
    {
        $this->globalSeoRepository=$repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $url =$request->url();
        $new_url = preg_replace('~///+~', '/', $url);

        if($url != $new_url)
        {
            return redirect($new_url,301);
        }
        $seo = $this->globalSeoRepository->first();
        if($seo->www_redirect) {
            if (boolval(strpos($url, '://www.'))) {
                $replace = str_replace('://www.', '://', $url);
                return redirect($replace, $seo->www_code);
            }
        }
        if($seo->index_php_redirect) {
            if (boolval(strpos($url, '/index.php'))) {
                $replace = str_replace('/index.php', '', $url);
                return redirect($replace, $seo->index_php_code);
            }
        }

        return $next($request);
    }
}
