<script>
	  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	var Selectcompany = 0;
	 var rowId="";
    // var UserTable = $('.UserList').DataTable({
        // processing: true,
        // serverSide: true,
        // ajax: "{{ route('UserList') }}",
        // columns: [
            // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'name', name: 'name'},
            // {data: 'phone_number', name: 'phone_number'},
            // {data: 'email', name: 'email'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        // ]
    // });
	var data = [];
    dataTable(data);

    function dataTable(data) {
        UserTable= $('.UserList').DataTable({
            processing: true,
            serverSide: false,
            responsive: true,
            autoWidth: false,
            "bDestroy": true,
            ajax:{
                url:"{{ route('UserList') }}",
                data:data,
            },
            "columns": [
                { data: 'DT_RowIndex' },
                { data: 'name' },
                { data: 'phone_number' },
                { data: 'company_name' },
                { data: 'branch_name' },
                { data: 'designation_name' },
                { data: 'email' },
                { data: 'action', orderable: false, searchable: false },
            ]
        });
    }
   $( document ).ready(function() {
		$('#submitUser').on('click', function(event){
			
			var form = $('#addUserForm').serialize();
            // form.validate();
			console.log(form);
            event.preventDefault();
			 // var checkValid = form.valid();
			     // if(checkValid == true){
                $.ajax({
                    type: "post",
                    url: '{{ route("file-import") }}',
                    data:form,
                    dataType:'JSON',
                    // contentType: false,
                    // cache: false,
                    // processData: false,
                    success: function(data) {
						console.log(data);
                        if(data.status == 'error'){
							// toastr.error(data.message);
							alert('Please try again!');
                            // $("#addUserForm").valid().showErrors(data.errors);
                        }else{
							toastr.success(data.message);
							$('.user_type').val("").trigger("chosen:updated");
							$("#addUserForm")[0].reset();
							
                            $('#addUser').modal('hide');
                            UserTable.ajax.reload();
                            
                        }
                    }
                });
            // }
		});
		   $('#FilterBranchDesignationDetails').on('click',function (e) {
            e.preventDefault();
            var branch = $('.branch').val();
            var designation = $('.designation').val();
           
            dataTable({branch : branch ,designation : designation });
        });
		   $('body').on('click','.edituser',function (e) {
            e.preventDefault();
            var user_id = $(this).attr('id');
			
            if(user_id != ''){
                $.ajax({
                    type: "get",
                    url: '{{ route("edituser") }}',
                    data:{user_id:user_id},
                    success: function(data) {
                        console.log(data);
						// alert(data.name);
                      
                            $('.user_id').val(data.id);
                            $('.name').val(data.name);
                            $('.email').val(data.email);
                            $('.mobile').val(data.phone_number);
                            $('.dob').val(data.dob);
                            $('.doj').val(data.doj);
							$('.company').val(data.company_name).trigger('chosen:updated');
							$('.branch').val(data.branch).trigger('chosen:updated');
							$('.designation').val(data.designation).trigger('chosen:updated');
                    }
                });
            }
        });
		   $('body').on('click','.updateUser',function (e) {
			  
           var form = $('#updateUserForm').serialize();
           
                $.ajax({
                    type: "post",
                    url: '{{ route("Updateuser") }}',
                    data:$('#updateUserForm').serialize(),
                    success: function(data) {
                        console.log(data);
                        if(data.status == 'error'){
                            // toastr.error(data.error);
                            $("#updateUserForm").valid().showErrors(data.errors);
                        }else{                            
                            // toastr.success(data.message);
                            $("#updateUserForm")[0].reset();
                            $('#editUser').modal('hide');
                            UserTable.ajax.reload();
                        }
                    }
                });
           
        });
		$('body').on('click','.deleteuser',function (e) {
            e.preventDefault();
            var user_id = $(this).attr('id');
			
            rowId = user_id;
        });
		$(".DeleteConfirmed").click(function(e) {
            e.preventDefault();
			
            if (rowId != '') {
                $.ajax({
                    type: "post",
                    url: '{{ route("UserDelete") }}',
                    data: {rowId: rowId},
                    success: function (data) {
                        if(data.status == 'error'){
                            // toastr.error(data.message);
                            UserTable.ajax.reload();
                        }else{
                            $('#DeleteModel').modal('hide');
                            // toastr.success(data.message);
                            UserTable.ajax.reload();
                        }
                    }
                });
            }
        });
	});
</script>