<?php

namespace App\Repositories\Interfaces;

use App\Models\BookModel;
use Illuminate\Support\Collection;


interface BookRepositoryInterface{

    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);

    public function getBookByCatId($id);

}