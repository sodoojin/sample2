<?php

namespace Core\Services;


use Core\Entities\Reservation;
use Core\Repositories\ReservationRepository;
use Core\Validators\ReservationValidator;
use Prettus\Validator\LaravelValidator;

class ReservationService extends Service
{
    /**
     * @var ReservationRepository
     */
    private $repository;
    /**
     * @var ReservationValidator
     */
    private $validator;

    /**
     * ReservationService constructor.
     * @param ReservationRepository $repository
     * @param ReservationValidator $validator
     */
    public function __construct(
        ReservationRepository $repository,
        ReservationValidator $validator
    ) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $this->validate($this->validator, LaravelValidator::RULE_CREATE, $data);

        $this->authorize(Reservation::class, 'create');

        return $this->repository->create($data);
    }
}