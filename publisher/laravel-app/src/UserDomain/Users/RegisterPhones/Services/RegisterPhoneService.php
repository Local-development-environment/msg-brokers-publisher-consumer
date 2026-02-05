<?php

declare(strict_types=1);

namespace UserDomain\Users\RegisterPhones\Services;

use Illuminate\Support\Facades\DB;
use UserDomain\Users\RegisterPhones\Repositories\RegisterPhoneRepository;

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
