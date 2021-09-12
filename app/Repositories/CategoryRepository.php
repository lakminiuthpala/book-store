<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Collection;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface{

    public function __construct(CategoryModel $model)
    {
       $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function getById($id){
        return $this->model->find($id);
    }

    public function create(array $attributes): CategoryModel{
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes): CategoryModel{
        $category = $this->model->findOrFail($id);
        $category->update($attributes);
        return $category;
    }

    public function delete($id){

        // dd($id);
        $this->getById($id)->delete();
        return true;
    }
}