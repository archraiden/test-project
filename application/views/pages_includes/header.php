<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>UA Library Book Finder</title>
	
	<!-- Global stylesheets -->
	<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/bootbox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/extensions/col_reorder.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
	<!-- /core JS files -->
	
	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>assets/css/custom_css/custom_googlefont.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/site_custom.css" rel="stylesheet" type="text/css">
	
</head>

<body class="navbar-top">
	<div id="navbar-main" class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a href="javascript:void(0);" class="navbar-brand">
				<h3>
					Welcome to Dating App Wesbsite
				</h3>
			</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-target="#navbar-mobile" data-toggle="collapse"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div id="navbar-mobile" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles5"></i> Notifications 
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span id="notif_cnt" class="badge bg-warning-400 sys-hide">2</span>
					</a>
					
					<div class="dropdown-menu dropdown-content width-350">
						<ul id="my_notif_list" class="media-list dropdown-content-body">
							

							
						</ul>

						<div class="dropdown-content-footer">
							<a href="javascript:void(0);" id="goto_notif" data-popup="tooltip" title="All Notifications"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>
				
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<span>
							<i class="icon-user-tie"></i>
							<?php echo "Hi! ".ucwords(strtolower($this->session->userdata('u_fullname')));?>
						</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a id="logout" href="javascript:void(0);"><i class="icon-exit"></i>Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
	<div id="notif_modal" class="modal fade" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-slate">
					<button type="button" class="close" id = "notif_close_hdr" data-dismiss="modal">&times;</button>
					<!-- announcement title -->
					<h6 class="modal-title"> Notification Details</h6>
				</div>
				<div class="modal-body" style="max-height: 500px;">
					<!-- body of announcement-->
					<div id="notif_text" 	>
						<div id="content-body">
							<div class="media-content">
								
							</div>
								
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" id = "notif_close_ftr" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>