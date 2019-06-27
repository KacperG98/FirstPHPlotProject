<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Kacper Gmurczyk">
        <title>Uniline Quantum 3 - PD-8000</title>
        <link rel="stylesheet" type="text/css" href="wyglad.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div class="jumbotron row">
                <div class="col">
                    <img src="logo.png" id="logo">
                </div>
                <h1 class="col-9" id="tytul">PD-8000</h1>
                <div class="col"></div>
        </div>
        <div class="container text-light">
            <div class="row">
                <div class="col">
                    <div id="opiswykresu">
                        <h3 class="h3">Opis</h3>
                        <?php
                            $db = mysqli_connect("localhost", "root", "", "iotstart")
                            or die("nie podłączono z bazą");

                            $zapytanie = "select W.nazwa, W.opis
                            FROM log_wartosci AS LW LEFT JOIN wartosci AS W ON (LW.id_wartosci = W.id)
                            where id_wartosci=".$_COOKIE['idwp'];
                            
                            $res = $db->query('SET NAMES utf8');

                            $res = $db->query($zapytanie) 
                            or die ("nie działa XD");

                            if ($res->num_rows > 0) {
                                while($row = $res->fetch_assoc()) {
                                    echo $row['nazwa'].'<br>'.$row['opis'];
                                    break;
                                }
                            }
                            $db -> close();
                            ?>
                    </div>
                    <a href="index.php"><button class="btn btn-info">Powrót do strony danych</button></a>
                </div>
                <div id="info" class="bg-dark col">
                    <?php
                    switch($_COOKIE['typ']){
                    case 'godzinny':
                        echo '<img src="godzinap.php" alt="Brak Danych" id="zdj">';
                    break;
                    case 'dniowy':
                        echo '<img src="miesiacp.php" alt="Brak Danych" id="zdj">';
                    break;
                    case 'miesieczny':
                        echo '<img src="rokp.php" alt="Brak Danych" id="zdj">';
                    break;
                    }
                    ?>
                </div>
            </div>
            <?php unset($_COOKIE['dzienod'], $_COOKIE['miesiacod'], $_COOKIE['rokod'], $_COOKIE['dziendo'], $_COOKIE['miesiacdo'], $_COOKIE['rokdo'], $_COOKIE['idwp'], $_COOKIE['typ']); ?>
        </div>
    </body>
</html>