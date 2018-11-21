<?php

namespace App\Repositories\Criteria\Blogs;

use App\Repositories\Criteria\Criteria;
use App\Repositories\Contracts\RepositoryInterface as Repository;

class SearchByTitle extends Criteria
{
    private $value;

    /**
     * SearchByTitle constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $model = $model->where('title', 'LIKE', '%'.$this->value.'%');

        return $model;
    }
}