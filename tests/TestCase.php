<?php

namespace Tests;

use Core\Entities\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /** @var User */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');

        $this->user = factory(User::class)->create();
    }

    public function tearDown()
    {
        Artisan::call('migrate:reset');

        parent::tearDown();
    }

    /**
     * @param \Closure $closure
     * @param $exception
     */
    protected function assertExpectedException(\Closure $closure, $exception)
    {
        $flag = false;

        try {
            $closure();
        } catch (\Exception $e) {
            if (get_class($e) === $exception) {
                $flag = true;
            }
        }

        if ($flag) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false, "expected exception not occurred");
        }
    }
}
