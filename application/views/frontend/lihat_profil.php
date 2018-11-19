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
            <?php if ($judul_profil == "Visi dan Misi"){ ?><!-- visi dan misi -->
                <p>Visi :</p>
                <?php foreach ($isi_visi as $detail) { ?>
                    <p class=""><?php echo $detail->text; ?></p>
                <?php } ?>
                <br>

                <p>Misi :</p>
                <?php foreach ($isi_misi as $detail) { ?>
                    <p class=""><?php echo $detail->text; ?></p>
                <?php } ?>

            <?php }else if($judul_profil == "Tupoksi"){ ?> <!-- tupoksi -->
                <p>Kepala Bagian :</p>
                <?php foreach ($isi_kepbag as $detail) { ?>
                    <p class=""><?php echo $detail->text; ?></p>
                <?php } ?>
                <br>

                <p>Sub Bagian :</p>
                <?php foreach ($isi_subbag as $detail) { ?>
                    <p class=""><?php echo $detail->text; ?></p>
                <?php } ?>
                <br>

                <p>Seksi - Seksi :</p>
                <?php foreach ($isi_seksi as $detail) { ?>
                    <p class=""><?php echo $detail->text; ?></p>
                <?php } ?>

            <?php }else{ ?> <!-- sejarah -->
                <?php if (count($isi_profil) > 0) { ?>
                    <?php foreach ($isi_profil as $detail) { ?>
                        <div>
                            
                            <p class=""><?php echo $detail->text; ?></p>
                            
                        </div>
                    <?php } ?>

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