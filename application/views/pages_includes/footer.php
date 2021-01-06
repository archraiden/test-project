	<div style="clear:both;"></div>
	<!-- Page container footer -->
		<div class="page-container-footer">
			<!-- Footer -->
			<div class="footer text-muted text-center">
				<div class="footer-panel">
					<div class="footer-company">
						&copy; 2020. <a href="javascript:void(0);">University Antique Tario Memorial Campus Innovation Team.</a> 
					</div>
				</div>
			</div>
			<!-- /footer -->
		</div>
	<!-- /page container footer -->
</body>
	
</html>


<script ="script/javascript">
	$(document).ready(function(){
		base_url = '<?php echo base_url();?>';
		// get_recent_notifs();
		// fine_users();
		
		$('#goto_notif').on('click',function(e){
			window.location.href = base_url+"page/notifications";
			
		});
		
		$("#logout").on('click',function(e){
			swal({
				title: "Are you sure you want to logout?",
				text: "All open processes will be unsaved!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#EF5350",
				confirmButtonText: "Yes, log me out!",
				cancelButtonText: "No, cancel pls!",
				closeOnConfirm: false,
				closeOnCancel: true
			},
			function(isConfirm){
				if (isConfirm) {
					logout();
				}
			});
		});
	});
	
	function get_recent_notifs(){
		$.ajax({
			url: base_url+"notifications/recent_notifs",
			type: "POST",
			dataType: 'json',
			beforeSend: function(){
				var title = "Loading notifications...";
				div_block_loader("#my_notif_list",title);
			},
			error: function(){
				$("#my_notif_list").unblock();
				sweet_err('Database error upon retrieving new notifcations!');
			
			},
			success: function(oData){
				$("#my_notif_list").unblock();
				eval(oData.notifs_cnts);	
				$('#my_notif_list').empty().html(oData.notif_data);
			}
		});	
	}
	
	function view_notif(notif_id){
		var notif_modal = "#notif_modal .modal-body";
		$.ajax({
			url: base_url+"notifications/view_my_notifs",
			type: "POST",
			data: {id : notif_id},
			dataType: 'json',
			beforeSend: function(){
				var title = "Loading details...";
				div_block_loader(notif_modal,title);
			},
			error: function(){
				$(notif_modal).unblock();
				sweet_err('Database error upon retrieving details!');
			
			},
			success: function(oData){
				$(notif_modal).unblock();
				eval(oData.dtls);	
				// get_recent_notifs();
			}
		});		
	}
	
	
	function fine_users(){
		$.ajax({
			type: "POST",
			url: base_url+"dashboard/add_fine",
			success: function(json){
				// no response	
			}
		});	
	}
	
	function check_session(){
		$.ajax({
			type: "POST",
			url: base_url+"login/check_session",
			success: function(json){
				var oSess = JSON.parse(json);
				if(oSess['status'] == 0){
					expired_session();
				}
				else{
					session_interval = setTimeout(function(){setInterval(check_session(), 3*60*1000)}, 3*60*1000);
				}	
			}
		});		
	}
	
	function expired_session(){
		swal({
			title: "Your session has expired",
			text: "Please click the button for relogging in!",
			type: "warning",
			showCancelButton: false,
			confirmButtonColor: "#EF5350",
			confirmButtonText: "Log me out!",
			closeOnConfirm: true
		},
		function(isConfirm){
			if (isConfirm) {
				logout();
			}
		});
	}
	
	function logout(){
		$.ajax({
			url: base_url+'login/logout/',
			type: 'POST',
			beforeSend: function(){
				var block_title = 'Logging out';
				block_loader(block_title);
			},
			error: function(xhr,opt,msg){
				sweet_err(msg);
			},
			success: function (logout){
				$.unblockUI();
				eval(logout);
			}
		});
	}
	
	function table_setup(table_id,col_count,src){
		$('#'+table_id).DataTable({
			autoWidth: false,
			processing: true, //Feature control the processing indicator.
			serverSide: true, //Feature control DataTables' server-side processing mode.
			order: [], //Initial no order.
			// Load data for the table's content from an Ajax source
			ajax: {
				url: src,
				type: "POST"
			},
			//Set column definition initialisation properties.
			columnDefs: [
			{ 
				targets: [ col_count ], //first column / numbering column
				orderable: false, //set not orderable
			},
			],
			colReorder: true,
			dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
			language: {
				search: '<span>Filter:</span> _INPUT_',
				lengthMenu: '<span>Show:</span> _MENU_',
				paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
			},
			drawCallback: function () {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
			},
			preDrawCallback: function() {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
			}
		 });
		 
		 $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
		 
		 $('.dataTables_length select').select2({
			minimumResultsForSearch: "-1"
		});
	}
	
	
	function sweet_err(text){
		swal({
			title: 'Ooops!',
			text: text,
			confirmButtonColor: "#EF5350",
			type: "error"
		});
	}
	
	function sweet_succ(text){
		 swal({
			title: 'OK!',
			text: text,
			confirmButtonColor: "#66BB6A",
			type: "success"
		});
	}
	
	function div_block_loader(div_id,msg){
		 $(div_id).block({
			message: '<i class="icon-spinner4 spinner"></i>'+msg,
			overlayCSS: {
				backgroundColor: '#fff',
				opacity: 0.8,
				cursor: 'wait'
			},
			css: {
				border: 0,
				padding: 0,
				backgroundColor: 'none'
			}
		});
	}
	
	function block_loader(title){
		$.blockUI({ 
			message: '<h4><i class="icon-spinner4 spinner"></i>&nbsp'+title+'</h4>',
			overlayCSS: {
				backgroundColor: '#1b2024',
				opacity: 0.8,
				cursor: 'wait'
			},
			css: {
				border: 0,
				color: '#fff',
				padding: 0,
				backgroundColor: 'transparent'
			}
		});
	}
</script>