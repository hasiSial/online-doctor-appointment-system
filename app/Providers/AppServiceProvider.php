<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Frontend\DoctorContract;
use App\Http\Services\Frontend\DoctorService;
use App\Contracts\Frontend\DepartmentContract;
use App\Http\Services\Frontend\DepartmentService;
use App\Contracts\Frontend\DoctorDashboardContract;
use App\Http\Services\Frontend\DoctorDashboardService;
use App\Contracts\Frontend\Dashboard\ScheduleTimingContract;
use App\Http\Services\Frontend\Dashboard\ScheduleTimingService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            DoctorContract::class,
            function ($app) {
                return $app->make(DoctorService::class);
            }
        );

        $this->app->bind(
            DepartmentContract::class,
            function ($app) {
                return $app->make(DepartmentService::class);
            }
        );

        $this->app->bind(
            DoctorDashboardContract::class,
            function ($app) {
                return $app->make(DoctorDashboardService::class);
            }
        );

        $this->app->bind(
            ScheduleTimingContract::class,
            function ($app) {
                return $app->make(ScheduleTimingService::class);
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
