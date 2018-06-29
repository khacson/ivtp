<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?=$title;?></title>
<link rel="shortcut icon" type="image/ico" href="<?= url_tmpl() ?>favicon.ico" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="format-detection" content="telephone=no">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?=url_tmpl();?>multipleselect/multiple-select.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!--<link href="<?=url_tmpl();?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>-->

<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?=url_tmpl();?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<!--<link href="<?=url_tmpl();?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>-->
<link href="<?=url_tmpl();?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<!--<link href="<?=url_tmpl();?>data-table/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>-->
<link href="<?=url_tmpl();?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />

<link href="<?=url_tmpl();?>template.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>msgbox/Styles/msgBoxLight.css" rel="stylesheet" type="text/css"/>
<link type="text/css" href="<?=url_tmpl();?>scrollTable/scrollTable.css"  rel="stylesheet">	
<link href="<?=url_tmpl();?>/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
<link href="<?=url_tmpl();?>toast/toastr.css" rel="stylesheet" type="text/css"/>	
	
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script src="<?=url_tmpl();?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>js/jquery.json.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>js/bootbox.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>assets/plugins/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>assets/plugins/jquery-validation/dist/jquery.form.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>js/main.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>js/jquery-ui.js" type="text/javascript"></script>
<!--<script src="<?=url_tmpl();?>js/jqClock.min.js" type="text/javascript"></script>-->
<script src="<?=url_tmpl();?>js/colResizable-1.5.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?=url_tmpl();?>/fancybox/source/jquery.fancybox.pack.js"></script>  
<script type="text/javascript">
	var urlImg = '<?=url_tmpl()?>msgbox/Images/';
</script>
<script src="<?=url_tmpl();?>msgbox/Scripts/jquery.msgBox.js" type="text/javascript"></script>
<script>
	var index = 'ASC';
	var order = '';
	jQuery(document).ready(function() {    
		$(function(){
			//$("#clock1").clock({'langSet':'en'});	
		});
	});
</script>	
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-full-width">
<!-- BEGIN CONTAINER -->
<div class="row" style="height:15px;">
</div>
<div id="wapper">
<div class="page-container" style="margin-top:10px;">
	<div class="row" style="height:15px; margin-top:10px;">
		<!---->
		<div class="col-md-12">
			<ul class="nav navbar-nav pull-right" style="margin-right:5px !important; margin-top:-10px; position:relative;  z-index: 1000; width:100%;">
				<?php $this->load->inc('menuright');?>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
	</div>
	<!-- BEGIN HEADER -->
	<div class="header navbar mega-menu">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="header-inner" >
			<!-- BEGIN LOGO -->
			<!--<a class="navbar-brand" href="index.html">
				<img src="<?=url_tmpl();?>assets/img/logo.png" alt="logo" class="img-responsive"/>
			</a>-->
			<!-- END LOGO -->
			<!-- BEGIN HORIZANTAL MENU -->
			<div class="col-md-12">  
				<?php $this->load->inc('menu');?>
				<!-- END HORIZANTAL MENU -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<img src="<?=url_tmpl();?>assets/img/menu-toggler.png" alt=""/>
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php $this->load->inc('breadcrumb');?>
			<?=$content;?>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 2016 &copy; has.vn
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=url_tmpl();?>assets/plugins/excanvas.min.js"></script>
<script src="<?=url_tmpl();?>assets/plugins/respond.min.js"></script>  
<![endif]-->

<script src="<?=url_tmpl();?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- dong nay them o tung view de co the su dung duoc 1 so plugin ex: editable -->
<!--script src="<?=url_tmpl();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script-->
<!--<script src="<?=url_tmpl();?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="<?=url_tmpl();?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=url_tmpl();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!--<script src="<?=url_tmpl();?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>-->
<!--<script src="<?=url_tmpl();?>data-table/js/jquery.dataTables.js" type="text/javascript"></script>-->
<script src="<?=url_tmpl();?>multipleselect/jquery.multiple.select.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=url_tmpl();?>scrollTable/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?=url_tmpl();?>scrollTable/scrollTable.js"></script>
<!-- END CORE PLUGINS -->
<script type="text/javascript" src="<?=url_tmpl();?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=url_tmpl();?>toast/toastr.js"></script>
	
<script src="<?=url_tmpl();?>assets/scripts/core/app.js"></script>
<script src="<?=url_tmpl();?>assets/scripts/custom/components-pickers.js"></script>
<script>
jQuery(document).ready(function() {    
   App.init();
   ComponentsPickers.init();
});
</script>
</html>