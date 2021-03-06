<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $repository;

    public function __construct(Repository $repository) {
        // передается нужный через RepositoryServiceProvider
        $this->repository = $repository;
    }
}
