<!-- nagivation -->
<div id="navbar-second" class="navbar navbar-default navbar-xs ">
	<ul class="nav navbar-nav no-border visible-xs-block">
		<li><a data-target="#navbar-second-toggle" data-toggle="collapse" class="text-center collapsed"><i class="icon-circle-down2"></i></a></li>
	</ul>
	
	<?php 
		$lvl = $this->session->userdata('ualib_level');
		$getMenuHeader = $this->menu->getMenuHeader($lvl);
		
	?>

	<div id="navbar-second-toggle" class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
		
			<?php 
				foreach($getMenuHeader as $main) {
					$firstLvl = $main['first_lvl'];
					$headerMenu = $main['module_name'];
					$main_link = (($main['path'] == "" OR $main['path'] == NULL) ? "javascript:void(0);":base_url().$main['path']);
					
			?>
				<?php if($main['has_sub'] == 0){?>
					<li>
						<a href="<?php echo $main_link;?>">
							<i class="icon <?php echo $main['icon'];?>"></i>
							&nbsp
							<?php echo $headerMenu;?>
						</a>
					</li>
				<?php } else{ ?>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="false">
							<i class="icon <?php echo $main['icon'];?>"></i>
							&nbsp
							<?php echo $headerMenu;?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-left">
							<?php 
								$getSubMenuHeader = $this->menu->getSubMenuHeader($lvl,$firstLvl);
								
								foreach($getSubMenuHeader as $sub){
									$subMenu = $sub['module_name'];
									$sub_link = (($sub['path'] == "" OR $sub['path'] == NULL) ? "javascript:void(0);":base_url().$sub['path']);
							?>
								<li>
									<a href="<?php echo $sub_link;?>">
										<i class="icon <?php echo $sub['icon'];?>"></i>
										&nbsp
										<?php echo $subMenu;?>
									</a>
								</li>
							<?php }?>
						</ul>
					</li>
				<?php }?>
			
			<?php }?>
			
		</ul>
	</div>
</div>
<!-- /navigation -->
	