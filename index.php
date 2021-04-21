<?php  session_start(); ?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <?php
include "Manager.php";
include "resize.php";
?>
  <head>
    <meta charset="utf-8">

     
    <link href="main.css" rel="stylesheet" type="text/css" />
    <link href="index.css" rel="stylesheet" type="text/css" />
   <!--  <script src="js/jquery-3.5.1.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/Burger.js"></script>
    <script src="js/Redact.js"></script>
    <script src="js/globals.js"></script>
    <script src="js/functions.js"></script>



 
 
    <title>ArtiBookManager</title>
    
  </head>
  
  <div class="Back"></div>
  <div class="BackAddGame"></div>
  
  
  
  <body>
      
      
      <div class="RegBack"></div>
      
      
      <section id="log">
        
        <div class="RegBack2"></div>
        
        <section id="login" class="welcome" >
            
            
         
<!-- <script>
function reg(){
  var a = (document.getElementById('2').value);
  var b = (document.getElementById('3').value);
  var c = (document.getElementById('1').value);
   win.loadURL("http://articate.beget.tech/test_reg.php?Email="+a+"&Password="+b+"&Nickname="+c);
  //window.window("http://articate.beget.tech/test_reg.php?Email="+a+"&Password="+b+"&Nickname="+c,"_self");
}
</script>

<script>
function log(){
  var a = (document.getElementById('4').value);
  var b = (document.getElementById('5').value);
  //window.window("http://articate.beget.tech/login.php?Email="+a+"&Password="+b,"_self");
   win.loadURL("http://articate.beget.tech/login.php?Email="+a+"&Password="+b);
}


</script> -->
           <form action="login.php" method="POST" class="log">


                   <legend id="vhod">Вход</legend>
                   <br />
                   <label for="username" class="text">Email:</label>
                   <br />
                   <input  type="username" required="required" name="Email" class="pole"/>
                   <br />
                   <label for="password" class="text">Пароль:</label>
                   <br />
                   <input   type="password" required="required"  class="pole" name="Password"/>
                   <br />
                   <br />
                   <input type="submit"  value="Войти" class="button">

           </form>
        </section>

        <div class = "RegBlock">
        <div class ="RegBurgMenu" id="Reg">
            <h class="InvReg">Регистрация</h>
            <div class="Burger"> <span></span> </div>
        </div>
       <div class ="RegBurger">
        <section id="registration" class="welcome">

         <form action="test_reg.php" method="GET" class="log">
                   <legend id="Reg" class="VisReg">Регистрация</legend>
                   <br />
                   <label for="username" class="text">Никнейм:</label>
                   <br />
                   <input  type="username" required="required" name="Nickname"  class="pole"/>
                   <br />
                    <label for="email" class="text">Почта:</label>
                   <br />
                   <input  type="email" required="required" class="pole" name = "Email" />
                   <br />
                   <label for="password" class="text">Пароль:</label>
                   <br />
                   <input  type="password" required="required"  class="pole" name="Password"/>
                   <br />
                   <br />
                   <input type="submit"  value="Зарегистрироваться" class="button">

           </form>
        </section>
        </div>
        </section>
      
      
      
      
      <div class="Burger2">
        <span></span>
      </div>
      
     <form method="GET" class="navLeft">
      <?php if ($_SESSION['user']['id'] == NULL){ ?>
      <div class="RegVhod"> Регистрация/Вход </div>
      <?php }else { ?>
      
      
      
      <button class="menu" name="AllGames"><?echo $_SESSION['user']['nick'];?></button>
      </br>
      <button class="menu" name="MyGames">Мои книги</button>
      </br>
      <button class="menu" name="AllGames">Библиотека</button>
      </br>
      <div class="RegVhod"> Сменить аккаунт </div>
      <?php } ?>
      </form>


          <main>
            
            <div class="Sign">

            </div>



             <div class="container">
          
                  
                  <? if($_SESSION['messege'] != NULL){ ?>
                  <div style="margin-top:10px; color: red;">
                  <? echo $_SESSION['messege']; unset($_SESSION['messege']); ?>  
                  </div>
                  <? } ?>
                    
                    <? if( $_SESSION['PageId'] ==  'MyGames'){ ?>
                    <form method="GET" class="addBookForm">
                    <button class="addGame" name="BookSpace">
                     Погружайте других людей в свою фантазию! 
                    </button>
                    </form>
                    <? } ?>
           
            <div class="content" id="double">
           

             <?php if($_SESSION['PageId'] ==  'MyGames'){
             
              header('Content-Type: text/html; charset=utf-8'); 
              $link = mysqli_connect("localhost", "articate_gamause", "ArtiCate_2001","articate_gamause");
             
               if (mysqli_connect_errno())
                 {
                 echo "Ошибка подключения: " . mysqli_connect_error();  // СУБД MySQL количество строк в запросе не вернет из-за ошибки подключения
                 }
                if ($result = $link->query("SELECT * FROM  `Books_inf`")) {
                   $count = $result->num_rows;
                   $result->close();
               }

              for ($i = 1; $i <= $count; $i++) {

               $sql = "SELECT deleted,book_name,cover,author FROM Books_inf WHERE `id`= $i"; 
               $result = mysqli_query($link, $sql); 
                if (mysqli_num_rows($result) == 0){
                  $count++;
               continue;
                }

            if ($result == false) { 
               echo "error";
               }else{ 
               while ($row = mysqli_fetch_array($result)) { 
                $delete = $row["deleted"];
                $name = $row["book_name"];
                 $cover = $row["cover"];
                  $author = $row["author"];
               } 
               }
             
               if($author != $_SESSION['user']['nick'])
                 continue;
 
              ?>
            
              <section class = "PublicWin" style="background-image: url('<? echo "$cover";  ?>');"><div class="PublicWinBack"><div class="PublicWinName"><? echo "$name";?></div></div><form class="PublicWinMenu" method="POST" action="resize.php?book=<? echo "$i"; ?>"><button class="Download" style="background-color:transparent;" onclick="RedactOpen('<?echo "$i";?>')" name="BookRedSpace">Читать</button> <button class="Download" onclick="RedactOpen('<?echo "$i";?>')" name = "filix" style="background-color:transparent;">Редактировать</button></form></section>
              
             <?php
              }
              }
             ?>
             
             
             
              <?php if($_SESSION['PageId'] ==  'AllGames'){?>
              
               <nav class="SearchBar" role="textbox">
                <form class="SearchForm" method="post">
                    <div class="SearchForm1">
                    <button>Топ-100</button>
                    <button>Популярные</button>
                    <button>Подписки</button>
                    </div>
                    <div class="SearchForm2">
                    <input name="search" placeholder="Искать здесь..." type="search">
                    <button type="submit">Поиск</button>
                    </div>
                </form>
                
            </nav>
            <div style="margin-top:50px;"></div>
              <?
            header('Content-Type: text/html; charset=utf-8'); 
              $link = mysqli_connect("localhost", "articate_gamause", "ArtiCate_2001","articate_gamause");
               if (mysqli_connect_errno())
                {
                echo "Ошибка подключения: " . mysqli_connect_error();  // СУБД MySQL количество строк в запросе не вернет из-за ошибки подключения
                 }
                  
                
              
                if(isset($_POST['search'])){
                     $sear = $_POST['search'];
                     $sear = trim($sear);
                     $sear = strip_tags($sear);
                     if ($result = $link->query("SELECT * FROM  `Books_inf` WHERE book_name LIKE '%$sear%' OR author LIKE '%$sear%'")) {
                   $count = $result->num_rows;
                   $result->close();
                }
                }else{
                     if ($result = $link->query("SELECT * FROM  `Books_inf`")) {
                   $count = $result->num_rows;
                   $result->close();
                } 
                }
           
              
               
               for ($i = 1; $i <= $count; $i++) {
              
               $sql = "SELECT deleted,Published,cover,book_name FROM `Books_inf` WHERE `id`=$i AND (book_name LIKE '%$sear%' OR author LIKE '%$sear%')"; 
               $result = mysqli_query($link, $sql); 
               
             
                
                if (mysqli_num_rows($result) == 0){
                  $count++;
               continue;
               }

            if ($result == false) { 
               echo "error";
               }else{ 
               while ($row = mysqli_fetch_array($result)) { 
                $delete = $row["deleted"];
                $Pub = $row["Published"];
                 $cover = $row["cover"];
                 $name = $row["book_name"];
               } 
               }
               
               if($Pub == 0)
                 continue;
    
              ?>
              
              <section class = "PublicWin" style="background-image: url('<? echo "$cover";  ?>');"><div class="PublicWinBack"><div class="PublicWinName"><? echo "$name";?></div></div><form class="PublicWinMenu" method="POST" action="?book=<?echo $i;?>"><button  class="Download" style="background-color:transparent;" onclick="RedactOpen('<?echo "$i";?>')" name="BookInfoSpace">Подробнее</button></form></section>
              
              <?php
              }?>
             
              <?
              }
              ?>
              
              
              <? if($_SESSION['PageId'] ==  'BookSpace'){ ?>
              
            
              <form method="post" class="AddWin1" action="upload.php" enctype="multipart/form-data">
                  
                 <div class="DownloadWin"><label class="DownloadWinLabel" >Загрузите обложку<input type="file" class="AddFile" name="cover" id="FileCover"/></label></div>
                 <div class="RotCol">
                 <div class="DescPublic" id="AboutPublic"> <textarea maxlength="541" class="AboutPublic" id="AboutPublic1" placeholder="Назовите книгу" name="BookName"/></textarea></div>
                 <div class="DescPublic"> <textarea maxlength="541" class="AboutPublic" placeholder="Добавьте описание книги" name="BookDesc"/></textarea></div>
                 <div class="DescPublicButton"><input type="submit" value="Добавить публикацию"  class="button3" name="filix"></div> 
                 </div>
                  
            
              </form>
              
              
              <?}?>
              
               <? if($_SESSION['PageId'] ==  'BookInfoSpace'){ 
              
               header('Content-Type: text/html; charset=utf-8'); 
              $link = mysqli_connect("localhost", "articate_gamause", "ArtiCate_2001","articate_gamause");
             
               if (mysqli_connect_errno())
                {
                echo "Ошибка подключения: " . mysqli_connect_error();  // СУБД MySQL количество строк в запросе не вернет из-за ошибки подключения
                 }
                if ($result = $link->query("SELECT * FROM  `Books_inf`")) {
                   $count = $result->num_rows;
                   $result->close();
               }
              
       
               $sql = "SELECT id,book_desc,cover,book_name FROM Books_inf WHERE `book_name` = '".$_SESSION['BookNam']."' AND `author` = '".$_SESSION['BookAuthor']."'"; 
               $result = mysqli_query($link, $sql); 

               if ($result == false) { 
               print("Error"); 
               }else{ 
               while ($row = mysqli_fetch_array($result)) { 
                $cover = $row["cover"];
                 $name = $row["book_name"];
                 $desc = $row["book_desc"];
                 $id = $row["id"];
               } 
               } 
               
     
              
              ?>
              
              <form method="post" class="AddWin1" action="?book=<?echo $id;?>">
                  
                 <div class="DownloadWin" style="background-image:url('<?echo $cover;?>');background-position:center;background-size:cover;min-width:250px; min-height:250px; height:250px; "></div>
                 <div class="RotCol">
                 <div class="DescPublic" id="AboutPublic"> <div class="AboutPublic" id="AboutPublic1" name="BookName"/><?echo $name;?></div></div> 
                 <div class="DescPublic"> <div class="AboutPublic" name="BookDesc"/><?echo $desc;?></div></div>
                 <div class="DescPublicButton"><input type="submit" value="Читать"  class="button3" name="BookRedSpace"></div> 
                 </div>
                  
            
              </form>
              
              
              <?}?>
              
               
               <? if( $_SESSION['PageId'] ==  'BookWorkSpace'){ ?>
               <script> var noname = '<? echo $_SESSION['BookNam']; ?>';</script>
               <div class="ToolBar" role="textbox" > 
               
               <!-- <input class="PlusPage" id="Pluss" type="submit" form="TextBoxForm" name="TextBoxForm"/> -->
                 <div class="PlusPage" id="HightRect"  name="TextBoxForm" style="background-image: url('images/icons/buttons/add.png');background-size: 16px;" onclick="PlusBlock()"></div>
                  <button class="PlusPage" onclick="SaveTextBD()" id="HightRect" style="width:110px;" name="TextBoxForm">Опубликовать</button>
                      <div class="dropdown" id="HightRect">
                 <button class="mainmenubtn">Шрифт</button>
                 <div class="dropdown-child">
                   <button class="FontSelectorButton" id="Arial">Arial</button>
                   <button class="FontSelectorButton" id="Arial_Black">Arial Black</button>
                   <button class="FontSelectorButton" id="Comic_Sans_MS">Comic Sans MS</button>
                   <button class="FontSelectorButton" id="Courier_New">Courier New</button>
                   <button class="FontSelectorButton" id="Corbel_Light">Corbel Light</button>
                   <button class="FontSelectorButton" id="Franklin_Gothic_Medium">Franklin Gothic Medium</button>
                   <button class="FontSelectorButton" id="Georgia">Georgia</button>
                   <button class="FontSelectorButton" id="Lucida_Console">Lucida Console</button>
                   <button class="FontSelectorButton" id="Lucida_Sans_Unicode">Lucida Sans Unicode</button>
                   <button class="FontSelectorButton" id="Microsoft_Sans_Serif">Microsoft Sans Serif</button>
                   <button class="FontSelectorButton" id="Palatino_Linotype">Palatino Linotype</button>
                   <button class="FontSelectorButton" id="Sylfaen">Sylfaen</button>
                   <button class="FontSelectorButton" id="Tahoma">Tahoma</button>
                   <button class="FontSelectorButton" id="Times_New_Roman">Times New Roman</button>
                   <button class="FontSelectorButton" id="Trebuchet_MS">Trebuchet MS</button>
                   <button class="FontSelectorButton" id="Verdana">Verdana</button>
                 </div>
               </div>
               
                <div class="dropdown">
                 <button class="mainmenubtn">Размер шрифта</button>
                 <div class="dropdown-child" style="min-width:90px;">
                   <button class="FontSelectorButton" id="1Size">1</button>
                   <button class="FontSelectorButton" id="2Size">2</button>
                   <button class="FontSelectorButton" id="3Size">3</button>
                   <button class="FontSelectorButton" id="4Size">4</button>
                   <button class="FontSelectorButton" id="5Size">5</button>
                   <button class="FontSelectorButton" id="6Size">6</button>
                   <button class="FontSelectorButton" id="7Size">7</button>
    
                 </div>
               </div>
                 
                 <button class="PlusPage" id = "bold"  name="TextBoxForm" style="background-image: url('images/icons/buttons/bold.png');background-size: 16px;"></button>
                 <button class="PlusPage" id = "italic" name="TextBoxForm" style="background-image: url('images/icons/buttons/italic.png');background-size: 16px;" ></button>
                 <button class="PlusPage" id = "underline" style="background-image: url('images/icons/buttons/underline.png');background-size: 16px;" name="TextBoxForm"></button>
                
                
                 <button class="PlusPage" id = "justifyLeft" style="background-image: url('images/icons/buttons/left-alignment.png');background-size: 16px;" name="TextBoxForm"></button>
                 <button class="PlusPage" id = "justifyCenter"  name="TextBoxForm" style="background-image: url('images/icons/buttons/center-alignment-1.png');background-size: 16px; "></button>
                 <button class="PlusPage" id = "justifyRight" style="background-image: url('images/icons/buttons/right-alignment.png');background-size: 16px;" name="TextBoxForm"></button>
                 <button class="PlusPage" id = "justifyFull" name="TextBoxForm" style="background-image: url('images/icons/buttons/center-alignment.png');background-size: 16px;" ></button>
               
               
               
               
                <div class="dropdown" id="HightRect">
                 <button class="mainmenubtn">Цвет шрифта</button>
                 <div class="dropdownColor-child">
                   <button class="ColorSelectorButton" id="ff5e5e" style="background-color:#ff5e5e;"></button>
                   <button class="ColorSelectorButton" id="ff5eac" style="background-color:#ff5eac;"></button>
                   <button class="ColorSelectorButton" id="ff5eef" style="background-color:#ff5eef;"></button>
                   <button class="ColorSelectorButton" id="df5eff" style="background-color:#df5eff;"></button>
                   <button class="ColorSelectorButton" id="af5eff" style="background-color:#af5eff;"></button>
                   <button class="ColorSelectorButton" id="7e5eff" style="background-color:#7e5eff;"></button>
                   <button class="ColorSelectorButton" id="615eff" style="background-color:#615eff;"></button>
                   <button class="ColorSelectorButton" id="5e8cff" style="background-color:#5e8cff;"></button>
                   <button class="ColorSelectorButton" id="5eb1ff" style="background-color:#5eb1ff;"></button>
                   <button class="ColorSelectorButton" id="5edaff" style="background-color:#5edaff;"></button>
                   <button class="ColorSelectorButton" id="5efff4" style="background-color:#5efff4;"></button>
                   <button class="ColorSelectorButton" id="5effcf" style="background-color:#5effcf;"></button>
                   <button class="ColorSelectorButton" id="5effa9" style="background-color:#5effa9;"></button>
                   <button class="ColorSelectorButton" id="61ff5e" style="background-color:#61ff5e;"></button>
                   <button class="ColorSelectorButton" id="ccff5e" style="background-color:#ccff5e;"></button>
                   <button class="ColorSelectorButton" id="fcff5e" style="background-color:#fcff5e;"></button>
                   <button class="ColorSelectorButton" id="ffc95e" style="background-color:#ffc95e;"></button>
                   <button class="ColorSelectorButton" id="ffa15e" style="background-color:#ffa15e;"></button>
                   <button class="ColorSelectorButton" id="ff8f5e" style="background-color:#ff8f5e;"></button>
                   <button class="ColorSelectorButton" id="ff845e" style="background-color:#ff845e;"></button>
                   <button class="ColorSelectorButton" id="ffffff" style="background-color:#fff;"></button>
                   <button class="ColorSelectorButton" id="aaaaaa" style="background-color:#aaa;"></button>
                   <button class="ColorSelectorButton" id="666666" style="background-color:#666666;"></button>
                   <button class="ColorSelectorButton" id="444444" style="background-color:#444444;"></button>
                   <button class="ColorSelectorButton" id="000000" style="background-color:#000;"></button>
                 </div>
               </div>
               
               
         
               <div class="Sharping" ><input type="range"  min="20" max="100" id="size" oninput="sizePic(mary)" value="1"></div>
               
               
                  <div class="dropdown" id="HightRect">
                 <button class="mainmenubtn">Галерея</button>
                 <div class="dropdown-child" style="min-width:312px; padding:3px;">
                     
                     <form method="post" style="display:flex;width:100%; height:35px;justify-content:center;align-items:center;" id = "myForm" action="uploadgal.php" enctype="multipart/form-data"><label class="loadButton">Загрузите картинку<input id="fileInput" class="AddFile" type="file" name="GallImage" onchange="javascript:this.form.submit();"></label></form>
                     
                     <?  
                     header('Content-Type: text/html; charset=utf-8'); 
              $link = mysqli_connect("localhost", "articate_gamause", "ArtiCate_2001","articate_gamause");
             
               if (mysqli_connect_errno())
                 {
                 echo "Ошибка подключения: " . mysqli_connect_error();  // СУБД MySQL количество строк в запросе не вернет из-за ошибки подключения
                 }
                if ($result = $link->query("SELECT * FROM  `Gall_inf`")) {
                   $count = $result->num_rows;
                   $result->close();
               }
              
                 
              for ($i = 1; $i <= $count; $i++) {
                
                 $sql = "SELECT author, deleted,image FROM Gall_inf WHERE `id`= $i"; 
               $result = mysqli_query($link, $sql); 

               if ($result == false) { 
               print("Error"); 
               }else{ 
               while ($row = mysqli_fetch_array($result)) { 
                $author = $row["author"];
                 $delete = $row["deleted"];
                   $cover = $row["image"];
               } 
               }
               
               if($author != $_SESSION['user']['nick'] || $delete == 1)
                 continue;
  
               ?>
               
              <button id="" onclick="TreadImage('<?echo $cover;?>')" style="display:block;float:left;background-image:url('<? echo "$cover";?>');width:100px;height:100px;margin:2px; border-radius:5px; background-position: center; background-size: cover;"></button>
               
               <?}?>
               
                   
                   
                   
                   
                 </div>
               </div>
            
               
               
              <!--  <button class="PlusPage" id = "red" name="TextBoxForm" style="background-color: red" ></button>
              <button class="PlusPage" id = "white" style="background-color: white" name="TextBoxForm"></button> -->
              
               <div class="dropdown" id="HightRect">
                 <button class="mainmenubtn">Звуки</button>
                 <div class="dropdown-child" style="min-width:312px; padding:3px;">
                     
                     <form method="post" style="display:flex;width:100%; height:35px;justify-content:center;align-items:center;" id = "myForm" action="uploadaudio.php" enctype="multipart/form-data"><label class="loadButton">Загрузите звук<input id="fileInput" class="AddFile" type="file" name="AudioGall" onchange="javascript:this.form.submit();"></label></form>
                   
                     <?  
                     header('Content-Type: text/html; charset=utf-8'); 
              $link = mysqli_connect("localhost", "articate_gamause", "ArtiCate_2001","articate_gamause");
             
               if (mysqli_connect_errno())
                 {
                 echo "Ошибка подключения: " . mysqli_connect_error();  // СУБД MySQL количество строк в запросе не вернет из-за ошибки подключения
                 }
                if ($result = $link->query("SELECT * FROM  `Sounds_inf`")) {
                   $count = $result->num_rows;
                   $result->close();
               }
              
                 
              for ($i = 1; $i <= $count; $i++) {
                
                 $sql = "SELECT author,deleted,path,audio_name FROM Sounds_inf WHERE `id`= $i"; 
               $result = mysqli_query($link, $sql); 

               if ($result == false) { 
               print("Error"); 
               }else{ 
               while ($row = mysqli_fetch_array($result)) { 
                $author = $row["author"];
                 $delete = $row["deleted"];
                  $cover = $row["path"];
                   $name = $row["audio_name"];
               } 
               }
               
               if($author != $_SESSION['user']['nick']||$delete == 1)
                 continue;

               ?>
               
              <button id="" onclick="TreadAudio( '<?echo $cover;?>', '<?echo $name;?>' )" style="display:flex;width:97%;height:30px;margin:5px; border-radius:5px; background-color: #333;"><? echo "$name";?></button>
               
               
               
               <?}?>
               
                   
                   
                   
                   
                 </div>
               </div>
              
              
               </div>
               
               <div style = "display:flex; height:50px;"></div>
             <script> 
              
              
              
              function trew(){  
                  var topagge = document.getElementById("1");
              } 
              
              //var BlockCount = document.cookie.replace(/(?:(?:^|.*;\s*)BlockCount\s*\=\s*([^;]*).*$)|^.*$/, "$1");
             
             
              var BlockCount = localStorage.getItem('block_count'+noname);    

             
              
             for( var i = 0 ; i < BlockCount; i++){ 
                 
                 document.write('<div class="WriteBlock"> <div class="TextWrite" aria-multiline="true" tabindex="0" contenteditable="true" id="'+i+'"></div><div style="display:flex; flex-direction:column;"><div class="PlusPage" style="background-image:url(\'images/icons/buttons/Minus.png\'); background-size: 16px; width:20px;height:20px;" onclick="MinBlock('+i+')"></div><div id = "RetBlock'+i+'" class="PlusPage"  style="width:20px;height:20px;border-radius:5px;margin-top:5px;background-image:url(\'images/icons/buttons/redo.png\'); background-size: 14px;" onclick="RetAudio('+i+')"></div></div></div>') 
                  
                 } 
                
             for( var i = 0 ; i < BlockCount; i++){
            if (localStorage.getItem('text_in_editor'+i+noname) !== null) { document.getElementById(i).innerHTML = localStorage.getItem('text_in_editor'+i+noname);}
            var txt = localStorage.getItem('text_in_editor'+i+noname );
            if(txt == null) {document.getElementById("RetBlock"+i).style.display = "none"; continue;}
           
            if(  txt.indexOf('<audio loop=\"\" src=\"') != -1 )
            document.getElementById("RetBlock"+i).style.backgroundColor = "#5effa9";
            else
            document.getElementById("RetBlock"+i).style.backgroundColor = "#ff5e5e00";
            
            if( txt.indexOf('<audio src=') == -1 && txt.indexOf('<audio loop=\"\" src=\"') == -1  )
            document.getElementById("RetBlock"+i).style.display = "none";

            }
            
            
           document.addEventListener('keyup', function (e) {
      
            for( var i = 0 ; i < BlockCount; i++){ 
            localStorage.setItem('text_in_editor'+i+noname, document.getElementById(i).innerHTML);
              }

             });
             
                     document.addEventListener('mouseup', function (e) {
      
              for( var i = 0 ; i < BlockCount; i++){ 
              localStorage.setItem('text_in_editor'+i+noname, document.getElementById(i).innerHTML);
              }

             });
          
           
               $('.content').scroll(function(){
                localStorage.setItem("ScrolPosition"+noname, $(this).scrollTop()); 
                });
              window.onload = function(){
              $('.content').scrollTop(localStorage.getItem('ScrolPosition'+noname)); 
              };
             </script>
             
              <?}?>
              
              
              <?  if($_SESSION['PageId'] ==  'BookReadSpace'){   ?>
              
               <?  
                  header('Content-Type: text/html; charset=utf-8'); 
              $link = mysqli_connect("localhost", "articate_gamause", "ArtiCate_2001","articate_gamause");
             
               if (mysqli_connect_errno())
                 {
                 echo "Ошибка подключения: " . mysqli_connect_error();  // СУБД MySQL количество строк в запросе не вернет из-за ошибки подключения
                 }
                    $sql = "SELECT Pages,Text FROM Books_inf WHERE `book_name`= '".$_SESSION['BookNam']."' AND `author`= '".$_SESSION['BookAuthor']."'"; 
               $result = mysqli_query($link, $sql); 

               if ($result == false) { 
               print("Error"); 
               }else{ 
               while ($row = mysqli_fetch_array($result)) { 
                $BlockCount = $row["Pages"];
                $Text = $row["Text"];
               } 
               }
              
                 
               ?>
              
              
              
              <div style="display:flex; height:100%; width:100%; ">
              <div style="display:flex; flex-direction:column; width:100%;   justify-content:center; align-items:center; margin:auto;">
                 <div style="display:flex; justify-content:center;"><button style="margin:10px 10px 0px 10px;background-image:url('images/icons/buttons/arrow-up.png');background-color:transparent; background-size: cover; width:25px;height:25px;" onclick="BackPage()" ></button></div>
                  
                  
                <script>
                var Pages =  <? echo $BlockCount; ?> - 1;
                var nowpage; 
                var noname = '<? echo $_SESSION['BookNam']; ?>'; 
                var author = '<? echo $_SESSION['BookAuthor'] ?>'; 
                if (localStorage.getItem('nowpage'+noname+author) === null){ localStorage.setItem('nowpage'+noname+author, 0 ); } 
                if(localStorage.getItem('nowpage'+noname+author) > Pages){ localStorage.setItem('nowpage'+noname+author, Pages);}
                nowpage = localStorage.getItem('nowpage'+noname+author);
                 
                </script>
              <script>
                
                
                
                 document.write('<div class="WriteBlock"> <div class="TextWrite" aria-multiline="true" tabindex="0" contenteditable="false" id="' + nowpage + '"></div></div>');
                
                 
               
               
               
               if (Pages === -1) {
                   Pages = 0;
                   var NoneText = 'Эта книга пуста'; 
                    document.getElementById(nowpage).innerHTML = NoneText;
               }else{
               var NoneText = '<? echo $Text; ?>';
          
               var TextRet = 'style="padding-top:15px;"><audio src=';
               var TextRet2 = 'style="padding-top:15px;"><audio loop="" src=';
               NoneText = NoneText.replace(new RegExp(TextRet,'g'), 'style="display:none;"><audio autoplay src=');
               NoneText = NoneText.replace(new RegExp(TextRet2,'g'), 'style="display:none;"><audio loop="" autoplay src=');
               var Space = '$1#5@(3#4)(&^@)$#g^U$$';
                var arrayOfStrings;
                 splitString(NoneText, Space);
               
               function splitString(stringToSplit, separator) {
                    arrayOfStrings = stringToSplit.split(separator);
                  }
                 
                 document.getElementById(nowpage).innerHTML = arrayOfStrings[nowpage];
               
               }
                function NextPage(){ var r = localStorage.getItem('nowpage'+noname+author); r++; if (r > Pages){r = 0;} localStorage.setItem('nowpage'+noname+author, r ); location.reload();}
                function BackPage(){ var r = localStorage.getItem('nowpage'+noname+author); r--; if (r < 0){r = Pages;} localStorage.setItem('nowpage'+noname+author, r ); location.reload();}
                
                 
                
                 </script>
                    <div style="display:flex; justify-content:center;"><button style="margin:0px 10px 10px 10px;background-image:url('images/icons/buttons/arrow.png');background-color:transparent; background-size: cover; width:25px;height:25px;" onclick="NextPage()" ></button></div>
                    <div style="position:fixed; right:7%; bottom:50%;"><script>  document.write(nowpage+'/'+Pages); </script></div>
              </div>
            </div>
             
              <?}?>


            </div>
          </div>



          </main>
<script>   




             var mary;
                 // document.addEventListener('DOMContentLoaded', function() {
                 // $('#double').scrollTop(100); 
                 // });  
                  function sizePic(p) {
                  var twb = $(".TextWrite").width();
                  size = document.getElementById("size").value;
                  p.width = (size*twb)/100;
                  }
               
         // function sizeP(el){
        //  mary = el;
          //return mary;
         // }

function escape_text(text) { 
	var map = {'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'};
	return text.replace(/[&<>"']/g, function(m) {
		return map[m];
	});
}
 
$('body').on('paste', 'div[contenteditable="true"]', function(e){
	e.preventDefault();
	var text = (e.originalEvent || e).clipboardData.getData('text/plain');
	document.execCommand('insertHtml', false, escape_text(text));
});


function RetAudio(t){
     var AudioRet = document.getElementById(t).innerHTML;
     AudioRet = AudioRet.replace(new RegExp('<audio loop="" src=','g'), '<audio pow src=');
    AudioRet = AudioRet.replace(new RegExp('<audio src=','g'), '<audio pow loop="" src=');
     AudioRet = AudioRet.replace(new RegExp('<audio pow ','g'), '<audio ');
     document.getElementById(t).innerHTML = AudioRet;
      if( document.getElementById("RetBlock"+t).style.backgroundColor == "rgba(255, 94, 94, 0)" )
            document.getElementById("RetBlock"+t).style.backgroundColor = "#5effa9";
            else
            document.getElementById("RetBlock"+t).style.backgroundColor = "#ff5e5e00";
     
}



/* function RedactOpen(a){
$.ajax({
    method: "POST",
    url: "/resize.php",
    data: {"word": a},
    async:false,
});
    
}*/

 function TreadImage(b){
    //  document.execCommand( 'InsertImage', false, b ); 
       document.execCommand( 'InsertHTML', false, '<img class="PastePhoto" src = "'+b+'" />' );
             for( var i = 0 ; i < BlockCount; i++){ 
            localStorage.setItem('text_in_editor'+i+noname, document.getElementById(i).innerHTML);}
       location.reload();
 }
 function TreadAudio(g,q){
      var yfn = document.activeElement.innerHTML;
      if(yfn.indexOf('<audio src=')  == -1 &&  yfn.indexOf('<audio loop="" src=') == -1){
      document.execCommand( 'InsertHTML', false, '<div></br></div><div contenteditable="true" style="padding-top:15px;"><audio src="' + g +'"></audio><h contenteditable="false" style="margin-left:10px;background-color:#444;padding:8px 20px 8px 20px;border-radius:8px;">' + q + '</h></div> ' ); 
       for( var i = 0 ; i < BlockCount; i++){ 
            localStorage.setItem('text_in_editor'+i+noname, document.getElementById(i).innerHTML);}
      location.reload();
      }
      else
      alert('Данный блок уже имеет аудио')
 }
 
 function SaveTextBD(){
      var AllText = null;
     
      for( var i = 0; i < BlockCount; i++){
            if (localStorage.getItem('text_in_editor'+i+noname) !== null) { 
                var Text = localStorage.getItem('text_in_editor'+i+noname);
                Text = Text + "$1#5@(3#4)(&^@)$#g^U$$";
                if(AllText === null){
                AllText = Text;
                }else{
                AllText = AllText + Text;}
               
            }
            }
               
               $.ajax({
               method: "GET",
               url: "/SaveText.php",
               data: {"SaveText": AllText, "BlockCou": BlockCount, "Noname": noname},
               async:false,
               }); 
               
            
 }
 
</script>

      

</body>
 <script>
         require('./render.js');
       </script>
</html>








    
    

































