<?php

namespace Core\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Core\Repositories\ReservationRepository;
use Core\Entities\Reservation;
use Core\Validators\ReservationValidator;

/**
 * Class ReservationRepositoryEloquent
 * @package namespace Core\Repositories;
 */
class ReservationRepositoryEloquent extends BaseRepository implements ReservationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Reservation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
