<?php

namespace Lynexer\LaravelSimpleSemver;

use Lynexer\LaravelSimpleSemver\Support\Exceptions\GitTagNotFound;
use RuntimeException;
use Symfony\Component\Process\Process;

class SimpleSemver {
    protected string $version;

    public function __construct() {
        $this->version = $this->getVersion();
    }

    protected function getVersion(): string {
        $version_file = static::versionFile();

        if ($version_file && file_exists($version_file)) {
            return trim(file_get_contents($version_file));
        }

        try {
            $process = Process::fromShellCommandline('git describe --always --tags --dirty', base_path());
            $process->mustRun();
            $result = $process->getOutput();
        } catch (RuntimeException $e) {
            throw new GitTagNotFound();
        }

        return $result;
    }

    private static function versionFile(): string|bool {
        return config('simple-semver.file') ? base_path() . '/' . config('simple-semver.file') : false;
    }
}