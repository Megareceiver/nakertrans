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
	<div class="uk-container">
		<!-- NAVBAR -->
		<div class="uk-grid-collapse uk-child-width-expand@s " uk-grid>

	        <div>

	        	<nav class="uk-navbar uk-navbar-container " uk-navbar="mode:click" style="background: none">
				    <div class="uk-navbar-left">
				        <ul class="uk-navbar-nav uk-animation-slide-right-medium" style="z-index: 9">
				            <li>
                                <li>
                                    <a href="">
                                        
                                        <p class="naker-d"><?php echo date("d")?>
                                            <p class="naker-l">|</p>
                                        </p>
                                        <p class="naker-y"><?php echo date("Y")."<br> ".date("M")?></p>
        
                                    </a>
                                </li>
                            </li>
				        </ul>
                    </div>
                    <div class="uk-navbar-center">
                        <ul class="uk-navbar-nav uk-animation-slide-right-medium" style="z-index: 9">
                            <li>
                                <a href="">
                                    <div class="naker-title">
                                        N
                                    </div>
                                    <p class="naker-title2">
                                        akertrans
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
				    <div class="uk-navbar-right ">

				        <ul class="uk-navbar-nav uk-animation-slide-left-medium">
				            <li>
                                <a href="<?php echo site_url('Auth')?>" uk-icon="icon: sign-in"> Login </a>
                            </li>
				            
				        </ul>
				    </div>
				</nav>

	        </div>
        </div>

        <div class="uk-animation-scale-up">

            <?php echo $contents;?>
            
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