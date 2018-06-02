<!-- BEGIN USER LOGIN DROPDOWN -->
<li class="dropdown user">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
		<!--<img alt="" src="<?=url_tmpl();?>assets/img/avatar1_small.jpg"/>-->
		Hello: <span class="username hidden-1024"><?=$fullname;?></span>
		<i class="fa fa-angle-down"></i>
	</a>
	<ul class="dropdown-menu">
		<li>
			<a href="<?=admin_url()?>changepass">
				<i class="fa fa-user"></i>My profile
			</a>
			<a href="<?=admin_url()?>authorize/logout">
				<i class="fa fa-key"></i> Logout
			</a>
		</li>
	</ul>
</li>