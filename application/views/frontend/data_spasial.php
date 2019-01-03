<div class="uk-flex-center uk-animation-fade" uk-grid>
    <div class="uk-width-xxlarge@m uk-padding">
        <div class="uk-inline">
            <h3 class="uk-margin-remove">
                <a class="uk-link btn-back-floated" uk-icon="icon: arrow-left; ratio: 2;" href="<?php echo base_url();?>"></a>
                Data Spasial
            </h3>
        </div>
        <hr>
        <div id="pagequery" class="uk-card uk-card-default uk-card-body">
            <h5 style="margin:0;">Query</h5>
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

            </div>

            <div class="uk-grid-small uk-child-width-1-3@s uk-flex-left uk-text-center" uk-grid id="result" style="font-size:10px; margin-bottom:5px;">
                    
            </div>

            <hr>

            <h5 style="margin:0;">List Sumber Data</h5>
            <div class="naker-listdata">
                <ul class="uk-list uk-list-striped">
                    <?php foreach ($sumberdata as $sdata) { ?>
                        <li> <label><input class="uk-radio" type="radio" name="radio2" value="<?php echo $sdata['TABLE_NAME']?>"> <?php echo str_replace("_", " ", $sdata['TABLE_NAME']); ?> </label> </li>        
                    <?php } ?>
                </ul>
            </div>

            <hr>
            <button class="uk-button uk-button-default" onclick="hasil_query()">Jalankan query</button>
        </div>
        <div id="mapsjabar" class="uk-card uk-card-default uk-animation-fade" style="display:none;">
            
        </div>
        <div class="uk-card uk-card-default uk-animation-fade" id="buttonmap" style="display:none;">
            <div class="uk-grid-small uk-child-width-1-2@s uk-flex-left uk-text-left" uk-grid>
                <div>
                    <a class="uk-link" uk-icon="icon: arrow-left; ratio: 2;" onclick="currentmap()"></a>
                    kembali
                </div>
                <div>
                    Legend indikator
                </div>
            </div>
        </div>
                        
        <div id="resultmaps" class="uk-card uk-card-default uk-animation-fade" style="display:none;">
            <div>
                <button class="uk-button uk-button-default">Export Data</button>
            </div>

            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-striped uk-table-hover" style="font-size:12px;" id="detail">
                    <thead>
                        <tr id="headertable">
                            
                        </tr>
                    </thead>
                    <tbody id="valuedata">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

<script>
    let url = "<?php echo site_url();?>";
    $(document).ready(function()
    {
        $("input[name='radio2']").on("change", function(){
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
                            
                        }
                    }
                }
            });
            // ---------inputradio
        });
        // --------document

        $('body').on('click', $('svg'), function () {
            $.getScript('<?php echo base_url("assets/js/mapsspasial.js");?>');
        });

    });
    
    function section(params) 
    {
        if (params == 1){
            if($('#tempat_lahir').val() != ""){

                
                $('#result').append('<div>'+
                                        '<div class="uk-alert-danger" uk-alert style="border-radius: 40px;">'+
                                            '<p>Tempat lahir > '+$('#tempat_lahir').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#tempat_lahir').val()+'" /></div>'+
                                    '</div>');
                $('#tempat_lahir').val('');

            }
        }else if(params == 2){
            if($('#jenis_kelamin').val() != ""){

                $('#result').append('<div>'+
                                        '<div class="uk-alert-danger" uk-alert style="border-radius: 40px;">'+
                                            '<p>Jenis kelamin > '+$('#jenis_kelamin').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#jenis_kelamin').val()+'" /></div>'+
                                    '</div>');
                $('#jenis_kelamin').val('');
            }
        }else if(params == 3){
            if($('#status').val() != ""){

                $('#result').append('<div>'+
                                        '<div class="uk-alert-danger" uk-alert style="border-radius: 40px;">'+
                                            '<p>Status > '+$('#status').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#status').val()+'" /></div>'+
                                    '</div>');
                $('#status').val('');
            }
        }else if(params == 4){
            if($('#usia').val() != ""){

                $('#result').append('<div>'+
                                        '<div class="uk-alert-danger" uk-alert style="border-radius: 40px;">'+
                                            '<p>Usia > '+$('#usia').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#usia').val()+'" /></div>'+
                                    '</div>');
                $('#usia').val('');
            }
        }else if(params == 5){
            if($('#agama').val() != ""){
            	
                $('#result').append('<div>'+
                                        '<div class="uk-alert-danger" uk-alert style="border-radius: 40px;">'+
                                            '<p>Agama > '+$('#agama').val()+'</p>'+
                                            
                                        '</div>'+
                                        '<div hidden="hidden"><input name="valquery[]" value="'+$('#agama').val()+'" /></div>'+
                                    '</div>');
                $('#agama').val('');
            }
        }else {
            if($('#pekerjaan').val() != ""){
            	
                $('#result').append('<div>'+
                                        '<div class="uk-alert-danger" uk-alert style="border-radius: 40px;">'+
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

                    // retrive data array
                    header = JSON.stringify(data['header']);
                    value = JSON.stringify(data['value']);
                    // set to cookie for map and table
                    setCookie('headerdata', header, 365);
                    setCookie('valuedata', value, 365);
                    
                    $('#pagequery').attr('style','display:none'); //remove query agregat
                    $('#mapsjabar').attr('style','display:block'); // show map
                    $('#buttonmap').attr('style','display:block'); // show button navigation map

                    $('#mapsjabar').load(url+'/../mapjabar/JABAR.html'); //load map

                    $('#resultmaps').attr('style','display:block;margin-top:50px;padding:20px;'); // load tabel
                    for (let i = 0; i < data['header'].length; i++) {
                        if (data['header'][i]['COLUMN_NAME'] != 'id' && data['header'][i]['COLUMN_NAME'] != 'tercapai' && data['header'][i]['COLUMN_NAME'] != 'validasi' && data['header'][i]['COLUMN_NAME'] != 'referensi') {
                            $('#headertable').append('<th style="border-bottom: 1px solid;">'+data['header'][i]['COLUMN_NAME']+'</th>');   
                        }
                    }

                    for (let j = 0; j < data['value'].length; j++) {
                        $('#valuedata').append('<tr>');

                            for (let k = 0; k < data['header'].length; k++) {
                                if (data['header'][k]['COLUMN_NAME'] != 'id' && data['header'][k]['COLUMN_NAME'] != 'tercapai' && data['header'][k]['COLUMN_NAME'] != 'validasi' && data['header'][k]['COLUMN_NAME'] != 'referensi') {
                                    valdata = data['value'][j][data['header'][k]['COLUMN_NAME']];
                                    $('#valuedata').append('<td>'+valdata+'</td>');
                                }

                            }

                        $('#valuedata').append('</tr>');
                    }

                }
            });
        }else{
            alert('Agregat kosong, silahkan masukin agregat terlebih dahulu!');
        }


    }

    function currentmap() {

        $('#mapsjabar').load(url+'/../mapjabar/JABAR.html');
            // setTimeout(() => {

            //     $.getScript('<?php echo base_url("assets/js/mapsspasial.js");?>', function () {

            //         $('svg').find('path').on('click', function(){

            //             setTimeout(() => {

            //                 $.getScript('<?php echo base_url("assets/js/mapsspasial.js");?>');

            //             }, 1000);

            //         });

            //     });
                
            // }, 1000);
    }
</script>