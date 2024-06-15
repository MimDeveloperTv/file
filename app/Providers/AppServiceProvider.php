<?php

namespace App\Providers;

use App\Contracts\Repositories\Entities\FileRepository as FileRepositoryContract;
use App\Contracts\Repositories\Entities\FolderRepository as FolderRepositoryContract;
use App\Models\File;
use App\Observers\FileObserver;
use App\Repositories\Entities\FileRepository;
use App\Repositories\Entities\FolderRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadModelBindings();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        File::observe(FileObserver::class);
    }

    private function loadModelBindings()
    {
        $this->app->bind(FileRepositoryContract::class, FileRepository::class);
        $this->app->bind(FolderRepositoryContract::class, FolderRepository::class);
    }
}
