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
            <h5 style="margin:0;">List Sumber Data</h5>
            <div class="naker-listdata">
                <ul class="uk-list uk-list-striped">
                    <?php foreach ($sumberdata as $sdata) { ?>
                        <li> <label><input class="uk-radio" type="radio" name="radio2" value="<?php echo $sdata->data_source; ?>"> <?php echo str_replace("_", " ", $sdata->data_source); ?> </label> </li>        
                    <?php } ?>
                </ul>
            </div>

            <hr>

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
                                    <option value="Belum">Belum bekerja</option>
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
                    <div class="uk-grid-small uk-grid-match uk-child-width-1-5@s uk-flex-center uk-text-center" uk-grid style="color:black; font-size:10px;">
                        <div>
                            <div class="uk-card naker-legend1">
                                <span id="legend1">< 10.000</span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card naker-legend2">
                                <span id="legend2">10.000 - 20.000</span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card naker-legend3">
                                <span id="legend3">20.000 - 40.000</span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card naker-legend4">
                                <span id="legend4">40.000 - 80.000</span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card naker-legend5">
                                <span id="legend5">> 80.000</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
                        
        <div id="resultmaps" class="uk-card uk-card-default uk-animation-fade" style="display:none;">
            <div>
                <button class="uk-button-small uk-button-default" onclick="fnExcelReport();">Export Data</button>
            </div>
            <h5 style="margin: 10px 0px 0px;">Peta Hasil - Data Spasial</h5>
            <p id="dasardata" style="margin: 0px 0px 10px;font-size: 10px;color: #af2323;"></p>
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
                    <!-- <tfoot>
                        <tr>
                            <th style="text-align: right;"><b>Jumlah</b></th>
                            <th style="text-align: right;"><b>Hasil jumlah</b></th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="base" value="<?php echo site_url(); ?>">
<iframe id="txtArea1" style="display:none"></iframe>

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
                        if(value[i].indexOf('tempat') != -1 || value[i].indexOf('Tempat') != -1 ){
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

    function fielddata(params) //for agregat
    {
        if(valuefield.indexOf(params) == -1){
            valuefield.push(params);
        }
    }
    
    function section(params) //for section agregat field
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

    function hasil_query() // for get value data hasil query
    {
        var valquery = $('input[name^=valquery]').map(function(idx, elem) {
            return $(elem).val();
        }).get();

        setCookie('valuefield', valquery, 365);

        var sumberdata = $("input[name='radio2']:checked").val();
        if(valquery != ''){
            $.ajax({
                url: "<?php echo site_url('Query/hasil_spasial/');?>",
                dataType: "json",
                data : {valq : valquery, sdata : sumberdata, sfield: valuefield},
                success: function( data ) {
                    console.log(data);
                    
                    // retrive data array
                    
                    header = JSON.stringify(data['header']);
                    value = JSON.stringify(data['value']);
                    
                    // set to cookie for map and table
                    setCookie('headerdata', header, 365);
                    setCookie('valuedata', value, 365);
                    
                    $('#pagequery').attr('style','display:none'); //remove query agregat
                    $('#section-maps').attr('style','display:block'); // show map
                    $('#buttonmap').attr('style','display:block'); // show button navigation map

                    $('#mapsjabar').load(url+'/../mapjabar/JABAR.HTML', function(){
                        setTimeout(() => {
                            readsvg_first();
                        }, 1000);
                    }); //load map

                }
            });
        }else{
            alert('Agregat kosong, silahkan masukin agregat terlebih dahulu!');
        }
    }

    function currentmap() // for navigation maps
    {
        $.getScript('<?php echo base_url("assets/js/mapsspasial.js");?>');
        $('#mapsjabar').load(url+'/../mapjabar/JABAR.HTML', function(){
            setTimeout(() => {
                readsvg_first();
            }, 1000);
        }); //load map
    }

    function readsvg_first() { //read data svg from maps 
        headerdata = JSON.parse(getCookie('headerdata'));
        valuefield = getCookie('valuefield');
        valuedata = JSON.parse(getCookie('valuedata'));
        kab = [];
        kec2 = [];
        kel2 = [];

        $('#dasardata').replaceWith('<p id="dasardata" style="margin: 0px 0px 10px;font-size: 10px;color: #af2323;"></p>');
        $('#dasardata').append('data yang dihasilkan, berdasarkan [ '+headerdata+' ] dengan nilai/value [ '+valuefield+' ]');

        for (let j = 0; j < valuedata['kab'].length; j++) { //cari id kabupaten/kota
            kel = valuedata['kab'][j]['kel'];
            kec = valuedata['kab'][j]['kec'];
            $.ajax({
                url: "<?php echo site_url('Query/getdaerah/');?>",
                dataType: "json",
                data : {kel : kel, kec : kec},
                success: function( data ) {
                    
                    if(kab.indexOf(data[0]['kab']) == -1){
                        kab.push({ idkab : data[0]['idkab'],
                                kab : data[0]['kab'],
                                jumlah : valuedata['kab'][j]['jumlah'],
                            });
                    }
                }
            });
        }

        for (let k = 0; k < valuedata['kec'].length; k++) { //cari id kecamatan
            kel = valuedata['kec'][k]['kel'];
            kec = valuedata['kec'][k]['kec'];

            $.ajax({
                url: "<?php echo site_url('Query/getdaerah/');?>",
                dataType: "json",
                data : {kel : kel, kec : kec},
                success: function( data ) {
                    // console.log(data);
                    if(kec2.indexOf(data[0]['kec']) == -1){
                        kec2.push({ idkec : data[0]['idkec'],
                                kec : data[0]['kec'],
                                jumlah : valuedata['kec'][k]['jumlah'],
                            });
                    }
                }
            });
        }

        for (let l = 0; l < valuedata['kel'].length; l++) { //cari id kelurahan/desa
            kel = valuedata['kel'][l]['kel'];
            kec = valuedata['kel'][l]['kec'];

            $.ajax({
                url: "<?php echo site_url('Query/getdaerah/');?>",
                dataType: "json",
                data : {kel : kel, kec : kec},
                success: function( data ) {
                    // console.log(data[0]['kec']);
                    if(kel2.indexOf(data[0]['kel']) == -1){
                        kel2.push({ idkel : data[0]['idkel'],
                                kel : data[0]['kel'],
                                jumlah : valuedata['kel'][l]['jumlah'],
                            });
                    }
                }
            });
        }

        setTimeout(() => {
            $('#valuedata').replaceWith('<tbody id="valuedata"></tbody>');
            $('#resultmaps').attr('style','display:block;margin-top:50px;padding:20px;'); // load tabel
            
            $.ajax({
                url: "<?php echo site_url('Query/getprovinsi/');?>",
                dataType: "json",
                success: function( data ) {

                    for (let i = 0; i < data.length; i++) {
                        $('#32_id_kab__'+data[i]['idkab']+'_0').find('g').attr('fill', '#808080');

                        for (let j = 0; j < kab.length; j++) {

                            if(data[i]['idkab'] == kab[j]['idkab']){
                                jum = parseInt(kab[j]['jumlah']);

                                if( jum < 100){
                                    $('#32_id_kab__'+data[i]['idkab']+'_0').find('g').attr('fill', '#e2ee1c');
                                }else if(jum >= 100 || jum <= 200){
                                    $('#32_id_kab__'+data[i]['idkab']+'_0').find('g').attr('fill', '#dfb122');
                                }else if(jum >= 200 || jum <= 400){
                                    $('#32_id_kab__'+data[i]['idkab']+'_0').find('g').attr('fill', '#d6681e');
                                }else if(jum >= 400 || jum <= 800){
                                    $('#32_id_kab__'+data[i]['idkab']+'_0').find('g').attr('fill', '#ce4b1f');
                                }else if(jum > 800){
                                    $('#32_id_kab__'+data[i]['idkab']+'_0').find('g').attr('fill', '#cc3333');
                                }
                                
                            }

                        }

                    }

                    
                    for (let l = 0; l < data.length; l++) {

                        $('#valuedata').append('<tr id="tbl'+data[l]['idkab']+'">'+
                            '<td>'+data[l]['kota/kab']+'</td><td style="text-align: right;">0</td>'+
                        '</tr>');
                        
                        for (let m = 0; m < kab.length; m++) {

                            if(data[l]['idkab'] == kab[m]['idkab']){

                                $('#tbl'+data[l]['idkab']).replaceWith('<tr id="tbl'+data[l]['idkab']+'">'+
                                    '<td>'+data[l]['kota/kab']+'</td><td style="text-align: right;">'+kab[m]['jumlah']+'</td>'+
                                '</tr>');
                                
                            }

                        }


                    }

                }

            });

        }, 1000);
    }

    function fnExcelReport()
    {
        var tab_text="<table border='2px'><tr>";
        var textRange; var j=0;
        tab = document.getElementById('detail'); // id of table

        for(j = 0 ; j < tab.rows.length ; j++) 
        {     
            tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
            //tab_text=tab_text+"</tr>";
        }

        tab_text=tab_text+"</table>";
        tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
        tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
        tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE "); 

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
        {
            txtArea1.document.open("txt/html","replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus(); 
            sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
        }  
        else                 //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

        return (sa);
    }
</script>