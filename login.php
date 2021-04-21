<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
$mail = $_POST['Email'];
$pass = md5($_POST['Password']);
$link = mysqli_connect("localhost", "articate_gamause", "ArtiCate_2001","articate_gamause");

$sql = "SELECT * FROM `Users` WHERE `e-mail` = '$mail' AND `pass` = '$pass'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = [
        "id" => $user['id'],
        "nick" => $user['nick'],
        "mail" => $user['e-mail']
        ];
        
    header("Location: /");
}
else{
    $_SESSION['messege']=("Неверный логин или пароль");
    header("Location: /");
}

//$user = mysqli_fetch_assoc($result);

/*if ($result == false) {
    print("Error");
}else{
    while($row = mysqli_fetch_assoc($result)) {// закончили на 11-ой записи
       header("Location: /");
       exit();
    //$row['Email'];
}
}*/
?>

