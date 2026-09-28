<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use RuntimeException;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        $this->ensureSafeTestingEnvironmentVariables();

        parent::setUp();

        $this->ensureSafeTestingConfiguration();
    }

    private function ensureSafeTestingEnvironmentVariables(): void
    {
        if (
            $this->environmentValue('APP_ENV') !== 'testing' ||
            $this->environmentValue('DB_CONNECTION') !== 'sqlite' ||
            $this->environmentValue('DB_DATABASE') !== ':memory:'
        ) {
            throw new RuntimeException(
                'Unsafe test environment: APP_ENV=testing, DB_CONNECTION=sqlite, and DB_DATABASE=:memory: are required.'
            );
        }
    }

    private function ensureSafeTestingConfiguration(): void
    {
        if (
            ! app()->environment('testing') ||
            config('database.default') !== 'sqlite' ||
            config('database.connections.sqlite.database') !== ':memory:'
        ) {
            throw new RuntimeException(
                'Unsafe test configuration: Laravel must use the in-memory SQLite database in the testing environment.'
            );
        }
    }

    private function environmentValue(string $name): ?string
    {
        $value = $_ENV[$name] ?? $_SERVER[$name] ?? getenv($name);

        return is_string($value) ? $value : null;
    }
}
