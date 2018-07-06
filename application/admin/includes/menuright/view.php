<!-- BEGIN USER LOGIN DROPDOWN -->
<li class="pull-right"><a style="font-weight: 300; margin-top:-13px; margin-left:20px; border:1px" href="<?=admin_url()?>authorize/logout">Logout</a></li>
<li class="dropdown user">
	<a href="<?=admin_url()?>changepass">
		<i class="fa fa-user"></i>My profile
	</a>
</li>
<li class="dropdown user">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
		Hello: <span class="username "><?=$fullname;?></span>
	</a>
</li>
