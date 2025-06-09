<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>PIEKARNIA</title>
</head>
<body>
    <img src="./wypieki.jpg" alt="Produkty naszej piekarni" class="bacground-image">
    <nav>
        <a href="">KWERENDA1</a>
        <a href="">KWERENDA2</a>
        <a href="">KWERENDA3</a>
        <a href="">KWERENDA4</a>
    </nav>
    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>
    <main>
        <h4>Wybierz rodzaj wypieków.</h4>
        <form action="piekarnia.php" method="get">
            <select name="aaa" id="">
                <?php 
                $conn = mysqli_connect("localhost", "root", "", "piekarnia");

                $zapytanie2 = "SELECT DISTINCT `Rodzaj` FROM `wyroby` ORDER BY `Rodzaj` DESC";
                $wynik2 = mysqli_query($conn, $zapytanie2);
                while($wiersz2 = mysqli_fetch_row($wynik2)) {
                    $rodzaj = htmlspecialchars($wiersz2[0]);
                    echo "<option value=\"{$rodzaj}\">{$rodzaj}</option>";
                }
                ?>
            </select>
            <button type="submit">Wybierz</button>
        </form>
        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cena</th>
            </tr>
            <?php 
            $zmienna = $_GET["aaa"];
            $zapytanie1 = "SELECT Rodzaj, Nazwa, Gramatura, Cena from wyroby WHERE Rodzaj = '{$zmienna}'";
            $wynik1 = mysqli_query($conn, $zapytanie1);
                while($wiersz2 = mysqli_fetch_row($wynik1)) {
                    echo "<tr>";
                        echo "<td>$wiersz2[0]</td>";
                        echo "<td>$wiersz2[1]</td>";
                        echo "<td>$wiersz2[2]</td>";
                        echo "<td>$wiersz2[3]</td>";
                    echo "</tr>";
                }

            mysqli_close($conn);
            ?>
        </table>
    </main>
    <footer>
        <p>AUTOR: 00000000000</p>
        <p>DATA: 05.06.2025</p>
    </footer>
</body>
</html>