<?php
    include("createMatierePage.php");
    include("createCoursPage.php");
    include("createTDPageBis.php");

    $annee = $_GET["annee"];
    $matiere = $_POST["matiereFolderName"];
    $folderToCreate = "../$annee/Matieres/$matiere/";
    if(!file_exists($folderToCreate))
    {
        mkdir($folderToCreate);
        mkdir($folderToCreate."page/");
        mkdir($folderToCreate."uploaded_files/");
        mkdir($folderToCreate."uploaded_files/Cours/");
        mkdir($folderToCreate."uploaded_files/TD/");
        createMatierePage($folderToCreate."page/$matiere", $annee, $matiere);
        createCoursPage($folderToCreate."cours", $annee, $matiere);
        createTDPageBis($folderToCreate."tds", $annee, $matiere);
        
        if($annee == "3A"){
            header("location: ../$annee/3e_annee.html");
        }

        if($annee == "4A"){
            header("location: ../$annee/4e_annee.html");
        }

        if($annee == "5A"){
            header("location: ../$annee/5e_annee.html");
        }     
    }
?>