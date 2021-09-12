<?php

namespace App\Repositories\Interfaces;

use App\Models\ShoopingCartModel;
use Illuminate\Support\Collection;


interface ShoopingCartRepositoryInterface{

    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);



}