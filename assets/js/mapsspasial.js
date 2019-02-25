$(document).ready(function()
{
    $('svg').find('path').on('click', function(){

        var svg = $(this).attr('data-original-title');
        svg0 = svg.replace(/\<[^>]*>/g, '');
        svg1 = svg0.trim();
        svg2 = svg1.replace(/[0-9]/g, '');
        svg3 = svg2.replace(" ", '-');
        svg4 = svg3.replace(".", '');
        svgf = svg4.trim();

        if(svgf.charAt(svgf.length-1) == "-"){
            svgf = svgf.replace("-","");
        } else if( svgf.charAt(" ") ){
            svgf = svgf.replace(" ","");
        }else {
            svgf = svgf;
        }

        if(svgf.match(/KOTA/g) || svgf.match(/KAB/g)){
            setCookie('first', svgf, 365);
            $('#mapsjabar').load(url+'/../mapjabar/'+svgf+'/'+svgf+'.HTML', function(){
                setTimeout(() => {
                    readsvg(svgf,'');
                }, 500);
            });

        }else{
            first = getCookie('first');
            $('#mapsjabar').load(url+'/../mapjabar/'+first+'/KEC/'+svgf+'.HTML', function(){
                setTimeout(() => {
                    readsvg(first, svgf);
                }, 500);
            });

        }

        // console.log(getCookie('headerdata'));

    });

    // hover path map - show title
    $description = $(".description");
    $('path').hover(function() {
        
        $(this).attr("class", "enabled heyo");
        $description.addClass('active');
        content = $(this).attr('data-original-title');
        contentget = content.replace(/[0-9]/g, '');

        $description.html(contentget);
    }, function() {

        $description.removeClass('active');
    });
});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

$(document).on('mousemove', function(e){
  
  $description.css({
    left:  e.pageX,
    top:   e.pageY - 70
  });

});

function readsvg(param1, param2) { //read data svg from maps 
    var site_url = $('#base').val();
    headerdata = JSON.parse(getCookie('headerdata'));
    valuefield = getCookie('valuefield');
    valuedata = JSON.parse(getCookie('valuedata'));

    kab = [];
    kec2 = [];
    kel2 = [];

    $('html').scrollTop(0);
    $('#modal-center').attr('class', 'uk-modal uk-open');
    $('#modal-center').attr('style', 'display:block');
    $('#dasardata').replaceWith('<p id="dasardata" style="margin: 0px 0px 10px;font-size: 10px;color: #af2323;"></p>');
    $('#dasardata').append('data yang dihasilkan, berdasarkan [ '+headerdata+' ] dengan nilai/value [ '+valuefield+' ]');

    for (let j = 0; j < valuedata['kab'].length; j++) { //cari id kabupaten/kota
        kel = valuedata['kab'][j]['kel'];
        kec = valuedata['kab'][j]['kec'];
        
        $.ajax({
            url: site_url+"/Query/getdaerah/",
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
            url: site_url+"/Query/getdaerah/",
            dataType: "json",
            data : {kel : kel, kec : kec},
            success: function( data ) {
                // console.log(data[0]['kec']);
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
            url: site_url+"/Query/getdaerah/",
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
        // console.log(kab);
        // console.log(kec2);
        console.log(kel2);

        $('#valuedata').replaceWith('<tbody id="valuedata"></tbody>');
        $('#resultmaps').attr('style','display:block;margin-top:50px;padding:20px;'); // load tabel
        
        $.ajax({
            url: site_url+"/Query/getkelkec/",
            dataType: "json",
            data : {kab : param1, kec : param2},
            success: function( data ) {
                console.log(data);
                sikonkec = $('#'+data[0]['idkab']+'_id_kec__'+data[0]['idkec']+'_0').find('g').attr('fill');
                sikonkel = $('#'+data[0]['idkec']+'_id2012__'+data[0]['idkel']).find('g').attr('fill');
                
                if(sikonkec != undefined){
                    for (let i = 0; i < data.length; i++) {
                        $('#'+data[0]['idkab']+'_id_kec__'+data[i]['idkec']+'_0').find('g').attr('fill', '#808080');
                        
                        for (let j = 0; j < kec2.length; j++) {
    
                            if(data[i]['idkec'] == kec2[j]['idkec']){
                                jum = parseInt(kec2[j]['jumlah']);
                
                                if( jum < 100){
                                    $('#'+data[0]['idkab']+'_id_kec__'+data[i]['idkec']+'_0').find('g').attr('fill', '#e2ee1c');
                                }else if(jum >= 100 || jum <= 200){
                                    $('#'+data[0]['idkab']+'_id_kec__'+data[i]['idkec']+'_0').find('g').attr('fill', '#dfb122');
                                }else if(jum >= 200 || jum <= 400){
                                    $('#'+data[0]['idkab']+'_id_kec__'+data[i]['idkec']+'_0').find('g').attr('fill', '#d6681e');
                                }else if(jum >= 400 || jum <= 800){
                                    $('#'+data[0]['idkab']+'_id_kec__'+data[i]['idkec']+'_0').find('g').attr('fill', '#ce4b1f');
                                }else if(jum > 800){
                                    $('#'+data[0]['idkab']+'_id_kec__'+data[i]['idkec']+'_0').find('g').attr('fill', '#cc3333');
                                }
                                
                            }
    
                        }
    
                    }

                    for (let l = 0; l < data.length; l++) {
                    
                        $('#valuedata').append('<tr id="tbl'+data[l]['idkec']+'">'+
                            '<td>'+data[l]['kec']+'</td><td style="text-align: right;">0</td>'+
                        '</tr>');
                        
                        for (let m = 0; m < kec2.length; m++) {
    
                            if(data[l]['idkec'] == kec2[m]['idkec']){
    
                                $('#tbl'+data[l]['idkec']).replaceWith('<tr id="tbl'+data[l]['idkec']+'">'+
                                    '<td>'+data[l]['kec']+'</td><td style="text-align: right;">'+kec2[m]['jumlah']+'</td>'+
                                '</tr>');
                                
                            }
    
                        }
    
    
                    }
                }else{
                    for (let i = 0; i < data.length; i++) {
                        $('#'+data[0]['idkec']+'_id2012__'+data[i]['idkel']).find('g').attr('fill', '#808080');
                        
                        for (let j = 0; j < kel2.length; j++) {
    
                            if(data[i]['idkel'] == kel2[j]['idkel']){
                                jum = parseInt(kel2[j]['jumlah']);
                
                                if( jum < 100){
                                    $('#'+data[0]['idkec']+'_id2012__'+data[i]['idkel']).find('g').attr('fill', '#e2ee1c');
                                }else if(jum >= 100 || jum <= 200){
                                    $('#'+data[0]['idkec']+'_id2012__'+data[i]['idkel']).find('g').attr('fill', '#dfb122');
                                }else if(jum >= 200 || jum <= 400){
                                    $('#'+data[0]['idkec']+'_id2012__'+data[i]['idkel']).find('g').attr('fill', '#d6681e');
                                }else if(jum >= 400 || jum <= 800){
                                    $('#'+data[0]['idkec']+'_id2012__'+data[i]['idkel']).find('g').attr('fill', '#ce4b1f');
                                }else if(jum > 800){
                                    $('#'+data[0]['idkec']+'_id2012__'+data[i]['idkel']).find('g').attr('fill', '#cc3333');
                                }
                                
                            }
    
                        }
    
                    }
                    
                    for (let l = 0; l < data.length; l++) {
                    
                        $('#valuedata').append('<tr id="tbl'+data[l]['idkel']+'">'+
                            '<td>'+data[l]['kel']+'</td><td style="text-align: right;">0</td>'+
                        '</tr>');

                        for (let m = 0; m < kel2.length; m++) {
    
                            if(data[l]['idkel'] == kel2[m]['idkel']){
    
                                $('#tbl'+data[l]['idkel']).replaceWith('<tr id="tbl'+data[l]['idkel']+'">'+
                                    '<td>'+data[l]['kel']+'</td><td style="text-align: right;">'+kel2[m]['jumlah']+'</td>'+
                                '</tr>');
                                
                            }
    
                        }
    
                    }
                }

            }

        });
        $('#modal-center').attr('class', 'uk-modal');
        $('#modal-center').attr('style', 'display:none');
    }, 1000);
}