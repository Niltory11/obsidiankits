@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Jersey POS Dashboard</h1>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-3">
            <div class="info-box bg-success">
                <span class="info-box-icon">
                    <i class="fas fa-shopping-cart"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Today's Orders</span>
                    <span class="info-box-number">{{ $todayOrders }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-primary">
                <span class="info-box-icon">
                    <i class="fas fa-list-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Orders</span>
                    <span class="info-box-number">{{ $totalOrders }}</span>
                </div>
            </div>
        </div>

    </div>
        <div class="col-md-3">
            <div class="info-box bg-primary">
                <span class="info-box-icon">
                    <i class="fas fa-money-bill"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Today's Revenue</span>
                    
                    <span class="info-box-number">{{ $todayRevenue }}</span>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-warning">
                <span class="info-box-icon">
                    <i class="fas fa-tshirt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Products</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-danger">
                <span class="info-box-icon">
                    <i class="fas fa-money-bill"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Revenue</span>
                    <span class="info-box-number">{{ $totalRevenue }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection