<?php

namespace Lynexer\LaravelSimpleSemver\Support\Facades;

use Illuminate\Support\Facades\Facade;

class Version extends Facade {
    public static function getFacadeAccessor(): string {
        return 'version';
    }
}