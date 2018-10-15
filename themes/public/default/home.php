<!DOCTYPE html>
<html class="#{html_class}" lang="en">
  <head>
    <!-- Site Title-->
    <title>Investor Pro</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="<?=url_tmpl();?>favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=url_tmpl();?>css/style.css">
    <link rel="stylesheet" href="<?=url_tmpl();?>css/custom.css?ver=1.1">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="<?=url_tmpl();?>images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="<?=url_tmpl();?>js/html5shiv.min.js"></script>
		<![endif]-->
	<script src="<?=url_tmpl();?>js/jquery-2.2.3.min.js"></script>
	<script>
		var base_url = '<?=base_url()?>';
	</script>
  </head>
  <body>
    <!-- Page-->
    <div class="page text-center">
      <header class="page-header">
			<?=$this->load->inc('menu');?>
      </header>
      <?=$content;?>
      <footer class="page-footer bg-shark section-20">
			<?=$this->load->inc('footer');?>
      </footer>
    </div>
    <!-- Java script-->
    <script src="<?=url_tmpl();?>js/core.js"></script>
    <script src="<?=url_tmpl();?>js/script.js?ver=1.0"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122490469-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-122490469-1');
	</script>


</html>