<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository {

    protected $model;

    public function __construct(Model $model)
    {
        // нужная модель передается через RepositoryServiceProvider
        $this->model = $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    abstract public function find($request);
    abstract public function show(int $id);
}
