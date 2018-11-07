<div class="uk-animation-slide-bottom-small">
    <p style="margin:0;color:grey;font-size:12px;"><b> Slider (<?php echo count($slide)?>)</b></p>
    <hr>
    <div class="uk-position-relative uk-visible-toggle uk-light" uk-slider>

        <ul class="uk-slider-items uk-grid">
            <?php foreach ($slide as $s) { ?>
                
            <li class="uk-width-1-3">
            <div class="uk-inline uk-margin">

                <img class="uk-border-rounded" src="<?php echo base_url('upload/slide/'.$s->slide)?>" alt="">

                
                <div class="uk-position uk-position-top-right uk-overlay-primary uk-border-rounded">
                    <a style="padding: 10px;" href="<?php echo site_url("Pengaturan/hapus_slide/".$s->id);?>" uk-icon="trash"></a>
                </div>
                <div class="uk-position uk-position-bottom-left uk-overlay-primary uk-border-rounded" style="    width: -webkit-fill-available;">
                    <div style="padding:10px">
                        <div class="uk-panel uk-panel-box uk-text-truncate"><?php echo $s->caption_slide?></div>
                    </div>
                </div>

            </div>
            <?php } ?>
            
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>
    <hr>
    <p style="margin:0;color:grey;font-size:12px"><b> User akses (<?php echo count($user)?>) </b><br>
    Aplikasi memiliki 2 (dua) tipe akses yaitu “Admin” dan “External” dengan maksud Admin sebagai pengelola aplikasi sedangkan External adalah pihak luar yang terkait dengan program tertentu.</p>

    <table id="detail" class="uk-table uk-table-hover uk-table-divider stripe row-border order-column uk-animation-slide-bottom-small" style="width:100%;">
        <thead>
            
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Program</th>
                <th></th>
            
        </thead>
        <tbody>
            <?php  foreach ($user as $u) { ?>
                <tr>
                <td><?php echo $u->nama;?></td>
                <td><?php echo $u->username;?></td>
                <td><?php if($u->role == "1"){ echo "admin";}else{echo "external";}?></td>
                <td><?php echo $u->program;?></td>
                <td>
                    <a class="btn-act" href="#modal-edit_user" onclick="modaledit(<?php echo $u->id?>)" uk-icon="icon: file-edit" title="ubah" uk-toggle></a>
                    <?php if($u->role != "1"){?>
                        <a class="btn-act" href="<?php echo site_url('Pengaturan/hapus_/'.$u->id)?>" uk-icon="icon: trash" title="hapus"></a>
                    <?php } ?>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div id="modal-tambah_slide" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-3">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <p>Tambah Slide</p>
        </div>
		<?php echo form_open_multipart(site_url("Pengaturan/tambah_slide/"), array("class" => "formValidate")) ?>
        <fieldset class="uk-fieldset">
            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik caption..." name="caption_slide">
            </div>
            <div class="uk-margin">
                <div uk-form-custom="target: true" style="width: 100%">
                    <input type="file" name="slide">
                    <input class="uk-input" type="text" placeholder="Pilih gambar" name="slide">
                </div>
            </div>	
            <div class="uk-margin">
                <button class="uk-button uk-button-default">Buat</button>
            </div>
        </fieldset>
        <?php echo form_close() ?>
    </div>
</div>

<div id="modal-tambah_user" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-3">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <p>Tambah user</p>
        </div>
		<?php echo form_open_multipart(site_url("Pengaturan/tambah_user/"), array("class" => "formValidate")) ?>
        <fieldset class="uk-fieldset">
            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik nama user..." name="nama" id="nama" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik username..." name="username" id="username" required>
                <p style="font-size:10px;">(*)dilarang menggunakan spasi</p>
            </div>

            <div class="uk-margin">
                <select class="uk-select" name="tipe" id="tipe" required>
                    <option value="">Tipe</option>
                    <option value="1">Admin</option>
                    <option value="2">External</option>
                </select>
            </div>

            <div class="uk-margin">
                <select class="uk-select" name="program" id="program">
                    <option value="">Program</option>
                    <?php foreach ($program as $p) { ?>
                        <option value="<?php echo $p->nama_program?>"><?php echo $p->nama_program?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="uk-margin">
                <input class="uk-input" type="password" placeholder="Ketik password..." name="password" id="password" required>
                
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="password" placeholder="Ketik ulang password..." name="password2" id="password2" required>
            </div>
            <div class="uk-alert-primary uk-animation-slide-right" uk-alert id="falert1" style="display:none;">
                <a class="uk-alert-close" uk-close onclick="hidealert()"></a>
                <p>Password tidak sama!</p>
            </div>

            <div class="uk-margin">
                <button class="uk-button uk-button-default" style="display:none;" id="btnbuat">Buat</button>
            </div>
        </fieldset>
        <?php echo form_close() ?>
    </div>
</div>

<div id="modal-edit_user" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-3">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <p>Edit user</p>
        </div>
		<?php echo form_open_multipart(site_url("Pengaturan/edit_user/"), array("class" => "formValidate")) ?>
        <fieldset class="uk-fieldset">
            <div class="uk-margin" hidden>
                <input class="uk-input" type="text" placeholder="Ketik nama user..." name="iduser" id="iduser">
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik nama user..." name="nama2" id="nama2" required>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik username..." name="username2" id="username2" required>
                <p style="font-size:10px;">(*)dilarang menggunakan spasi</p>
            </div>

            <div class="uk-margin">
                <select class="uk-select" name="tipe2" id="tipe2" required>
                    <option value="">Tipe</option>
                    <option value="1">Admin</option>
                    <option value="2">External</option>
                </select>
            </div>

            <div class="uk-margin">
                <select class="uk-select" name="program2" id="program2">
                    <option value="">Program</option>
                    <?php foreach ($program as $p) { ?>
                        <option value="<?php echo $p->nama_program?>"><?php echo $p->nama_program?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="uk-margin">
                <input class="uk-input" type="password" placeholder="Ketik password..." name="password_" id="password_" required>
                
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="password" placeholder="Ketik ulang password..." name="password2_" id="password2_" required>
            </div>
            <div class="uk-alert-primary uk-animation-slide-right" uk-alert id="falert1_" style="display:none;">
                <a class="uk-alert-close" uk-close onclick="hidealert()"></a>
                <p>Password tidak sama!</p>
            </div>

            <div class="uk-margin">
                <button class="uk-button uk-button-default" id="btnubah">Ubah</button>
            </div>
        </fieldset>
        <?php echo form_close() ?>
    </div>
</div>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script>
$(document).ready(function() {
	setTimeout(() => {
        $('#detail_info').hide();
        $('#detail_length').hide();
        $('#detail_filter').hide();
		$('#detail_paginate').attr('style', 'font-size:12px; margin-top:15px');
    }, 500);

	$('#detail').DataTable( {
		scrollY:        "420px",
		scrollX:        true,
		scrollCollapse: true,
		paging:         true,
	} );

    check_password();
    check_password2();
});

function modaledit(params) {
    console.log(params);
    $.ajax({
        url: "<?php echo site_url('Pengaturan/get_data_user/');?>"+params,
        dataType: "json",
        success: function( data ) {
            console.log(data);
            $('#iduser').val(data['id']);
            $('#nama2').val(data['nama']);
            $('#username2').val(data['username']);
            $('[name=tipe2]').val(data['role']);
            $('[name=program2]').val(data['program']);
            $('#password_').val(data['password']);
            $('#password2_').val(data['password']);
        }
    });
}

function check_password() {
    $('#password2').on('change',function () {
      if ($('#password').val() != $('#password2').val()){
            $('#falert1').css("display", "block");
      }else{
        $('#btnbuat').css("display", "block");
        $('#falert1').replaceWith('<div class="uk-alert-primary uk-animation-slide-right" uk-alert id="falert1" style="display:none;"><a class="uk-alert-close" uk-close onclick="hidealert()"></a><p>Password tidak sama!</p></div>');
      }
    });
}

function check_password2() {
    $('#password2_').on('change',function () {
      if ($('#password_').val() != $('#password2_').val()){
            $('#falert1_').css("display", "block");
            $('#btnubah').css("display", "none");
      }else{
        $('#btnubah').css("display", "block");
        $('#falert1_').replaceWith('<div class="uk-alert-primary uk-animation-slide-right" uk-alert id="falert1" style="display:none;"><a class="uk-alert-close" uk-close onclick="hidealert()"></a><p>Password tidak sama!</p></div>');
      }
    });
}

function hidealert(){
    $('#falert1').replaceWith('<div class="uk-alert-primary uk-animation-slide-right" uk-alert id="falert1" style="display:none;"><a class="uk-alert-close" uk-close onclick="hidealert()"></a><p>Password tidak sama!</p></div>');
}
</script>