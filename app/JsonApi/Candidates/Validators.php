<?php

namespace App\JsonApi\Candidates;

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
    protected $allowedSortParameters = [
        'id', 'email', 'name', 'address', 'gender', 'apply_way', 'cv', 'phone', 'worker_type'
    ];

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
            'email' => 'required|email',
            'name' => 'required|string',
            'address' => 'required',
            'gender' => 'required|string',
            'apply_way' => 'required|string',
            'cv' => 'required|string',
            'phone' => 'required|string',
            'worker_type' => 'required|string'
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
            'sort.email' => 'filled|string',
            'sort.name' => 'filled|string',
            'sort.address' => 'filled',
            'sort.gender' => 'filled|string',
            'sort.apply_way' => 'filled|string',
            'sort.cv' => 'filled|string',
            'sort.phone' => 'filled|integer',
            'sort.worker_type' => 'filled|string',
            'filter.name' => 'nullable|string',
            'filter.email' => 'nullable|string',
            'filter.worker_type' => 'nullable|string',
        ];
    }

}
