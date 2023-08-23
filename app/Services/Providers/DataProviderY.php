<?php

namespace App\Services\Providers;


use App\Http\Filters\ProviderFilter;
use App\Interfaces\DataProviderInterface;
use App\Traits\Filterable;
use File;


class DataProviderY implements DataProviderInterface
{
    use Filterable;

    protected $filter = ProviderFilter::class;

    private array $statusList = [
        '100' => 'authorised',
        '200' => 'decline',
        '300' => 'refunded'
    ];

    public function getData()
    {
        // TODO: Implement getData() method.
        $dataProviderY = File::get(storage_path('DataProviderY.json'));
        $dataY = json_decode($dataProviderY, true);

        return $this->transformData($dataY);
    }

    private function transformData(array $data): array
    {
        return array_map(function ($item) {
            return [
                'parentEmail' => $item['email'],
                'amount' => $item['balance'],
                'currency' => $item['currency'],
                'status' => $this->statusList[$item['status']],
                'created_at' => $item['created_at'],
                'id' => $item['id'],
                'provider' => 'DataProviderY',
            ];
        }, $data);
    }
}
