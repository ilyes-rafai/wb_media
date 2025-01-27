<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Vite;
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
        Vite::prefetch(concurrency: 3);

        Gate::define('is_admin', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('is_member', function ($user) {
            return $user->hasRole('member');
        });

        Gate::define('is_subscriber', function ($user) {
            return $user->hasRole('subscriber');
        });

        Gate::define('is_mentor', function ($user) {
            return $user->hasRole('mentor');
        });

        // Combinations of two roles
        Gate::define('is_admin_or_member', function ($user) {
            return $user->hasAnyRoles(['admin', 'member']);
        });

        Gate::define('is_admin_or_subscriber', function ($user) {
            return $user->hasAnyRoles(['admin', 'subscriber']);
        });

        Gate::define('is_admin_or_mentor', function ($user) {
            return $user->hasAnyRoles(['admin', 'mentor']);
        });

        Gate::define('is_member_or_subscriber', function ($user) {
            return $user->hasAnyRoles(['member', 'subscriber']);
        });

        Gate::define('is_member_or_mentor', function ($user) {
            return $user->hasAnyRoles(['member', 'mentor']);
        });

        Gate::define('is_subscriber_or_mentor', function ($user) {
            return $user->hasAnyRoles(['subscriber', 'mentor']);
        });

        // Combinations of three roles
        Gate::define('is_admin_or_member_or_subscriber', function ($user) {
            return $user->hasAnyRoles(['admin', 'member', 'subscriber']);
        });

        Gate::define('is_admin_or_member_or_mentor', function ($user) {
            return $user->hasAnyRoles(['admin', 'member', 'mentor']);
        });

        Gate::define('is_admin_or_subscriber_or_mentor', function ($user) {
            return $user->hasAnyRoles(['admin', 'subscriber', 'mentor']);
        });

        Gate::define('is_member_or_subscriber_or_mentor', function ($user) {
            return $user->hasAnyRoles(['member', 'subscriber', 'mentor']);
        });

        // Combination of all four roles
        Gate::define('is_admin_or_member_or_subscriber_or_mentor', function ($user) {
            return $user->hasAnyRoles(['admin', 'member', 'subscriber', 'mentor']);
        });
    }
}
