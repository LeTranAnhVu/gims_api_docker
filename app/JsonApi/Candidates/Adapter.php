<?php

namespace App\JsonApi\Candidates;

use App\Models\Candidate;
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
        parent::__construct(new Candidate(), $paging);
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
        $worker_type = $filters->get('worker_type');

        if ($name) {
            $query->orWhere('name', 'ilike', "%{$name}%");
        }
        if ($email) {
            $query->orWhere('email', 'ilike', "%{$email}%");
        }
        if ($worker_type) {
            $query->orWhere('worker_type', 'ilike', "%{$worker_type}%");
        }
    }

}
