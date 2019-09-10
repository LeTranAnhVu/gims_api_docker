<?php

namespace App\JsonApi\Devices;

use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{
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
    protected $allowedSortParameters = ['id', 'name', 'machine_code', 'price', 'status', 'brand'];

    /**
     * Get resource validation rules.
     *
     * @param  mixed|null  $record
     *      the record being updated, or null if creating a resource.
     * @return mixed
     */
    protected function rules($record = null): array
    {
        return [
            'type' => 'required|string',
            'name' => 'required|string',
            'machine_code' => 'required|string',
            'price' => 'required|integer',
            'status' => 'boolean',
            'brand' => 'required|string'
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
            'page.size' => 'filled|numeric|between:1,100',
            'sort.id' => 'filled|integer',
            'sort.name' => 'filled|string',
            'sort.machine_code' => 'filled|string',
            'sort.price' => 'filled|integer',
            'sort.status' => 'filled|string',
            'sort.brand' => 'filled|string',
            'filter.name' => 'nullable|string',
            'filter.machine_code' => 'nullable|string',
            'filter.brand' => 'nullable|string'
        ];
    }

}
