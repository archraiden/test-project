<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-users4 position-left"></i> <span class="text-semibold">Maintenance / Users</span></h4>
			</div>
		</div>
	</div>
	<!-- /page header -->

<!-- Page container -->
<div class="page-container">
	<!-- MODALS -->
	<div id="modal_theme_success" class="modal fade" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-slate-600">
					<button type="button" class="close" id = "modal_close_hdr" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">User Details</h6>
				</div>
				
				<form action="#" id="user_form">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label>Username</label>
									<input type="hidden" id="id_db" name = "id_db" class="form-control" required>
									<input type="text" id="username" name = "username" class="form-control"  >
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label>Password</label>
									<input type="password" id="password" name = "password" class="form-control" required >
								</div>
								<div class="col-sm-6">
									<label>Confirm Password</label>
									<input type="password" id="cpassword" name = "cpassword" class="form-control" required >
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label>First Name</label>
									<input type="text" id="first_name" name = "first_name" class="form-control" required >
								</div>
								<div class="col-sm-4">
									<label>Middle Name</label>
									<input type="text" id="middle_name" name = "middle_name" class="form-control" required >
								</div>
								<div class="col-sm-4">
									<label>Last Name</label>
									<input type="text" id="last_name" name = "last_name" class="form-control" required >
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label>Gender</label>
									<select data-placeholder="Select a gender" id="sex" name="sex" class="select " required>
										<option value="M">MALE</option> 
										<option value="F">FEMALE</option> 
									</select>
								</div>
								<div class="col-sm-6">
									<label>Contact No.</label>
									<input type="text" id="contact" name = "contact" class="form-control" required >
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" id = "modal_close_ftr" data-dismiss="modal">Close</button>
					<button type="button" id="add_user" class="btn btn-success sys-hide">Add</button>
					<button type="button" id="update_user" class="btn btn-warning sys-hide">Update</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Page content -->
	<div class="page-content">
		<!-- Main content-->
		<div class="content-wrapper">
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="">
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">List</h5>
							<div class="heading-elements">
								<button type="button" id="add_modal" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_success">
									<i class="icon-user-plus"></i>
									Add User
								</button>
							</div>
						</div>
						
						<table id="table_data" class="table datatable-basic table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Username</th>
									<th>Name</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>ID</td>
									<td>Username</td>
									<td>Name</th>
									<td>Status</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!-- Page content -->
	
<!-- JS THEMES -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>

<script ="script/javascript">
	$(document).ready(function(){
		base_url = "<?php echo base_url();?>";
		tbl_src = base_url+'admin/users/get_users';
		table_setup("table_data",3,tbl_src);
		main_modal = ".modal-content";
		$('.select').select2();
		
		form = $( "#user_form" );
		form.validate({ 
		ignore: 'input[type=hidden]', // ignore hidden fields
		errorClass: 'validation-error-label',
		successClass: 'validation-valid-label',
		messages: {
			addInvoice: "This button is required."
		},
		highlight: function(element, errorClass) {
			$(element).removeClass(errorClass);
		},
		unhighlight: function(element, errorClass) {
			$(element).removeClass(errorClass);
		},

		validClass: "validation-valid-label",
		success: function(label,validClass) {
			 label.addClass(validClass);
			 label.remove();
		},
		errorElement: 'div',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		onError : function(){
			$('.input-group.error-class').find('.help-block.form-error').each(function() {
			  $(this).closest('.input-group').addClass('error-class').append($(this));
			});
		},

		});
		
		$("#add_modal").on("click", function(e){
			$('#username').attr('required',true);
			$('#username').removeAttr('disabled');
			$("#update_user").addClass('sys-hide');
			$("#add_user").removeClass('sys-hide');
			form_reset();
		});
		
		$("#modal_close_hdr, #modal_close_ftr").on("click", function(e){
			$("#upd_user, #add_user").addClass('sys-hide');
			form_reset();
		});
		
		$("#add_user").on("click",function(e){
			if(form.valid()){
				bootbox.confirm("Are you sure you want to add this user?",function(callback){
					if(callback){
						save_user();
					}
				}).on('hidden.bs.modal', function (e) {
					if($('.modal.in').css('display') == 'block'){
						$('body').addClass('modal-open');
					}
				});
			}
		});
		
		$("#update_user").on("click",function(e){
			if(form.valid()){
				bootbox.confirm("Are you sure you want to update this user?",function(callback){
					if(callback){
						upd_user();
					}
				}).on('hidden.bs.modal', function (e) {
					if($('.modal.in').css('display') == 'block'){
						$('body').addClass('modal-open');
					}
				});
			}
		});
	});
	
	function view_dtls(id = ''){
		$('#password').closest('div').find('label').html('New Password');
		$('#username').removeAttr('required');
		$('#username').attr('disabled',true);	
		$.ajax({
			url: base_url+'admin/users/get_user_dtls',
			type:'POST',
			data: {id: id},
			dataType: 'json',
			beforeSend: function(){
				div_block_loader(main_modal, "Getting Data");
				$("#add_user").addClass('sys-hide');
				$("#update_user").removeClass('sys-hide');
				form_reset();
			},
			error: function(xhr,err,opt){
				$(main_modal).unblock();
				sweet_err('Database Error!');
			},
			success: function(oData){
				$(main_modal).unblock();
				if(oData.status==1){
					eval(oData.data);
				}
				else{
					sweet_err(oData.msg);
				}
			},
			complete: function(){
				$(main_modal).unblock();
			}
		});
	}
	
	function save_user(){
		$.ajax({
			url: base_url+'admin/users/save_user/',
			type: 'POST',
			data: $("#user_form").serialize(),
			dataType: 'json',
			beforeSend: function(){
				div_block_loader(main_modal, "Adding User");
			},
			error: function (xhr,err,opt){
				sweet_err(xhr);
				$(main_modal).unblock();
			},
			success: function(json){
				$(main_modal).unblock();
				if(json.status == 1){
					sweet_succ(json.msg);
					form_reset();
				}
				else{
					sweet_err(json.msg);
				}
			},
			complete: function(){
				$(main_modal).unblock();
				form_reset();
				var oTable = $('#table_data').DataTable();
				oTable.ajax.reload();
			}
		});	
	}
	
	function upd_user(){
		var id = $("#id_db").val();
		$.ajax({
			url: base_url+'admin/users/upd_user/',
			type: 'POST',
			data: $("#user_form").serialize(),
			dataType: 'json',
			beforeSend: function(){
				div_block_loader(main_modal, "Updating User");
			},
			error: function (xhr,err,opt){
				sweet_err(xhr);
				$(main_modal).unblock();
			},
			success: function(json){
				$(main_modal).unblock();
				if(json.status == 1){
					sweet_succ(json.msg);
					view_dtls(id);
				}
				else{
					sweet_err(json.msg);
				}
			},
			complete: function(){
				$(main_modal).unblock();
				var oTable = $('#table_data').DataTable();
				oTable.ajax.reload();
			}
		});	
	}

	function form_reset(){
		$("#user_form  input").val('');
		$('.select').select2("val", "1");
		$('#sex').select2("val", "M");
	}
</script>