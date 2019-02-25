<div class="">
    <h5 style="margin:0;">List Sumber Data</h5>
    <div class="naker-listdata">
        <ul class="uk-list uk-list-striped">
            <?php foreach ($sumberdata as $sdata) { ?>
                <li> <label><input class="uk-radio" type="radio" name="radio2" value="<?php echo $sdata['TABLE_NAME']?>"> <?php echo str_replace("_", " ", $sdata['TABLE_NAME']); ?> </label> </li>        
            <?php } ?>
        </ul>
    </div>

    <h5 style="margin:0;">Agregat</h5>
    <hr>
    <div class="uk-grid-small uk-child-width-1-3@s uk-flex-left uk-text-center" uk-grid>

        <div id="section1" class="">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <input class="uk-input" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Ketik tempat lahir..." disabled>
                    </div>
                    <div class="uk-width-1-4@s">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="1" onclick="section(1)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section2" class="">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <select class="uk-select" name="jenis_kelamin" id="jenis_kelamin" disabled>
                            <option value="">Jenis kelamin</option>
                            <option value="laki - laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="uk-width-1-4@s">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="2" onclick="section(2)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section3" class="">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <select class="uk-select" name="status" id="status" disabled>
                            <option value="">Status perkawinan</option>
                            <option value="belum menikah">Belum menikah</option>
                            <option value="menikah">Menikah</option>
                        </select>
                    </div>
                    <div class="uk-width-1-4@s" class="">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="3" onclick="section(3)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section4" class="">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <input class="uk-input" type="number" placeholder="Ketik usia..." name="usia" id="usia" disabled>
                    </div>
                    <div class="uk-width-1-4@s">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="4" onclick="section(4)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section5" class="">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <select class="uk-select" name="agama" id="agama" disabled>
                            <option value="">Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Khonghucu">Khonghucu</option>
                        </select>
                    </div>
                    <div class="uk-width-1-4@s">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="5" onclick="section(5)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section6" class="">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <select class="uk-select" name="pekerjaan" id="pekerjaan" disabled>
                            <option value="">Pekerjaan</option>
                            <option value="Bekerja">Bekerja</option>
                            <option value="Belum bekerja">Belum bekerja</option>
                        </select>
                    </div>
                    <div class="uk-width-1-4@s">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="6" onclick="section(6)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section7" class="">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <input class="uk-input" type="text" name="alamat" id="alamat" placeholder="Ketik alamat..." disabled>
                    </div>
                    <div class="uk-width-1-4@s">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="1" onclick="section(7)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <hr>
    <div id="kriteria" class="">
        <h5 style="margin:0;">Kriteria</h5>
        <div class="uk-grid-small uk-child-width-1-6@s uk-flex-left uk-text-center" uk-grid id="result" style="font-size:10px; margin-bottom:5px;">
            
        </div>
    </div>

    <hr>
    <button class="uk-button uk-button-default" onclick="hasil_query()">Jalankan query</button>
    <button class="uk-button uk-button-default" onclick="location.reload()">Reset</button>
    <br>
    <br>
    <div id="hasil" class="">
        <h5 style="margin:0;">Hasil query</h5>
        <br>
        <div class="naker-listdata">
            <pre id="hasil_query"></pre>
        </div>
    </div>
</div>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script>
    $(document).ready(function()
    {
        $("input[name='radio2']").on("change", function(){
            $('#result').replaceWith('<div class="uk-grid-small uk-child-width-1-6@s uk-flex-left uk-text-center" uk-grid id="result" style="font-size:10px; margin-bottom:5px;"></div>');
            $('#tempat_lahir').prop('disabled', true);
            $('#jenis_kelamin').prop('disabled', true);
            $('#jenis_kelamin').prop('disabled', true);
            $('#status').prop('disabled', true);
            $('#usia').prop('disabled', true);
            $('#agama').prop('disabled', true);
            $('#pekerjaan').prop('disabled', true);

            let sumberdata = $("input[name='radio2']:checked").val();
            $.ajax({
                url: "<?php echo site_url('Data_spasial/get_cloumn_data_source/');?>"+sumberdata,
                dataType: "json",
                success: function( data ) {

                    value = [];
                    for (let i = 0; i < data.length; i++) {
                        value.push(data[i]['COLUMN_NAME']);
                    }

                    for(var i = 0; i < value.length; i++)
                    {
                        if(value[i].indexOf('tempat') != -1 || value[i].indexOf('Tempat') != -1 || value[i].indexOf('lahir') != -1){
                            $('#tempat_lahir').removeAttr('disabled');

                        }else if(value[i].indexOf('jenis') != -1 || value[i].indexOf('kelamin') != -1 || value[i].indexOf('jk') != -1 || value[i].indexOf('JK') != -1){
                            $('#jenis_kelamin').removeAttr('disabled');

                        }else if(value[i].indexOf('status') != -1 || value[i].indexOf('kawin') != -1){
                            $('#status').removeAttr('disabled');

                        }else if(value[i].indexOf('usia') != -1 || value[i].indexOf('Usia') != -1 ){
                            $('#usia').removeAttr('disabled');

                        }else if(value[i].indexOf('Agama') != -1 || value[i].indexOf('agama') != -1 || value[i].indexOf('gama') != -1){
                            $('#agama').removeAttr('disabled');

                        }else if(value[i].indexOf('Peker') != -1 || value[i].indexOf('jaan') != -1 || value[i].indexOf('kerja') != -1 || value[i].indexOf('kerjaan') != -1){
                            $('#pekerjaan').removeAttr('disabled');
                            
                        }else if(value[i].indexOf('alamat') != -1 || value[i].indexOf('Alamat') != -1){
                            $('#alamat').removeAttr('disabled');
                            
                        }
                    }
                }
            });
            // ---------inputradio
        });
        // --------document
    });
    
    function section(params) 
    {
        if (params == 1){
            if($('#tempat_lahir').val() != ""){

                
                $('#result').append('<div>'+
                                        '<div class="uk-alert-success" uk-alert style="border-radius: 40px;">'+
                                            '<p>Tempat lahir > '+$('#tempat_lahir').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#tempat_lahir').val()+'" /></div>'+
                                    '</div>');
                $('#tempat_lahir').val('');

            }
        }else if(params == 2){
            if($('#jenis_kelamin').val() != ""){

                $('#result').append('<div>'+
                                        '<div class="uk-alert-success" uk-alert style="border-radius: 40px;">'+
                                            '<p>Jenis kelamin > '+$('#jenis_kelamin').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#jenis_kelamin').val()+'" /></div>'+
                                    '</div>');
                $('#jenis_kelamin').val('');
            }
        }else if(params == 3){
            if($('#status').val() != ""){

                $('#result').append('<div>'+
                                        '<div class="uk-alert-success" uk-alert style="border-radius: 40px;">'+
                                            '<p>Status > '+$('#status').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#status').val()+'" /></div>'+
                                    '</div>');
                $('#status').val('');
            }
        }else if(params == 4){
            if($('#usia').val() != ""){

                $('#result').append('<div>'+
                                        '<div class="uk-alert-success" uk-alert style="border-radius: 40px;">'+
                                            '<p>Usia > '+$('#usia').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#usia').val()+'" /></div>'+
                                    '</div>');
                $('#usia').val('');
            }
        }else if(params == 5){
            if($('#agama').val() != ""){
            	
                $('#result').append('<div>'+
                                        '<div class="uk-alert-success" uk-alert style="border-radius: 40px;">'+
                                            '<p>Agama > '+$('#agama').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#agama').val()+'" /></div>'+
                                    '</div>');
                $('#agama').val('');
            }
        }else if(params == 7){
            if($('#alamat').val() != ""){
            	
                $('#result').append('<div>'+
                                        '<div class="uk-alert-success" uk-alert style="border-radius: 40px;">'+
                                            '<p>Alamat > '+$('#alamat').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#alamat').val()+'" /></div>'+
                                    '</div>');
                $('#alamat').val('');
            }
        }else {
            if($('#pekerjaan').val() != ""){
            	
                $('#result').append('<div>'+
                                        '<div class="uk-alert-success" uk-alert style="border-radius: 40px;">'+
                                            '<p>Pekerjaan > '+$('#pekerjaan').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#pekerjaan').val()+'" /></div>'+
                                    '</div>');
                $('#pekerjaan').val('');

            }
        }
    }

    function hasil_query() 
    {
        $('#hasil_query').replaceWith('<pre id="hasil_query"></pre>');
        var valquery = $('input[name^=valquery]').map(function(idx, elem) {
            return $(elem).val();
        }).get();

        var sumberdata = $("input[name='radio2']:checked").val();
        if(valquery != ''){
            $.ajax({
                url: "<?php echo site_url('Query/hasil_query/');?>",
                dataType: "json",
                data : {valq : valquery, sdata : sumberdata},
                success: function( data ) {
                    console.log(data);
                    if (data['value'] != ''){
                        for (i = 0; i < data['value'].length; i++) {
                            $('#hasil_query').append(JSON.stringify(data['value'][i], undefined, 2));
                        }
                    }else{
                        $('#hasil_query').append('Hasil tidak ditemukan');
                    }
                }
            });
        }else{
            alert('Agregat kosong, silahkan masukin agregat terlebih dahulu!');
        }
    }
</script>