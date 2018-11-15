<!DOCTYPE html>
<html>
<head>
	<title>Nakertrans</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url('assets/img/nakertrans.ico');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/uikit.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css')?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css')?>"/>
</head>
<body>
	<div class="uk-container-expand uk-animation-fade">
		<!-- NAVBAR -->
		<div class="uk-container">
			<nav class="uk-navbar uk-navbar-container " uk-navbar="mode:click" style="background: none">
				<div class="uk-navbar-left">
					<ul class="uk-navbar-nav" style="z-index: 9">
						<li>
							<a href="#">
								<span class="naker-title">N</span>
								<span class="naker-title2">akertrans</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="uk-navbar-center">
					<ul class="uk-navbar-nav" style="z-index: 9">
						<li>
							<a href="#">
								<p class="naker-d"><?php echo date("d")?>|</p>
								<p class="naker-y"><?php echo date("Y")."<br> ".date("M")?></p>
							</a>
						</li>
					</ul>
				</div>
				<div class="uk-navbar-right">
					<ul class="uk-navbar-nav" style="z-index: 9">
						<li>
							<a href="<?php echo site_url('Auth')?>" uk-icon="icon: arrow-right" class="uk-link uk-text-danger"> LOG IN </a>
						</li>
					</ul>
				</div>
			</nav>
		</div>

		<div class="uk-section-muted">
			<div class="uk-animation-slide-bottom-small">
				<?php echo $contents;?>
			</div>
		</div>

		<?php if(!isset($footer) || (isset($footer) && $footer == "true")){ ?>
			<div class="uk-section uk-padding-remove uk-position-relative">
				<div class="uk-light uk-background-cover" style="background-image: url(<?php echo base_url('assets/img/bg-dark.jpg')?>)">
				<div class="uk-container">
					<div uk-grid>
						<div class="uk-width-1-2@m uk-height-medium uk-padding">
							<h4>KONTAK</h4>
							<p>Kantoi Gedung Sate</p>
							<p>Jl. Diponegoro No. 22  Bandung Jawa Barat
							<br/>Telp. ( 022 ) 4232448,  4233347,  4230963.
							<br/>Fax.  ( 022 ) 4203450</p>
							<ul class="uk-iconnav">
								<li><a href="#" uk-icon="icon: twitter"></a></li>
								<li><a href="#" uk-icon="icon: facebook"></a></li>
								<li><a href="#" uk-icon="icon: instagram"></a></li>
								<li><a href="#" uk-icon="icon: google-plus"></a></li>
							</ul>
						</div>
						<div class="uk-width-1-2@m uk-position-right maps-frame">
							<iframe class="uk-width-1-1 uk-height-medium" allowfullscreen src="https://embed.waze.com/iframe?zoom=15&lat=-6.902481&lon=107.618810&ct=livemap&pin=1&desc=1"></iframe>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</body>
</html>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/uikit.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/uikit-icons.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/Chart.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js')?>"></script>
