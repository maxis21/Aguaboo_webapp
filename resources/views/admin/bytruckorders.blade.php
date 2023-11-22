@extends('layouts.app')

@section('title', 'Deliveries')

@section('contents')


<div class="row">
  <!-- Deliveries -->
  <div class="col-lg mt-2">
    <!-- <a href="" class="btn btn-sm btn-primary shadow-sm mt-2" style="width: 130px;">Trucks</a> -->
  </div>    
      
  <!-- Search Bar -->    
  <div class="col-lg mt-2 d-flex justify-content-end">
    <!-- <div class="input-group">
      <div class="form-outline" style="width: 100%;">
        <i class="fas fa-search" style="position: absolute; top: 10px; left: 10px;"></i>
        <input type="search" style="padding-left: 30px;" id="searchStaff" class="form-control d-block" placeholder="Search" />
      </div>
    </div> -->
    <a href="" class="btn btn-sm btn-primary shadow-sm mt-2" style="width: 130px;">Trucks</a>
  </div>

</div>


<!-- Order Table -->
<!-- <div id="deliveryTable" class="table-responsive-xl mt-2">
    
</div> -->




      <!-- Live Searching AJAX-->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
</script> -->

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



<div class="container mt-3">
    <ul class="nav nav-tabs" id="truckTabs" role="tablist">
        @foreach ($trucks as $index => $truck)
            <li class="nav-item">
                <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                   id="truck-tab-{{ $truck->id }}"
                   data-toggle="tab"
                   href="#truck{{ $truck->id }}"
                   role="tab"
                   aria-controls="truck{{ $truck->id }}"
                   style="color: gray; font-weight: bold;"
                   aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                    {{ $truck->trucks }}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="truckTabsContent">
        @foreach ($trucks as $index => $truck)
            <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                 id="truck{{ $truck->id }}"
                 role="tabpanel"
                 aria-labelledby="truck-tab-{{ $truck->id }}">
                <table class="table table-striped mt-3">
                    <thead>
                        <!-- Table Headers -->
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer Name</th>
                            <!-- Add other headers as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($truck->order as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer->customer_name }}</td>
                                <!-- Add other order details as needed -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>
@endsection