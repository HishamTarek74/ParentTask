<?php

namespace App\Traits;

use App\Http\Filters\BaseFilters;
use Illuminate\Support\Facades\App;

trait Filterable
{
    /**
     * Apply all relevant thread filters.
     *
     * @param $data
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function filter($data, BaseFilters $filters = null)
    {
        if (! $filters) {
            $filters = App::make($this->filter);
        }
        return $filters->apply($data);
    }



}
