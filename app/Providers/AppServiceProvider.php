<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton(
          \App\Repositories\Product\ProductRepositoryInterface::class,
          \App\Repositories\Product\ProductEloquentRepository::class
      );
      $this->app->singleton(
          \App\Repositories\User\UserRepositoryInterface::class,
          \App\Repositories\User\UserEloquentRepository::class
      );
      $this->app->singleton(
          \App\Repositories\Category\CateRepositoryInterface::class,
          \App\Repositories\Category\CateEloquentRepository::class
      );
      $this->app->singleton(
          \App\Repositories\Contact\ContactRespositoryInterface::class,
          \App\Repositories\Contact\ContactEloquentRespository::class
      );
    }
}
