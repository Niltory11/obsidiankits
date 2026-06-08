@extends('adminlte::page')

@section('title', 'Order Details')

@section('content_header')
    <h1>Order — {{ $order->order_number }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Order Number</th><td>{{ $order->order_number }}</td></tr>
                <tr><th>Customer Name</th><td>{{ $order->customer_name }}</td></tr>
                <tr><th>Number</th><td>{{ $order->customer_number }}</td></tr>
                <tr><th>Address</th><td>{{ $order->customer_address }}</td></tr>

                <tr><th>Jersey</th><td>{{ $order->jersey_name }}</td></tr>
                <tr><th>Name & Number</th><td>{{ $order->name_number }}</td></tr>
                <tr><th>QTY</th><td>{{ $order->qty }}</td></tr>

                <tr><th>Total Price</th><td>৳{{ number_format($order->total_price, 2) }}</td></tr>
                <tr><th>Order Date</th><td>{{ $order->created_at->format('d M Y, h:i A') }}</td></tr>
                <tr><th>Status</th><td>{{ ucfirst($order->status) }}</td></tr>
                <tr><th>Payment Status</th><td>{{ ucfirst($order->payment_status) }}</td></tr>
            </table>

            <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
@endsection