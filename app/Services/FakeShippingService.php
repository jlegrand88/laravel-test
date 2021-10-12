<?php

namespace App\Services;

use App\Interfaces\IShippingService;

use Illuminate\Support\Str;

class FakeShippingService implements IShippingService
{
    public function store(string $name, int $height, int $width, int $weigth,string $destination) : array
    {
        return [
            'company' => 'Fake Shipping Service S.A',
            'uuid' => Str::uuid(),
            'name' => $name,
            'height' => $height,
            'width' => $width,
            'weigth' => $weigth,
            'destination' => $destination
        ];
    }
}
