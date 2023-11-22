<form action="" method="post">
<div class="modal fade" id="viewStaffModal{{ $staff->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Staff Info</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                      <div class="col-lg">
                        <label class="text-gray-800">First Name</label>
                        <input class="form-control" name="first_name" type="text" value="{{ $staff->first_name }}" readonly>
                      </div>
                      <div class="col-lg">
                      <label class="text-gray-800">Last Name</label>
                      <input class="form-control" type="text" value="{{ $staff->last_name }}" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="text-gray-800">Address</label>
                      <input class="form-control" type="text" value="{{ $staff->address }}" readonly>
                    </div>
                    <div class="form-row">
                      <div class="col-lg">
                        <label class="text-gray-800">Contact Number</label>
                        <input class="form-control" type="text" value="{{ $staff->contact_number }}" readonly>
                      </div>
                      <div class="col-lg">
                      <label class="text-gray-800">Role</label>
                      <input class="form-control" type="text" value="{{ $staff->role }}" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="text-gray-800">Email Address</label>
                      <input class="form-control" type="text" value="{{ $staff->email_address }}" readonly>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</form>