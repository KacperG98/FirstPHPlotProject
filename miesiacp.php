<?php
require '.\lib\phplot-6.2.0\phplot.php';

function mies($a){
    switch($a){
        case 1:
            return 'styczen';
        break;
        case 2:
            return 'luty';
        break;
        case 3:
            return 'marzec';
        break;
        case 4:
            return 'kwiecien';
        break;
        case 5:
            return 'maj';
        break;
        case 6:
            return 'czerwiec';
        break;
        case 7:
            return 'lipiec';
        break;
        case 8:
            return 'sierpien';
        break;
        case 9:
            return 'wrzesien';
        break;
        case 10:
            return 'pazdziernik';
        break;
        case 11:
            return 'listopad';
        break;
        case 12:
            return 'grudzien';
        break;
    }
}

$db = mysqli_connect("localhost", "root", "", "iotstart")
or die("nie podłączono z bazą");

$plot = new PHPlot(700,450);

$req = "select 
            day(czas)AS dzien, 
            max(wartosc)AS max_uzyc,
            min(wartosc)AS min_uzyc, 
            month(czas)AS miesiac, 
            W.nazwa
        FROM log_wartosci AS LW LEFT JOIN 
            wartosci AS W ON (LW.id_wartosci = W.id)
        where id_wartosci=".$_COOKIE['idwp'].
        " AND month(LW.czas)>=".$_COOKIE['miesiacod'].
        " AND month(LW.czas)<=".$_COOKIE['miesiacdo'].
        " AND year(LW.czas)>=".$_COOKIE['rokod'].
        " AND year(LW.czas)>=".$_COOKIE['rokdo']."
        GROUP BY day(czas)
        ORDER BY czas ASC";

$table_dm = array() {31, 29, 31};
$table = array(); 
for($i=0;$i < $table_dm[$mies];$i++) {
    $table[$i] = array();
}
$tytul;
$res = $db->query($req) 
or die ("błąd zapytania"); 
$nazwa;

if($res->num_rows > 0){

    for($i=0;$row = $res->fetch_assoc();$i++){
        $tytul = $row['miesiac'];
        if($row['dzien']<10){
            $table[$i] = array($row['dzien'].'.'.$row['miesiac'], $row['min_uzyc'], $row['max_uzyc']);
        }else{
            $table[$i] = array($row['dzien'], $row['min_uzyc'], $row['max_uzyc']);
        }
        $nazwa = $row['nazwa'];
    }
}
$tytul = mies($tytul);
$plot->SetHorizTickIncrement("20");
$plot->SetLineSpacing("10");
$plot->SetFont('generic','4');
$plot->SetFont('title','5');
$plot->SetFont('x_label','3');
$plot->SetFont('y_label','4');
$plot->SetFont('x_title','4');
$plot->SetFont('y_title','4');
$plot->SetBackgroundColor("#333333");
$plot->SetTextColor("#FFFFFF");
$plot->SetTitleColor("#FFFFFF");
$plot->SetTitle('Dni '.$_COOKIE["dzienod"].'/'.$_COOKIE["miesiacod"].'/'.$_COOKIE["rokod"].'-'.$_COOKIE["dziendo"].'/'.$_COOKIE["miesiacdo"].'/'.$_COOKIE["rokdo"]);
$plot->SetTickLength("10");
$plot->SetYTitle('min i max uzyc');
$plot->SetXTitle('dzien');
$plot->SetPlotType('bars');
$plot->SetDataValues($table);
$plot->SetDataType('text-data');
$plot->DrawGraph();
$db->close();
?>