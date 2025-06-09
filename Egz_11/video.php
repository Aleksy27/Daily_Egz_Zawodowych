<?php
    $conn = new mysqli("localhost","root","","dane3");

    if(!empty($_POST["film"])) {
        $film = $_POST["film"];
        $sql = "DELETE FROM produkty WHERE id = $film;";
        $result = $conn->query($sql);
    }
    
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Video On Demand</title>
        <link rel="stylesheet" href="styl3.css">
    </head>
    <body>
        <div id="baner1">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </div>
        <div id="baner2">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
        <div id="polecamy">
            <h3>Polecamy</h3>
            <?php
                $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18, 22, 23, 25);";
                $result = $conn->query($sql);

                while($row = $result -> fetch_array()) {
                    echo "<div class='film'>";
                        echo "<h4>$row[0]. $row[1]</h4>";
                        echo "<img src='$row[3]' alt='film'>";
                        echo "<p>$row[2]</p>";
                    echo "</div>";
                }
                
            ?>
        </div>
        <div id="filmy">
            <h3>Filmy fantastyczne</h3>
            <?php
                $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;";
                $result = $conn->query($sql);

                while($row = $result -> fetch_array()) {
                    echo "<div class='film'>";
                        echo "<h4>$row[0]. $row[1]</h4>";
                        echo "<img src='$row[3]' alt='film'>";
                        echo "<p>$row[2]</p>";
                    echo "</div>";
                }
            ?>
        </div>
        <footer>
            <form action="video.php" method="post">
                <label for="film">Usuń film nr.:</label> <input type="number" name="film" id="film"> <button type="submit">Usuń film</button>
            </form>
            Stronę wykonał: 00000000000
        </footer>
    </body>
</html>
<?php
    $conn -> close();
?>