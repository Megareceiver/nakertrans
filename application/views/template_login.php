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
<body class="bglogin">
	<div class="uk-inline uk-animation-scale-up" style="height: -webkit-fill-available;width: 100%;">
		<!-- LOGIN FORM -->

        
        <div class="uk-position-center uk-overlay uk-text-center">
            <div style="margin-bottom:50px;">
                <p> <b style="font-size: 70px;background-color: #ed3c6d;color: white;height: inherit;width: fit-content;">N</b> </p>
            </div>

            <div style="display: inline-flex; margin-bottom:-10px">
                <p style="background-color: #ed3c6d;color:white;width: fit-content;height:fit-content"><b>N</b></p> <p style="margin: 0px;font-weight: bold;padding-left: 2px;">akertrans Jabar</p>
            </div>
            <form class="">

                <div class="uk-margin " id="fusername">
                    <div class="uk-inline uk-width-1-1" >
                        <span class="uk-form-icon" uk-icon="icon: user" ></span>
                        <input class="uk-input" name="username" id="username" type="text" placeholder="Username...">
                    </div>
                </div>

                <div class="uk-margin uk-animation-slide-right" id="fpassword" style="display:none;">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock" ></span>
                        <input class="uk-input" name="password" id="password" type="password" placeholder="Password...">
                    </div>
                </div>

                <div class="uk-alert-primary uk-animation-slide-right" uk-alert id="falert1" style="display:none;">
                    <a class="uk-alert-close" uk-close onclick="hidealert()"></a>
                    <p>Username tidak ditemukan!</p>
                </div>

                <div class="uk-alert-primary uk-animation-slide-right" uk-alert id="falert2" style="display:none;">
                    <a class="uk-alert-close" uk-close onclick="hidealert2()"></a>
                    <p>password anda salah!</p>
                </div>

            </form>
        </div>
        
        <div class="uk-position-medium-small uk-position-bottom-center uk-overlay uk-text-center" style="color: grey;">
            <a href="<?php echo base_url()?>" uk-icon="icon: close" style="text-decoration:none; color:grey; margin:20px; height: 20px; width: 20px; background: unset;position: relative;border:1px solid grey; border-radius:100%;"></a> <br>
            Copyright © 2018 Pemerintah Provinsi Jawa Barat
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

<script>
$(document).ready(function() {
    $('#username').focus();
    $('#username').keyup(function(event) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Trigger the button element with a click
        var user = $('#username').val();
            $.ajax({
            url: "<?php echo site_url()?>" + "/Auth/checkuser/"+user,
            //   type: "POST",
            //   data: datasend,
                processData: false,
                contentType: false,
            //   cache:false,
                datatype: 'json',
            }).done(function (data) {
                
                if (data == "true"){
                    $('#fpassword').css("display", "block");
                    $('#fusername').css("display", "none");
                    $('#password').focus();
                }else{
                    $('#falert1').css("display", "block");
                }

            });
        }
    });

    $('#password').keyup(function(event) {
        // Cancel the default action, if needed
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Trigger the button element with a click
        var user = $('#username').val();
        var pass = $('#password').val();
            $.ajax({
            url: "<?php echo site_url()?>" + "/Auth/loginauth/"+user+'/'+pass,
                dataType: "json",
            }).done(function (data) {
                
                if (data['status_login'] == "1"){
                    if (data['role'] == "1"){
                        window.location.href = "<?php echo site_url('Dbackend')?>"; 
                    }else{
                        window.location.href = "<?php echo site_url('Dexternal')?>"; 
                    }
                }else{
                    $('#falert2').css("display", "block");
                }

            });
        }
    });
});

function hidealert(){
    $('#falert1').replaceWith('<div class="uk-alert-primary uk-animation-slide-right" uk-alert id="falert1" style="display:none;"><a class="uk-alert-close" uk-close onclick="hidealert()"></a><p>Username tidak ditemukan!</p></div>');
}

function hidealert2(){
    $('#falert2').replaceWith('<div class="uk-alert-primary uk-animation-slide-right" uk-alert id="falert2" style="display:none;"><a class="uk-alert-close" uk-close onclick="hidealert()"></a><p>Password anda salah!</p></div>');
}
</script>