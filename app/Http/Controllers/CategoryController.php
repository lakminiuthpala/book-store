<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;


class CategoryController extends Controller
{
    private $categoryRepository;
  
   public function __construct(CategoryRepositoryInterface $categoryRepository)
   {
       $this->categoryRepository = $categoryRepository;
   }

    public function categoryList()
    {
        $data['page_title'] = 'Manage Category';
        $data['all_categories'] = $this->categoryRepository->getAll();

        return view('category/category', $data);
    }

    public function deleteCategory(Request $request){
        $id = $request->get('id');
        $data['delete'] = $this->categoryRepository->delete($id);
    }

    public function addCategory(Request $request){
        $data = $request->input();

        $this->validate($request, [
            'category' => 'required|unique:categories|max:50',
            'description' => 'required|max:255',
        ]);

        $this->categoryRepository->create($request->all());
   
 
    }

    public function editCategory(Request $request){
        $id = $request->get('id');
        $data['cat_detail'] = $this->categoryRepository->getById($id);

        echo view('category/edit_category', $data);
    }

    public function updateCategory(Request $request){
        $id= $request->input('id');

        $this->validate($request, [
            'category' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        $this->categoryRepository->update($id, $request->all());
        echo 1;
       
 
    }
}
