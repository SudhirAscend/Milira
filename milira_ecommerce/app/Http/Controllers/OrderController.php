<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function view($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        
        return view('order.view', compact('order'));
    }
}
