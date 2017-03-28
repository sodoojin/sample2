<?php

namespace Core\Services;


use Illuminate\Validation\UnauthorizedException;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\LaravelValidator;
use Gate;

class Service
{
    /**
     * @param LaravelValidator $validator
     * @param $rule
     * @param array $data
     * @throws ValidatorException
     */
    protected function validate(LaravelValidator $validator, $rule, array $data)
    {
        if (! $validator->with($data)->passes($rule)) {
            throw new ValidatorException($validator->errorsBag());
        }
    }

    /**
     * @param $target
     * @param $policy
     */
    protected function authorize($target, $policy)
    {
        if (Gate::denies($policy, $target)) {
            throw new UnauthorizedException();
        }
    }
}