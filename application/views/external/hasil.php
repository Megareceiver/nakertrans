<div class="uk-container" style="margin-top:100px; margin-bottom:50px;">
    <h4>Upload berhasil</h4>
    <table id="detail" class="stripe row-border order-column uk-animation-slide-bottom-small uk-table uk-table-divider" style="width:100%;">
        <thead>
        <tr>
            <?php foreach ($header as $h) { ?>
                <?php if ($h['COLUMN_NAME'] != 'validasi') { ?>
                    <th><?php echo str_replace("_", " ", $h['COLUMN_NAME'])?></th>
                <?php } ?>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($values as $v) { ?>
                <tr>
                <?php foreach ($header as $h) { ?>
                    <?php if ($h['COLUMN_NAME'] != 'validasi') { ?>
                        <td><?php echo $v[$h['COLUMN_NAME']]?></td>
                    <?php } ?>
                <?php } ?>
                </tr>	
            <?php } ?>
            
        </tbody>
    </table>
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
            lengthMenu: [[10, 50, -1], [10, 50, "All"]],
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
            lengthMenu: [[10, 50, -1], [10, 50, "All"]],
        } );
    }

    
} );
</script>