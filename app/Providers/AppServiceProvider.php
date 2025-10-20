<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Estudiante;
use App\Models\Informe;
use App\Observers\EstudianteObserver;
use App\Observers\InformeObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Estudiante::observe(EstudianteObserver::class);
        Informe::observe(InformeObserver::class);
    }
}
