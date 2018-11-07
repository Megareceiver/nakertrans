<div class="uk-grid-small uk-child-width-1-2@s uk-flex-center uk-text-left" uk-grid>
    <div>
        <h5 style="color:grey">Header</h5>
        <div hidden>
        <input class="uk-input" type="text" id="id_berita" value="<?php echo $berita->id?>">
        </div>
        
    </div>
</div>
<hr>

<div class="uk-grid-small uk-child-width-1-2@s uk-flex-center uk-text-left" uk-grid>
    <div>
        <div class="uk-card">
            <?php echo form_open_multipart(site_url("Berita/edit_/".$berita->id), array("class" => "formValidate")) ?>
            <fieldset class="uk-fieldset uk-width-1-2@m">
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="judul_berita" placeholder="Ketik judul berita..." value="<?php echo $berita->judul_berita?>">
                </div>

                
                <div class="uk-margin">
                    <div uk-form-custom="target: true" style="width: 100%">
                        <input type="file" name="gambar_utama">
                        <input class="uk-input" type="text" placeholder="Pilih gambar utama" name="gambar_utama">
                    </div>
                    <p><?php echo $berita->gambar_utama?></p>
                </div>
                

                <div class="uk-margin">
                    <button type="submit" class="uk-button uk-button-default">Ubah</button>
                </div>
            </fieldset>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<hr>
<div class="uk-grid-small uk-child-width-1-2@s uk-flex-center uk-text-left" uk-grid>
    <div>
        <div class="uk-card">
            <h5 style="color:grey">Body</h5>
            <ul class="uk-subnav uk-tab uk-subnav-pill" uk-switcher="animation: uk-animation-scale-up , uk-animation-scale-up ">
                <li><a href="#">Teks</a></li>
                <li><a href="#">Gambar</a></li>
            </ul>

            <ul class="uk-switcher uk-margin">

                <li>
                    
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <textarea class="uk-textarea" placeholder="Ketik isi berita..." rows="5" id="isi_berita"></textarea>
                        </div>
                        <div class="uk-margin">
                            <button type="submit" class="uk-button uk-button-default" onclick="tambah_1(<?php echo $berita->id?>)">Submit</button>
                        </div>
                    </fieldset>
                    
                </li>
                <li>
                    
                    <fieldset class="uk-fieldset uk-width-1-2@m">
                        <div class="uk-margin">
                            <div uk-form-custom="target: true" style="width: 100%">
                                <input type="file" id="file">
                                <input class="uk-input" type="text" placeholder="Pilih gambar" id="file">
                            </div>
                        </div>	
                        <div class="uk-margin">
                            <button class="uk-button uk-button-default" onclick="tambah_2(<?php echo $berita->id?>)">Submit</button>
                        </div>
                        
                    </fieldset>
                </li>
            </ul>

            <table id="detail1" class="uk-table uk-table-hover uk-table-divider stripe row-border order-column uk-animation-slide-bottom-small" style="width:100%;">
                <thead>
                    <th style="width: 20px;"></th>
                    <th></th>
                </thead>
                <tbody id="isi_detail1"></tbody>
            </table>
        </div>
    </div>
</div>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script>
$(document).ready(function () {
    id_berita = $('#id_berita').val();
    $.ajax({
        url: "<?php echo site_url('Berita/get_detail/');?>"+id_berita,
        dataType: "json",
        success: function( data ) {
            console.log(data);
            for (i = 0; i < data.length; i++) {
                if(data[i]['tipe'] != 'gambar'){
                    $('#isi_detail1').append('<tr><td><input class="uk-checkbox" type="checkbox" name="check_[]" value="'+data[i]['id']+'"></td> <td style="white-space: normal;">'+data[i]['isi_berita']+'</td></tr>');
                }else{
                    $('#isi_detail1').append('<tr><td><input class="uk-checkbox" type="checkbox" name="check_[]" value="'+data[i]['id']+'"></td> <td style="white-space: normal;"><img src="<?php echo base_url('upload/berita/')?>'+data[i]['isi_berita']+'" uk-img class="uk-border-rounded"></td></tr>');
                }
            }
        }
    });
});
function tambah_1(params) {
    body = $('#isi_berita').val();
    
    $.ajax({
        url: "<?php echo site_url('Berita/tambah_det1/');?>"+params,
        dataType: "json",
        data: {isi_berita: body},
        success: function( data ) {
            window.location.reload();
        }
    });
}

function tambah_2(params) {
    var datasend = new FormData();
    datasend.append('file', $("#file")[0].files[0]);

    // console.log(datasend);
    $.ajax({
        url: "<?php echo site_url('Berita/tambah_det2/');?>"+params,
        type: "post",
        data: datasend,
        processData: false,
        contentType: false,
        cache:false,
        success: function(data) {

            window.location.reload();
        }
    });
}


function hapus() {
    var checkboxes = document.getElementsByName('check_[]');
    var vals = "";
    for (var i=0, n=checkboxes.length;i<n;i++) 
    {
        if (checkboxes[i].checked) 
        {
            // vals += ","+checkboxes[i].value;
            $.ajax({
                url: "<?php echo site_url('Berita/hapus_detail/');?>"+checkboxes[i].value,
                dataType: "json",
                success: function( data ) {
                    console.log(data);
                }
            });
        }
    }
    if (vals) vals = vals.substring(1);

    setTimeout(() => {
        window.location.reload();
    }, 1000);
}
</script>