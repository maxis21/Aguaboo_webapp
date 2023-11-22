@extends('layouts.app')

@section('title','Customers')

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
  <!-- Add Customer -->
  <div class="col-lg mt-2">
    <a href="{{ route('view.addcustomer') }}" class="btn btn-sm btn-primary shadow-sm mt-2" style="width: 130px;">Add Customer</a>
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










<!-- Customer Table -->
<div class="table-responsive-xl mt-2">
  <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Contact No.</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td class="pt-4 pb-4 p-2">{{$customer->customer_id}}</td>
            <td class="pt-4 pb-4 p-2" style="width: 300px;">{{$customer->customer_name}}</td>
            <td class="pt-4 pb-4 p-2" style="width: 300px;">{{$customer->customer_purok}}, {{$customer->customer_barangay}}, {{$customer->customer_city}}</td>
            <td class="pt-4 pb-4 p-2" style="width: 300px;">{{$customer->customer_phonenum}}</td>
            <td>
                <div class="btn-group">
                    <div class="ml-1"><a href="{{ route('edit.customer', ['customer_id' => $customer]) }}" type="button" class="btn btn-warning">Edit</a></div>
                      <form method="post" action="{{route('delete.customer', ['customer_id' => $customer])}}" class="ml-1">
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
    @foreach ($customers as $customer)
      @include('admin.modal.viewcustomermodal', ['customer' => $customer])
    @endforeach



          <!-- Live Searching-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#searchStaff').on('keyup', function () {
            var query = $(this).val().toLowerCase();

            $('tbody tr').each(function () {
                var id = $(this).find('td:eq(0)').text().toLowerCase();
                var trucks = $(this).find('td:eq(1)').text().toLowerCase();
                

                if (id.includes(query) || trucks.includes(query)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endsection