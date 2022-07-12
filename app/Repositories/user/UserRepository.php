<?php

namespace App\Repositories\user;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return User::class;
    }
    public function createUser($request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->store_id = $request->store_id;
        $user->password = Hash::make($request->password);
        $path = $this->_upload($request);
        if ($path) {
            $user->image = $path;
        }
        $user->save();
        return $user;
//        $saveData = $this->model->create($user);
//        return $saveData->roles()->sync($request->input('roles', []));
    }
    public function updateUser($request,$id){
        $user = $this->model->find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->store_id = $request->store_id;
        $user->birthday = $request->birthday;
        $user->password = Hash::make($request->password);
        $path = $this->_upload($request);
        if ($path) {
            $user->image = $path;
        }
        $user->save();
        return $user;
//        $saveData = $this->model->create($user);
//        return $saveData->roles()->sync($request->input('roles', []));
    }
}
