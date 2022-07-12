<?php

namespace App\Repositories\roles;

use App\Repositories\BaseRepositoryInterface;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function createRole($request);
}
