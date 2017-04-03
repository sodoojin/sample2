<?php

namespace Core\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ReservationValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'comment' => 'required',
            'appointed_day' => 'required|date',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'appointed_day' => 'date',
        ],
   ];
}
