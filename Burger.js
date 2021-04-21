$(document).ready(function(){
    $('.Burger, .RegBack2').click(function(event){
        $('.Burger , .RegBurger, .RegBack2  ').toggleClass('active');
    });
    
     $('.Burger2, .Back').click(function(event){
        $('.Burger2 , .navLeft, .Back, .RegBurger2').toggleClass('active');
    });
    
     $('.RegVhod, .RegBack').click(function(event){
        $('#log, .RegBack, .navLeft').toggleClass('active');
    });

    $('.addGame, .BackAddGame').click(function(event){
       
    });

    $('.PublicWin').hover(function(event){
        $('.PublicWinMenu , .PublicWin, .PublicWinBack').toggleClass('active');
    });

    let block_width = parseInt($(".content").width());
    let element_count = (parseInt(block_width/160));
    let remainder = block_width-(160*element_count);
    let summ_count = remainder/element_count;
    let x = 150 + summ_count;
    $(".PublicWin").width(x);
    $(".PublicWin").height(x);
});

$(window).resize(function(){

let block_width = parseInt($(".content").width());
let element_count = (parseInt(block_width/160));
let remainder = block_width-(160*element_count);
let summ_count = remainder/element_count;
let x = 150 + summ_count;
$(".PublicWin").width(x);
$(".PublicWin").height(x);
});
