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
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css')?>"/>
</head>
<body>
	<div class="uk-container">
		<!-- NAVBAR -->
		<div class="uk-grid-collapse uk-child-width-expand@s " uk-grid>

	        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">

	        	<nav class="uk-navbar uk-navbar-container" uk-navbar="mode:click" style="background-color: white;position: relative; z-index: 980;">
				    <div class="uk-navbar-left">
				        <ul class="uk-navbar-nav uk-animation-slide-right-medium" style="z-index: 9">
				            <li>
								
								<!-- menu dekstop -->
								<a class="uk-navbar-toggle uk-visible@s" uk-navbar-toggle-icon href="#"></a>
			                	<div class="uk-navbar-dropdown uk-navbar-dropdown-width-2 uk-visible@s">

				        			<div class="uk-margin">
									    <form class="uk-search uk-search-default" style="width: 100%" action="<?php echo site_url('Searchdata');?>" method="post">
									        <span uk-search-icon></span>
									        <input class="uk-search-input" type="search" placeholder="Search..." id="search" name="search">
									    </form>
									</div>

						            <div class="uk-grid-small uk-child-width-1-4@s uk-flex-left uk-text-center" uk-grid>
										<div>
											<div class="uk-card">
												<a href="<?php echo site_url('Dbackend')?>" style="font-size:12px;text-decoration:none;color:grey">
													<span class="uk-text-muted" uk-icon="icon: home; ratio: 3"></span>
													<p>Dashboard</p>
												</a>
											</div>
										</div>

										<div>
											<div class="uk-card">
												<a href="<?php echo site_url('Sumberdata')?>" style="font-size:12px;text-decoration:none;color:grey">
													<!-- <div style="width: auto; height: 80px; ">
														<img data-src="<?php echo base_url('assets/img/storage.png')?>" alt="" uk-img>
													</div> -->
													<span class="uk-text-danger" uk-icon="icon: database; ratio: 3"></span>
													<p>Sumber Data</p>
												</a>
											</div>
										</div>

										<div>
											<div class="uk-card">
												<a href="<?php echo site_url('Data_spasial')?>" style="font-size:12px;text-decoration:none;color:grey">
													<!-- <div style="width: 100%; height: 80px; ">
													<img data-src="<?php echo base_url('assets/img/analysis.png')?>" alt="" uk-img>
													</div> -->
													<span class="uk-text-warning" uk-icon="icon: image; ratio: 3"></span>
													<p>Diagram</p>
												</a>
											</div>
										</div>

										<div>
											<div class="uk-card">
												<a href="<?php echo site_url('Program')?>" style="font-size:12px;text-decoration:none;color:grey">
													<!-- <div style="width: 100%; height: 80px; ">
														<img data-src="<?php echo base_url('assets/img/program.png')?>" alt="" uk-img>
													</div> -->
													<span class="uk-text-primary" uk-icon="icon: calendar; ratio: 3"></span>
													<p>Program</p>
												</a>
											</div>
										</div>

										<div>
											<div class="uk-card">
												<a href="<?php echo site_url('Query')?>" style="font-size:12px;text-decoration:none;color:grey">
													<!-- <div style="width: 100%; height: 80px; ">
														<img data-src="<?php echo base_url('assets/img/query.png')?>" alt="" uk-img>
													</div> -->
													<span class="uk-text-warning" uk-icon="icon: bolt; ratio: 3"></span>
													<p>Query</p>
												</a>
											</div>
										</div>

										<div>
											<div class="uk-card">
												<a href="<?php echo site_url('Berita')?>" style="font-size:12px;text-decoration:none;color:grey">
													<!-- <div style="width: 100%; height: 80px; ">
														<img data-src="<?php echo base_url('assets/img/newsletter.png')?>" alt="" uk-img>
													</div> -->
													<span class="uk-text-success" uk-icon="icon: file-text; ratio: 3"></span>
													<p>Berita</p>
												</a>
											</div>
										</div>

										<div>
											<div class="uk-card">
												<a href="<?php echo site_url('Pengaturan')?>" style="font-size:12px;text-decoration:none;color:grey">
													<!-- <div style="width: 100%; height: 80px; ">
														<img data-src="<?php echo base_url('assets/img/settings.png')?>" alt="" uk-img>
													</div> -->
													<span class="uk-text-danger" uk-icon="icon: info; ratio: 3"></span>
													<p>Profil</p>
												</a>
											</div>
										</div>

										<div>
											<div class="uk-card">
												<a href="<?php echo site_url('Pengaturan')?>" style="font-size:12px;text-decoration:none;color:grey">
													<!-- <div style="width: 100%; height: 80px; ">
														<img data-src="<?php echo base_url('assets/img/settings.png')?>" alt="" uk-img>
													</div> -->
													<span class="uk-text-emphasis" uk-icon="icon: cog; ratio: 3"></span>
													<p>Pengaturan</p>
												</a>
											</div>
										</div>

									</div>
						            <hr>
									
									<div class="uk-grid-small uk-child-width-1-2@s uk-flex-left" uk-grid>
										<div class="uk-width-expand">
											<div class="uk-card uk-text-left">
											<a style="text-decoration:none;color:grey; font-size:12px; cursor: auto;">Selamat datang, <b class="text-main"><?php echo $this->session->userdata('nama');?>!</b></a>
											</div>
										</div>
										<div class="uk-width-auto">
											<div class="uk-card uk-text-center">
											<a href="<?php echo site_url('Auth/Logout'); ?>" uk-icon="icon: arrow-right" style="text-decoration:none;color:grey; font-size:12px"> LOG OUT </a>
											</div>
										</div>
									</div>
									
								</div>
								<!-- menu dekstop -->

								<!-- menu mobile -->
								<a href="#offcanvas-menu" class="uk-hidden@l" uk-toggle uk-icon="menu"></a>
								<div id="offcanvas-menu" class="uk-hidden@l" uk-offcanvas="mode: slide; overlay: true">
									<div class="uk-offcanvas-bar">

										<ul class="uk-nav uk-nav-default">
											<li style="padding: 15px;">
											<div class="uk-margin">
												<form class="uk-search uk-search-default" style="width: 100%" action="<?php echo site_url('Searchdata');?>" method="post">
													<span uk-search-icon style="color:grey"></span>
													<input style="background-color:white;border-color:grey;color:grey;"
													class="uk-search-input" type="search" placeholder="Search..." value="Search..." id="search" name="search">
												</form>
											</div>
											</li>
											<li style="padding-bottom: 10px;">
												<a href="<?php echo site_url('Dbackend')?>" style="font-size:15px;text-decoration:none;color:grey">
													
													<span class="uk-text-muted" uk-icon="icon: home; ratio: 2" style="color:#999 !important"></span>
													Dashboard
												</a>
											</li>
											<li style="padding-bottom: 10px;">
												<a href="<?php echo site_url('Sumberdata')?>" style="font-size:15px;text-decoration:none;color:grey">
													
													<span class="uk-text-danger" uk-icon="icon: database; ratio: 2"></span>
													Sumber Data
												</a>
											</li>
											<li style="padding-bottom: 10px;">
												<a href="<?php echo site_url('Data_spasial')?>" style="font-size:15px;text-decoration:none;color:grey">
													
													<span class="uk-text-warning" uk-icon="icon: image; ratio: 2"></span>
													Diagram
												</a>
											</li>
											<li style="padding-bottom: 10px;">
												<a href="<?php echo site_url('Program')?>" style="font-size:15px;text-decoration:none;color:grey">
													
													<span class="uk-text-primary" uk-icon="icon: calendar; ratio: 2" style="color: #1e87f0 !important;"></span>
													Program
												</a>
											</li>
											<li style="padding-bottom: 10px;">
												<a href="<?php echo site_url('Query')?>" style="font-size:15px;text-decoration:none;color:grey">
													
													<span class="uk-text-warning" uk-icon="icon: bolt; ratio: 2"></span>
													Query
												</a>
											</li>
											<li style="padding-bottom: 10px;">
												<a href="<?php echo site_url('Berita')?>" style="font-size:15px;text-decoration:none;color:grey">
													
													<span class="uk-text-success" uk-icon="icon: file-text; ratio: 2"></span>
													Berita
												</a>
											</li>
											<li style="padding-bottom: 10px;">
												<a href="<?php echo site_url('Pengaturan')?>" style="font-size:15px;text-decoration:none;color:grey">
													
													<span class="uk-text-emphasis" uk-icon="icon: cog; ratio: 2"></span>
													Profil
												</a>
											</li>
											<li style="padding-bottom: 10px;">
												<a href="<?php echo site_url('Pengaturan')?>" style="font-size:15px;text-decoration:none;color:grey">
													
													<span class="uk-text-danger" uk-icon="icon: info; ratio: 2"></span>
													Pengaturan
												</a>
											</li>

											<li class="uk-nav-divider" style="padding-bottom: 10px;"></li>
											<li style="padding-bottom: 10px;">
												<a style="text-decoration:none;color:grey; font-size:12px; cursor: auto;">Selamat datang, <b style="color: #ed3c6d;"><?php echo $this->session->userdata('nama');?>!</b></a>
											</li>
											<li style="padding-bottom: 10px;">
												<a href="<?php echo site_url('Auth/Logout'); ?>" uk-icon="icon: sign-out" style="text-decoration:none;color:grey; font-size:12px"> Logout </a>
											</li>
										</ul>

									</div>
								</div>
								<!-- menu mobile -->
				           	</li>
				            <ul class="uk-breadcrumb">
							    <li>
									<a href="<?php echo site_url('Dbackend')?>" style="display:inline-flex">
									<p class="naker-title3">
										<b>N</b>
										</p>
										<p class="naker-title2-3">
											akertrans
										</p>
									</a>
								</li>
							   	<?php echo $breadcumbs;?>
							</ul>

				        </ul>
						
				    </div>
				    <div class="uk-navbar-right ">

				        <ul class="uk-navbar-nav uk-animation-slide-left-medium">
				            
				                <?php echo $menuaction?>
				            
				        </ul>
				    </div>
				</nav>

	        </div>
		</div>

		<div style="margin-top:20px;margin-bottom:50px;">
		<?php echo $contents?>
		</div>

	</div>
</body>
</html>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/uikit.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/uikit-icons.js');?>"></script>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/Chart.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js')?>"></script>