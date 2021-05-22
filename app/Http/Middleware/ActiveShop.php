<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Http\Response;

class ActiveShop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $shop = Shop::where('slug', $request->shop)->firstOrFail();
        if ($shop->blocked_at) {
            return new Response(view('shop.blocked', compact('shop')));
        }
        return $next($request);
    }
}
