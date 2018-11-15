<table id="detail" class="uk-table uk-table-hover uk-table-divider stripe row-border order-column uk-animation-slide-bottom-small" style="width:100%;">
    <thead>
        <tr>
            <th class="uk-table-expand">Judul (<?php echo json_encode($sum_spasial);?>)</th>
            <th class="">Tipe</th>
            <th class="uk-width-small">Sumber Data</th>
            <th class="uk-widt">Group</th>
            <th class="uk-table-shrink"></th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($data_spasial as $d) { ?>
			<tr>
                <td><?php echo $d->judul?></td>
                <td><?php echo $d->tipe?></td>
                <td style="text-transform: capitalize;"><?php echo str_replace("_"," ",$d->data_source)?></td>
                <td><?php echo $d->grouping?></td>
                <td>
                    <a class="btn-act" href="#modal-edit" onclick="modaledit(<?php echo $d->id?>)" uk-icon="icon: file-edit" title="ubah" uk-toggle></a>
                    <a class="btn-act" href="<?php echo site_url('Data_spasial/hapus_/'.$d->id)?>" uk-icon="icon: trash" title="hapus"></a>
                </td>
			</tr>	
		<?php } ?>
        
    </tbody>
</table>

<div id="modal-tambah" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-3">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h4 class="uk-modal-title">Ketik Judul Data</h4>
        </div>
		<?php echo form_open_multipart(site_url("Data_spasial/add_/"), array("class" => "formValidate")) ?>
       	<fieldset class="uk-fieldset">
    		<div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik judul data..." id="judul" name="judul">
	        </div>
	        <div class="uk-margin">
	            <select class="uk-select" name="tipe">
                    <option>Tipe spasial</option>
	            	<option value="pie">Pie</option>
	            	<option value="bar">Bar</option>
	            </select>
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
                    <option>Grouping by</option>
	            </select>
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
            <h4 class="uk-modal-title">Ubah Judul Data</h4>
        </div>
		<?php echo form_open_multipart(site_url("Data_spasial/edit_/"), array("class" => "formValidate")) ?>
       	<fieldset class="uk-fieldset">
            <div class="uk-margin" hidden>
                <input class="uk-input" type="text" placeholder="Ketik judul data..." id="idselect" name="id2">
	        </div>
    		<div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik judul data..." id="judulselect" name="judul2">
	        </div>
	        <div class="uk-margin">
	            <select class="uk-select" name="tipe2">
                    <option>Tipe spasial</option>
	            	<option value="pie">Pie</option>
	            	<option value="bar">Bar</option>
	            </select>
            </div>
            <div class="uk-margin">
	            <select class="uk-select" name="data_source2">
                    <option id="data_sourceselect">Sumber data</option>
                    <?php foreach ($sumberdata as $s) {
                        echo '<option value="'.$s['TABLE_NAME'].'">'.str_replace("_"," ",$s['TABLE_NAME']).'</option>';    
                    } ?>
	            	
	            </select>
            </div>

            <div class="uk-margin">
	            <select class="uk-select" name="grouping2" id="grouping2">
                    <option id="groupingselect">Grouping by</option>
	            </select>
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
$(document).ready(function() {
    setTimeout(() => {
        $('#detail_info').hide();
        $('#detail_length').hide();
        $('#detail_filter').hide();
        $('#detail_paginate').attr('style', 'font-size:12px');
    }, 500);

    $('#detail').DataTable( {
        scrollY:        "420px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
    } );

    $('select[name=data_source]').change(function(){
        $('#grouping').replaceWith('<select class="uk-select" name="grouping" id="grouping"><option>Grouping by</option></select>');
        var sumberdata = $('select[name=data_source]').val();
        $.ajax({
            url: "<?php echo site_url('Data_spasial/get_cloumn_data_source/');?>"+sumberdata,
            dataType: "json",
            success: function( data ) {
                console.log(data);
                for (i = 0; i < data.length; i++) {
                    $('#grouping').append('<option value="'+data[i]['COLUMN_NAME']+'">'+data[i]['COLUMN_NAME']+'</option>');
                }
                
            }
        });
    });

    $('select[name=data_source2]').change(function(){
        $('#grouping2').replaceWith('<select class="uk-select" name="grouping2" id="grouping2"><option>Grouping by</option></select>');
        var sumberdata = $('select[name=data_source2]').val();
        $.ajax({
            url: "<?php echo site_url('Data_spasial/get_cloumn_data_source/');?>"+sumberdata,
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
        url: "<?php echo site_url('Data_spasial/get_data_edit/');?>"+id,
        dataType: "json",
        success: function( data ) {
            $('#idselect').val(data['id']);
            $('#judulselect').val(data['judul']);
            $('[name=tipe2]').val(data['tipe']);
            $('[name=data_source2]').val(data['data_source']);
            
            var sumberdata = data['data_source'];
            $.ajax({
                url: "<?php echo site_url('Data_spasial/get_cloumn_data_source/');?>"+sumberdata,
                dataType: "json",
                success: function( data ) {
                    console.log(data);
                    for (i = 0; i < data.length; i++) {
                        $('#grouping2').append('<option value="'+data[i]['COLUMN_NAME']+'">'+data[i]['COLUMN_NAME']+'</option>');
                    }
                    
                }
            });
            setTimeout(() => {
                $('[name=grouping2]').val(data['grouping']);
            }, 500);
            
        }
    });
}
</script>