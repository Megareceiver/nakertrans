<div class="uk-flex-center uk-animation-fade" uk-grid>
    <div class="uk-width-xxlarge@m uk-padding">
        <div class="uk-inline">
            <h3 class="uk-margin-remove">
                <a class="uk-link btn-back-floated" uk-icon="icon: arrow-left; ratio: 2;" href="<?php echo base_url();?>"></a>
                <?php echo $judul_profil;?>
            </h3>
        </div>
        <hr>
        <div class="uk-margin">
            <?php if (count($isi_profil) > 0) { ?>
                <?php foreach ($isi_profil as $detail) { ?>
                    <div>
                        
                        <p class=""><?php echo $detail; ?></p>
                           
                    </div>
                <?php } ?>

            <?php } ?>
        </div>
        <hr>

        <div class="uk-text-center uk-flex-center" uk-grid>
            
            <div>
                <div class="uk-card">
                <p>akhir profil | <a class="uk-link" href="<?php echo base_url();?>">kembali</a></p>
                </div>
            </div>
        </div>
    </div>
</div>