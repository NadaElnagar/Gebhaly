<?php

namespace App\Http\Repository;

use App\Http\Interfaces\Crud;
use App\Models\User;

class UserRepository implements Crud
{
    public function getOne($id)
    {
        return User::find($id);
    }

    public function getAll()
    {
        return User::get();
    }

    public function create($data)
    {
        return User::create(['name'=>$data['name'],
            'email'=>$data['email'],'password'=>$data['password']
            ]);
    }

    public function update($data, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        return$user->save();
    }

    public function delete($id)
    {

        $user = User::find($id);
        return  $user->delete();
     }

}
