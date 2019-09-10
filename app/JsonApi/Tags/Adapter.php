<?php

namespace App\JsonApi\Tags;

use App\Models\Tag;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Adapter extends AbstractAdapter
{
    //filter
    protected $fillable = ['kind', 'name'];

    //sort
    protected $defaultSort = ['id'];
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
        parent::__construct(new \App\Models\Tag(), $paging);
    }

    /**
     * @param  Builder  $query
     * @param  Collection  $filters
     * @return Builder
     */
    protected function filter($query, Collection $filters)
    {
        $kind = $filters->get('kind');
        $name = $filters->get('name');

        if ($kind) {
            $query->where('kind', 'like', "%{$kind}%");
        }
        if ($name) {
            $query->where('name', 'like', "%{$name}%");
        }
        return $query;
    }
}
