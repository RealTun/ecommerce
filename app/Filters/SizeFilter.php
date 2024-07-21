<?php

namespace App\Filters;

use Closure;

class SizeFilter
{
    public function handle($request, Closure $next)
    {
        $query = $request;

        if (request()->has('size')) {
            $sizes = request('size');

            $query->whereHas('inventories', function ($q) use ($sizes) {
                if (is_array($sizes)) {
                    $q->whereIn('size', $sizes);
                } else {
                    $q->where('size', $sizes);
                }
            });
        }

        return $next($query);
    }
}
