<?php

namespace App\Http\Services;

use App\Http\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserServices
{
    public function __construct()
    {
        $this->user = new UserRepository();
    }

    public function getOne($id)
    {
        return $this->user->getOne($id);
    }

    public function getAll()
    {
        return $this->user->getAll();
    }

    public function create($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->user->create($data);
    }

    public function update($data, $id)
    {
        return $this->user->update($data,$id);
    }

    public function delete($id)
    {
        return $this->user->delete($id);
    }

}
