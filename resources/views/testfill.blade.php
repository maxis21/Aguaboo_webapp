@extends('layouts.app')

@section('title', 'Add Customer')

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



<form action="" method="POST">
  <div class="row">
    <div class="col-lg">
      <label class="text-gray-800">Name</label>
      <select class="custom-select" name="name" id="customer-select" onchange="selectCustomer()">
        @foreach($customers as $customer)
        <option value="{{ $customer->id }}" data-purok="{{ $customer->customer_purok }}" data-baranggay="{{ $customer->customer_barangay }}" data-city="{{ $customer->customer_city }}" data-phone="{{ $customer->customer_phonenum }}">{{ $customer->customer_name }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Purok</label>
      <input type="text" name="customer_purok" id="c_purok" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Baranggay</label>
      <input type="text" name="customer_barangay" id="c_barangay" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">City</label>
      <input type="text" name="customer_city" id="c_city" class="form-control">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Contact Number</label>
      <input type="text" name="customer_phonenum" id="c_pNum" class="form-control">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Password</label>
      <input type="password" name="customer_password" class="form-control">
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>




<script>
    document.getElementById('customer-select').addEventListener('change', function(e) {
        var selectedOption = e.target.options[e.target.selectedIndex];
        document.getElementById('c_purok').value = selectedOption.dataset.purok;
        document.getElementById('c_barangay').value = selectedOption.dataset.baranggay;
        document.getElementById('c_city').value = selectedOption.dataset.city;
        document.getElementById('c_pNum').value = selectedOption.dataset.phone;
    });
</script>
@endsection
