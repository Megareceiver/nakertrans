<p id="loader" class="uk-text-center uk-padding">Memuat data ...</p>
<div id="data-frame" hidden>
    <table id="detail" class="row-border order-column uk-table uk-table-divider" style="width:100%;">
        <thead>
        <tr>
            <?php foreach ($header as $h) { ?>
                <?php if ($h['COLUMN_NAME'] != 'tercapai') { ?>
                    <th><?php echo str_replace("_", " ", $h['COLUMN_NAME'])?></th>
                <?php } ?>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($values as $v) { ?>
                <tr>
                <?php foreach ($header as $h) { ?>
                    <?php if ($h['COLUMN_NAME'] != 'tercapai') { ?>
                        <td><?php echo $v[$h['COLUMN_NAME']]?></td>
                    <?php } ?>
                <?php } ?>
                </tr>	
            <?php } ?>
            
        </tbody>
    </table>
</div>

<div id="modal-sortir" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-2">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header uk-padding-remove-horizontal">
            <h4 class="uk-modal-title">Sortir</h4>
        </div>
		<?php echo form_open_multipart(site_url("Sumberdata/"), array("class" => "formValidate")) ?>
       	<fieldset class="uk-fieldset">
    		<div class="uk-margin">
	            <select class="uk-select" name="data_valid">
	            	<option disabled>Status Validasi</option>
                    <option value="valid">Valid</option>
                    <option value="belum">Belum</option>
                    <option value="tidak ditemukan">Tidak Ditemukan</option>
	            </select>
	        </div>
	        <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Ketik kriteria..." id="tags" name="kriteria">
            </div>
            <hr>
            <span>Tampilkan Kolom</span>
	        <div class="uk-grid uk-child-width-1-3@s" id="kolom">
            
            <?php foreach ($header as $h) { ?>
                <label><input class="uk-checkbox" type="checkbox" value="<?php echo $h['COLUMN_NAME']?>"> <?php echo str_replace("_", " ", $h['COLUMN_NAME'])?></label>
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
    var w = window.innerWidth;
    if (w > 1000){
        $('#detail').on( 'draw.dt', function () {
           $('#loader').remove();
           $('#data-frame').removeAttr('hidden');
        }).DataTable( {
            scrollY:        false,
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            searching: 		false,
            ordering:  		false,
            lengthChange: false,
            fixedColumns:   {
                leftColumns: 0,
                rightColumns: 2,
            },
            pageLength: 20,
        } );

    }else{
        $('#detail').on( 'draw.dt', function () {
           $('#loader').remove();
           $('#data-frame').removeAttr('hidden');
        }).DataTable( {
            scrollY:        false,
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            searching: 		false,
            ordering:  		false,
            lengthChange: false,
            pageLength: 20,
        } );
    }
} );
</script>