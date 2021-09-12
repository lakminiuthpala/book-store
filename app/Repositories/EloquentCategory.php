<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

class EloquentCategory implements CategoryRepository{

    public function __construct(EloquentCategory $model)
    {
       $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function getById($id){
        return $this->model->findById($id);
    }

    public function create(array $attributes){
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes){
        $category = $this->model->findOrFail($id);
        $category->update($attributes);
        return $category;
    }

    public function delete($id){
        $this->getById($id)->delete();
        return true;
    }

    public function getBookByCatId($id){
        return $this->model->all()->where('cat_id', $id);
    }
}