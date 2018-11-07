<div class="uk-text-center uk-flex-center" uk-grid style="margin-top: 50px;">
    
    <div style="width: 60%;">
        <div class="uk-card uk-text-left">
        <h3>
            <?php echo $berita_utama[0]->judul_berita;?>
            <p style="font-size:12px; color:grey;">
                <?php 
                    $create = new DateTime($berita_utama[0]->tanggal);
                    $now = new DateTime();
                    $interval = $now->diff($create);
                    // %a will output the total number of days.
                    echo $interval->format('%d Hari, %h Jam yang lalu');
                ?>
            </p>
        </h3>
        </div>
    </div>
</div>
<hr>

<div class="uk-text-center uk-flex-center" uk-grid>
    
    <div style="width: 60%;">
        <div class="uk-card uk-text-left">
            <img src="<?php echo base_url('upload/berita/'.$berita_utama[0]->gambar_utama)?>" uk-img>
        </div>
    </div>
    <?php if (count($berita_detail) > 0) { ?>

        <?php foreach ($berita_detail as $detail) { ?>
            <div style="width: 60%;">

                
                <?php if ($detail->tipe == 'text') { ?>
                <div class="uk-card uk-text-left">
                    <p><?php echo $detail->isi_berita ?></p>
                </div>
                <?php }else{ ?>
                <div class="uk-card uk-text-center">
                    <img src="<?php echo base_url('upload/berita/'.$detail->isi_berita)?>" uk-img>
                </div>
                <?php } ?>

            </div>
        <?php } ?>

    <?php } ?>
</div>
<hr>

<div class="uk-text-center uk-flex-center" uk-grid>
    
    <div style="width: 60%;">
        <div class="uk-card">
        <p>akhir berita | <a href="<?php echo base_url();?>" style="text-decoration:none; color:grey">kembali</a></p>
        </div>
    </div>
</div>