<?php

namespace App\Providers;

use App\Repositories\Impl\TransactionCategoryRepositoryImpl;
use App\Repositories\Impl\TransactionRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\TransactionCategoryRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $singletons = [
        UserRepository::class => UserRepositoryImpl::class,
        TransactionCategoryRepository::class => TransactionCategoryRepositoryImpl::class,
        TransactionRepository::class => TransactionRepositoryImpl::class,
    ];
}
