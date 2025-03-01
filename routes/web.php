<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('login.home');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('forgot-password');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/pos', [PosController::class, 'index'])->name('pos');
    Route::post('/pos', [PosController::class, 'create'])->name('pos.create');
    Route::post('/pos/print', [PosController::class, 'save'])->name('pos.print');

    Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
    Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('order.show');
    Route::post('/orders/{id}', [OrdersController::class, 'update'])->name('order.show');

    Route::get('/customers', [CustomersController::class, 'index'])->name('customers');
    Route::post('/customer/create', [CustomersController::class, 'create'])->name('customer.create');
    Route::post('/customer/update', [CustomersController::class, 'update'])->name('customer.update');
    Route::post('/customer/delete', [CustomersController::class, 'destroy'])->name('customer.delete');

    Route::get('/coupons', [CouponsController::class, 'index'])->name('coupons');
    Route::post('/coupon/create', [CouponsController::class, 'create'])->name('coupon.create');
    Route::post('/coupon/delete', [CouponsController::class, 'destroy'])->name('coupon.delete');

    Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses');
    Route::post('/expenses/create', [ExpensesController::class, 'create_expense'])->name('expenses.create');
    Route::post('/expenses/delete', [ExpensesController::class, 'destroy_expense'])->name('expenses.delete');
    Route::get('/expenses/cateogry', [ExpensesController::class, 'cateogry'])->name('expenses.cateogry');
    Route::post('/expenses/cateogry/create', [ExpensesController::class, 'create'])->name('expenses.cateogry.create');
    Route::post('/expenses/cateogry/delete', [ExpensesController::class, 'destroy'])->name('expenses.cateogry.delete');

    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::post('/services/create', [ServicesController::class, 'create'])->name('service.create');
    Route::post('/services/update', [ServicesController::class, 'update'])->name('service.update');
    Route::post('/services/delete', [ServicesController::class, 'delete_it'])->name('service.delete');
    Route::get('/services/type', [ServicesController::class, 'type'])->name('services.type');
    Route::get('/services/addons', [ServicesController::class, 'addons'])->name('services.addons');
    Route::post('/services/addons/create', [ServicesController::class, 'addons_create'])->name('service.addons.create');
    Route::post('/services/addons/update', [ServicesController::class, 'addons_update'])->name('service.addons.update');
    Route::post('/services/addons/delete', [ServicesController::class, 'addons_destroy'])->name('service.addons.delete');

    Route::get('/reports/daily', [ReportsController::class, 'daily'])->name('reports.daily');
    Route::get('/reports/order', [ReportsController::class, 'order'])->name('reports.order');
    Route::get('/reports/sales', [ReportsController::class, 'sales'])->name('reports.sales');
    Route::get('/reports/expenses', [ReportsController::class, 'expenses'])->name('reports.expenses');
    Route::get('/reports/taxes', [ReportsController::class, 'taxes'])->name('reports.taxes');

    Route::get('/tools', [AuthController::class, 'profile'])->name('tools');

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});
