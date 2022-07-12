<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\permission\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    private $permissionRepository;
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    public function index(){
        abort_if(Gate::denies('permission_index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = $this->permissionRepository->getAll();
        return view('admin.permission.list',compact('permissions'));
    }
    public function create(){
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.permission.insert');
    }
    public function store(Request $request){
        $permission = $this->permissionRepository->create($request->all());
        if ($permission){
            return redirect(route('admin.permissions.list'));
        }else{
            return redirect(route('admin.permissions.insert'));
        }
    }
    public function edit($id){
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission = $this->permissionRepository->find($id);
        return view('admin.permission.edit', compact('permission'));
    }
    public function update(Request $request,$id){
        $data = $request->all();
        $this->permissionRepository->update($id,$data);
        return redirect(route('admin.permissions.list'));
    }
    public function destroy(Request $request){
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $id = $request->input('permission_id');
        $this->permissionRepository->delete($id);
        return redirect(route('admin.permissions.list'));
    }
}
