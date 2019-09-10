<?php

namespace App\JsonApi\Users;

use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Adapter extends AbstractAdapter
{

    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Adapter constructor.
     *
     * @param  StandardStrategy  $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        $paging->withUnderscoredMetaKeys()->withMetaKey('page');
        parent::__construct(new \App\Models\User(), $paging);
    }

    /**
     * @param  Builder  $query
     * @param  Collection  $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        $name = $filters->get('name');
        $email = $filters->get('email');
        $nickname = $filters->get('nickname');

        if ($name) {
            $query->orWhere('users.name', 'like', "%{$name}%");
        }

        if ($email) {
            $query->orWhere('users.email', 'like', "%{$email}%");
        }

        if ($nickname) {
            $query->orWhere('users.nickname', 'like', "%{$nickname}%");
        }

        // Ignore current user to list
        $query->where('users.id', '<>', auth()->user()->id);
    }

}
