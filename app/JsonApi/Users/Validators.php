<?php

namespace App\JsonApi\Users;

use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{

    protected $allowedPagingParameters = ['number', 'size'];

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
    protected $allowedSortParameters = ['id', 'start_date', 'created_at', 'name', 'email', 'gender'];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedFilteringParameters = ['name', 'email', 'nickname'];

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
            'nickname' => 'string',
            'birthday' => 'date',
            'email' => 'email',
            'password' => 'required'
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
            'page.number' => 'nullable|numeric|min:1',
            'page.size' => 'nullable|numeric|min:1',
            'filter.name' => 'nullable|string',
            'filter.email' => 'nullable|string',
            'filter.nickname' => 'nullable|string',
        ];
    }

}
