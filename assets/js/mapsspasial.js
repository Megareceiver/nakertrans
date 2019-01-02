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
            $('#mapsjabar').load(url+'/../mapjabar/'+svgf+'/'+svgf+'.html');
        }else{
            first = getCookie('first');
            $('#mapsjabar').load(url+'/../mapjabar/'+first+'/kec/'+svgf+'.html');
        }

        console.log(getCookie('headerdata'));

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