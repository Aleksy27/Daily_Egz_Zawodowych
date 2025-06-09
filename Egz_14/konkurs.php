<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>WOLONTARIAT SZKOLNY</title>
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <aside class="lewy">
        <h3>Konkursowe nagrody</h3>
        <form method="post" action="konkurs.php">
            <button type="submit">Losuj nowe nagrody</button>
        </form>
        <table>
            <tr>
                <th>Nr</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Wartość</th>
            </tr>
            <?php 
            $conn = mysqli_connect("localhost", "root", "", "konkurs");

            $zapytanie1 = "SELECT nazwa, opis, cena 
                           FROM nagrody 
                           ORDER BY RAND() 
                           LIMIT 5";
            $wynik1 = mysqli_query($conn, $zapytanie1);

            $numer = 1;

            while ($wiersz1 = mysqli_fetch_row($wynik1)) {
                echo "<tr>";
                    echo "<td>" . $numer . "</td>";
                    echo "<td>" . htmlspecialchars($wiersz1[0], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($wiersz1[1], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($wiersz1[2], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "</tr>";
                $numer++;
            }

            mysqli_close($conn);
            ?>
        </table>
    </aside>
    <section class="prawy">
        <img src="puchar.png" alt="Puchar dla wolontariusza">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="kwerenda1.png" target="_blank">Kwerenda1</a></li>
            <li><a href="kwerenda2.png" target="_blank">Kwerenda2</a></li>
            <li><a href="kwerenda3.png" target="_blank">Kwerenda3</a></li>
            <li><a href="kwerenda4.png" target="_blank">Kwerenda4</a></li>
        </ul>
    </section>
    <footer>
        <p>Numer zdającego: aleksy</p>
    </footer>
</body>
</html>
