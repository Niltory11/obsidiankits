@extends('adminlte::page')

@section('title', 'Edit Order')

@section('content_header')
    <h1>Edit Order — {{ $order->order_number }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('orders.update', $order) }}" method="POST">
                @csrf @method('PUT')
                @include('orders._form')
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update Order
                </button>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection