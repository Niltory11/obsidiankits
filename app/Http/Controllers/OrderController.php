<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders        = Order::latest()->paginate(10);
        $totalOrders   = Order::count();
        $todayOrders   = Order::whereDate('created_at', today())->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $paidOrders    = Order::where('payment_status', 'paid')->count();

        return view('orders.index', compact(
            'orders',
            'totalOrders',
            'todayOrders',
            'pendingOrders',
            'paidOrders'
        ));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'jersey_name'    => 'required|string|max:255',
            'name_number'    => 'nullable|string|max:255',
            'total_price'    => 'required|numeric|min:0',
            'status'         => 'required|in:pending,processing,shipped,delivered,cancelled',
            'payment_status' => 'required|in:unpaid,paid,refunded',
        ]);

        Order::create([
            'order_number'   => 'ORD-' . strtoupper(uniqid()),
            'customer_name'  => $request->customer_name,
            'jersey_name'    => $request->jersey_name,
            'name_number'    => $request->name_number ?? null,
            'total_price'    => $request->total_price,
            'status'         => $request->status,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'jersey_name'    => 'required|string|max:255',
            'name_number'    => 'nullable|string|max:255',
            'total_price'    => 'required|numeric|min:0',
            'status'         => 'required|in:pending,processing,shipped,delivered,cancelled',
            'payment_status' => 'required|in:unpaid,paid,refunded',
        ]);

        $order->update([
            'customer_name'  => $request->customer_name,
            'jersey_name'    => $request->jersey_name,
            'name_number'    => $request->name_number ?? null,
            'total_price'    => $request->total_price,
            'status'         => $request->status,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}