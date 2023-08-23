<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\Providers\DataProviderX;
use App\Services\Providers\DataProviderY;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function getProviders(Request $request)
    {
        $dataProviders = [new DataProviderX(), new DataProviderY()]; // To add DataZProvider Add it in array

        $filteredData = $this->getFilterdData($dataProviders, $request);

        $providers = $this->dataResource($filteredData);

        return response()->json(['data' => $providers], 200);
    }


    private function getFilterdData(array $dataSources, Request $request)
    {
        $data = [];

        foreach ($dataSources as $dataSource) {
            $data = $dataSource->filter(array_merge($data, $dataSource->getData()));
        }
        return $data;
    }


    private function dataResource(array $data)
    {
        $transformedData = [];

        foreach ($data as $item) {
            $transformedData[] = [
                'parentEmail' => $item['parentEmail'],
                'amount' => $item['amount'],
                'currency' => $item['currency'],
                'status' => $item['status'],
                'created_at' => $item['created_at'],
                'id' => $item['id'],
                'provider' => $item['provider'],
            ];
        }

        return $transformedData;
    }

}
