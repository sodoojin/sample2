<?php


namespace Core\Policies;


use Core\Entities\Reservation;
use Core\Entities\User;

class ReservationPolicy
{
    /**
     * @return bool
     */
    public function create()
    {
        return true;
    }

    /**
     * @param User $user
     * @param Reservation $reservation
     * @return bool
     */
    public function update(User $user, Reservation $reservation)
    {
        return $user->getKey() == $reservation->sender_id;
    }
}