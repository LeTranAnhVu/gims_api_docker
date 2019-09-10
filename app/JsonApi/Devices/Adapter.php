<?php

namespace App\JsonApi\Devices;

use App\Models\Device;
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
        parent::__construct(new Device(), $paging);
    }

    /**
     * @param  Builder  $query
     * @param  Collection  $filters
     * @return Builder
     */
    protected function filter($query, Collection $filters)
    {
        $name = $filters->get('name');
        $machine_code = $filters->get('machine_code');
        $brand = $filters->get('brand');

        if ($name) {
            $query->orWhere('name', 'like', "%{$name}%");
        }
        if ($machine_code) {
            $query->orWhere('machine_code', 'like', "%{$machine_code}%");
        }
        if ($brand) {
            $query->orWhere('brand', 'like', "%{$brand}%");
        }
    }
}
