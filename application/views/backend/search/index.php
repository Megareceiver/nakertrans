<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<?php echo "<b>Pencarian untuk kata : '".$search."' di semua sumber data.</b><hr><br>";?>
<?php for ($i=0; $i < count($table); $i++) { ?>
<b style="text-transform:capitalize;"><?php echo str_replace("_"," ",$table[$i]['TABLE_NAME']);?></b>
<table id="detail<?php echo $i;?>" class="uk-table uk-table-divider stripe row-border order-column" style="width:100%;">
    <thead>
        <tr>
        
        <?php for ($j=0; $j < count($header[$i]); $j++) { ?>
        	<th><?php echo $header[$i][$j]['COLUMN_NAME'];?></th>
        <?php } ?>
        
        </tr>
    </thead>

    <tbody>
        
        
        
        <?php for ($k=0; $k < count($value[$i]); $k++) { ?>
            <tr>
            <?php for ($j=0; $j < count($header[$i]); $j++) { ?>
        
                <td><?php echo $value[$i][$k][$header[$i][$j]['COLUMN_NAME']];?></td>

            <?php } ?>
            </tr>
        <?php } ?>
        
        
    </tbody>
</table>
<hr>
<script>
$(document).ready(function() {
	setTimeout(() => {
        $('#detail<?php echo $i;?>_info').hide();
        $('#detail<?php echo $i;?>_length').hide();
        $('#detail<?php echo $i;?>_filter').hide();
		$('#detail<?php echo $i;?>_paginate').attr('style', 'font-size:12px; margin-top:15px');
    }, 500);

	$('#detail<?php echo $i;?>').DataTable( {
		scrollY:        true,
		scrollX:        true,
		scrollCollapse: true,
		paging:         true,
        lengthMenu: [[25, 50, -1], [25, 50, "All"]],
	} );
});
</script>
<?php } ?>