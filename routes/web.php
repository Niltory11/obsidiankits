<?php
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Order;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('orders', OrderController::class);

Route::get('/dashboard', function () {
    $totalOrders   = Order::count();
    $todayOrders   = Order::whereDate('created_at', today())->count();
    $pendingOrders = Order::where('status', 'pending')->count();
    $paidOrders    = Order::where('payment_status', 'paid')->count();
    $totalRevenue  = Order::where('payment_status', 'paid')->sum('total_price');
    $todayRevenue  = Order::where('payment_status', 'paid')
                        ->whereDate('created_at', today())
                        ->sum('total_price');

    return view('dashboard', compact(
        'totalOrders',
        'todayOrders',
        'pendingOrders',
        'paidOrders',
        'totalRevenue',
        'todayRevenue'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
