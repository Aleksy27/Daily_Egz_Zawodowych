<?php
    if(isset($_POST["lowisko"]) && isset($_POST["data"]) && isset($_POST["sedzia"])) {
        $lowisko = $_POST["lowisko"];
        $data = $_POST["data"];
        $sedzia = $_POST["sedzia"];

        $conn = mysqli_connect("localhost","root","","wedkarstwo");

        $zapytanie1 = "INSERT INTO zawody_wedkarskie VALUES (NULL, 2, $lowisko, '$data', '$sedzia');";
        $result = $conn->query($zapytanie1);

        $conn -> close();
    }
?>