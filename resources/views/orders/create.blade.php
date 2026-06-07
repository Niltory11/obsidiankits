@extends('adminlte::page')

@section('title', 'New Order')

@section('content_header')
    <h1>New Order</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                @include('orders._form')
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Order
                </button>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection