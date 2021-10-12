<?php

namespace App\Services;

use App\Interfaces\IShippingService;
use App\Models\Shipping;

use Illuminate\Support\Str;

class OwnShippingService implements IShippingService
{
    public function store(string $name, int $height, int $width, int $weigth,string $destination) : array
    {
        $shipping = new Shipping;
        $shipping->uuid = Str::uuid();
        $shipping->user_id = auth()->user()->id;
        $shipping->name = $name;
        $shipping->height = $height;
        $shipping->width = $width;
        $shipping->weight = $weigth;
        $shipping->destination = $destination;
        $shipping->save();

        return [
            'company' => 'Own fake shipping service',
            'uuid' => $shipping->uuid,
            'name' => $shipping->name,
            'height' => $shipping->height,
            'width' => $shipping->width,
            'weigth' => $shipping->weight,
            'destination' => $shipping->destination
        ];
    }
}
