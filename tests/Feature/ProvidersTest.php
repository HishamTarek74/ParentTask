<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProvidersTest extends TestCase
{

    /** @test */
    public function test_list_all_providers()
    {
        $this->getJson(route('providers.index'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'parentEmail',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_list_providers_by_provider()
    {
        $this->getJson('/api/v1/providers?provider=DataProviderY')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'parentEmail',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_list_providers_by_currency()
    {
        $this->getJson('/api/v1/providers?currency=USD')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'parentEmail',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_list_providers_by_status()
    {
        $this->getJson('/api/v1/providers?status=authorised')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'parentEmail',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_list_providers_by_rang_balance()
    {
        $this->getJson('/api/v1/providers?balance_min=354&balance_max=1000')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'parentEmail',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

}
