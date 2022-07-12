<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\permission\PermissionRepositoryInterface;
use App\Repositories\roles\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RoleController extends Controller
{
    private $roleRepository;
    private $permissionRepository;
    public function __construct(RoleRepositoryInterface $roleRepository,
                                PermissionRepositoryInterface $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }
    public function index(){
        abort_if(Gate::denies('role_index'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = $this->roleRepository->getAll();
        return view('admin.role.list',compact('roles'));
    }
    public function create(){
        abort_if(Gate::denies('role_create'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = $this->permissionRepository->getAll();
        return view('admin.role.insert',compact('permissions'));
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $this->roleRepository->createRole($request);
            DB::commit();
            return redirect()->route('admin.roles.list');
        }catch (\Exception $err){
            return redirect()->back();
        }
    }
    public function edit($id){
        abort_if(Gate::denies('role_edit'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');
        $role = $this->roleRepository->find($id);
        $permissions = $this->permissionRepository->getAll();
        return view('admin.role.edit',
            compact(['role','permissions']));
    }
    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $role = $this->roleRepository->update($id, $request->all());
            $role->permissions()->sync($request->input('permissions', []));
            DB::commit();
            return redirect()->route('admin.roles.list');
        } catch (\Exception $err) {
            return redirect()->back();
        }
    }
    public function destroy(Request $request){
        abort_if(Gate::denies('role_delete'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');
        $id = $request->input('role_id');
        $this->roleRepository->delete($id);
        return redirect(route('admin.roles.list'));
    }
}
