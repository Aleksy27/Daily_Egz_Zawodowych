<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hodowla Świnek Morskich</title>
</head>
<body>
    <header id="baner">
        <h1>Hodowla świnek morskich</h1>
    </header>
    <aside>
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
        <?php 
            $conn = mysqli_connect("localhost", "root", "", "hodowla");
            $zapytanie1 = "SELECT rasa FROM rasy";
            $wynik = mysqli_query($conn, $zapytanie1);
            while($wiersz = mysqli_fetch_row($wynik)){
                echo "<li>$wiersz[0]</li>";
            }
        ?>
        </ol>
    </aside>
    <nav>
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </nav>
    <article>
        <img src="american.jpg" alt="Świnka morska rasy american">
        <?php 
            $zapytanie2 = "SELECT DISTINCT s.data_ur, s.miot, r.rasa FROM swinki AS s JOIN rasy AS r ON s.rasy_id = r.id WHERE s.rasy_id = 1";
            $wynik2 = mysqli_query($conn, $zapytanie2);
            while($wiersz2 = mysqli_fetch_row($wynik2)){
                echo "<p>Data urodzenia: $wiersz2[0], Oznaczenie miotu: $wiersz2[1]</p>";
            }
        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php 
            $zapytanie3 = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 6";
            $wynik3 = mysqli_query($conn, $zapytanie3);
            while($wiersz3 = mysqli_fetch_row($wynik3)){
                echo "<h3> $wiersz3[0] - $wiersz3[1] zł </h3>";
                echo "<p> $wiersz3[2] </p>";
            }

            $conn = mysqli_close($conn);
        ?>
    </article>
    <footer id="stopka">Stronę wykonał: 00000000000</footer>
</body>
</html>