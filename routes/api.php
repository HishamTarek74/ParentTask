<?php


use App\Http\Controllers\API\V1\ProviderController;
use Illuminate\Support\Facades\Route;



Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\API\V1'
], function () {
    Route::get('providers', [ProviderController::class, 'getProviders'])->name('providers.index');
});
