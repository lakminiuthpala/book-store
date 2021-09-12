<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\BookRepositoryInterface;
use App\Repositories\Interfaces\ShoopingCartRepositoryInterface;
use Darryldecode\Cart\Facades\CartFacade;
use Darryldecode\Cart\CartCollection;
use Cart;


class CartController extends Controller
{

    private $bookRepository;
    private $shoopingCartRepository; 

    public function __construct(BookRepositoryInterface $bookRepository, ShoopingCartRepositoryInterface $shoopingCartRepository )
    {
        $this->bookRepository = $bookRepository;
        $this->shoopingCartRepository = $shoopingCartRepository;
    }
    public function cartList()
    {
        $cartItems = \Cart::getContent();

        return view('layouts/cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        $id= $request->input('id');
        $product = $this->bookRepository->getById($id);
        \Cart::add([
            'id' => $product->id,
            'price' => $product->unit_price,
            'quantity' => $request->qty,
            'name' => $product->name,
            
        ]); 
        $this->shoopingCartRepository->create($request->all());

        session()->flash('success', 'Product is Added to Cart Successfully !');



        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
