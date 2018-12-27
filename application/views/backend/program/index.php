<table id="detail" class="uk-table uk-table-hover uk-table-divider stripe row-border order-column " style="width:100%;">
    <thead>
    <tr>
        <th></th>
        <th>Nama program (<?php echo count($program);?>)</th>
        <th>Sumber data</th>
        <th>Pelaksanaan</th>
        <th>pencapaian</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($program as $d) { ?>
			<tr>
                <td><input class="uk-checkbox" type="checkbox" name="check_[]" value="<?php echo $d->id?>"></td>
                <td style="text-transform:capitalize"><?php echo $d->nama_program?></td>
                <td style="text-transform:capitalize"><?php echo str_replace("_"," ", $d->sumber_data)?></td>
                <td><?php echo $d->tanggal_mulai." s.d ".$d->tanggal_selesai?></td>
                <td><?php echo $d->pencapaian."%";?></td>
                <td>
                    <a class="btn-act" href="<?php echo site_url('Program/detail_data/'.$d->sumber_data.'/'.$d->nama_program.'/'.$d->kriteria.'/'.$d->kriteria_value)?>" uk-icon="icon: search" title="lihat" ></a>
                    <a class="btn-act" href="#modal-edit" onclick="modaledit(<?php echo $d->id;?>)" uk-icon="icon: file-edit" title="ubah" uk-toggle></a>
                    <a class="btn-act" href="<?php echo site_url('Program/hapus_/'.$d->id)?>" uk-icon="icon: trash" title="hapus"></a>
                </td>
			</tr>	
		<?php } ?>
        
    </tbody>
</table>

<div id="modal-tambah" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-3">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h4 class="uk-modal-title">Tambah</h4>
        </div>
		<?php echo form_open_multipart(site_url("Program/add_/"), array("class" => "formValidate")) ?>
       	<fieldset class="uk-fieldset">
    		<div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik nama program..." id="nama_program" name="nama_program">
	        </div>

            <div class="uk-margin">
	            <select class="uk-select" name="data_source">
                    <option>Sumber data</option>
                    <?php foreach ($sumberdata as $s) {
                        echo '<option value="'.$s['TABLE_NAME'].'">'.str_replace("_"," ",$s['TABLE_NAME']).'</option>';    
                    } ?>
	            	
	            </select>
            </div>

            <div class="uk-margin">
	            <select class="uk-select" name="grouping" id="grouping">
                    <option value="">Kriteria</option>
	            </select>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik value kriteria..." id="kriteria_value" name="kriteria_value">
	        </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Tanggal mulai..." id="tanggal_mulai" name="tanggal_mulai">
	        </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Tanggal selesai..." id="tanggal_selesai" name="tanggal_selesai">
	        </div>
            
	        <div class="uk-margin">
	        	<button class="uk-button uk-button-default">Buat</button>
	        </div>
    	</fieldset>
		<?php echo form_close() ?>
    </div>
</div>

<div id="modal-edit" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-3">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h4 class="uk-modal-title">Tambah</h4>
        </div>
		<?php echo form_open_multipart(site_url("Program/edit_/"), array("class" => "formValidate")) ?>
       	<fieldset class="uk-fieldset">
           <div class="uk-margin" hidden>
                <input class="uk-input" type="text" placeholder="Ketik judul data..." id="id2" name="id2">
	        </div>
    		<div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik nama program..." id="nama_program2" name="nama_program2">
	        </div>

            <div class="uk-margin">
	            <select class="uk-select" name="data_source2">
                    <option id="data_source2_">Sumber data</option>
                    <?php foreach ($sumberdata as $s) {
                        echo '<option value="'.$s['TABLE_NAME'].'">'.str_replace("_"," ",$s['TABLE_NAME']).'</option>';    
                    } ?>
	            	
	            </select>
            </div>

            <div class="uk-margin">
	            <select class="uk-select" name="grouping2" id="grouping2">
                <option id="grouping2_">Sumber data</option>
                    
	            </select>
            </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik value kriteria..." id="kriteria_value2" name="kriteria_value2">
	        </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Tanggal mulai..." id="tanggal_mulai2" name="tanggal_mulai2">
	        </div>

            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Tanggal selesai..." id="tanggal_selesai2" name="tanggal_selesai2">
	        </div>
            
	        <div class="uk-margin">
	        	<button class="uk-button uk-button-default">Ubah</button>
	        </div>
    	</fieldset>
		<?php echo form_close() ?>
    </div>
</div>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

<script>

function hapus() {
    var checkboxes = document.getElementsByName('check_[]');
    var vals = "";
    for (var i=0, n=checkboxes.length;i<n;i++) 
    {
        if (checkboxes[i].checked) 
        {
            // vals += ","+checkboxes[i].value;
            $.ajax({
                url: "<?php echo site_url('Sumberdata/drop_multipe/');?>"+checkboxes[i].value,
                dataType: "json",
                success: function( data ) {
                    console.log(data);
                }
            });
        }
    }
    if (vals) vals = vals.substring(1);

    setTimeout(() => {
        window.location.reload();
    }, 1000);
}
$(document).ready(function() {
    setTimeout(() => {
        $('#detail_info').hide();
        $('#detail_length').hide();
        $('#detail_filter').hide();
        $('#detail_paginate').attr('style', 'font-size:12px; margin-top:15px');
    }, 500);

    $('#tanggal_mulai').datepicker(
        { minDate: 0, dateFormat: 'yy-mm-dd' }
    );
    $('#tanggal_selesai').datepicker(
        { minDate: 0, dateFormat: 'yy-mm-dd' }
    );

    $('#tanggal_mulai2').datepicker(
        { minDate: 0, dateFormat: 'yy-mm-dd' }
    );
    $('#tanggal_selesai2').datepicker(
        { minDate: 0, dateFormat: 'yy-mm-dd' }
    );
    // setTimeout(() => {
    //     $('#detail_length').hide();
    //     console.log('aaa');
    // }, 500);
    $('#detail').DataTable( {
        scrollY:        "420px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
    });

    // ---------------------
    $('select[name=data_source]').change(function(){
        $('#grouping').replaceWith('<select class="uk-select" name="grouping" id="grouping"><option value="">Kriteria</option></select>');
        var sumberdata = $('select[name=data_source]').val();
        $.ajax({
            url: "<?php echo site_url('Program/get_cloumn_data_source/');?>"+sumberdata,
            dataType: "json",
            success: function( data ) {
                console.log(data);
                for (i = 0; i < data.length; i++) {
                    $('#grouping').append('<option value="'+data[i]['COLUMN_NAME']+'">'+data[i]['COLUMN_NAME']+'</option>');
                }
                
            }
        });
    });
    // ----------------------

    $('select[name=data_source2]').change(function(){
        $('#grouping2').replaceWith('<select class="uk-select" name="grouping2" id="grouping2"><option value="">Kriteria</option></select>');
        var sumberdata = $('select[name=data_source2]').val();
        $.ajax({
            url: "<?php echo site_url('Program/get_cloumn_data_source/');?>"+sumberdata,
            dataType: "json",
            success: function( data ) {
                console.log(data);
                for (i = 0; i < data.length; i++) {
                    $('#grouping2').append('<option value="'+data[i]['COLUMN_NAME']+'">'+data[i]['COLUMN_NAME']+'</option>');
                }
                
            }
        });
    });

});

function modaledit(id) {
    // $('#idselect').val(data['id']);
    // $('#judulselect').val(data['judul']);
    // $('#tipeselect').replaceWith('<option id="tipeselect">'+data['tipe']+'</option>');
    // $('#data_sourceselect').replaceWith('<option id="data_sourceselect">'+data['data_source']+'</option>');
    // $('#groupingselect').replaceWith('<option id="groupingselect">'+data['grouping']+'</option>');
    $.ajax({
        url: "<?php echo site_url('Program/get_data_edit/');?>"+id,
        dataType: "json",
        success: function( data ) {
            $('#id2').val(data['id']);
            $('#nama_program2').val(data['nama_program']);
            $('#data_source2_').replaceWith('<option id="data_source2_" value="'+data['sumber_data']+'" selected>'+data['sumber_data']+'</option>');
            $('#grouping2_').replaceWith('<option id="grouping2_" value="'+data['kriteria']+'" selected>'+data['kriteria']+'</option>');
            $('#kriteria_value2').val(data['kriteria_value']);
            $('#tanggal_mulai2').val(data['tanggal_mulai']);
            $('#tanggal_selesai2').val(data['tanggal_selesai']);
        }
    });
}
</script>