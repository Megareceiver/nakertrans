<table id="detail" class="uk-table uk-table-hover uk-table-divider stripe row-border order-column uk-animation-slide-bottom-small" style="width:100%;">
    <thead>
    <tr>
        <th style="width:20px"></th>
        <th style="width:20%">Daftar berita (<?php echo count($berita);?>)</th>
        <th style="width:40%"></th>
        <th></th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($berita as $d) { ?>
			<tr>
                <td><input class="uk-checkbox" type="checkbox" name="check_[]" value="<?php echo $d->id?>"></td>
                <td><img src="<?php echo base_url('upload/berita/'.$d->gambar_utama)?>" uk-img class="uk-border-rounded"></td>
                <td>
                    <p>
                        <?php echo $d->judul_berita?>
                    </p>
                    <p style="font-size:10px; color:grey;">
                        <?php
                            $create = new DateTime($d->tanggal);
                            $now = new DateTime();
                            $interval = $now->diff($create);
                            // %a will output the total number of days.
                            echo $interval->format('%d Hari, %h Jam yang lalu');
                        ?>
                    </p>
                </td>
                <td>
                    <a class="btn-act" href="<?php echo site_url('Berita/lihat_berita_backend/'.$d->id)?>" uk-icon="icon: search" title="lihat"></a>
                    <a class="btn-act" href="<?php echo site_url('Berita/tambah_continue/'.$d->judul_berita)?>" uk-icon="icon: file-edit" title="ubah"></a>
                    <a class="btn-act" href="<?php echo site_url('Berita/hapus_/'.$d->id)?>" uk-icon="icon: trash" title="hapus"></a>
                </td>
			</tr>	
		<?php } ?>
        
    </tbody>
</table>


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
        scrollY:        true,
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        lengthMenu: [[10, 50, -1], [10, 50, "All"]],
    });

});

function hapus() {
    var checkboxes = document.getElementsByName('check_[]');
    var vals = "";
    for (var i=0, n=checkboxes.length;i<n;i++) 
    {
        if (checkboxes[i].checked) 
        {
            // vals += ","+checkboxes[i].value;
            $.ajax({
                url: "<?php echo site_url('Berita/hapus_/');?>"+checkboxes[i].value,
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
</script>