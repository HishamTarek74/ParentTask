<?php

namespace App\Services\Providers;

use App\Http\Filters\ProviderFilter;
use App\Interfaces\DataProviderInterface;
use App\Traits\Filterable;
use File;

class DataProviderX  implements DataProviderInterface
{

    use Filterable;

    protected $filter = ProviderFilter::class;

    public array $statusList = [
        '1' => 'authorised',
        '2' => 'decline',
        '3' => 'refunded'
    ];

    public function getData()
    {
        // TODO: Implement getData() method.

        $dataProviderX = File::get(storage_path('DataProviderX.json'));

        $dataX = json_decode($dataProviderX, true);

        return $this->transformData($dataX);
    }

    private function transformData(array $data): array
    {

        return array_map(function ($item) {

            return [
                'parentEmail' => $item['parentEmail'],
                'amount' => $item['parentAmount'],
                'currency' => $item['Currency'],
                'status' => $this->statusList[$item['statusCode']],
                'created_at' => $item['registerationDate'],
                'id' => $item['parentIdentification'],
                'provider' => 'DataProviderX',
            ];
        }, $data);
    }

}
