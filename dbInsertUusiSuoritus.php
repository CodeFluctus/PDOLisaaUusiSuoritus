<?php

    $host = 'localhost';
    $dbname = 't7aaju00';
    $username = 't7aaju00';
    $password = 'salasana';

    $con = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno())
    {
        echo "Failed to connect MySQL! Error: " . myslqi_connect_error(); 
    }

    $etunimi = mysqli_real_escape_string($con, filter_input(INPUT_POST,'etun',FILTER_SANITIZE_STRING));
    $sukunimi = mysqli_real_escape_string($con, filter_input(INPUT_POST,'sukun',FILTER_SANITIZE_STRING));
    $opintojaksonKoodi = mysqli_real_escape_string($con,filter_input(INPUT_POST,'oj',FILTER_SANITIZE_STRING));
    $arvosana = mysqli_real_escape_string($con, filter_input(INPUT_POST,'as',FILTER_SANITIZE_STRING));

    $sql = "CALL UusiSuoritus('$etunimi', '$sukunimi', '$opintojaksonKoodi', $arvosana)";

    if (!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
        
    echo "Merkintä tietokantaan suoritettu onnistuneesti!";
    echo "<br>";
    echo "Palaa selaimen edellinen-painikkeella takaisin!";

    mysqli_close($con);

?>