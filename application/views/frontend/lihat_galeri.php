<div class="uk-flex-center uk-animation-fade" uk-grid>
    <div class="uk-width-xxlarge@m uk-padding">
        <div class="uk-inline">
            <h3 class="uk-margin-remove">
                <a class="uk-link btn-back-floated" uk-icon="icon: arrow-left; ratio: 2;" href="<?php echo base_url();?>"></a>
                <?php echo $judul;?>
            </h3>
        </div>
        <hr>
        <div class="uk-margin uk-child-width-1-3@m" uk-grid>
            <?php if (count($data) > 0) { ?>
                <?php foreach ($data as $detail) { ?>
                    <div>
                        <div class="uk-background-cover uk-height-small" style="background-image: url(<?php echo base_url('assets/img/'.$detail->gambar)?>);"></div>
                        <p><?=$detail->caption?></p>
                    </diV>
                <?php } ?>
            <?php } ?>
        </div>
        <hr>

        <div class="uk-text-center uk-flex-center" uk-grid>
            
            <div>
                <div class="uk-card">
                <p>akhir galeri | <a class="uk-link" href="<?php echo base_url();?>">kembali</a></p>
                </div>
            </div>
        </div>
    </div>
</div>