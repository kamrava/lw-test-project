<?php namespace App\Transformer;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;

class UseTransformer
{
    public static function apply($data = null, $transformer = null, $serializer = null)
    {
        if(!$serializer) {
            $serializer = new DataArraySerializer();
        }
        $manager = new Manager();
        $manager->setSerializer($serializer);
        $resource = new Collection($data, $transformer);

        return $manager->createData($resource);
    }
}