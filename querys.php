<?php
if(isset($_GET['wyslij'])){
    setcookie("dzien", $_GET['dzien'],time()+3600);
    setcookie("miesiac", $_GET['miesiac'],time()+3600);
    setcookie("rok", $_GET['rok'],time()+3600);
    setcookie("idw",$_GET['idwartosci'],time()+3600);
    header('Location: wykresy.php');
}
?>