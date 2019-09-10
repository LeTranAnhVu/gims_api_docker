<?php

namespace App\JsonApi\Tags;

use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{

    // pagination
    protected $allowedPagingParameters = ['number' , 'size'];

    // filter
    protected  $allowedFilteringParameters = ['kind' , 'name'];


    /**
     * The include paths a client is allowed to request.
     *
     * @var string[]|null
     *      the allowed paths, an empty array for none allowed, or null to allow all paths.
     */
    protected $allowedIncludePaths = [];

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *      the allowed fields, an empty array for none allowed, or null to allow all fields.
     */
    protected $allowedSortParameters = [
        'id',
        'kind',
        'name',
    ];

    /**
     * Get resource validation rules.
     *
     * @param mixed|null $record
     *      the record being updated, or null if creating a resource.
     * @return mixed
     */
    protected function rules($record = null): array
    {
        return [
            'type' => 'required|string',
            'name' => 'required|string'
        ];
    }

    /**
     * Get query parameter validation rules.
     *
     * @return array
     */
    protected function queryRules(): array
    {
        return [
            'page.number' => 'filled|numeric|min:1',
            'page.size' => 'filled|numeric|min:1',
            'filter.kind' => 'filled|string',
            'filter.name' => 'filled|string'
        ];
    }

}
