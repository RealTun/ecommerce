<?php

namespace App\Filters;

use Closure;

class PaginationFilter
{
    protected $pageSize;

    public function __construct($pageSize = 12)
    {
        $this->pageSize = $pageSize;
    }

    public function handle($request, Closure $next)
    {
        $query = $request;

        if (request()->has('slug')) {
            // Assuming pageSize can be dynamically set
            $pageNumber = request('pageNumber', 1);
            $skipSize = ($pageNumber - 1) * $this->pageSize;

            $query->skip($skipSize)->take($this->pageSize);
        }

        return $next($query);
    }
}

