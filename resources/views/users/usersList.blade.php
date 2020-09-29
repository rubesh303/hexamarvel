@extends('layouts.app')

@section('content')

   

    <!-- Main content -->
    <section class="content">
   
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addNew">
                  Add New
                </button>
				
				</h3>
				<div class="row">
				
			<div class="col-md-12">
			<div class="col-md-3">
        <div class="form-group">
			<label>Branch:</label>
			<select name="branch" class="chosen-select form-control branch">
				@foreach($Branch as $branc)
				<option value="{{ $branc->id }}">{{ $branc->branch_name }}</option>
				@endforeach
			</select>
		</div>
        </div>
		<div class="col-md-3">
        <div class="form-group">
		<label>Designation:</label>
			<select name="designation" class="chosen-select form-control designation">
				@foreach($Designation as $des)
				<option value="{{ $des->id }}">{{ $des->designation_name }}</option>
				@endforeach
			</select>
		</div>
        </div>
        </div>
        
         <div class="tile-footer text-right bg-tr-black lter dvd dvd-top text-center">
            <button type="submit" class="btn btn-lightred" id="FilterBranchDesignationDetails">Filter by Branch And Designation</button>
         </div>
			</div>		 
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover UserList">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Company</th>
                      <th>Branch</th>
                      <th>Designation</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      
      </div><!-- /.container-fluid -->
	
	
	 @include('users.add')
	 @include('users.edit')
	
	  @include('users.js')
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
 <script>
    $(document).ready(function () {
      $(".chosen-select").chosen(width: '100%');
   });
</script>
@endsection