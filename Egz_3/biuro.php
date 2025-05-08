<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl9.css">
    <title>Poznaj Europe</title>
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <div class="main">
        <div class="lewy">
            <h2>Promocje</h2>
            <table>
                <tr>
                    <td>Warszawa</td>
                    <td>od 600zł</td>
                <tr>
                <tr>
                    <td>Wenecja</td>
                    <td>od 1200zł</td>
                </tr>
                <tr>
                    <td>Paryż</td>
                    <td>od 1200zł</td>
                </tr>
            </table>
        </div>
        <div class="srodkowy">
            <h2>W tym roku jedziemy do...</h2>
            <?php 
                $conn = mysqli_connect("localhost", "root", "", "podroze");
                $zapytanie1 = "SELECT nazwaPliku, podpis FROM `zdjecia` ORDER BY podpis ASC";
                $wynik1 = mysqli_query($conn, $zapytanie1);
                while($wiersz = mysqli_fetch_row($wynik1)) {
                    echo "<img src=$wiersz[0] alt=$wiersz[1]>";
                }            
            ?>
        </div>
        <div class="prawy">
            <h2>Kontakt</h2>
            <a href="biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 444555666</p>
        </div>
    </div>
    <div class="dolny">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <?php 
                $zapytanie2 = "SELECT cel, dataWyjazdu FROM `wycieczki` WHERE dostepna = 1";
                $wynik2 = mysqli_query($conn, $zapytanie2);
                while($wiersz2 = mysqli_fetch_row($wynik2)) {
                    echo "<li> Dnia $wiersz2[1] pojechaliśmy do $wiersz2[0] </li>";
                }
            ?>
        </ol>
    </div>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>