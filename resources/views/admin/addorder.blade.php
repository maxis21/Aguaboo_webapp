@extends('layouts.app')

@section('title', 'Add Order')

@section('contents')

<!-- Alert Error -->
<div>
  @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li class="text-danger">
          {{$error}}
        </li>
      @endforeach
    </ul>
  @endif
</div>



<form action="{{ route('save.order') }}" method="POST">
  @csrf
  @method('post')
  <div class="row">
    <div class="col-lg">
      
      <label class="text-gray-800">Name</label>
      <select class="custom-select" name="customer_id" id="customer-select" onchange="selectCustomer()">
        @foreach($customers as $customer)
        <option value="{{ $customer->customer_id }}" data-purok="{{ $customer->customer_purok }}" data-baranggay="{{ $customer->customer_barangay }}" data-city="{{ $customer->customer_city }}" data-phone="{{ $customer->customer_phonenum }}">{{ $customer->customer_name }}</option>
        @endforeach 
      </select>
    </div>
  </div>

  <div class="row mt-3"> 
    <div class="col-lg">
      <label class="text-gray-800">Purok</label>
      <input type="text" name="order_purok" id="o_purok" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Baranggay</label>
      <input type="text" name="order_barangay" id="o_barangay" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">City</label>
      <input type="text" name="order_city" id="o_city" class="form-control">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Contact Number</label>
      <input type="text" name="order_pnumber" id="o_pNum" class="form-control">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Truck</label>
      <select class="custom-select" name="truck_id" id="customer-select" onchange="selectCustomer()">
        @foreach($trucks as $truck)
        <option value="{{ $truck->id }}">{{ $truck->trucks }}</option>
        @endforeach 
      </select>
    </div>
  </div>


    <!------------------------------- Products-------------------------------------------->
    <div class="d-flex justify-content-center flex-column mt-3">
        @foreach($products as $product)
        <div class="row mt-3">
            <div class="col-lg-3">
              <label>
                <input type="checkbox" name="selected_products[{{ $product->product_id }}]" value="{{ $product->product_id }}" data-price="{{ $product->product_price }}" class="product-checkbox">
                {{ $product->product_name }} - ₱{{ $product->product_price }}
              </label>
            </div>
            <div class="col-lg">
                <input type="number" name="quantities[{{ $product->product_id }}]" value="1" class="ml-2 product-quantity" min="1">
            </div>
        </div>
        @endforeach 
    </div>


    <div class="d-flex justify-content-center flex-column mt-3">
      <div class="row mt-3">
        <div class="col-lg-1">
          <b>Total: ₱</b>
        </div>

        <div class="col-lg">
          <input type="text" value="0" id="total-price" name="total_price" readonly>
        </div>
      </div>
      
    </div>



  <button type="submit" class="btn btn-primary mt-3">Submit</button>
  <button type="button" class="btn btn-danger mt-3" onclick="history.back();">Cancel</button>
</form>


<script>
    document.getElementById('customer-select').addEventListener('change', function(e) {
        var selectedOption = e.target.options[e.target.selectedIndex];
        
        document.getElementById('o_purok').value = selectedOption.dataset.purok;
        document.getElementById('o_barangay').value = selectedOption.dataset.baranggay;
        document.getElementById('o_city').value = selectedOption.dataset.city;
        document.getElementById('o_pNum').value = selectedOption.dataset.phone;
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        const quantities = document.querySelectorAll('.product-quantity');
        const totalPriceElement = document.getElementById('total-price');

        function calculateTotal() {
            let total = 0;
            checkboxes.forEach((checkbox, index) => {
                if (checkbox.checked) {
                    const price = parseFloat(checkbox.getAttribute('data-price'));
                    const quantity = parseFloat(quantities[index].value);
                    total += price * quantity;
                }
            });
            totalPriceElement.value = total.toFixed(2);
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', calculateTotal);
        });

        quantities.forEach(quantity => {
            quantity.addEventListener('input', calculateTotal);
        });
    });
</script>


@endsection
