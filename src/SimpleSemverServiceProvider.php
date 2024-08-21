<?php

namespace Lynexer\LaravelSimpleSemver;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Lynexer\LaravelSimpleSemver\Support\Facades\Version;

class SimpleSemverServiceProvider extends ServiceProvider {
    public function register(): void {
        $this->mergeConfigFrom(__DIR__ . '/config/simple-semver.php', 'simple-semver');
        $this->app->bind('version', SimpleSemver::class);
    }
    
    public function boot(): void {
        $this->publishes([ __DIR__ . '/config/simple-semver.php' => config_path('simple-semver.php')]);
        AliasLoader::getInstance()->alias('Version', Version::class);
    }
}