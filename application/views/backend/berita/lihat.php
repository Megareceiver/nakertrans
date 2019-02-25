<div class="uk-container uk-container-xsmall" uk-scrollspy="cls: uk-animation-slide-bottom-small">
    <div class="uk-margin-top">
        <h3><?php echo $berita_utama[0]->judul_berita;?></h3>
        <p class="uk-meta-text">
            <?php 
                $create = new DateTime($berita_utama[0]->tanggal);
                $now = new DateTime();
                $interval = $now->diff($create);
                // %a will output the total number of days.
                echo $interval->format('%d Hari, %h Jam yang lalu');
            ?>
        </p>
    </div>

    <div class="uk-margin-top">
        <img class="uk-width-1-1 uk-margin-bottom uk-align-center" src="<?php echo base_url('upload/berita/'.$berita_utama[0]->gambar_utama)?>" uk-img>
        
        <?php if (count($berita_detail) > 0) { ?>

            <?php foreach ($berita_detail as $detail) { ?>
            
                <?php if ($detail->tipe == 'text') { ?>
                    <p><?php echo $detail->isi_berita ?></p>
                <?php }else{ ?>
                    <img class="uk-width-1-1 uk-margin-bottom uk-align-center" src="<?php echo base_url('upload/berita/'.$detail->isi_berita)?>" uk-img>
                <?php } ?>

            <?php } ?>

        <?php } ?>
    </div>
    <hr>

    <p class="uk-text-center">akhir berita</p>
  
</div>