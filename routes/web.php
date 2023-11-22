<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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



Route::get('/', [AuthController::class, 'displayLogin']);

    // --------------- Login ------------------
Route::get('/login', [AuthController::class, 'displayLogin'])->name('display.login');
Route::post('/logined', [AuthController::class, 'loginStaff'])->name('login.staff');



Route::middleware(['auth'])->group(function () {

    Route::get('/Dashboard', [AdminController::class, 'toDashboard'])->name('view.dashboard');
    Route::get('/Customers', [AdminController::class, 'toCustomer'])->name('view.customers');
    Route::get('/Staff', [AdminController::class, 'toStaff'])->name('view.staff');
    Route::get('/Orders', [AdminController::class, 'toOrders'])->name('view.orders');
    Route::get('/Deliveries', [AdminController::class, 'toDeliveries'])->name('view.deliveries');
    Route::get('/Galloons', [AdminController::class, 'toGalloons'])->name('view.galloons');
    Route::get('/Products', [AdminController::class, 'toProducts'])->name('view.products');
    Route::get('/Trucks', [AdminController::class, 'toTrucks'])->name('view.trucks');
    Route::get('/Sales-Report', [AdminController::class, 'toSalesReport'])->name('view.salesreport');
    Route::get('/Settings', [AdminController::class, 'toSettings'])->name('view.settings');
    Route::get('/Add-Customer', [AdminController::class, 'toAddCustomer'])->name('view.addcustomer');
    Route::get('/Add-Staff', [AdminController::class, 'toAddStaff'])->name('view.addstaff');
    Route::get('/Add-Product', [AdminController::class, 'toAddProducts'])->name('view.addproduct');
    Route::get('/Add-Truck', [AdminController::class, 'toAddTruck'])->name('view.addtruck');
    Route::get('/Add-Order', [AdminController::class, 'toAddOrders'])->name('view.addorder');
    Route::get('/Trucks-Order', [AdminController::class, 'toTrucksOrder'])->name('view.trucksorder');
    



        // --------------- Logout ------------------
    Route::post('/logout', [AdminController::class, 'logoutStaff'])->name('logout.staff');


        // --------------- Staff ------------------
    Route::post('/Save-Staff', [AdminController::class, 'addStaff'])->name('save.staff');
    Route::get('/Edit-Staff/{id}', [AdminController::class, 'editStaff'])->name('edit.staff');
    Route::put('/Edit-Staff/{id}/update', [AdminController::class, 'updateStaff'])->name('update.staff');
    Route::delete('/Edit-Staff/{id}/delete', [AdminController::class, 'deleteStaff'])->name('delete.staff');

        // --------------- Customer ------------------
    Route::post('/Save-Customer', [AdminController::class, 'addCustomer'])->name('save.customer');
    Route::get('/Edit-Customer/{customer_id}', [AdminController::class, 'editCustomer'])->name('edit.customer');
    Route::put('/Edit-Customer/{customer_id}/update', [AdminController::class, 'updateCustomer'])->name('update.customer');
    Route::delete('/Edit-Customer/{customer_id}/delete', [AdminController::class, 'deleteCustomer'])->name('delete.customer');


        // --------------- Products ------------------
    Route::post('/Save-Product', [AdminController::class, 'addProduct'])->name('save.product');
    Route::get('/Edit-Product/{product_id}', [AdminController::class, 'editProduct'])->name('edit.product');
    Route::put('/Edit-Product/{product_id}/update', [AdminController::class, 'updateProduct'])->name('update.product');
    Route::delete('/Edit-Product/{product_id}/delete', [AdminController::class, 'deleteProduct'])->name('delete.product');


        // --------------- Trucks ------------------
    Route::post('/Save-Trucks', [AdminController::class, 'addTruck'])->name('save.truck');
    Route::get('/Edit-Truck/{id}', [AdminController::class, 'editTruck'])->name('edit.truck');
    Route::put('/Edit-Truck/{id}/update', [AdminController::class, 'updateTruck'])->name('update.truck');
    Route::delete('/Edit-Truck/{id}/delete', [AdminController::class, 'deleteTruck'])->name('delete.truck');
    

        // --------------- Orders ------------------
    Route::post('/Save-Order', [AdminController::class, 'addOrder'])->name('save.order');
    Route::get('/View-Order/{id}', [AdminController::class, 'viewOrder'])->name('view.order');
    Route::put('/Update-Product/{id}/update', [AdminController::class, 'updateOrder'])->name('update.order');
    Route::delete('/Edit-Orders/{id}/delete', [AdminController::class, 'deleteOrder'])->name('delete.order');


    // --------------- Deliveries ------------------
    Route::get('/Search-Deliveries', [AdminController::class, 'searchDeliveries'])->name('search.deliveries');
    Route::get('/Update-Deliveries/{id}', [AdminController::class, 'updateDeliveries'])->name('update.deliveries');
    Route::put('/Update-Deliveries/{id}/update', [AdminController::class, 'UpdatedDelivery'])->name('updated.delivery');
});