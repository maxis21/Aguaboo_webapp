@extends('layouts.app')

@section('title','Trucks')

@section('contents')

<!-- Alert Success -->
<div class="row mt-2 ">
  @if(Session::has('success'))
    <div class="col-lg alert alert-success" role="alert">
      {{Session::get('success')}}
      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif

</div>

<div class="row">
  <!-- Add staff -->
  <div class="col-lg mt-2">
    <a href="{{ route('view.addtruck') }}" class="btn btn-sm btn-primary shadow-sm mt-2" style="width: 130px;">Add Truck</a>
  </div>    
      

</div>














<!-- Staff Table -->
<div class="table-responsive-xl mt-2">
  <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col" style="width: 800px;">Truck</th>
          <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
      @foreach($trucks as $truck)
        <tr>
          <td class="pt-4 pb-4 p-2">{{$truck->id}}</td>
          <td class="pt-4 pb-4 p-2">{{$truck->trucks}}</td>
          <td class="pt-4 pb-4 p-2">
                <div class="btn-group">
                    <div class="ml-1"><a href="{{ route('edit.truck', ['id' => $truck]) }}" type="button" class="btn btn-warning">Edit</a></div>
                      <form method="post" action="{{route('delete.truck', ['id' => $truck])}}" class="ml-1">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>







@endsection