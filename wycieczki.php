<?php
    $con = mysqli_connect("localhost", "root", "", "biuro");

    $sql1 = "SELECT `wycieczki`.`id`, `wycieczki`.`dataWyjazdu`, `wycieczki`.`cel`, `wycieczki`.`cena` FROM `wycieczki` WHERE `wycieczki`.`dostepna` = '1'";
    $query1 = mysqli_query($con, $sql1);

    $sql2 = "SELECT `zdjecia`.`nazwaPliku`, `zdjecia`.`podpis` FROM `zdjecia` ORDER BY `zdjecia`.`podpis` DESC";
    $query2 = mysqli_query($con, $sql2);

    if($con){
        while($row1 = mysqli_fetch_row($query1)){
            $res1 .= "<li>".$row1[0].". dnia ".$row1[1]." jedziemy do ".$row1[2].", cena: ".$row1[3]."</li>";
        }
        while($row2 = mysqli_fetch_row($query2)){
            $res2 .= "<img src='./".$row2[0]."' alt='".$row2[1]."'>";
        }
    }else{
        echo "Coś poszło nie tak";
    }
    mysqli_close($con);
?>

<!DOCTYPE = html>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="./styl4.css"/>
</head>
<body>
    <div class="container">
        <header>
            <h1>BIURO TURYSTYCZNE</h1>
        </header>
        <section class="main">
            <h3>Wycieczki, na które są wolne miejsca</h3>
            <!-- PHP res1 -->
            <ul>
            <?=
            
                $res1

            ?>
            </ul>
        </section>
        <div class="box">
            <section class="left">
                <h2>Bestselery</h2>
                <table>
                    <tr>
                        <td>Wenecja</td>
                        <td>kwiecień</td>
                    </tr>
                    <tr>
                        <td>Londyn</td>
                        <td>lipiec</td>
                    </tr>
                    <tr>
                        <td>Rzym</td>
                        <td>wrzesień</td>
                    </tr>
                </table>
            </section>
            <section class="middle">
                <h2>Nasze zdjęcia</h2>
                <!-- PHP res2 -->
                <?=
            
                    $res2

                ?>
            </section>
            <section class="right">
                <h2>Skontaktuj się</h2>
                <a href="turysta@wycieczki.pl">napisz do nas</a>
                <p>telefon: 111222333</p>
            </section>
        </div>
        <footer>
            <p>Stronę wykonał <i>000</i></p>
        </footer>
    </div>
</body>
</html>