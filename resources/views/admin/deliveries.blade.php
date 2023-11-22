@extends('layouts.app')

@section('title', 'Deliveries')

@section('contents')


<div class="row">
  <!-- Deliveries -->
  <div class="col-lg mt-2">
    <a href="{{ route('view.trucksorder') }}" class="btn btn-sm btn-primary shadow-sm mt-2" style="width: 130px;">Trucks</a>
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
<div id="deliveryTable" class="table-responsive-xl mt-2">
    @include('admin.pages.partialsdeliveries_table', ['orders' => $orders])
</div>




      <!-- Live Searching AJAX-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Function to load data
        function loadData(page, query = '') {
            $.ajax({
                url: "/Search-Deliveries?page=" + page + "&search=" + query,
                success: function(data) {
                    $('#deliveryTable').html(data);
                }
            });
        }

        // Initial search or load
        $('#searchStaff').on('keyup', function() {
            var query = $(this).val();
            loadData(1, query);
        });

        // Handle click on pagination links
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];
            var query = $('#searchStaff').val();
            loadData(page, query);
        });
    });
</script>

<!-- Live Searching-->

<!-- <script>
    $(document).ready(function () {
        $('#searchStaff').on('keyup', function () {
            var query = $(this).val().toLowerCase();

            $('tbody tr').each(function () {
                var id = $(this).find('td:eq(0)').text().toLowerCase();
                var first_name = $(this).find('td:eq(1)').text().toLowerCase();
                

                if (id.includes(query) || first_name.includes(query)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script> -->

@endsection