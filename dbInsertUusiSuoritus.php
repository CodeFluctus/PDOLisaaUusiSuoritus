<?php

try {
    $yhteys = new PDO("mysql:host=localhost;dbname=t7aaju00", "t7aaju00",
   "salasana");
   } catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
   }
   // virheenkäsittely: virheet aiheuttavat poikkeuksen
   $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // merkistö: käytetään latin1-merkistöä; toinen yleinen vaihtoehto on utf8.
   $yhteys->exec("SET NAMES latin1");
   $kysely = $yhteys->prepare("INSERT INTO Opiskelija
   (Etunimi,Sukunimi,Osoite,Luokkatunnus) VALUES (?, ?, ?, ?)");
   $kysely->execute(array($_POST["etun"], $_POST["sukun"],$_POST["os"],
   $_POST["lt"] ));
   //Yhteyden poistaminen. Ei välttämättä tarvita
   $yhteys = null;
   






    /*$host = 'localhost';
    $dbname = 't7aaju00';
    $username = 't7aaju00';
    $password = 'salasana';

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
    $proseduuri =$yhteys -> prepare("CALL UusiSuoritus($_POST["etun"], $_POST["sukun"], $_POST["oj"], $_POST["as"])";

    //Suoritetaan valmisteltu proserduuri

    $proseduuri -> execute();

    $yhteys = null;

    echo "Merkintä tietokantaan suoritettu onnistuneesti!";
    echo "<br>";
    echo "Palaa selaimen edellinen-painikkeella takaisin!";


    //------------------------------------------

    /*
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

    mysqli_close($con);*/

?>