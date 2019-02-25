<div uk-scrollspy="cls: uk-animation-slide-bottom-small">
    <table id="detail" class="uk-table uk-table-hover uk-table-divider stripe row-border order-column " style="width:100%;">
        <thead>
            <tr>
                <th class="uk-table-shrink">Daftar berita (<?php echo count($berita);?>)</th>
                <th class="uk-table-expand"></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($berita as $d) { ?>
                <tr>
                    <td>
                        <input class="uk-checkbox uk-margin-small-right" type="checkbox" name="check_[]" value="<?php echo $d->id?>">
                        <img src="<?php echo base_url('upload/berita/'.$d->gambar_utama)?>" width="100"class="uk-border-rounded uk-preserve-width">
                    </td>
                    <td>
                        <p>
                            <?php echo $d->judul_berita?>
                        </p>
                        <p class="uk-text-meta">
                            <?php
                                $create = new DateTime($d->tanggal);
                                $now = new DateTime();
                                $interval = $now->diff($create);
                                // %a will output the total number of days.
                                echo $interval->format('%d Hari, %h Jam yang lalu');
                            ?>
                        </p>
                    </td>
                    <td class="uk-text-right">
                        <a class="btn-act fa fa-eye" href="<?php echo site_url('Berita/lihat_berita_backend/'.$d->id)?>" uk-tooltip="title: lihat data; pos: bottom-left"></a>
                        <a class="btn-act fa fa-pencil" href="<?php echo site_url('Berita/tambah_continue/'.$d->judul_berita)?>" uk-tooltip="title: ubah; pos: bottom-left"></a>
                        <a class="btn-act fa fa-trash" href="<?php echo site_url('Berita/hapus_/'.$d->id)?>" uk-tooltip="title: hapus; pos: bottom-left"></a>
                    </td>
                </tr>	
            <?php } ?>
            
        </tbody>
    </table>
</div>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

<script>
$(document).ready(function() {
    $('#detail').DataTable( {
        paging:         true,
        searching: 		false,
    	ordering:  		false,
		lengthChange: false,
		pageLength: 20
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