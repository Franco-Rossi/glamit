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

    public function first(){

        $order = new Order();
        
        $order->name = request('name');
        $order->description = request('description');
        $order->mime = $img_name->getClientMimeType();
        $order->original_filename = $img_name->getClientOriginalName();
        $order->filename = $img_name->getFilename().'.'.$extension;
        $order->keywords = request('keywords');
        $order->save();
    }

    /* public function show($id){
        $product = Product::findOrFail($id);
        return view('admin.productos.show', compact('product'));
    } */
}
