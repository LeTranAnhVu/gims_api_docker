<?php

namespace App\JsonApi\Roles;

use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{

    /**
     * The allowed paging parameters.
     * @var string[]|null
     */
    protected $allowedPagingParameters = ['number', 'size'];

    /**
     * The allowed filtering parameters.
     *
     * @var string[]|null
     */
    protected $allowedFilteringParameters = [
        'name'
    ];
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
        'created_at',
        'name'
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
            'name' => 'required|string',
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
            'filter.name' => 'filled|string',
        ];
    }

}
