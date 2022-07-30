<?php namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use ServerHelper;

class ServerTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform($server)
    {
        return [
            'model' => (string) $server[0],
            'ram' => (array) ServerHelper::getRamInfo($server[1]),
            'disk' => (array) ServerHelper::getDiskInfo($server[2]),
            'price' => (array) ServerHelper::getPriceInfo($server[4]),
            'location' => (array) ServerHelper::getLocationInfo($server[3]),
        ];
    }
}