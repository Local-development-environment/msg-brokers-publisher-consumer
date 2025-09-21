<?php

declare(strict_types=1);

namespace Domain\Users\RegisterPhones\Services;

use Domain\Users\RegisterPhones\Repositories\RegisterPhoneRepository;
use Illuminate\Support\Facades\DB;

final class RegisterPhoneService
{
    public function __construct(public RegisterPhoneRepository $repository)
    {
    }

    public function registerPhone(array $params)
    {
//        dd(DB::table('jw_users.register_phones')->where('phone', data_get($params, 'phone'))->count());
        if (DB::table('jw_users.register_phones')->where('phone', data_get($params, 'phone'))->count()) {
            dd('ok');
        } else {
            dd('no');
        }

    }
}