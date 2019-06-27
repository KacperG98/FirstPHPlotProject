<?php
require '.\lib\phplot-6.2.0\phplot.php';
require 'querys.php';

$db = mysqli_connect("localhost", "root", "", "iotstart")
or die("nie podłączono z bazą");

$plot = new PHPlot(700,450);

$req = "select month(czas)AS miesiac, 
            max(wartosc)AS max_uzyc,
            min(wartosc)AS min_uzyc, 
            YEAR(czas)AS rok, W.nazwa
        FROM log_wartosci AS LW LEFT JOIN 
            wartosci AS W ON (LW.id_wartosci = W.id)
        where id_wartosci=".$_COOKIE['idw']." 
            AND year(czas)=".$_COOKIE['rok']."
        GROUP BY month(czas)
        ORDER BY czas ASC";

$table = array(); 
$tytul;
$res = $db->query($req) 
or die ("błąd zapytania"); 
$nazwa;

if($res->num_rows > 0){

    for($i=0;$row = $res->fetch_assoc();$i++){
        $tytul = $row['rok'];
        $table[$i] = array($row['miesiac'], $row['min_uzyc'], $row['max_uzyc']);
        $nazwa = $row['nazwa'];
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
$plot->SetTitle('rok '.$tytul.' '.$nazwa);
$plot->SetTickLength("10");
$plot->SetYTitle('max i min wartosci');
$plot->SetXTitle('miesiac');
$plot->SetPlotType('bars');
$plot->SetDataValues($table);
$plot->SetDataType('text-data');
$plot->DrawGraph();
$db->close();
?>