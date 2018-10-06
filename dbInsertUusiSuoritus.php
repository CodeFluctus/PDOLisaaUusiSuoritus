<?php
    try
    {
        $yhteys = new PDO("mysql: host=localhost; dbname=t7aaju00", "t7aaju00", "salasana");
    }
    catch(PDOException $e)
    {
        die("Virhe: " . $e->getMessage());
    }

    //Virheenkäsittely: virheet aiheuttavat poikkeuksen
    $yhteys -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Merkistö: Käytetään latin1-merkistöä.(utf8 on myös yleinen)
    $yhteys ->exec ("SET NAMES latin1");

    //valmistellaan proseduuri
    $proseduuri = $yhteys->prepare("CALL UusiSuoritus(?, ?, ?, ?)");

    //Suoritetaan valmisteltu proserduuri

    $proseduuri -> execute(array($_POST["etun"], $_POST["sukun"],$_POST["oj"],
    $_POST["as"] ));

    $yhteys = null;

    echo "Merkintä tietokantaan suoritettu onnistuneesti!";
    echo "<br>";
    echo "Palaa selaimen edellinen-painikkeella takaisin!";

?>