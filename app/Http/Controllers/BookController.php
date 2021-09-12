<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\BookRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class BookController extends Controller
{
    private $bookRepository;
    private $categoryRepository;

    public function __construct(BookRepositoryInterface $bookRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function bookList()
    {
        $data['page_title'] = "Manage Books";
        $data['all_categories'] = $this->categoryRepository->getAll();

        $data['all_books'] = $this->bookRepository->getAll();
        return view('Book/book', $data);
    }

    public function deleteBook(Request $request)
    {
        $id = $request->get('id');
        $data['delete'] = $this->bookRepository->delete($id);
    }

    public function addBook(Request $request){ 
        $this->validate($request, [
            'cat_id' => 'required',
            'description' => 'required|max:255',
            'name' => 'required|unique:books|max:255',
            'unit_price' => 'required',
            'qty' => 'required|numeric',
        ]);

        $this->bookRepository->create($request->all());
        echo 1;
    }

    public function editBook(Request $request){
        $id = $request->get('id');
        $data['book_detail'] = $this->bookRepository->getById($id);
        $data['all_categories'] = $this->categoryRepository->getAll();

        echo view('Book/edit_book', $data);
    }

    public function updateBook(Request $request){
        $id= $request->input('id');

        $this->validate($request, [
            'cat_id' => 'required',
            'description' => 'required|max:255',
            'name' => 'required|max:255',
            'unit_price' => 'required',
            'qty' => 'required|numeric',
        ]);

        $this->bookRepository->update($id, $request->all());
        echo 1;
       
 
    }

    public function filterBook(){
        $data['all_categories'] = $this->categoryRepository->getAll();

        $data['all_books'] = $this->bookRepository->getAll();

        return view('Book/book_list', $data);
    }

    public function displayFilteredBook(Request $request){
        $cat_id = $request->get('id');

        $data['books'] = $this->bookRepository->getBookByCatId($cat_id);

        echo view('Book/filtered_book_list',$data);
    }
}
