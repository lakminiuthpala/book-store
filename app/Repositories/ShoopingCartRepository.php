<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShoopingCartModel;
use App\Repositories\Interfaces\ShoopingCartRepositoryInterface;
use Illuminate\Support\Collection;
use App\Repositories\BaseRepository;

class ShoopingCartRepository extends BaseRepository implements ShoopingCartRepositoryInterface{

    public function __construct(ShoopingCartModel $model)
    {
       $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function getById($id){
        return $this->model->findById($id);
    }

    public function create(array $attributes) : ShoopingCartModel{
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)  : ShoopingCartModel{
        $category = $this->model->findOrFail($id);
        $category->update($attributes);
        return $category;
    }

    public function delete($id){
        $this->getById($id)->delete();
        return true;
    }


}