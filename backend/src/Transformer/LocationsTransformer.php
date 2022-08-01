<?php namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class LocationsTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform($location)
    {
        return [
            'label' => (string) substr($location, 0, -6),
            'value' => (string) substr($location, -6),
        ];
    }
}