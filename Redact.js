$(document).ready(function(){
 $('.PastePhoto').click(function(event){
       mary = event.currentTarget;
       return mary;
    });
    
    $('.PastePhoto').click(function(event){
       $('.Sharping').toggleClass('active');
    });
    
$('button').on('mousedown', function() {
	return false;
});
//жирный,курсив,подчеркивание
$( '#bold' ).on( 'click', function() {
  document.execCommand( 'bold', false, null ); 

});

$( '#italic' ).on( 'click', function() {
   document.execCommand( 'italic', false, null ); 
});

$( '#underline' ).on( 'click', function() {
   document.execCommand( 'underline', false, null ); 
});

//цвета

$( '#red' ).on( 'click', function() {
   document.execCommand( 'forecolor', false, 'red' ); 
});

$( '#white' ).on( 'click', function() {
   document.execCommand( 'forecolor', false, 'white' ); 
});

//шрифты
$( '#Arial' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Arial' ); 
});

$( '#Arial_Black' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Arial Black' ); 
});

$( '#Comic_Sans_MS' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Comic Sans MS' ); 
});

$( '#Courier_New' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Courier New' ); 
});

$( '#Corbel_Light' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Corbel Light' ); 
});

$( '#Franklin_Gothic_Medium' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Franklin Gothic Medium' ); 
});

$( '#Georgia' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Georgia' ); 
});

$( '#Lucida_Console' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Lucida Console' ); 
});

$( '#Lucida_Sans_Unicode' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Lucida Sans Unicode' ); 
});

$( '#Microsoft_Sans_Serif' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Microsoft Sans Serif' ); 
});

$( '#Palatino_Linotype' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Palatino Linotype' ); 
});

$( '#Sylfaen' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Sylfaen' ); 
});

$( '#Tahoma' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Tahoma' ); 
});

$( '#Times_New_Roman' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Times New Roman' ); 
});

$( '#Trebuchet_MS' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Trebuchet MS' ); 
});

$( '#Verdana' ).on( 'click', function() {
   document.execCommand( 'fontName', false, 'Verdana' ); 
});

//размер шрифта
$( '#1Size' ).on( 'click', function() {
   document.execCommand( 'fontSize', false, '1' );
});

$( '#2Size' ).on( 'click', function() {
   document.execCommand( 'fontSize', false, '2' ); 
});

$( '#3Size' ).on( 'click', function() {
   document.execCommand( 'fontSize', false, '3' ); 
});

$( '#4Size' ).on( 'click', function() {
   document.execCommand( 'fontSize', false, '4' ); 
});

$( '#5Size' ).on( 'click', function() {
   document.execCommand( 'fontSize', false, '5' ); 
});

$( '#6Size' ).on( 'click', function() {
   document.execCommand( 'fontSize', false, '6' ); 
});

$( '#7Size' ).on( 'click', function() {
   document.execCommand( 'fontSize', false, '7' ); 
});

//расположение текста
$( '#justifyRight' ).on( 'click', function() {
   document.execCommand( 'justifyRight', false, null ); 
});

$( '#justifyCenter' ).on( 'click', function() {
   document.execCommand( 'justifyCenter', false, null ); 
});

$( '#justifyLeft' ).on( 'click', function() {
   document.execCommand( 'justifyLeft', false, null ); 
});

$( '#justifyFull' ).on( 'click', function() {
   document.execCommand( 'justifyFull', false, null ); 
});

//цвет фрифта

$( '#ff5e5e' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#ff5e5e' ); 
});

$( '#ff5eac' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#ff5eac' ); 
});

$( '#ff5eef' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#ff5eef' ); 
});

$( '#df5eff' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#df5eff' ); 
});

$( '#af5eff' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#af5eff' ); 
});

$( '#7e5eff' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#7e5eff' ); 
});

$( '#615eff' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#615eff' ); 
});

$( '#5e8cff' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#5e8cff' ); 
});

$( '#5eb1ff' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#5eb1ff' ); 
});

$( '#5edaff' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#5edaff' ); 
});

$( '#5efff4' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#5efff4' ); 
});

$( '#5effcf' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#5effcf' ); 
});

$( '#5effa9' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#5effa9' ); 
});

$( '#61ff5e' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#61ff5e' ); 
});

$( '#ccff5e' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#ccff5e' ); 
});

$( '#fcff5e' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#fcff5e' ); 
});

$( '#ffc95e' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#ffc95e' ); 
});

$( '#ffa15e' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#ffa15e' ); 
});

$( '#ff8f5e' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#ff8f5e' ); 
});

$( '#ff845e' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#ff845e' ); 
});

$( '#ffffff' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, ' #ffffff' ); 
});

$( '#aaaaaa' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#aaaaaa' ); 
});

$( '#666666' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#666666' ); 
});

$( '#444444' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#444444' ); 
});

$( '#000000' ).on( 'click', function() {
   document.execCommand( 'foreColor', false, '#000000' ); 
});

$('#crot1').on('click', function() {
   document.execCommand( 'InsertImage', false, "images/icons/buttons/add.png" ); 
});

$('#fileInput').change(function() {
  $('#myForm').submit();
});

$('#fileInput').change(function() {
  $('#myForm').submit();
});
});




































