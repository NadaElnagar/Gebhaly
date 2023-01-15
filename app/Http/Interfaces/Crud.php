<?php

namespace App\Http\Interfaces;

interface Crud
{
    public function getOne($id);

    public function getAll();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);
}
