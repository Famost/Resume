
function PlusBlock(){ 
     var a =  localStorage.getItem('block_count'+noname);
     if (a === null)
     a = 0;
     a++;
     localStorage.setItem('block_count'+noname, a);
     location.reload();
}

 function MinBlock(b){
      
       for( var i = b; i < BlockCount; i++){
           if(i == b){localStorage.removeItem('text_in_editor'+i+noname); continue;}
    
           var e = i-1;
          var items = localStorage.getItem('text_in_editor'+i+noname);
          if(items === null){ continue;}
           localStorage.setItem('text_in_editor'+e+noname,items) ; 
           localStorage.removeItem('text_in_editor'+i+noname) ;
          
       }
      var a =  localStorage.getItem('block_count'+noname);
      a--;
      localStorage.setItem('block_count'+noname, a);
        location.reload();
}

