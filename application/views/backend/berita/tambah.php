<div class="uk-grid-small uk-child-width-1-2@s uk-flex-center uk-text-left" uk-grid>
    <div>
        <h5 style="color:grey">Header</h5>
    </div>
</div>
<hr>
<div class="uk-grid-small uk-child-width-1-2@s uk-flex-center uk-text-left" uk-grid>
    <div>
        <div class="uk-card">
            <?php echo form_open_multipart(site_url("Berita/add_/"), array("class" => "formValidate")) ?>
            <fieldset class="uk-fieldset uk-width-1-2@m">
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="judul_berita" placeholder="Ketik judul berita...">
                </div>

                
                <div class="uk-margin">
                    <div uk-form-custom="target: true" style="width: 100%">
                        <input type="file" name="gambar_utama">
                        <input class="uk-input" type="text" placeholder="Pilih gambar utama" name="gambar_utama">
                    </div>
                </div>
                

                <div class="uk-margin">
                    <button type="submit" class="uk-button uk-button-default">Tambah</button>
                </div>
            </fieldset>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<hr>