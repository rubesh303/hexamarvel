 <div class="modal fade" id="editUser">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#" id="updateUserForm" method="post" class="form-validate-jquery updateUserForm" data-parsley-validate name="form2" role="form">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                @csrf
								<input type="hidden"name="user_id"class="user_id">
		<div class="col-lg-4">
        <div class="form-group">
		<label>Company:</label>
			<select name="company" class="chosen-select form-control company">
				@foreach($Company as $com)
				<option value="{{ $com->id }}">{{ $com->company_name }}</option>
				@endforeach
			</select>
		</div>
        </div>
		<div class="col-lg-4">
        <div class="form-group">
			<label>Branch:</label>
			<select name="branch" class="chosen-select form-control branch">
				@foreach($Branch as $branc)
				<option value="{{ $branc->id }}">{{ $branc->branch_name }}</option>
				@endforeach
			</select>
		</div>
        </div>
		<div class="col-lg-4">
        <div class="form-group">
		<label>Designation:</label>
			<select name="designation" class="chosen-select form-control designation">
				@foreach($Designation as $des)
				<option value="{{ $des->id }}">{{ $des->designation_name }}</option>
				@endforeach
			</select>
		</div>
        </div>
		<div class="col-lg-4">
        <div class="form-group">
		<label>Name:</label>
			<input type="text"name="name"class="form-control name">
		</div>
        </div>
		<div class="col-lg-4">
        <div class="form-group">
		<label>Email:</label>
			<input type="text"name="email"class="form-control email">
		</div>
        </div>
		<div class="col-lg-4">
        <div class="form-group">
		<label>Mobile:</label>
			<input type="text"name="mobile"class="form-control mobile">
		</div>
        </div>
		<div class="col-lg-4">
        <div class="form-group">
		<label>Dob:</label>
			<input type="date"name="dob"class="form-control dob">
		</div>
        </div>
		<div class="col-lg-4">
        <div class="form-group">
		<label>Doj:</label>
			<input type="date"name="doj"class="form-control doj">
		</div>
        </div>
				</form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary updateUser">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
	  
<div class="modal fade" id="DeleteModel" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are You Sure ! You Want to Delete</h4>
            </div>
            <div class="modal-body">
                <form action="#">
                    <button type="button" class="btn btn-danger DeleteConfirmed" data-dismiss="modal">Delete </button>
                    <button type="button" style="float: right;" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>