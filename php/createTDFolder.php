<?php
    //Crée un dossier depuis un input texte html
    include("createTDPage.php");
    $annee = $_GET["annee"];
    $matiere = $_GET["matiere"];
    $folderName = $_POST["folderName"];
    $pattern = "/\s/";
    $correctFolderName = preg_replace($pattern, "_", $folderName);
    $loweredName = strtolower($correctFolderName);
    $pathToFolder = "../$annee/Matieres/$matiere/uploaded_files/TD/$correctFolderName/";

    if(!file_exists($pathToFolder))
    {
        echo($pathToFolder);
        mkdir($pathToFolder);
    }

    createPage($pathToFolder.$loweredName, $annee);
    mkdir($pathToFolder."images/");
    header("location: ../$annee/Matieres/$matiere/tds.html");
?>
