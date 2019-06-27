<?php
require '.\lib\phplot-6.2.0\phplot.php'; //dodawanie biblioteki

function dlogosc($a){
    if($a<=20){
        return 1;
    }
    if($a>20 && $a<=40){
        return 5;
    }
    if($a>40 && $a<=80){
        return 7;
    }
    if($a>80 && $a<=100){
        return 10;
    }
    if($a>100 && $a<=170){
        return 15;
    }
    if($a>170 && $a<=250){
        return 20;
    }
    if($a>250 && $a<=300){
        return 30;
    }
    if($a>300 && $a<=1000){
        return 70;
    }
    if($a>1000 && $a<=2000){
        return 100;
    }
    if($a>2000){
        return 200;
    }
}

$db = mysqli_connect("localhost", "root", "", "iotstart")
or die("nie podłączono z bazą"); //połączenie z bazą danych

$plot = new PHPlot(700,450); //tworzenie głównego obiektu biblioteki

$req = "select 
            W.nazwa as nazwa, 
            W.opis as opis, 
            W.jednostka as jednostka, 
            concat(hour(LW.czas),':', minute(LW.czas))AS godzina, 
            concat(day(LW.czas),'-',month(LW.czas),'-',year(LW.czas))as dzien, LW.wartosc as wartosc
        FROM log_wartosci AS LW LEFT JOIN wartosci AS W ON (LW.id_wartosci = W.id)
        where LW.id_wartosci=".$_COOKIE["idwp"]."
         AND day(LW.czas)>=".$_COOKIE["dzienod"]."
         AND day(LW.czas)<=".$_COOKIE["dziendo"]."
         AND month(LW.czas)>=".$_COOKIE["miesiacod"]."
         AND month(LW.czas)<=".$_COOKIE["miesiacdo"]."
         AND year(LW.czas)>=".$_COOKIE["rokod"]."
         AND year(LW.czas)<=".$_COOKIE["rokdo"]."
        GROUP BY concat(hour(LW.czas),':', minute(LW.czas))
        ORDER BY LW.czas ASC"; //zapytanie

$table = array(); //tablica z danymi do tabeli

$res = $db->query($req) 
or die ("błąd zapytania"); //wywołanie zapytania


if($res->num_rows > 0){
    $ilosc = $res->num_rows;
    $ilosc = dlogosc($ilosc);

    for($i=0;$row = $res->fetch_assoc();$i++){
        if($i%$ilosc==0)
            $table[$i] = array($row['godzina'],$row['wartosc']);
       else
            $table[$i] = array(' ',$row['wartosc']);

        
        $tytul = $row['dzien'];
        $nazwa = $row['nazwa'];
        $opis = $row['opis'];
        $jednostka = $row['jednostka'];
    }
}
$plot->SetFont('generic','4');
$plot->SetFont('title','5');
$plot->SetFont('x_label','4');
$plot->SetFont('y_label','4');
$plot->SetFont('x_title','4');
$plot->SetFont('y_title','4');
$plot->SetBackgroundColor("#333333");
$plot->SetTextColor("#FFFFFF");
$plot->SetTitleColor("#FFFFFF");
$plot->SetTitle('Godziny '.$_COOKIE["dzienod"].'/'.$_COOKIE["miesiacod"].'/'.$_COOKIE["rokod"].'-'.$_COOKIE["dziendo"].'/'.$_COOKIE["miesiacdo"].'/'.$_COOKIE["rokdo"]);
$plot->SetTickLength("10");
$plot->SetYTitle('wynik ('.$jednostka.')');
$plot->SetXTitle('Czas');
$plot->SetPlotType('bars');
$plot->SetDataValues($table);
$plot->SetDataType('text-data');
$plot->DrawGraph();
$db->close();
?>