<?php

declare(strict_types=1);

namespace Domain\Auth\Admins\Services;

use Domain\Auth\Admins\Repositories\AdminRepository;
use Illuminate\Support\Arr;

final class AdminService
{
    public function __construct(public AdminRepository $repository)
    {
    }

    public function register(array $params)
    {
        dump($params);
        dd(Arr::only($params, ['phone']));
//        $userPhone = $params->only(['phone']);
//        $user = $request->only(['genderId', 'firstName', 'lastName', 'middleName', 'isActive']);
//        $authUser = $request->only(['typeId']);
//        $admin =$request->only(['workEmail', 'workPhone', 'password']);
    }
}