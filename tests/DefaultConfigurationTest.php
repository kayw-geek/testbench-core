<?php

namespace Orchestra\Testbench\Tests;

use Orchestra\Testbench\TestCase;

class DefaultConfigurationTest extends TestCase
{
    /**
     * @test
     *
     * @group phpunit-configuration
     */
    public function it_populate_expected_app_key_config()
    {
        $this->assertSame('AckfSECXIvnK5r28GVIWUAxmbBSjTsmF', $this->app['config']['app.key']);
    }

    /** @test */
    public function it_populate_expected_testing_config()
    {
        tap($this->app['config']['database.connections.testing'], function ($config) {
            $this->assertTrue(isset($config));
            $this->assertEquals([
                'driver' => 'sqlite',
                'database' => ':memory:',
                'foreign_key_constraints' => false,
            ], $config);
        });
    }

    /** @test */
    public function it_populate_expected_cache_defaults()
    {
        $this->assertEquals('array', $this->app['config']['cache.default']);
    }

    /** @test */
    public function it_populate_expected_session_defaults()
    {
        $this->assertEquals('array', $this->app['config']['session.driver']);
    }
}
