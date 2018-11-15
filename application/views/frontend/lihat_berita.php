<div class="uk-flex-center" uk-grid>
    <div class="uk-width-xxlarge@m uk-padding">
        <div class="uk-inline">
            <h3>
            <a class="uk-link btn-back-floated" uk-icon="icon: arrow-left; ratio: 2;" href="<?php echo base_url();?>"></a>
            <?php echo $berita_utama[0]->judul_berita;?></h3>
            <p>
                <?php 
                    $create = new DateTime($berita_utama[0]->tanggal);
                    $now = new DateTime();
                    $interval = $now->diff($create);
                    // %a will output the total number of days.
                    echo $interval->format('%d Hari, %h Jam yang lalu');
                ?>
            </p>
        </div>
        <hr>
        <div class="uk-margin">
            <div class="uk-background-cover uk-height-large" style="background-image: url(<?php echo base_url('upload/berita/'.$berita_utama[0]->gambar_utama)?>);"></div>
        </div>

        <div>
            <?php if (count($berita_detail) > 0) { ?>
                <?php $counter = 0; ?>
                <?php foreach ($berita_detail as $detail) { ?>
                    <div>
                        <?php if ($detail->tipe == 'text') { ?>
                            <div class="uk-card uk-text-left">
                                <p class="<?=($counter == 0 ? 'uk-dropcap' : '')?>"><?php echo $detail->isi_berita ?></p>
                            </div>
                        <?php }else{ ?>
                            <div class="uk-card uk-text-center">
                                <img src="<?php echo base_url('upload/berita/'.$detail->isi_berita)?>" uk-img>
                            </div>
                        <?php } ?>
                    </div>
                <?php $counter++; } ?>

            <?php } ?>
        </div>
        <hr>

        <div class="uk-text-center uk-flex-center" uk-grid>
            
            <div>
                <div class="uk-card">
                <p>akhir berita | <a class="uk-link" href="<?php echo base_url();?>">kembali</a></p>
                </div>
            </div>
        </div>
    </div>
</div>