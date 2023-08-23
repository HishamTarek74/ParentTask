<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BaseFilters
{
    //abstract public function filter($data, $request);

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;


    protected $data;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Create a new BaseFilters instance.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply the filters.
     */
    public function apply($data)
    {

        $this->data = $data;
        foreach ($this->getFilters() as $filter) {
            //dd($this->request->query('currency'));
            $value = $this->request->query($filter);
            if ($this->request->has($filter)) {
                $methodName = Str::camel($filter);
            } else {
                $methodName = 'default' . Str::studly($filter);
            }

            if (method_exists($this, $methodName)) {
                // dd($data);
                $this->$methodName($value);
            }
        }
        return $this->data;
    }

    /**
     * Fetch all relevant filters from the request.
     *
     * @return array
     */
    public function getFilters()
    {
        return property_exists($this, 'filters')
        && is_array($this->filters) ? $this->filters : [];
    }
}
