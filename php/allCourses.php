<?php
    //Echo tous les dossiers dans le répertoire 'Matieres'
    include("allDirectories.php");
    $annee = $_POST["annee"];
    $path = "../$annee/Matieres/*";
    echo(allDirectories($path));
?>