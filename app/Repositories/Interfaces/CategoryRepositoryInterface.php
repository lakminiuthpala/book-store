<?php
namespace App\Repositories\Interfaces;

use App\Model\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface{

    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}
