@extends('layouts.app')

@section('title','Staff')

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
    <a href="{{ route('view.addstaff') }}" class="btn btn-sm btn-primary shadow-sm mt-2" style="width: 130px;">Add Staff</a>
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














<!-- Staff Table -->
<div class="table-responsive-xl mt-2">
  <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col" style="width: 200px;">First Name</th>
          <th scope="col" style="width: 200px;">Last Name</th>
          <th scope="col" style="width: 200px;">Address</th>
          <th scope="col" style="width: 200px;">Role</th>
          <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
      @foreach($staffs as $staff)
        <tr>
          <td class="pt-4 pb-4 p-2">{{$staff->id}}</td>
          <td class="pt-4 pb-4 p-2">{{$staff->first_name}}</td>
          <td class="pt-4 pb-4 p-2">{{$staff->last_name}}</td>
          <td class="pt-4 pb-4 p-2">{{$staff->address}}</td>
          <td class="pt-4 pb-4 p-2">{{$staff->role}}</td>
          <td class="pt-4 pb-4 p-2">
                <div class="btn-group">
                    <div><a href="#" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#viewStaffModal{{ $staff->id }}">Detail</a></div>
                    <div class="ml-1"><a href="{{ route('edit.staff', ['id' => $staff]) }}" type="button" class="btn btn-warning">Edit</a></div>
                      <form method="post" action="{{route('delete.staff', ['id' => $staff])}}" class="ml-1">
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
    @foreach ($staffs as $staff)
      @include('admin.modal.viewstaffmodal', ['staff' => $staff])
    @endforeach



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