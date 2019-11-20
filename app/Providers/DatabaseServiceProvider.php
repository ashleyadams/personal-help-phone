<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\NumbersRepository;
use App\Repositories\NumbersRepositoryInterface;

class DatabaseServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind(NumbersRepositoryInterface::class, NumbersRepository::class);
    }

}
