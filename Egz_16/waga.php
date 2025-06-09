<?php
    $conn = mysqli_connect("localhost", "root", "", "egzamin");
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Twój wskaźnmik BMI</title>
        <link rel="stylesheet" href="styl4.css">
    </head>
    <body>
        <div id="baner">
            <h2>Oblicz wskaźnik BMI</h2>
        </div>
        <div id="logo">
            <img src="wzor.png" alt="Liczymy BMI">
        </div>
        <div id="lewy">
            <img src="rys1.png" alt="zrzuć kalorie!">
        </div>
        <div id="prawy">
            <h1>Podaj dane</h1>
            <form action="waga.php" method="post">
                <label for="waga">Waga:</label> <input type="number" name="waga" id="waga"><br>
                <label for="wzrost">Wzrost [cm]:</label> <input type="number" name="wzrost" id="wzrost"><br>
                <button type="submit">Licz BMI i zapisz wynik</button>
            </form>
            <?php
                if(!empty($_POST["waga"]) && !empty($_POST["wzrost"])) {
                    $waga = $_POST["waga"];
                    $wzrost = $_POST["wzrost"];

                    echo "Twoja waga: $waga; Twój wzrost: $wzrost<br>";
                    $bmi = 10000 * ($waga / ($wzrost * $wzrost));
                    echo "Bmi wynosi: $bmi";

                    if ($bmi < 18) {
                        $bmi_id = 1;
                    }
                    elseif ($bmi >= 19 && $bmi <= 25) {
                        $bmi_id = 2;
                    }
                    elseif ($bmi >= 26 && $bmi <= 30) {
                        $bmi_id = 3;
                    }
                    elseif ($bmi > 30) {
                        $bmi_id = 4;
                    }

                    $data_pomiaru = date("Y-m-d");

                    $sql = "INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ($bmi_id, '$data_pomiaru', $bmi);";
                    $result = $conn->query($sql);
                }
            ?>
        </div>
        <main>
            <table>
                <tr>
                    <th>lp.</th>
                    <th>Interpretacja</th>
                    <th>zaczyna się od...</th>
                </tr>
                <?php
                    $sql = "SELECT id, informacja, wart_min FROM bmi;";
                    $result = $conn->query($sql);

                    while($row = $result -> fetch_array()) {
                        echo "<tr>";
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </main>
        <footer>
            Autor: aleksy <a href="kw2.jpg">Wynik działania kwerendy 2</a>
        </footer>
    </body>
</html>
<?php
    $conn -> close();
?>