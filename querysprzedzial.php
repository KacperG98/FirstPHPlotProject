<?php
if(isset($_GET['wyslijprzedzial'])){
    setcookie("dzienod", $_GET['dzienod'],time()+3600);
    setcookie("miesiacod", $_GET['miesiacod'],time()+3600);
    setcookie("rokod", $_GET['rokod'],time()+3600);
    setcookie("dziendo", $_GET['dziendo'],time()+3600);
    setcookie("miesiacdo", $_GET['miesiacdo'],time()+3600);
    setcookie("rokdo", $_GET['rokdo'],time()+3600);
    setcookie("idwp",$_GET['idwartosciprzedzial'],time()+3600);
    setcookie("typ",$_GET['typ'],time()+3600);
    header('Location: wykresp.php');
}
?>