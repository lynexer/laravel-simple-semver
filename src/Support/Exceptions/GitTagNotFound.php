<?php

namespace Lynexer\LaravelSimpleSemver\Support\Exceptions;

use RuntimeException;

class GitTagNotFound extends RuntimeException {
    public function __construct() {
        parent::__construct('Failed to get version from Git tag');
    }
}