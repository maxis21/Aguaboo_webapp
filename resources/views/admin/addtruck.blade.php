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



<form action="{{ route('save.truck') }}" method="POST">
  @csrf
  @method('post')
  <div class="row">
    <div class="col-lg">
      <label class="text-gray-800">Truck Name</label>
      <input type="text" name="trucks" class="form-control">
    </div>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Submit</button>
  <button type="button" class="btn btn-danger mt-3" onclick="history.back();">Cancel</button>
</form>
@endsection
