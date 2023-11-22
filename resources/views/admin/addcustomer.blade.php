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



<form action="{{ route('save.customer') }}" method="POST">
  @csrf
  @method('post')
  <div class="row">
    <div class="col-lg">
      <label class="text-gray-800">Name</label>
      <input type="text" name="customer_name" class="form-control">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Purok</label>
      <input type="text" name="customer_purok" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Baranggay</label>
      <input type="text" name="customer_barangay" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">City</label>
      <input type="text" name="customer_city" class="form-control">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Contact Number</label>
      <input type="text" name="customer_phonenum" class="form-control">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Password</label>
      <input type="password" name="customer_password" class="form-control">
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
  <button type="button" class="btn btn-danger mt-3" onclick="history.back();">Cancel</button>
</form>
@endsection
