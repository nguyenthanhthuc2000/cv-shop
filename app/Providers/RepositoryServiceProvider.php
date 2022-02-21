<?php

namespace App\Providers;

use App\Repositories\Article\ArticleRepositoryInterface;
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
        $this->app->singleton(
            \App\Repositories\Article\ArticleRepositoryInterface::class,
            \App\Repositories\Article\ArticleRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Image\ImageRepositoryInterface::class,
            \App\Repositories\Image\ImageRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Order\OrderRepositoryInterface::class,
            \App\Repositories\Order\OrderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\OrderDetail\OrderDetailRepositoryInterface::class,
            \App\Repositories\OrderDetail\OrderDetailRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Service\ServiceRepositoryInterface::class,
            \App\Repositories\Service\ServiceRepository::class
        );
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Voucher\VoucherRepositoryInterface::class,
            \App\Repositories\Voucher\VoucherRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Setting\SettingRepositoryInterface::class,
            \App\Repositories\Setting\SettingRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Customer\CustomerRepositoryInterface::class,
            \App\Repositories\Customer\CustomerRepository::class
        );
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
