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
        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));
    }
    
    public function show($id){
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }
    
    public function create(){
        
        $items = Item::all();
        return view ('orders.create', compact('items'));
        
    }
    
    public function buy(Request $request){
        $item = Item::findOrFail($request->item_codigo);
        
        $data = $request->all();
        $data['fecha_creacion'] = now();
        $data['item_codigo'] = $item->id;
        $data['item_nombre'] = $item->name;
        $data['item_preciounitario'] = $item->price;
        $data['intereses'] = ($item->price * $request->item_cantidad) * 0.05;
        $data['item_subtotal'] = ($item->price * $request->item_cantidad) + $data['intereses'];
        $data['estado_id'] = Estado::ESTADO_PENDIENTE;
        
        $order = Order::create($data);    
        return redirect('/');
    }
    
    public function pay($id){

        
        $order = Order::findOrFail($id);
        return view ('orders.pay', compact('order'));
        
    }
    
    public function update(Request $request, $id){

        $order = Order::findOrFail($id);
        
        $data = $request->all();
        $data['fecha_factura'] = now();
        $data['costo_envio'] = $order->item_subtotal * 0.01;
        $data['total'] = $order->item_subtotal + $data['costo_envio'];
        $data['estado_id'] = Estado::ESTADO_APROBADO;
        
        $order->update($data);    
        return redirect('/');
    }
    
    
    
    public function changeStatus(Request $request, $id)
    {
        
        $order = Order::findOrFail($id);
        $order->estado_id = $request->status;
        $order->save();
        
        return redirect()->back();
    }
    
}
