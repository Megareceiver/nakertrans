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

    <div class="uk-inline uk-animation-scale-up" style="height: -webkit-fill-available;width: 100%;">
        <div class="uk-position-top-left uk-overlay uk-text-center">
            <a style="text-decoration:none;color:grey; font-size:12px; cursor: auto;">Selamat datang, <b style="color: #ed3c6d;"><?php echo $this->session->userdata('nama');?>!</b></a>
        </div>

        <div class="uk-position-top-right uk-overlay uk-text-center">
            <a href="<?php echo site_url('Auth/Logout/')?>" uk-icon="icon: sign-in"> Logout </a>
        </div>
        <?php echo $contents; ?>
    </div>
</body>
</html>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/uikit.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/uikit-icons.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/Chart.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js')?>"></script>