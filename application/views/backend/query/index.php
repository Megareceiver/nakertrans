<div class="uk-animation-scale-up">
    <h5 style="margin:0;">Agregat</h5>
    <hr>
    <div class="uk-grid-small uk-child-width-1-3@s uk-flex-left uk-text-center" uk-grid>

        <div id="section1" class="uk-animation-slide-right-medium">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <input class="uk-input" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Ketik tempat lahir...">
                    </div>
                    <div class="uk-width-1-4@s">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="1" onclick="section(1)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section2" class="uk-animation-slide-right-medium">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <select class="uk-select" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">Jenis kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
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

        <div id="section3" class="uk-animation-slide-right-medium">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <select class="uk-select" name="status" id="status">
                            <option value="">Status perkawinan</option>
                            <option value="belum menikah">Belum menikah</option>
                            <option value="menikah">Menikah</option>
                        </select>
                    </div>
                    <div class="uk-width-1-4@s" class="uk-animation-slide-right-medium">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="3" onclick="section(3)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section4" class="uk-animation-slide-right-medium">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <input class="uk-input" type="number" placeholder="Ketik usia..." name="usia" id="usia">
                    </div>
                    <div class="uk-width-1-4@s">
                        <div style="border:1px solid grey; border-radius:100%; width: 40px;">
                            <a uk-icon="icon: arrow-right; ratio: 2" href="#" id="4" onclick="section(4)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="section5" class="uk-animation-slide-right-medium">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <select class="uk-select" name="agama" id="agama">
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

        <div id="section6" class="uk-animation-slide-right-medium">
            <div class="uk-card">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@m" style="width:70%">
                        <select class="uk-select" name="pekerjaan" id="pekerjaan">
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

    </div>

    <hr>
    <div id="kriteria" class="uk-animation-slide-right-medium">
        <h5 style="margin:0;">Kriteria</h5>
        <div class="uk-grid-small uk-child-width-1-6@s uk-flex-left uk-text-center" uk-grid id="result" style="font-size:10px; margin-bottom:5px;">
            
        </div>
    </div>

    <hr>
    <button class="uk-button uk-button-default" onclick="hasil_query()">Jalankan query</button>
    <br>
    <br>
    <div id="hasil" class="uk-animation-slide-right-medium">
        <h5 style="margin:0;">Hasil query</h5>
        <br>
        <div>
            <pre id="hasil_query"></pre>
        </div>
    </div>
</div>

<script>
    function section(params) {
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

    function hasil_query() {
        var valquery = $('input[name^=valquery]').map(function(idx, elem) {
            return $(elem).val();
        }).get();

        if(valquery != ''){
            $.ajax({
                url: "<?php echo site_url('Query/hasil_query/');?>",
                dataType: "json",
                data : {valq : valquery},
                success: function( data ) {
                    
                    for (i = 0; i < data.length; i++) {
                        $('#hasil_query').append(JSON.stringify(data[i], undefined, 2));
                    }
                }
            });
        }else{
            alert('Agregat kosong, silahkan masukin agregat terlebih dahulu!');
        }
    }
</script>