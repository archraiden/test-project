<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<!-- FOR PAGE HEADER-->
			<div class="page-title">
				<h4><i class="icon-home4 position-left"></i> <span class="text-semibold">Dashboard</span></h4>
			</div>
		</div>
	</div>
	<!-- /page header -->

<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">
		<!-- Main content-->
		<div class="content-wrapper">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="">
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">
								<i class="icon-drawer3"></i>
								 List
							</h5>
							<div class="heading-elements">
								<!-- <button type="button" id="scan_button" class="btn btn-success" data-toggle="modal" data-target="#scan_modal">
									<i class="icon-qrcode"></i>
									Scan Book
								</button> -->
							</div>
						</div>
						
						<!-- <table id="table_data" class="table datatable-basic table-hover">
							<thead>
								<tr>
									<th>Borrow ID</th>
									<th>Book  Name</th>
									<th>Status</th>
									<th>Borrowed Date</th>
									<th>Return Date</th>
									<th>Date Returned</th>
									<th>Borrowers ID</th>
									<th>Name</th>
									<th>Fine</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Borrow ID</td>
									<td>Book  Name</td>
									<th>Status</th>
									<th>Borrowed Date</th>
									<th>Return Date</th>
									<th>Date Returned</th>
									<td>Borrowers ID</td>
									<td>Name</td>
									<td>Fine</td>
								</tr>
							</tbody>
						</table> -->
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!-- Page content -->
	
	<!-- MODALS -->
	<div id="scan_modal" class="modal fade" data-backdrop="static">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-slate">
					<button type="button" class="close" id = "scan_close_hdr" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">Scan Book</h6>
				</div>

				<form action="#" id="scan_form">
					<div class="modal-body">
						<div class="alert alert-info alert-styled-left text-blue-800 content-group">
							<span class="text-semibold">Reminder !</span> When scanning a book, 
							<span class="text-semibold">ALWAYS </span> scan first the book before the borrowers ID no. <br>
							To check if the book is for borrowing or returning.
						</div>          
					</div>
					<div class="col-md-12">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<h6 class="text-semibold">
								<i class="icon-book3"></i>
								Book Details
							</h6>
							<hr>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="input-group">
											<input type="text" id="scan_book_id" name="scan_book_id" class="form-control" placeholder="Enter Book ID">
											<span class="input-group-btn">
												<button class="btn btn-default" id="scan_book" type="button">
													<i class="icon-search4"></i>
												</button>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										&nbsp
									</div>
									<div class="col-md-6 text-center">
										<img id="book_qr" src="<?php echo base_url();?>assets/images/placeholder.jpg" alt="" width = "100px" height="100px">
											
									</div>
									<div class="col-md-3">
										&nbsp
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Book's ID.:</label>
									<div class="col-md-9">
										<span id="book_id" class="scan_dtls"> --- </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Title :</label>
									<div class="col-md-9">
										<span id="book_title" class="scan_dtls"> --- </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Author : </label>
									<div class="col-md-9">
										<span id="book_author" class="scan_dtls">--- </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Status :</label>
									<div class="col-md-9">
										<!--span id="book_stat" class="scan_dtls"> </span-->
										<span id="book_stat" class="label bg-slate-400">UNKNOWN</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Copyright Year:</label>
									<div class="col-md-9">
										<span id="book_copy" class="scan_dtls">--- </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Classification :</label>
									<div class="col-md-9">
										<span id="book_class" class="scan_dtls">--- </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<h6 class="text-semibold">
								<i class="icon-user"></i>
								Borrower Details
							</h6>
							<hr>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="input-group">
											<input type="text" id="scan_user_id" name="scan_user_id" class="form-control" placeholder="Enter Borrower's ID">
											<span class="input-group-btn">
												<button class="btn btn-default" id="scan_user" type="button">
													<i class="icon-search4"></i>	
												</button>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										&nbsp
									</div>
									<div class="col-md-6 text-center">
										<img id="borrowers_pic" src="<?php echo base_url();?>assets/images/placeholder.jpg" alt="" width = "100px" height="100px">
											
									</div>
									<div class="col-md-3">
										&nbsp
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Borrower's ID. :</label>
									<div class="col-md-9">
										<span id="user_no" class="scan_dtls">--- </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Name :</label>
									<div class="col-md-9">
										<span id="user_name" class="scan_dtls">--- </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Program :</label>
									<div class="col-md-9">
										<span id="user_prog" class="scan_dtls">--- </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="text-semibold control-label col-md-3">Contact No. :</label>
									<div class="col-md-9">
										<span id="user_contacts" class="scan_dtls">--- </span>
									</div>
								</div>
							</div>
							<div id="return_details" class="sys-hide">
								<div class="form-group">
									<div class="row">
										<label class="text-semibold control-label col-md-3">Borrow Date :</label>
										<div class="col-md-9">
											<span id="user_brw_date" class="scan_dtls">--- </span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="text-semibold control-label col-md-3">Return Date :</label>
										<div class="col-md-9">
											<span id="user_ret_date" class="scan_dtls">--- </span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="text-semibold control-label col-md-3">Total Fines :</label>
										<div class="col-md-9">
											<span id="user_fines" class="scan_dtls">--- </span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" id = "scan_close_ftr" data-dismiss="modal">Close</button>
					<button type="button" id="accept_borrow" class="btn btn-success sys-hide">Borrow</button>
					<button type="button" id="accept_return" class="btn btn-success sys-hide">Return</button>
					<button type="button" id="accept_lost" class="btn bg-slate-400 sys-hide">Lost</button>
				</div>
			</div>
		</div>
	</div>
	
<!-- JS THEMES -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>

<script >
	$(document).ready(function(){
		base_url = "<?php echo base_url();?>";
		delayTimer = 0;
		// tbl_src = base_url+'dashboard/admin_librarian_view_list';
		// table_setup("table_data",1,tbl_src);
		main_modal = "#scan_modal .modal-content";
		
		$("#scan_close_ftr,#scan_close_hdr").on('click',function(e){
			clear_modal_scan();
		});
		
		$("#scan_button").on('click',function(e){
			focus_on_book();
		});
		
		$("#scan_close_ftr,#scan_close_hdr").on('click',function(e){
			clear_modal_scan();
		});
		
		$("#scan_book").on('click',function(e){
			get_book_dtls();
		})
		
		$("#scan_user").on('click',function(e){
			get_user_dtls();
		});
		
		
		$("#accept_borrow").on('click',function(e){
			borrow_book();
		});
		
		$("#accept_return").on('click',function(e){
			return_book();
		});
		
		$("#accept_lost").on('click',function(e){
			lost_book();
		});
		
		
		
		
	});
	
	// function clear_modal_scan(){
	// 	$('#scan_modal input').val('');
	// 	$("#book_qr, #borrowers_pic").attr('src', base_url+'assets/images/placeholder.jpg')
	// 	$("#return_details, #accept_borrow, #accept_return, #accept_lost").addClass('sys-hide');
	// 	$('.scan_dtls').text('---');
	// 	$('#book_stat').html('UNKNOWN').removeAttr('class').attr('class','label bg-slate-400');
	// }
	
	// function focus_on_book(){
	// 	clearTimeout(delayTimer);
	// 	delayTimer = setTimeout(function() {
	// 		$("#scan_book_id").focus();
	// 	}, 1000);
	// }
	
	// function focus_on_user(){
	// 	clearTimeout(delayTimer);
	// 	delayTimer = setTimeout(function() {
	// 		$("#scan_user_id").focus();
	// 	}, 1000);
	// }
	
	// function get_book_dtls(){
	// 	$.ajax({
	// 		url: base_url+'dashboard/scanning_book',
	// 		type:'POST',
	// 		data: $("#scan_form").serialize(),
	// 		dataType: 'json',
	// 		beforeSend: function(){
	// 			var title = "Getting book details"
	// 			div_block_loader(main_modal,title);
	// 		},
	// 		error: function(x,y,z){
	// 			$(main_modal).unblock();
	// 			sweet_err('Database error upon scanning book!');
	// 		},
	// 		success: function(json){
	// 			$(main_modal).unblock();
	// 			if(json.status == 1){
	// 				eval(json.elems);
	// 				focus_on_user();
	// 			}
	// 			else{
	// 				sweet_err(json.msg);
	// 			}
	// 		},
	// 		complete: function(){
	// 			$(main_modal).unblock();	
	// 		}
	// 	});
	// }
	
	// function get_user_dtls(){
	// 	$.ajax({
	// 		url: base_url+'dashboard/scanning_user',
	// 		type:'POST',
	// 		data: $("#scan_form").serialize(),
	// 		dataType: 'json',
	// 		beforeSend: function(){
	// 			var title = "Getting user details"
	// 			div_block_loader(main_modal,title);
	// 		},
	// 		error: function(x,y,z){
	// 			$(main_modal).unblock();
	// 			sweet_err('Database error upon scanning user!');
	// 		},
	// 		success: function(json){
	// 			$(main_modal).unblock();
	// 			if(json.status == 1){
	// 				eval(json.elems);
	// 				show_action(json.action);
	// 			}
	// 			else{
	// 				sweet_err(json.msg);
	// 			}
	// 		},
	// 		complete: function(){
	// 			$(main_modal).unblock();	
	// 		}
	// 	});
	// }
	
	// function show_action(action_trigger){
	// 	if(action_trigger == 1){
	// 		$("#accept_borrow").removeClass('sys-hide');
	// 		$("#accept_return, #accept_lost").addClass('sys-hide');
	// 	}
	// 	if(action_trigger == 2){
	// 		$("#accept_return, #accept_lost").removeClass('sys-hide');
	// 		$("#accept_borrow").addClass('sys-hide');
	// 	}
	// 	if(action_trigger == 3){
	// 		$("#accept_borrow, #accept_return, #accept_lost ").addClass('sys-hide');
	// 	}
	// 	return true;
	// }
	
	
	// function borrow_book(){
	// 	$.ajax({
	// 		url: base_url+'dashboard/borrow_book',
	// 		type: 'POST',
	// 		data:$('#scan_form').serialize(),
	// 		dataType:'json',
	// 		beforeSend: function(){
	// 			var title = "Processing borrowing";
	// 			div_block_loader(main_modal,title);
	// 		},
	// 		error: function(x,y,z){
	// 			$(main_modal).unblock();
	// 			sweet_err('Database error upon processing borrow book!');
	// 		},
	// 		success: function(json){
	// 			$(main_modal).unblock();
	// 			if(json.status == 1){
	// 				sweet_succ(json.msg);
	// 				clear_modal_scan();
	// 			}
	// 			else{
	// 				sweet_err(json.msg);
	// 			}
	// 		},
	// 		complete: function(){
	// 			$(main_modal).unblock();
	// 			var oTable = $('#table_data').DataTable();
	// 				oTable.ajax.reload();
	// 		}
	// 	});
	// }
	
	// function return_book(){
	// 	$.ajax({
	// 		url: base_url+'dashboard/return_book',
	// 		type: 'POST',
	// 		data:$('#scan_form').serialize(),
	// 		dataType:'json',
	// 		beforeSend: function(){
	// 			var title = "Processing return";
	// 			div_block_loader(main_modal,title);
	// 		},
	// 		error: function(x,y,z){
	// 			$(main_modal).unblock();
	// 			sweet_err('Database error upon processing return book!');
	// 		},
	// 		success: function(json){
	// 			$(main_modal).unblock();
	// 			if(json.status == 1){
	// 				sweet_succ(json.msg);
	// 				clear_modal_scan();
	// 			}
	// 			else{
	// 				sweet_err(json.msg);
	// 			}
	// 		},
	// 		complete: function(){
	// 			$(main_modal).unblock();
	// 			var oTable = $('#table_data').DataTable();
	// 				oTable.ajax.reload();
	// 		}
	// 	});
	// }
	
	// function lost_book(){
	// 	$.ajax({
	// 		url: base_url+'dashboard/lost_book',
	// 		type: 'POST',
	// 		data:$('#scan_form').serialize(),
	// 		dataType:'json',
	// 		beforeSend: function(){
	// 			var title = "Processing lost";
	// 			div_block_loader(main_modal,title);
	// 		},
	// 		error: function(x,y,z){
	// 			$(main_modal).unblock();
	// 			sweet_err('Database error upon processing lost book!');
	// 		},
	// 		success: function(json){
	// 			$(main_modal).unblock();
	// 			if(json.status == 1){
	// 				sweet_succ(json.msg);
	// 				clear_modal_scan();
	// 			}
	// 			else{
	// 				sweet_err(json.msg);
	// 			}
	// 		},
	// 		complete: function(){
	// 			$(main_modal).unblock();
	// 			var oTable = $('#table_data').DataTable();
	// 				oTable.ajax.reload();
	// 		}
	// 	});
	// }
	
</script>