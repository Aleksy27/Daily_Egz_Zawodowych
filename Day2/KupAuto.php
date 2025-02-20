<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Komis aut</title>
</head>
<body>
    <header id="baner">
        <h1 class="tytul">KupAuto!</h1>
        <h1> Internetowy Komis Samochodowy</h1>
    </header>
    <main>
        <section class="pierwszy">
            <?php 
                $conn = mysqli_connect('localhost', 'root', '', 'kupauto');
                $zapytanie2 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM `samochody` WHERE `id` = 10";
                $wynik = mysqli_query($conn, $zapytanie2);
                while($wiersz = mysqli_fetch_row($wynik)) {
                    echo "<img src='$wiersz[5]'>";
                    echo "<h4> Oferta Dnia: Toyota $wiersz[0] </h4>";
                    echo "<p> Rocznik: $wiersz[1], przebieg: $wiersz[2], rodzaj paliwa: $wiersz[3] </p>";
                    echo "<h4> Cena: $wiersz[4] </h4>";
                }
            ?>
        </section>
        <section class="drugi">
            <h2>Oferty Wyróżnione</h2>
            <article>
                <?php 
                    $zapytanie3 = "SELECT `model`, `rocznik`, `cena`, `zdjecie`, `nazwa` FROM `samochody` AS s JOIN `marki` AS m ON s.id = m.id WHERE `wyrozniony` = 1";
                    $wynik = mysqli_query($conn, $zapytanie3);
                    $wiersze = mysqli_fetch_all($wynik);
                    foreach($wiersze as $wiersz) {
                        ?>
                        <figure class="info">
                        <?php 
                            echo "<img src='$wiersz[3]' alt='model' >";
                            echo "<h4> $wiersz[4] $wiersz[0] </h4>";
                            echo "<p> Rocznik: $wiersz[1] </p>";
                            echo "<h4> Cena: $wiersz[2] </h4>"; 
                        ?>
                        </figure>
                        <?php
                    }
                ?>
            </article>    
        </section>
        <section class="trzeci">
            <h2>Wybierz Markę</h2>
            <form action="KupAuto.php" method="post">
                <select name="marka">
                    <?php 
                    $zapytanie1 = "SELECT nazwa FROM `marki`";
                    $wynik = mysqli_query($conn, $zapytanie1);
                    while($wiersz = mysqli_fetch_row($wynik)) {
                        echo "<option> $wiersz[0] </option>";
                    }
                    ?>
                </select>
                <button type="submit">Wyszukaj</button>
            </form>
            <?php 
            if(isset($_POST["marka"])) {
                $marka = $_POST["marka"];
                $zapytanie4 = "SELECT `model`, `cena`, `zdjecie` FROM `samochody` AS s JOIN `marki` AS m ON s.id = m.id WHERE `nazwa` = '$marka'";
                $wynik = mysqli_query($conn, $zapytanie4);
                $wiersze = mysqli_fetch_all($wynik);
                foreach($wiersze as $wiersz)
                    ?>
                    <figure class="info">
                    <?php 
                        echo "<img src='$wiersz[2]' alt='model' >";
                        echo "<h4> $marka $wiersz[0] </h4>";
                        echo "<h4> Cena: $wiersz[1] </h4>"; 
                    ?>
                    </figure>
                    <?php
                }
                $close = mysqli_close($conn);
            ?>
        </section>
    </main>
    <footer id="stopka">
        <p>Stronę wykonał: 00000000000</p>
        <p><a href="http://firmy.pl/komis">Znajdziesz nas także</a></p>
    </footer>
</body>
</html>