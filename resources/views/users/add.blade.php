  <div class="modal fade" id="addNew">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                
				  <div class="card-body">
				 <div class="text-center">
      

        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-md-3">
            <div class="form-group">
                
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                  
               
            </div>   
            </div>
			 <div class="col md-3">
				 <button class="btn btn-primary">Insert data</button>
			 </div>
			 </div>
        </form>
    </div>
			 
                </div>
                <!-- /.card-body -->

                
             
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->