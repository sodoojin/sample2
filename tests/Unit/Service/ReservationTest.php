<?php

namespace Tests\Unit\Service;

use Core\Entities\Reservation;
use Core\Services\ReservationService;
use Illuminate\Validation\UnauthorizedException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReservationTest extends TestCase
{
    /** @var ReservationService */
    private $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = $this->app->make(ReservationService::class);
    }

    /** @test */
    public function create_test()
    {
        $data = factory(Reservation::class)->make()->toArray();

        $this->assertExpectedException(function() use ($data) {
            $this->service->create($data);
        }, UnauthorizedException::class);

        $this->actingAs($this->user);
        $this->service->create($data);
    }
}
