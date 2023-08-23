<?php

namespace App\Enums;

enum ProviderXStatus
{
    case AUTHORIZED;
    case DECLINE;
    case REFUNDED;


    public function status(): int
    {
        return match ($this) {
            ProviderXStatus::AUTHORIZED => 1,
            ProviderXStatus::DECLINE => 2,
            ProviderXStatus::REFUNDED => 3,
        };
    }
}
