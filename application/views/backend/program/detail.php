<table id="detail" class="stripe row-border order-column uk-table uk-table-hover uk-table-divider" style="width:100%;">
    <thead>
    <tr>
        <?php foreach ($header as $h) { ?>

            <?php if ( $h['COLUMN_NAME'] != 'validasi'){?>
                <th><?php echo str_replace("_", " ", $h['COLUMN_NAME'])?></th>
            <?php } ?>

        <?php } ?>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($values as $v) { ?>
			<tr>
            <?php foreach ($header as $h) { ?>
                <?php if ( $h['COLUMN_NAME'] != 'validasi'){?>
                    <td><?php echo $v[$h['COLUMN_NAME']]?></td>
                <?php } ?>
            <?php } ?>
			</tr>	
		<?php } ?>
        
    </tbody>
</table>

<div id="modal-sortir" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-2">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h4 class="uk-modal-title">Sortir</h4>
        </div>
		<?php echo form_open_multipart(site_url("Program/"), array("class" => "formValidate")) ?>
       	<fieldset class="uk-fieldset">
    		
	        <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik kriteria..." id="tags" name="kriteria">
            </div>
            <hr>
            <span>Tampilkan Kolom</span>
	        <div class="uk-grid uk-child-width-1-3@s" id="kolom">
            
            <?php foreach ($header as $h) { ?>
                <?php if ( $h['COLUMN_NAME'] != 'validasi' && $h['COLUMN_NAME'] != 'referensi'){?>
                <label><input class="uk-checkbox" type="checkbox" value="<?php echo $h['COLUMN_NAME']?>"> <?php echo str_replace("_", " ", $h['COLUMN_NAME'])?></label>
                <?php } ?>
            <?php } ?>
	        </div>
	        <div class="uk-margin">
	        	<button class="uk-button uk-button-default">Filter</button>
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

    var w = window.innerWidth;
    if (w > 1000){
        $('#detail').DataTable( {
            scrollY:        false,
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            lengthMenu: [[25, 50, -1], [25, 50, "All"]],
            fixedColumns:   {
                leftColumns: 0,
                rightColumns: 2,
            }
        } );
    }else{
        $('#detail').DataTable( {
            scrollY:        false,
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            lengthMenu: [[25, 50, -1], [25, 50, "All"]],
        } );
    }
} );
</script>