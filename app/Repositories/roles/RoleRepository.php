<?php

namespace App\Repositories\roles;

use App\Models\Role;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Role::class;
    }

    public function createRole($request)
    {
        // TODO: Implement createRole() method.
        $role = $request->all();
        $saveDataRole = $this->model->create($role);
        return $saveDataRole->permissions()->sync($request->input('permissions', []));
    }
}
