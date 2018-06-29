<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel='shortcut icon' type='image/ico' href='<?= url_tmpl() ?>favicon.ico' />
<link href="<?=url_tmpl();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>assets/plugins/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>assets/plugins/select2/select2-metronic.css" />
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?=url_tmpl();?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=url_tmpl();?>assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
<link href="<?=url_tmpl();?>toast/toastr.css" rel="stylesheet" type="text/css"/>	
	
<!-- END THEME STYLES -->
<script type="text/javascript">
	var urlImg = '<?=url_tmpl()?>msgbox/Images/';
</script>
<script src="<?=url_tmpl();?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>js/jquery.json.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>js/main.js" type="text/javascript"></script>
	
<link href="<?=url_tmpl();?>css/custom.css" rel="stylesheet">
</head>
<body class="login">

<div class="logo">
	<!--<a href="#">
		<img src="<?=url_tmpl();?>img/logos.png" />
	</a>-->
</div>

<div class="content">
	<?=$content;?>
</div>

<!-- BEGIN FOOTER -->
	<div class="footer" style="margin-bottom:0vh; bottom: 0 !important;
    float: left;
    margin-bottom: 0vh;
    position: absolute;">
	<div class="footer-inner">
		2016 &copy; hays.vn
	</div>
</div>
<!-- END FOOTER -->

<script src="<?=url_tmpl();?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?=url_tmpl();?>assets/plugins/select2/select2.min.js" ></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=url_tmpl();?>assets/scripts/core/app.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>assets/scripts/custom/login.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>toast/toastr.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
<!-- END JAVASCRIPTS -->
</body>
</html>
