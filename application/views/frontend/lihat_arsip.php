<div class="uk-flex-center uk-animation-fade" uk-grid>
    <div class="uk-width-xxlarge@m uk-padding">
        <div class="uk-inline">
            <h3 class="uk-margin-remove">
                <a class="uk-link btn-back-floated" uk-icon="icon: arrow-left; ratio: 2;" href="<?php echo base_url();?>"></a>
                <?php echo $judul;?>
            </h3>
        </div>
        <hr>
        <div class="uk-margin">
            <?php if (count($data) > 0) { ?>
                <ul class="uk-list uk-list-divider">
                <?php foreach ($data as $detail) { ?>
                    <li class="">
                        <a class="uk-button-link" target="_blank" href="<?php echo base_url('assets/'.$detail->file); ?>">
                            <span uk-icon="cloud-download"></span> &nbsp;
                            <?php echo $detail->judul; ?>
                        </a>
                    </li>
                <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <hr>

        <div class="uk-text-center uk-flex-center" uk-grid>
            
            <div>
                <div class="uk-card">
                <p>akhir arsip | <a class="uk-link" href="<?php echo base_url();?>">kembali</a></p>
                </div>
            </div>
        </div>
    </div>
</div>