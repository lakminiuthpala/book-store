<?php   

namespace App\Repositories;   

use App\Repositories\Interfaces\EloquentRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;   

class BaseRepository implements EloquentRepositoryInterface 
{     
    /**      
     * @var Model      
     */     
     protected $model;       

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
 
    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
 
    public function find($id): Model
    {
        return $this->model->find($id);
    }

    public function update($id, array $attributes): Model
    {
        $category = $this->model->findOrFail($id);
        $category->update($attributes);
        return $category;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function delete($id)
    {
        $this->find($id)->delete();
        return true;
    }

    public function getById($id){
        return $this->model->find($id);
    }

    public function getBookByCatId($id){
        return $this->model->all()->where('cat_id', $id);
    }
}