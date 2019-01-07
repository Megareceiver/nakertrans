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
            $('#mapsjabar').load(url+'/../mapjabar/'+svgf+'/'+svgf+'.html', function(){
                setTimeout(() => {
                    readsvg();
                }, 500);
            });

        }else{
            first = getCookie('first');
            $('#mapsjabar').load(url+'/../mapjabar/'+first+'/kec/'+svgf+'.html', function(){
                setTimeout(() => {
                    readsvg();
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

function readssvg() {
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