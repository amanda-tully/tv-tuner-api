<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('viewPulse', function (User $user) {
            return $user->isAdmin();
        });

        // Enforce strict mode for the application.
        Model::shouldBeStrict();

        // Disable wrapping for JSON resources.
        JsonResource::withoutWrapping();

        // Enforce a morph map for models.
        Relation::enforceMorphMap([
            'user' => 'App\Models\User',
        ]);
    }
}
