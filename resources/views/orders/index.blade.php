@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Orders</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> New Order
        </a>
    </div>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Jersey</th>
                        <th>Name & Number(Print) </th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td><b>{{ $order->order_number }}</b></td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->jersey_name }}</td>
                        <td>{{ $order->name_number }}</td>

                        <td>৳{{ number_format($order->total_price, 2) }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>
                            @php
                                $statusColors = [
                                    'pending'    => 'warning',
                                    'processing' => 'info',
                                    'shipped'    => 'primary',
                                    'delivered'  => 'success',
                                    'cancelled'  => 'danger',
                                ];
                            @endphp
                            <span class="badge badge-{{ $statusColors[$order->status] }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $order->payment_status === 'paid' ? 'success' : ($order->payment_status === 'refunded' ? 'secondary' : 'danger') }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Delete this order?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No orders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $orders->links() }}
        </div>
    </div>
@endsection