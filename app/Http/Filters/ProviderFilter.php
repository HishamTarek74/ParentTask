<?php

namespace App\Http\Filters;

class ProviderFilter extends BaseFilters
{
    protected $filters = [
        'provider',
        'email',
        'currency',
        'amount',
        'balance_min',
        'balance_max',
        'status',
    ];

    public function provider($paramValue): array
    {
        if ($paramValue) {
            $this->data = array_filter($this->data, function ($item) use ($paramValue) {
                return $item['provider'] == $paramValue;
            });

        }
        return $this->data;
    }

    public function email($paramValue): array
    {
        if ($paramValue) {
            $this->data = array_filter($this->data, function ($item) use ($paramValue) {
                return $item['email'] == $paramValue;
            });
        }
        return $this->data;
    }

    public function amount($paramValue): array
    {
        if ($paramValue) {
            $this->data = array_filter($this->data, function ($item) use ($paramValue) {
                return $item['amount'] == $paramValue;
            });
        }
        return $this->data;
    }

    public function status($paramValue): array
    {
        if ($paramValue) {
            $this->data = array_filter($this->data, function ($item) use ($paramValue) {
                return $item['status'] == $paramValue;
            });
        }
        return $this->data;
    }

    public function currency($paramValue): array
    {
        if ($paramValue) {
            $this->data = array_filter($this->data, function ($item) use ($paramValue) {
                return $item['currency'] == $paramValue;
            });
        }
        return $this->data;
    }

    public function balanceMin($paramValue)
    {
        if ($paramValue) {
            $this->data = array_filter($this->data, function ($item) use ($paramValue) {
                return $item['amount'] >= $paramValue;
            });
        }
        return $this->data;
    }

    public function balanceMax($paramValue)
    {
        if ($paramValue) {
            $this->data = array_filter($this->data, function ($item) use ($paramValue) {
                return $item['amount'] <= $paramValue;
            });
        }
        return $this->data;
    }


}
