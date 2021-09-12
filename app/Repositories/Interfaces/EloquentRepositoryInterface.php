<?php
namespace App\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;

/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/
interface EloquentRepositoryInterface
{
   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   public function find($id): Model;

   public function update($id, array $attributes) : Model;

   public function delete($id) ;

   public function getAll() ;

   public function getBookByCatId($id);

}