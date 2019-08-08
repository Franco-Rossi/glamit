<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create(){

        return view ('orders.create');
        
    }

    /* public function show($id){
        $product = Product::findOrFail($id);
        return view('admin.productos.show', compact('product'));
    } */
}
