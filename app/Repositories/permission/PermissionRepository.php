<?php


namespace App\Repositories\permission;


use App\Models\Permission;
use App\Repositories\BaseRepository;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Permission::class;
    }
}
