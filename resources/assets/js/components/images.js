$(function () {
    
    $('img.img-hovers').hover(function(){
        $(this).attr("src",$(this).attr("data-hover-src"));
    },function(){
        $(this).attr("src",$(this).attr("data-src"));
    });  
    
    $('.imgs-hovers').hover(function(){
        $imgs=$(this).find('img');
        $imgs.attr("src",$imgs.attr("data-hover-src"));
    },function(){
        $imgs=$(this).find('img');
        $imgs.attr("src",$imgs.attr("data-src"));
    });  
    
});
