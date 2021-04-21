<?php 
      session_start();
       

    
       if($_SESSION['PageId'] == NULL) {$_SESSION['PageId'] = 'AllGames'; }
     
       if (isset($_GET['AllGames'])){ $_SESSION['PageId'] = 'AllGames';} 
       if (isset($_GET['MyGames'])){$_SESSION['PageId'] = 'MyGames';}
       if (isset($_GET['BookSpace'])){$_SESSION['PageId'] = 'BookSpace';}
      
         if (isset($_POST['BookInfoSpace'])){$_SESSION['PageId'] = 'BookInfoSpace';}
?>
