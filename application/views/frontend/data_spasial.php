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
        <div class="description"></div>
        <div id="section-maps" class="uk-card uk-card-default uk-animation-fade uk-text-center" style="display:none;">
            <h5 style="padding:20px">Peta Rekap - Data Spasial</h5>
            <div id="mapsjabar">

            </div>
        </div>
        <div class="uk-card uk-card-default uk-animation-fade uk-padding-small" id="buttonmap" style="display:none;">
        <hr>
            <div class="uk-grid-small uk-flex-left uk-text-left uk-grid-divider" uk-grid>
                <div class="uk-width-1-4@m">
                    <a class="uk-link" uk-icon="icon: arrow-left; ratio: 2;" onclick="currentmap()"></a>
                    kembali
                </div>
                
                <div class="uk-width-expand@m">
                    <h5>Legenda</h5>
                    <div class="uk-grid-small uk-grid-match uk-child-width-1-5@s uk-flex-center uk-text-center" uk-grid style="color:black; font-size:12px;">
                        <div>
                            <div class="uk-card naker-legend1">
                                <span id="legend1">< 22000</span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card naker-legend2">
                                <span id="legend2">22000 - 44000</span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card naker-legend3">
                                <span id="legend3">44000 - 66000</span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card naker-legend4">
                                <span id="legend4">66000 - 88000</span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card naker-legend5">
                                <span id="legend5">> 88000</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
                        
        <div id="resultmaps" class="uk-card uk-card-default uk-animation-fade" style="display:none;">
            <div>
                <button class="uk-button-small uk-button-default">Export Data</button>
            </div>
            <h5>Peta Rekap - Data Spasial</h5>
            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-striped uk-table-hover" style="font-size:12px;" id="detail">
                    <thead style="border-bottom: 1px solid; background-color:lightgrey">
                        <tr id="headertable">
                            <th><center><b>Nama Daerah</b></center></th>
                            <th><center><b>Jumlah</b></center></th>
                        </tr>
                    </thead>
                    <tbody id="valuedata">
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: right;"><b>Jumlah</b></th>
                            <th style="text-align: right;"><b>Hasil jumlah</b></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

<script>
    let url = "<?php echo site_url();?>";
    let valuefield = [];
    $(document).ready(function()
    {
        $("input[name='radio2']").on("change", function(){
            // remove and disable attr field
                valuefield = [];
                $('#result').replaceWith('<div class="uk-grid-small uk-child-width-1-3@s uk-flex-left uk-text-center" uk-grid id="result" style="font-size:10px; margin-bottom:5px;"></div>');

                $('#tempat_lahir').prop('disabled', true);
                $('#jenis_kelamin').prop('disabled', true);
                $('#status').prop('disabled', true);
                $('#usia').prop('disabled', true);
                $('#agama').prop('disabled', true);
                $('#pekerjaan').prop('disabled', true);
                
                $('#tempat_lahir').removeAttr('field');
                $('#jenis_kelamin').removeAttr('field');
                $('#status').removeAttr('field');
                $('#usia').removeAttr('field');
                $('#agama').removeAttr('field');
                $('#pekerjaan').removeAttr('field');
            // 
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
                            $('#tempat_lahir').attr('field', value[i]);

                        }else if(value[i].indexOf('jenis') != -1 || value[i].indexOf('kelamin') != -1 || value[i].indexOf('jk') != -1 || value[i].indexOf('JK') != -1){
                            $('#jenis_kelamin').removeAttr('disabled');
                            $('#jenis_kelamin').attr('field', value[i]);

                        }else if(value[i].indexOf('status') != -1 || value[i].indexOf('kawin') != -1){
                            $('#status').removeAttr('disabled');
                            $('#status').attr('field', value[i]);

                        }else if(value[i].indexOf('usia') != -1 || value[i].indexOf('Usia') != -1 ){
                            $('#usia').removeAttr('disabled');
                            $('#usia').attr('field', value[i]);

                        }else if(value[i].indexOf('Agama') != -1 || value[i].indexOf('agama') != -1 || value[i].indexOf('gama') != -1){
                            $('#agama').removeAttr('disabled');
                            $('#agama').attr('field', value[i]);

                        }else if(value[i].indexOf('Peker') != -1 || value[i].indexOf('jaan') != -1 || value[i].indexOf('kerja') != -1 || value[i].indexOf('kerjaan') != -1){
                            $('#pekerjaan').removeAttr('disabled');
                            $('#pekerjaan').attr('field', value[i]);
                            
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

    function fielddata(params){
        if(valuefield.indexOf(params) == -1){
            valuefield.push(params);
        }

        console.log(valuefield);
    }
    
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
                
                field = $('#tempat_lahir').attr('field');
                fielddata(field);
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

                field = $('#jenis_kelamin').attr('field');
                fielddata(field);
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

                field = $('#status').attr('field');
                fielddata(field);
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

                field = $('#usia').attr('field');
                fielddata(field);
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

                field = $('#agama').attr('field');
                fielddata(field);
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

                field = $('#pekerjaan').attr('field');
                fielddata(field);

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
                url: "<?php echo site_url('Query/hasil_spasial/');?>",
                dataType: "json",
                data : {valq : valquery, sdata : sumberdata, sfield: valuefield},
                success: function( data ) {

                    console.log(data);
                    // // retrive data array
                    // header = JSON.stringify(data['header']);
                    // value = JSON.stringify(data['value']);
                    // // set to cookie for map and table
                    // setCookie('headerdata', header, 365);
                    // setCookie('valuedata', value, 365);
                    
                    // $('#pagequery').attr('style','display:none'); //remove query agregat
                    // $('#section-maps').attr('style','display:block'); // show map
                    // $('#buttonmap').attr('style','display:block'); // show button navigation map

                    // $('#mapsjabar').load(url+'/../mapjabar/JABAR.html', function(){
                    //     setTimeout(() => {
                    //         readsvg_first();
                    //     }, 1000);
                    // }); //load map

                    /* for (let i = 0; i < data['header'].length; i++) {
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
                    }*/

                }
            });
        }else{
            alert('Agregat kosong, silahkan masukin agregat terlebih dahulu!');
        }


    }

    function currentmap() {
        $.getScript('<?php echo base_url("assets/js/mapsspasial.js");?>');
        $('#mapsjabar').load(url+'/../mapjabar/JABAR.html', function(){
            setTimeout(() => {
                readsvg_first();
            }, 1000);
        }); //load map
    }

    function readsvg_first() { //read data svg

        $('#valuedata').replaceWith('<tbody id="valuedata"></tbody>');

        var svgpath = $('svg').find('path');
        daerah = [];
        for (let i = 0; i < svgpath.length; i++) { 
            
            if(daerah.indexOf(svgpath.eq(i).attr('data-original-title')) == -1){

                svg = svgpath.eq(i).attr('data-original-title');
                if(svg != undefined){ // replacing value

                    svg0 = svg.replace(/\<[^>]*>/g, '');
                    svg1 = svg0.trim();
                    svg2 = svg1.replace(/[0-9]/g, '');
                    svg3 = svg2.replace(" ", ' ');
                    svg4 = svg3.replace(".", '');
                    svgf = svg4.trim();

                    if (daerah.indexOf(svgf) == -1) { // delete duplicate data
                        daerah.push(svgf);
                    }
                }
            }
        }
        daerah.sort();

        $('#resultmaps').attr('style','display:block;margin-top:50px;padding:20px;'); // load tabel

        for (let j = 0; j < daerah.length; j++) {
            $('#valuedata').append('<tr>'+
                '<td>'+daerah[j]+'</td><td style="text-align: right;">1</td>'+
            '</tr>');
        }
    }
</script>