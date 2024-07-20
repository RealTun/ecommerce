<?php
namespace App\Filters;

use Closure;

class SortFilter
{
    public function handle($request, Closure $next)
    {
        $query = $request;

        if (request()->has('sort_by')) {
            $sortBy = request('sort_by');
            $sortOrder = request('sort_order', 'asc'); // Default to ascending order
            $query->orderBy($sortBy, $sortOrder);
        }

        return $next($query);
    }
}
