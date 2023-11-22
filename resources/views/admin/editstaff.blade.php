@extends('layouts.app')

@section('title', 'Edit Staff Info')

@section('contents')
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

<form action="{{ route('update.staff', ['id' => $id]) }}" method="POST">
  @csrf
  @method('put')
  <div class="form-row">
    <div class="col-lg">
      <label class="text-gray-800">First Name</label>
      <input type="text" name="first_name" class="form-control" value="{{$id->first_name}}">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Last Name</label>
      <input type="text" name="last_name" class="form-control" value="{{$id->last_name}}">
    </div>
  </div>

  <div class="form-row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Address</label>
      <input type="text" name="address" class="form-control" value="{{$id->address}}"> 
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Contact Number</label>
      <input type="text" name="contact_number" class="form-control" value="{{$id->contact_number}}">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Role</label>
      <select class="custom-select" name="role" value="{{$id->role}}">
        @foreach(['Admin', 'Staff'] as $role)
          <option value="{{ $role }}" {{ $id->role == $role ? 'selected' : '' }}>{{ $role }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-row mt-3">
    <div class="col-lg">
      <label class="text-gray-800">Email Address</label>
      <input type="text" name="email_address" class="form-control" value="{{$id->email_address}}">
    </div>
    <div class="col-lg">
      <label class="text-gray-800">Password</label>
      <input type="password" name="password" class="form-control" value="{{$id->password}}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
  <button type="button" class="btn btn-danger mt-3" onclick="history.back();">Cancel</button>
</form>
@endsection
