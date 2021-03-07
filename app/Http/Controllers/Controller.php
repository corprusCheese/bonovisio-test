<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Laravel Swagger API documentation example",
 *     version="1.0.0",
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url="http://localhost:8098/api"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $repository;

    public function __construct(Repository $repository) {
        // передается нужный через RepositoryServiceProvider
        $this->repository = $repository;
    }
}
