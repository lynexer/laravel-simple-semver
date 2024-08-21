<?php

namespace Lynexer\LaravelSimpleSemver;

use Illuminate\Support\ServiceProvider;

class SimpleSemverServiceProvider extends ServiceProvider {
    public function register(): void {
        $this->mergeConfigFrom(__DIR__ . '/config/simple-semver.php', 'simple-semver');
    }
    
    public function boot(): void {
        $this->publishes([ __DIR__ . '/config/simple-semver.php' => config_path('simple-semver.php')]);
    }
}