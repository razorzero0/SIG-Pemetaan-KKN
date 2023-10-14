<?php

namespace App\Providers;

use App\Repositories\Lecturer\LecturerRepository;
use App\Repositories\Lecturer\LecturerRepositoryInterface;
use App\Repositories\Location\GroupRepository;
use App\Repositories\Location\GroupRepositoryInterface;
use App\Repositories\Location\LocationRepository;
use App\Repositories\Location\LocationRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Admin\AdminService;
use App\Services\Admin\AdminServiceInterface;
use App\Services\Group\GroupService;
use App\Services\Group\GroupServiceInterface;
use App\Services\Lecturer\LecturerService;
use App\Services\Lecturer\LecturerServiceInterface;
use App\Services\Location\LocationService;
use App\Services\Location\LocationServiceInterface;
use App\Services\Profile\ProfileService;
use App\Services\Profile\ProfileServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repository Binding
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(LecturerRepositoryInterface::class, LecturerRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);

        // Service Binding
        $this->app->bind(AdminServiceInterface::class, AdminService::class);
        $this->app->bind(ProfileServiceInterface::class, ProfileService::class);
        $this->app->bind(LecturerServiceInterface::class, LecturerService::class);
        $this->app->bind(LocationServiceInterface::class, LocationService::class);
        $this->app->bind(GroupServiceInterface::class, GroupService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
