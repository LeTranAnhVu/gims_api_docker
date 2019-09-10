<?php

namespace App\JsonApi\Users;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'users';

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
            'name' => $resource->name,
            'nickname' => $resource->nickename,
            'email' => $resource->email,
            'employee_code' => $resource->employee_coode,
            'gender' => $resource->gender,
            'address' => $resource->address,
            'start_date' => $resource->start_date,
            'contact' => $resource->contact,
            'finance' => $resource->finance,
            'created_at' => $resource->created_at->toAtomString(),
            'updated_at' => $resource->updated_at->toAtomString()
        ];
    }
}
