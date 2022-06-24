<?php

    $inputName = substr($_GET["inputName"], 0, strlen($_GET["inputName"]) - 2);
    $annee = $_GET["annee"];
    $section = $_GET["section"];
    $matiere = $_GET["matiere"];
    $files = array_filter($_FILES["$inputName"]["name"]);
    $total = count($files);
    $relPath = "../$annee/Matieres/$matiere/uploaded_files/";
    $tokens = explode("/", $section);
    $tokens[count($tokens)  - 1] = $inputName;
    $pathToHeadTo = implode("/", $tokens);
    $pagePath = $relPath.$pathToHeadTo.".html";

    for($i = 0; $i < $total; $i++){
        if(isset($_POST["submit"]))
        {
            $success = false;
            $file = $_FILES["$inputName"]["name"][$i];
            $fileName = $_FILES["$inputName"]["name"][$i];
            $fileTmpName = $_FILES["$inputName"]["tmp_name"][$i];
            $fileSize = $_FILES["$inputName"]["size"][$i];
            $fileError = $_FILES["$inputName"]["error"][$i];
            $fileType = $_FILES["$inputName"]["type"][$i];
    
            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));
    
            $allowedExt = array("png", "pdf", "jpg", "jpeg");
            if(in_array($fileActualExt, $allowedExt))
            {
                if($fileError === 0)
                {
                    $fileNewName = $fileName;
                    //$fileNewName = uniqid('', true).".".$fileActualExt;
                    $fileDestination = $relPath."/$section/$fileNewName";
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $success = true;
                }
                else
                {
                    echo("Erreur pendant l'upload");
                }
            }
            else
            {
                echo("Vous ne pouvez pas upload des fichiers de cette extension : $fileActualExt");
            }
        }

        if($success){
            header("location: $pagePath?uploadsuccess");
        }
        else{
            header("location: $pagePath?uploadfailure");
        }
    }
    

?>