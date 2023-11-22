<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\addstaff;
use App\Models\customers;
use App\Models\products;
use App\Models\trucks;
use App\Models\orders;

class AdminController extends Controller
{



    public function __construct(){
        $this->middleware('auth');
    }


    public function toDashboard(){
        return view('admin.admindashboard');
    }

    public function toCustomer(){
        $customers = customers::all();
        return view('admin.customers', ['customers' => $customers]);
    }

    public function toStaff(){
        $staffs = addstaff::all();
        return view('admin.staff', ['staffs' => $staffs]); 
        
    }

    public function toOrders(){
        $orders = orders::with('customer', 'product')->get();
        return view('admin.orders', compact('orders'));
    }

    public function toDeliveries(){
        $orders = orders::with('customer', 'product', 'truck')->paginate(20);//->get();
        return view('admin.deliveries', compact('orders'));
    }

    public function toGalloons(){
        return view('admin.galloons');
    }

    public function toProducts(){
        $products = products::all();
        return view('admin.products', ['products' => $products]); ;
        
    }

    public function toTrucks(){
        $trucks = trucks::all();
        return view('admin.trucks', ['trucks' => $trucks]); ;
        
    }

    public function toSalesReport(){
        return view('admin.salesreport');
    }

    public function toSettings(){
        return view('admin.settings');
    }

    public function toAddCustomer(){
        return view('admin.addcustomer');
    }

    public function toAddStaff(){
        return view('admin.addstaff');
    }

    public function toAddProducts(){
        return view('admin.addproduct');
    }

    public function toAddTruck(){
        return view('admin.addtruck');
    }

    public function toAddOrders(){
        $customers = customers::all();
        $trucks = trucks::all();
        $products = products::all();

        return view('admin.addorder', [
            'customers' => $customers,
            'trucks' => $trucks, 
            'products' => $products
        ]);
    }

    public function toTrucksOrder(){
        
        $trucks = trucks::with('order')->get();
        
        return view('admin.bytruckorders', compact('trucks'));
    }

    






    // --------------- logout ------------------
    public function logoutStaff()
    {
        Auth::logout();
        return redirect(route('display.login'));
    }




// --------------- Staff Functions ------------------


    // --------------- Add a Staff ------------------

    function addStaff(Request $request){
        $staffData = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'contact_number'=>'required|numeric',
            'role'=>'required',
            'email_address'=>'required',
            'password'=>'required'
        ]);

        $staffData['password'] = Hash::make($staffData['password']);

        $newStaff = addstaff::create($staffData);
        
        return redirect(route('view.staff'))->with('success', 'Account added successfully');
    }

    // --------------- Edit Staff Route ------------------

    public function editStaff(addstaff $id){
        return view('admin.editstaff', ['id' => $id]);
    }


    // --------------- Update Staff Details ------------------
    public function updateStaff(addstaff $id, Request $request){
        $staffData = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'contact_number'=>'required|numeric',
            'role'=>'required',
            'email_address'=>'required',
            'password'=>'required'
        ]);

        $id->update($staffData);

        return redirect(route('view.staff'))->with('success', 'Account updated successfully');
    }

    // --------------- Delete ------------------

    public function deleteStaff(addstaff $id){
        $id->delete();
        return redirect(route('view.staff'))->with('success', 'Account deleted successfully');
    }

   
    
// --------------- Customer Functions ------------------   


    // --------------- Add Customer ------------------
    function addCustomer(Request $request){
        $customerData = $request->validate([
            'customer_name'=>'required',
            'customer_purok'=>'required',
            'customer_barangay'=>'required',
            'customer_city'=>'required',
            'customer_phonenum'=>'required|numeric',
            'customer_password'=>'required',
        ]);

        $newCustomer = customers::create($customerData);
        
        return redirect(route('view.customers'))->with('success', 'Customer added successfully');
    }


    // --------------- Edit Customer Route ------------------

    public function editCustomer(customers $customer_id){
        return view('admin.editcustomer', ['customer_id' => $customer_id]);
    }


    // --------------- Update Customer Information ------------------
    public function updateCustomer(customers $customer_id, Request $request){
        $customerData = $request->validate([
            'customer_name'=>'required',
            'customer_purok'=>'required',
            'customer_barangay'=>'required',
            'customer_city'=>'required',
            'customer_phonenum'=>'required|numeric',
            'customer_password'=>'required',
        ]);

        $customer_id->update($customerData);

        return redirect(route('view.customers'))->with('success', 'Customer updated successfully');
    }


    // --------------- Delete Customer ------------------
    public function deleteCustomer(customers $customer_id){
        $customer_id->delete();
        return redirect(route('view.customers'))->with('success', 'Customer deleted successfully');
    }




// --------------- Products Functions ------------------


    // --------------- Add a Product ------------------
    function addProduct(Request $request){
        $productData = $request->validate([
            'product_name'=>'required',
            'product_price'=>'required|numeric'
        ]);

        $newProduct = products::create($productData);
        
        return redirect(route('view.products'))->with('success', 'Products added successfully');
    }


    // --------------- Edit Product Route ------------------

    public function editProduct(products $product_id){
        return view('admin.editproduct', ['product_id' => $product_id]);
    }

    // --------------- Update Product Information ------------------
    public function updateProduct(products $product_id, Request $request){
        $productData = $request->validate([
            'product_name'=>'required',
            'product_price'=>'required|numeric'
        ]);

        $product_id->update($productData);

        return redirect(route('view.products'))->with('success', 'Products updated successfully');
    }


    // --------------- Delete Product ------------------
    public function deleteProduct(products $product_id){


        // Check if the product is part of any orders
        $orderCount = orders::whereHas('product', function ($query) use ($product_id) {
            $query->where('orders_products.product_id', $product_id->product_id);
        })->count();

        if ($orderCount > 0) {
            return redirect()->back()->with('warning', 'This product is part of an active order and cannot be deleted.');
        }

        $product_id->delete();
        return redirect(route('view.products'))->with('success', 'Products deleted successfully');
    }





// --------------- Trucks Functions ------------------


    // --------------- Add a Truck ------------------
    function addTruck(Request $request){
        $truckData = $request->validate([
            'trucks'=>'required'
        ]);
    
        $newTruck = trucks::create($truckData);
        
        return redirect(route('view.trucks'))->with('success', 'Truck added successfully');
    }
    
    
        // --------------- Edit Truck Route ------------------
    
        public function editTruck(trucks $id){
            return view('admin.edittruck', ['id' => $id]);
        }
    
        // --------------- Update Truck Information ------------------
        public function updateTruck(trucks $id, Request $request){
            $truckData = $request->validate([
                'trucks'=>'required'
            ]);
    
            $id->update($truckData);
    
            return redirect(route('view.trucks'))->with('success', 'Truck updated successfully');
        }
    
    
        // --------------- Delete Truck ------------------
        public function deleteTruck(trucks $id){
            $id->delete();
            return redirect(route('view.trucks'))->with('success', 'Truck deleted successfully');
        }



// --------------- Orders Functions ------------------

        // --------------- add order ------------------
        public function addOrder(Request $request){
            $validation = $request->validate([
                'customer_id'=>'required',
                'order_purok'=>'required',
                'order_barangay'=>'required',
                'order_city'=>'required',
                'order_pnumber'=>'required',
                'truck_id'=>'required',
                'total_price'=>'required'
            ]);

            $total_price = 0;
            $total_quantity = 0;
            $selected_products = $request->input('selected_products', []);
            foreach ($selected_products as $productId => $quantity) {
                $quantityForm = $request->input('quantities.' . $productId, 0);
                $product = products::find($productId);
                $total_price += $product->product_price  * $quantityForm;
                $total_quantity += $quantityForm;
            }
        
            $order = new orders;
            $order->customer_id = $request->input('customer_id');
            $order->order_purok = $request->input('order_purok');
            $order->order_barangay = $request->input('order_barangay');
            $order->order_city = $request->input('order_city');
            $order->order_pnumber = $request->input('order_pnumber');
            $order->truck_id = $request->input('truck_id');
            $order->total_quantity = $total_quantity;
            $order->total_price = $total_price;
            $order->save();

            foreach ($selected_products as $productId => $quantity) {
                $quantityForm = $request->input('quantities.' . $productId, 0);
                $order->product()->attach($productId, ['quantity' => $quantityForm]);
            }

            // Update Customer's borrowed column
            $customer = customers::find($request->input('customer_id')); // Ensure your model name is correct
            $customer->borrowed += $total_quantity;
            $customer->save();
            
            return redirect(route('view.orders'))->with('success', 'Order added successfully');
        }



        // --------------- view order ------------------
        public function viewOrder(orders $id){
            $id->load('customer', 'product');
            $trucks = trucks::all();
            return view('admin.vieworder', compact('id', 'trucks'));
        }

        // --------------- Update Order Information ------------------
        public function updateOrder(orders $id, Request $request){
    
            $id->truck_id = $request->input('order_truck');
            $id->update();
    
            return redirect(route('view.orders'))->with('success', 'Order updated successfully');
        }

    


        // --------------- Delete order ------------------
        public function deleteOrder(orders $id){
            $id->delete();
            return redirect(route('view.orders'))->with('success', 'Order deleted successfully');
        }






// --------------- Deliveries Functions ------------------

        // --------------- search orders ------------------
        public function searchDeliveries(Request $request) {
            $query = strtolower($request->input('search')); // Convert the search query to lowercase
            $orders = orders::with('customer')
                            ->whereHas('customer', function($q) use ($query) {
                                $q->whereRaw('LOWER(customer_name) LIKE ?', ['%' . $query . '%']);
                            })
                            ->paginate(20);

            return view('admin.pages.partialsdeliveries_table', compact('orders'))->render();
        }


        // --------------- update deliveries ------------------
        public function updateDeliveries(orders $id){
            $id->load('customer', 'product');
            return view('admin.updatedeliveries', compact('id'));
        }

        // --------------- save updated deliveries ------------------
        public function UpdatedDelivery(orders $id, Request $request){
            $orderData = $request->validate([
                'returned'=>'nullable',
                'order_status'=>'nullable'
            ]);
    
            $id->update($orderData);
    
            return redirect(route('view.deliveries'))->with('success', 'Order updated successfully');
        }




        

}
