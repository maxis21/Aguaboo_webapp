@extends('layouts.app')

@section('title','Orders')

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
  <!-- Add Order -->
  <div class="col-lg mt-2">
    <a href="{{ route('view.addorder') }}" class="btn btn-sm btn-primary shadow-sm mt-2" style="width: 130px;">Add Order</a>
  </div>    
      
  <!-- Search Bar -->    
  <div class="col-lg mt-2">
    <div class="input-group">
      <div class="form-outline" style="width: 100%;">
        <i class="fas fa-search" style="position: absolute; top: 10px; left: 10px;"></i>
        <input type="search" style="padding-left: 30px;" id="searchStaff" class="form-control d-block" placeholder="Search" />
      </div>
    </div>
  </div>

</div>














<!-- Order Table -->
<div class="table-responsive-xl mt-2">
  <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Address</th>
          <th scope="col">Contact Number</th>
          <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
        <tr>
          <td class="pt-4 pb-4 p-2">{{$order->id}}</td>
          <td class="pt-4 pb-4 p-2">{{ $order->customer->customer_name }}</td>
          <td class="pt-4 pb-4 p-2">{{$order->order_purok}}, {{$order->order_barangay}}, {{$order->order_city}}</td>
          <td class="pt-4 pb-4 p-2">{{$order->order_pnumber}}</td>
          <td class="pt-4 pb-4 p-2">
                <div class="btn-group">
                    <div><a href="{{ route('view.order', ['id' => $order]) }}" type="button" class="btn btn-secondary">Detail</a></div>
                      <form method="post" action=" {{route('delete.order', ['id' => $order])}} " class="ml-1">
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


    <!-- View Modal-->




      <!-- Live Searching-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#searchStaff').on('keyup', function () {
            var query = $(this).val().toLowerCase();

            $('tbody tr').each(function () {
                var id = $(this).find('td:eq(0)').text().toLowerCase();
                var first_name = $(this).find('td:eq(1)').text().toLowerCase();
                var last_name = $(this).find('td:eq(2)').text().toLowerCase();
                var position = $(this).find('td:eq(3)').text().toLowerCase();
                

                if (id.includes(query) || first_name.includes(query) || last_name.includes(query) || position.includes(query)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

@endsection