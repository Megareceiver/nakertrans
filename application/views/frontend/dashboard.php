<!-- SLIDER -->
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

<div class="uk-position-relative uk-visible-toggle uk-light uk-background-dark uk-margin-top" uk-slider="infinite: true; autoplay: true; autoplay-interval: 5000">
    <ul class="uk-slider-items uk-grid uk-height-large">
    <?php foreach ($daftar_slide as $slide) { ?>
        <li class="uk-width-1-1@m">
            <div class="uk-panel">
                <div class="uk-background-cover uk-height-large" style="background-image: url(<?php echo base_url('upload/slide/'.$slide->slide)?>);"></div>
                <div class="uk-position-top-left uk-position-medium">
                    <h1 uk-slider-parallax="x: 200,-200" class=""><?php echo $slide->heading_slide;?></h1>
                    <p uk-slider-parallax="x: 200,-200" class=""><?php echo $slide->caption_slide;?></p>
                </div>
            </div>
        </li>
    <?php } ?>
    </ul>

    <div class="uk-position-bottom-center uk-overlay uk-overlay-primary uk-padding-small">
        <a href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>

    <div class="uk-position-center-right uk-overlay uk-overlay-primary uk-padding-small">
        <ul class="uk-slider-nav uk-dotnav uk-dotnav-vertical uk-flex-center uk-margin"></ul>
    </div>
</div>

<div class="uk-section uk-section-secondary uk-light uk-padding-small">
    <div class="uk-container">
        <h3 class="uk-text-center">Profil Nakertrans</h3>
        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
            <div class="uk-text-center">
                <a href="<?php echo site_url('Dfrontend/lihat_profil/sejarah')?>">
                    <p><span uk-icon="icon: history; ratio: 3" class="uk-text-warning"></span></p>
                    <p>Sejarah.</p>
                </a>
            </div>
            <div class="uk-text-center">
                <a href="<?php echo site_url('Dfrontend/lihat_profil/visi_misi')?>">
                    <p><span uk-icon="icon: heart; ratio: 3" class="uk-text-danger"></span></p>
                    <p>Visi & Misi.</p>
                </a>
            </div>
            <div class="uk-text-center">
                <a href="<?php echo site_url('Dfrontend/lihat_profil/tupoksi')?>">
                    <p><span uk-icon="icon: check; ratio: 3" class="uk-text-success"></span></p>
                    <p>Tupoksi.</p>
                </a>
            </div>
            <div class="uk-text-center">
                <a href="<?php echo site_url('Dfrontend/lihat_profil/data_publikasi')?>">
                    <p><span uk-icon="icon: database; ratio: 3" class="uk-text-primary"></span></p>
                    <p>Data dan Publikasi.</p>
                </a>
            </div>
            <div class="uk-text-center">
                <a href="<?php echo site_url('Dfrontend/lihat_profil/galeri')?>">
                    <p><span uk-icon="icon: image; ratio: 3" class="uk-text-warning"></span></p>
                    <p>Galeri.</p>
                </a>
            </div>
            <div class="uk-text-center">
                <a href="<?php echo site_url('Dfrontend/data_spasial/')?>">
                    <p><span uk-icon="icon: world; ratio: 3" class="uk-text-primary"></span></p>
                    <p>Data Spasial.</p>
                </a>
            </div>
        </div>
        <p class="uk-text-center">Copyright © 2018 Pemerintah Provinsi Jawa Barat.</p>
    </div>
</div>

<!-- NEWSLATER -->
<div class="uk-container uk-margin-top uk-padding">
    <p><b>Berita Terkini (<?php echo $jumlah_berita?>)</b></p>
    <div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@m uk-flex-left uk-text-left" uk-grid="masonry: false">

        <?php foreach ($daftar_berita as $berita) { ?>
             <div>
                <div class="uk-card uk-margin-medium-bottom">
                    <div class="uk-card-media-top">
                        <div class="uk-background-cover uk-height-small" style="background-image: url(<?php echo base_url('upload/berita/'.$berita->gambar_utama)?>);"></div>
                        <!-- <img data-src="<?php echo base_url('upload/berita/'.$berita->gambar_utama)?>" alt="Berita Nakertrans" uk-img> -->
                    </div>
                    <div class="uk-card-body uk-padding-remove">
                        <h4 class="uk-margin-small-top">
                            <?php echo $berita->judul_berita?>
                        </h4>
                    </div>
                    <div class="uk-card-footer uk-padding-remove">
                        <a class="uk-button uk-button-link uk-text-capitalize" href="<?php echo site_url('Dfrontend/lihat_berita/'.$berita->id)?>">Selengkapnya...</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
