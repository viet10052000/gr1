<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\roles\RoleRepositoryInterface;
use App\Repositories\user\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;
    public function __construct(UserRepositoryInterface $userRepository,
                                RoleRepositoryInterface $roleRepository,
                                )
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }
    public function index()
    {
        abort_if(Gate::denies('user_index'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');
        $users = $this->userRepository->getAll();
        return view('admin.user.list',compact('users'));
    }
    public function create()
    {
        abort_if(Gate::denies('user_create'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = $this->roleRepository->getAll();
        return view('admin.user.insert',compact(['roles']));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->userRepository->createUser($request);
            $user->roles()->sync($request->input('roles', []));
            DB::commit();
            return redirect(route('admin.users.list'));
        }catch (\Exception $err){
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        abort_if(Gate::denies('user_edit'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');
        $user = $this->userRepository->find($id);
        $roles = $this->roleRepository->getAll();
        return view('admin.user.edit', compact(['user','roles']));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = $this->userRepository->updateUser($request,$id);
            $user->roles()->sync($request->input('roles', []));
            DB::commit();
            return redirect(route('admin.users.list'));
        } catch (\Exception $err) {
            return redirect()->back();
        }
    }
    public function destroy(Request $request)
    {
        abort_if(Gate::denies('user_delete'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');
        $this->userRepository->delete($request->input('user_id'));
        return redirect(route('admin.users.list'));
    }
}
