<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mieszalnia farb</title>
        <link rel="shortcut icon" href="fav.png" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <img src="" alt="Mieszalnia farb">
        </header>
        <form action="index.php" method="post">
            <label for="dataod">Data odbioru od: </label>
            <input type="date" name="dataod" id="dataod">
            <label for="datado">Data odbioru do: </label>
            <input type="date" name="datado" id="datado">
            <button type="submit" name="wyszukaj" id="wyszukaj">Wyszukaj</button>
        </form>
        <main>
            <table>
                <tr>
                    <th>Nr zamówienia</th>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>Kolor</th>
                    <th>Pojemność [ml]</th>
                    <th>Data odbioru</th>
                </tr>
                <?php
                    $conn = new mysqli(hostname: "localhost",username: "root",password: "",database: "mieszalnia");

                    if(isset($_POST['wyszukaj'])) {
                        $dataod = $_POST['dataod'];
                        $datado = $_POST['datado'];
                        $sql = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = id_klienta WHERE data_odbioru >= '$dataod' AND data_odbioru <= '$datado' ORDER BY data_odbioru;";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nazwisko"] . "</td>";
                            echo "<td>" . $row["imie"] . "</td>";
                            echo "<td style='background-color: #".$row["kod_koloru"].";'>" . $row["kod_koloru"] . "</td>";
                            echo "<td>" . $row["pojemnosc"] . "</td>";
                            echo "<td>" . $row["data_odbioru"] . "</td>";
                            echo "</tr>";
                        }
                    }
                    else {
                        $sql = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = id_klienta ORDER BY data_odbioru;";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nazwisko"] . "</td>";
                            echo "<td>" . $row["imie"] . "</td>";
                            echo "<td style='background-color: #".$row["kod_koloru"].";'>" . $row["kod_koloru"] . "</td>";
                            echo "<td>" . $row["pojemnosc"] . "</td>";
                            echo "<td>" . $row["data_odbioru"] . "</td>";
                            echo "</tr>";
                        }
                    }

                    $conn -> close();
                    ?>
            </table>
        </main>
        <footer>
            <h3>Egzamin INF.03</h3>
            <p>Autor: 00000000000</p>
        </footer>
    </body>
</html>