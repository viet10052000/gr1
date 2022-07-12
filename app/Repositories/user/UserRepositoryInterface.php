<?php

namespace App\Repositories\user;

use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function createUser($request);
    public function updateUser($request,$id);

}
