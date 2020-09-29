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
				
				User Profile          
				
				</h3>
				<div class="row">
				
			
        
        
			</div>		 
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover UserList">
                  <thead>
                   
                      <tr> <th>Name</th><td>{{ $UserDetails->name }}</td></tr>
                      <tr> <th>Mobile</th><td>{{ $UserDetails->phone_number }}</td></tr>
                       <tr><th>Email</th><td>{{ $UserDetails->email }}</td></tr>
                       <tr><th>Company</th><td>{{ $UserDetails->company_name }}</td></tr>
                       <tr><th>Branch</th><td>{{ $UserDetails->branch_name }}</td></tr>
                      <tr> <th>Designation</th><td>{{ $UserDetails->designation_name }}</td></tr>
                     
                    </tr>
                  </thead>
                <a href="{{ url('/') }}"class="btn btn-success">Back</a> 
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      
      </div><!-- /.container-fluid -->
	
	
	 
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
 <script>
 
</script>
@endsection