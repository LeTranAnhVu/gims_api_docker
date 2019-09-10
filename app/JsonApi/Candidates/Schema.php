<?php

namespace App\JsonApi\Candidates;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'candidates';

    /**
     * @param $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'email' => $resource->email,
            'name' => $resource->name,
            'address' => $resource->address,
            'gender' => $resource->gender,
            'apply_way' => $resource->apply_way,
            'cv' => $resource->cv,
            'phone' => $resource->phone,
            'worker_type' => $resource->worker_type,
            'created_at' => $resource->created_at->toAtomString(),
            'updated_at' => $resource->updated_at->toAtomString(),
        ];
    }
}
