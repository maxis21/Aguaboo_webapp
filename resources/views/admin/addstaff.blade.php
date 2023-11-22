@extends('layouts.app')

@section('title', 'Add Staff')

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

<!-- Register Form -->
<form action="{{ route('save.staff') }}" method="POST">
  @csrf
  @method('post')
  <div class="form-row">
    <div class="col-lg">
      <label class="text-gray-800">First Name</label>
      <input type="text" name="first_name" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Last Name</label>
      <input type="text" name="last_name" class="form-control">
    </div>
  </div>

  <div class="form-row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Address</label>
      <input type="text" name="address" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Contact Number</label>
      <input type="text" name="contact_number" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Role</label>
      <select class="custom-select" name="role">
        <option>Admin</option>
        <option>Staff</option>
      </select>
    </div>
  </div>

  <div class="form-row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Email Address</label>
      <input type="text" name="email_address" class="form-control">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Password</label>
      <input type="password" name="password" class="form-control">
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
  <button type="button" class="btn btn-danger mt-3" onclick="history.back();">Cancel</button>
</form>
@endsection
