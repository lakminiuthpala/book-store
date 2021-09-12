<?php 
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookModel;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Support\Collection;
use App\Repositories\BaseRepository;

class BookRepository extends BaseRepository implements BookRepositoryInterface {
    public function __construct(BookModel $model)
    {
       $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function getById($id){
        return $this->model->find($id);
    }

    public function create(array $attributes): BookModel{
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes): BookModel{
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