<!-- SLIDER -->
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="min-height: 200; max-height: 500; animation: push;autoplay: true;autoplay-interval: 3000" style="margin-top:50px">

<ul class="uk-slideshow-items">
    <?php foreach ($daftar_slide as $slide) { ?>
        <li>
            <img src="<?php echo base_url('upload/slide/'.$slide->slide)?>" alt="" uk-cover>
            <div class="uk-overlay uk-overlay-primary uk-position-bottom-left uk-position-small  uk-transition-slide-bottom"">
                <p class="uk-margin-remove"><?php echo $slide->caption_slide;?></p>
            </div>
        </li>
    <?php } ?>
</ul>

<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>

<!-- NEWSLATER -->
<div class="uk-grid-small uk-child-width-1-3@s uk-flex-left uk-text-left" uk-grid="masonry: true" style="margin-top:50px; margin-bottom:50px;">
    <div>
        <div class="uk-card uk-card-body">
            <p>
                <b>Berita Terkini (<?php echo $jumlah_berita?>)</b> <br>
            </p>
            <p style="font-size:12px">Pemerintah Provinsi Jawa Barat <?php echo date("Y")?> </p>
        </div>
    
    <?php $k=0;?>
    <?php foreach ($daftar_berita as $berita) { ?>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                
                <img data-src="<?php echo base_url('upload/berita/'.$berita->gambar_utama)?>" alt="" uk-img>
                <hr>
                    <h4 style="margin-top:20px;">
                        <?php echo $berita->judul_berita?>
                    </h4>
                    <p id="berita<?php echo $berita->id?>"></p>
                
                    <script>
                    $.ajax({
                        url: "<?php echo site_url()?>" + "/Dfrontend/detail_/"+<?php echo $berita->id?>,
                        dataType: "json",
                        success: function( data ) {
                            if (data != "") {
                                $('#berita'+<?php echo $berita->id?>).replaceWith('<p id="berita<?php echo $berita->id?>">'+data[0]['isi_berita']+'</p>');   
                            }
                        }
                    });
                    </script>

                <p uk-margin>
                    <a class="uk-button uk-button-default" href="<?php echo site_url('Dfrontend/lihat_berita/'.$berita->id)?>">Read more...</a>
                </p>
            </div>
        </div>
        <?php if($k == 0){ echo "</div>";} $k++;?>
    <?php } ?>
    
</div>