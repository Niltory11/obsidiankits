<div class="form-group">
    <label>Customer Name</label>
    <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror"
        value="{{ old('customer_name', $order->customer_name ?? '') }}">
    @error('customer_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Jersey Name</label>
    <input type="text" name="jersey_name" class="form-control @error('jersey_name') is-invalid @enderror"
        value="{{ old('jersey_name', $order->jersey_name ?? '') }}">
    @error('jersey_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>




<div class="form-group">
    <label>Name & Number</label>
    <input type="text" name="name_number" class="form-control @error('name_number') is-invalid @enderror"
        value="{{ old('name_number', $order->name_number ?? '') }}">
    @error('name_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>








<div class="form-group">
    <label>Total Price (৳)</label>
    <input type="number" step="0.01" name="total_price" class="form-control @error('total_price') is-invalid @enderror"
        value="{{ old('total_price', $order->total_price ?? '') }}">
    @error('total_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Order Status</label>
    <select name="status" class="form-control @error('status') is-invalid @enderror">
        @foreach(['pending','processing','shipped','delivered','cancelled'] as $status)
            <option value="{{ $status }}" {{ old('status', $order->status ?? '') == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Payment Status</label>
    <select name="payment_status" class="form-control @error('payment_status') is-invalid @enderror">
        @foreach(['unpaid','paid','refunded'] as $ps)
            <option value="{{ $ps }}" {{ old('payment_status', $order->payment_status ?? '') == $ps ? 'selected' : '' }}>
                {{ ucfirst($ps) }}
            </option>
        @endforeach
    </select>
    @error('payment_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>