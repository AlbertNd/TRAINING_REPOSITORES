$(document).ready(function(){
    $('#s1').click(function(){
        $('section:nth-child(1)').load('NouveauText/text2.html #sec1',function(){});
    });
    $('#s2').click(function(){
        $('section:nth-child(2)').load('NouveauText/text2.html #sec2',function(){
        });
    });
    $('#s3').click(function(){
        $('section:nth-child(3)').load('NouveauText/text2.html #sec3',function(){
        });
    });
});