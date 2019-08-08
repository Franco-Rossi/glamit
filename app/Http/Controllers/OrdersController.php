<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\Estado;
use Illuminate\Support\Carbon;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }
    
    public function create(){
        
        $items = Item::all();
        return view ('orders.create', compact('items'));
        
    }
    
    public function buy(){
        
        $item_codigo = request()->item_codigo;
        $item = Item::findOrFail($item_codigo);
        $status = Estado::findOrFail(5);

        $order = new Order();

        $order->fecha_creacion = Carbon::now();

        $order->estado = $status->estado;
        $order->subestado = $status->subestado;
        
        $order->item_codigo = request('item_codigo');
        $order->item_nombre = $item->name;
        $order->item_preciounitario = $item->price;
        $order->item_cantidad = request('item_cantidad');
        
        $order->cliente_nombre = request('cliente_nombre');
        $order->cliente_email = request('cliente_email');
        $order->cliente_telefono = request('cliente_telefono');
        $order->cliente_direccion = request('cliente_direccion');
        
        $order->save();
        
        return redirect('/');
    }
}
