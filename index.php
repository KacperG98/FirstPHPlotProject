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
<!--////////////////////////////////////////////    NAGŁÓWEK    ///////////////////////////////////////////////////////////////-->
        <div class="jumbotron row">
                <div class="col">
                    <img src="logo.png" id="logo">
                </div>
                <h1 class="col-9" id="tytul">PD-8000</h1>
                <div class="col"></div>
        </div>
        <div class="container">
        <div class="container bg-secondary text-light row" id="kontener">
<!--////////////////////////////////////////////    FORMULARZ 1    ///////////////////////////////////////////////////////////////-->
             <div id="formularz" class="col">
                 <h1 class="h1 text-light">Szukaj po dacie</h1>
                    <form class="form-control bg-dark text-light" method="GET" action="querys.php">
                        <div class="form-group">
                            dzień: <br>
                            <input type="text" name="dzien" class="form-control" id="pole"><br>
                            miesiąc: <br>
                            <select name="miesiac" class="form-control" id="pole">
                                <option value="1">styczeń</option>
                                <option value="2">luty</option>
                                <option value="3">marzec</option>
                                <option value="4">kwiecień</option>
                                <option value="5">maj</option>
                                <option value="6">czerwiec</option>
                                <option value="7">lipiec</option>
                                <option value="8">sierpień</option>
                                <option value="9">wrzesień</option>
                                <option value="10">październik</option>
                                <option value="11">listopad</option>
                                <option value="12">grudzień</option>
                            </select><br>
                            rok: <br>
                            <input type="text" name="rok" class="form-control" id="pole">
                        </div>
                        <div class="form-group">
                            Test:
                            <select name="idwartosci" class="form-control" id="pole">
                                <option value="19">Temperatura oleju</option>
                                <option value="20">Licz. uruch. Płyty Dynamicznej</option>
                                <option value="21">Motogodziny</option>
                                <option value="22">Ciśnienie oleju</option>
                                <option value="23">Etap pracy urządzenia</option>
                                <option value="24">Poziom oleju w Kadzi</option>
                                <option value="25">Czujnik wychylenia</option>
                                <option value="26">Temp test</option>
                            </select><br>
                            <input type="submit" value="Polaż wykresy" name="wyslij" class="btn btn-default">
                        </div>
                    </form>
<!--////////////////////////////////////////////    FORMULARZ 2    ///////////////////////////////////////////////////////////////-->
                    <h1 class="h1 text-light">Szukaj po przedziale czasowym</h1>
                    <form class="form-control bg-dark text-light" method="GET" action="querysprzedzial.php">
                        <div class="form-group">
                            <div class="row">
                            <!--//////////////////////// DATA OD /////////////////////////////////-->
                                <div class="col">
                                    <h3 class="h3">Przedział od:</h3>
                                    dzień: <br>
                                    <input type="text" name="dzienod" class="form-control" id="pole"><br>
                                    miesiąc: <br>
                                    <select name="miesiacod" class="form-control" id="pole">
                                        <option value="1">styczeń</option>
                                        <option value="2">luty</option>
                                        <option value="3">marzec</option>
                                        <option value="4">kwiecień</option>
                                        <option value="5">maj</option>
                                        <option value="6">czerwiec</option>
                                        <option value="7">lipiec</option>
                                        <option value="8">sierpień</option>
                                        <option value="9">wrzesień</option>
                                        <option value="10">październik</option>
                                        <option value="11">listopad</option>
                                        <option value="12">grudzień</option>
                                    </select><br>
                                    rok: <br>
                                    <input type="text" name="rokod" class="form-control" id="pole">
                                </div>
                            <!--////////////////////////// DATA DO ///////////////////////////////-->
                                <div class="col">
                                    <h3 class="h3">Przedział do:</h3>
                                    dzień: <br>
                                    <input type="text" name="dziendo" class="form-control" id="pole"><br>
                                    miesiąc: <br>
                                    <select name="miesiacdo" class="form-control" id="pole">
                                        <option value="1">styczeń</option>
                                        <option value="2">luty</option>
                                        <option value="3">marzec</option>
                                        <option value="4">kwiecień</option>
                                        <option value="5">maj</option>
                                        <option value="6">czerwiec</option>
                                        <option value="7">lipiec</option>
                                        <option value="8">sierpień</option>
                                        <option value="9">wrzesień</option>
                                        <option value="10">październik</option>
                                        <option value="11">listopad</option>
                                        <option value="12">grudzień</option>
                                    </select><br>
                                    rok: <br>
                                    <input type="text" name="rokdo" class="form-control" id="pole">
                                </div>
                            <!--/////////////////////////////////////////////////////////////////////-->
                            </div>
                        </div>
                        <hr class="bg-light">
<!--/////////////////////////////////////////////// OPCJE PRZEDZIAŁÓW ///////////////////////////////////////////////////////////////-->
                        <div class="form-group">
                            <div class="row">
                                <!--/////////////////////////////////////////////////////////////////////-->
                                <div class="col">
                                    Test:
                                    <select name="idwartosciprzedzial" class="form-control" id="pole">
                                        <option value="19">Temperatura oleju</option>
                                        <option value="20">Licz. uruch. Płyty Dynamicznej</option>
                                        <option value="21">Motogodziny</option>
                                        <option value="22">Ciśnienie oleju</option>
                                        <option value="23">Etap pracy urządzenia</option>
                                        <option value="24">Poziom oleju w Kadzi</option>
                                        <option value="25">Czujnik wychylenia</option>
                                        <option value="26">Temp test</option>
                                    </select>
                                </div>
                                <!--/////////////////////////////////////////////////////////////////////-->
                                <div class="col">
                                    <h5 class="h5">Typ wykresu</h5>
                                    <input type="radio" name="typ" value="godzinny"> Godzinny <br>
                                    <input type="radio" name="typ" value="dniowy"> Dniowy <br>
                                    <input type="radio" name="typ" value="miesieczny"> Miesięczny <br>
                                </div>
                                <!--/////////////////////////////////////////////////////////////////////-->
                            </div>
                            <br>
                            <input type="submit" value="Polaż wykres" name="wyslijprzedzial" class="btn btn-default">
                        </div>

                    </form>
                </div>
<!--////////////////////////////////////////// WYŚWIETLENIE NAJNOWRZYCH WYNIKÓW ////////////////////////////////////////////////////////-->
             <div id="wyniki" class="col">
                 <h1 class="h1 text-light">Aktualne dane</h1>
             <?php
                $db = mysqli_connect("localhost", "root", "", "iotstart")
                or die("nie podłączono z bazą");

                $zapytanie = "SELECT W.nazwa, W.opis, W.jednostka, max(LW.czas) as czas, LW.wartosc, W.uid
                            FROM log_wartosci AS LW LEFT JOIN wartosci AS W ON (LW.id_wartosci = W.id)
                            GROUP BY W.nazwa
                            ORDER BY max(LW.czas) DESC";
                
                $res = $db->query('SET NAMES utf8');

                $res = $db->query($zapytanie) 
                or die ("nie działa XD");

                if ($res->num_rows > 0) {
                    while($row = $res->fetch_assoc()) {
                        echo '<div class="row bg-dark container" id="info"><div class="col"><h3 class="h3">'. $row["nazwa"].
                        '</h3><p>' . $row["opis"].
                        '</p><footer class="blockquote-footer"> '.$row["czas"].
                        ' </footer></div><div class="col"><div id="jednostka">'.$row["wartosc"].$row["jednostka"].
                        '</div><footer class="blockquote-footer">'.$row["uid"]. '</footer></div></div>';
                    }
                }
                $db -> close();
                ?>
        </div>
        </div>
<!--////////////////////////////////////////// POLITYKA COOKIE I PODPIS AUTORÓW  ////////////////////////////////////////////////////////-->
        <script>
            (function() {
                var container = document.createElement('div'),
                link = document.createElement('a');

                container.setAttribute('id', 'cookieinfo');
                container.setAttribute('class', 'cookie-alert');
                container.innerHTML = "<h6>Ta strona wykorzystuje pliki cookie</h6><p>Używamy informacji zapisanych za pomocą plików cookies w celu zapewnienia maksymalnej wygody w korzystaniu z naszego serwisu. Zapisane dany służą do wypisywania wygresów. Po narysowaniu wykresów ciasteczka są niszczone.<br>Strona autorstwa Kacpra Gmurczyka</p><br><button onclick='akceptuje()' class='btn btn-info' type=button>Rozumiem</button>";

                document.body.appendChild(container);

                return true;
            })();
            function akceptuje(){
                var x =  document.getElementById('cookieinfo');
                x.remove();
            }
        </script>
    </body>
</html>