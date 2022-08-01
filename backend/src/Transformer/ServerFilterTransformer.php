<?php namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class ServerFilterTransformer extends TransformerAbstract
{
    private $locations;

    public function __construct($locations)
    {
        $this->locations = $locations;
    }

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform($filter)
    {
        if($filter[0] == 'Location') {
            $values = $this->locations;
        } else {
            $values = explode(',', str_replace(' ', '', $filter[2]));
        }
        return [
            'name' => (string) $filter[0],
            'type' => (string) $filter[1],
            'values' => (array) $values,
        ];
    }
}