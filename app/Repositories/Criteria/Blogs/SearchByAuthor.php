<?php

namespace App\Repositories\Criteria\Blogs;

use App\Repositories\Criteria\Criteria;
use App\Repositories\Contracts\RepositoryInterface as Repository;

class SearchByAuthor extends Criteria
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
        $model = $model->join('users', 'blogs.user_id', '=', 'users.id')->where('users.name', 'LIKE',
                '%'.$this->value.'%');

        return $model;
    }
}