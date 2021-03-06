<?php

namespace App\Providers;

use App\Http\Controllers\LetterController;
use App\Http\Repositories\LetterRepository;
use App\Http\Repositories\Repository;
use App\Models\Letter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->when(LetterRepository::class)
            ->needs(Model::class)
            ->give(Letter::class);

        $this->app->when(LetterController::class)
            ->needs(Repository::class)
            ->give(LetterRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
