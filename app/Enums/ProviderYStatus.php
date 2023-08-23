<?php

namespace App\Enums;

enum ProviderYStatus
{
    case AUTHORIZED;
    case DECLINE;
    case REFUNDED;



    public function status(): int
    {
        return match ($this) {
            ProviderXStatus::AUTHORIZED => 100,
            ProviderXStatus::DECLINE => 200,
            ProviderXStatus::REFUNDED => 300,
        };
    }
}
