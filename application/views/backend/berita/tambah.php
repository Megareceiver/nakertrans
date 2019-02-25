<div class="uk-container uk-container-xsmall" uk-scrollspy="cls: uk-animation-slide-bottom-small">
    <div class="uk-margin-top">
        <h5>Header berita</h5>
    </div>

    <hr>
    <div class="uk-card">
        <?php echo form_open_multipart(site_url("Berita/add_/"), array("class" => "formValidate")) ?>
        <fieldset class="uk-fieldset uk-width-1-1">
            <div class="uk-margin">
                <input class="uk-input" type="text" name="judul_berita" placeholder="Ketik judul berita...">
            </div>

            <div class="uk-margin">
                <div uk-form-custom="target: true">
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
    <hr>
    <p class="uk-text-meta">Catatan: Sebelum membuat konten berita diharuskan mengisi <b>Judul</b> dan <b>Gambar utama</b> terlebih dahulu.</p>
</div>