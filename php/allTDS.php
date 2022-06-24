<?php
    //Echo tous les dossiers dans un répertoire TD
    include("allDirectories.php");
    $annee = $_POST["annee"];
    $matiere = $_POST["matiere"];
    $path = "../$annee/Matieres/$matiere/uploaded_files/TD/*";
    echo(allDirectories($path));
?>