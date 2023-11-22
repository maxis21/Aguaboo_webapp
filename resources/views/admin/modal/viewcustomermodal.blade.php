<form action="" method="post">
<div class="modal fade" id="viewCustomerModal{{ $customer->customer_id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customer Info</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label class="text-gray-800">Name</label>
                        <input class="form-control" name="customer_name" type="text" value="{{ $customer->customer_name }}" readonly>
                    </div>


                    <div class="form-row">
                        <div class="col-lg">
                            <label class="text-gray-800">Purok</label>
                            <input class="form-control" type="text" value="{{ $customer->customer_purok }}" readonly>
                        </div>
                        <div class="col-lg">
                            <label class="text-gray-800">Barangay</label>
                            <input class="form-control" type="text" value="{{ $customer->customer_barangay }}" readonly>
                        </div>
                        <div class="col-lg">
                            <label class="text-gray-800">City</label>
                            <input class="form-control" type="text" value="{{ $customer->customer_city }}" readonly>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                      <label class="text-gray-800">Contact Number</label>
                      <input class="form-control" type="text" value="{{ $customer->customer_phonenum }}" readonly>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</form>