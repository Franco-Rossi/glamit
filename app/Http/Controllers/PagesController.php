<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class PagesController extends Controller
{
    public function index()
    {

        $orders = Order::paginate(5);

        return view ('home', compact('orders'));
    }
}
