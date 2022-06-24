<?php
    $section = ucfirst($_POST["section"]);
    $annee = $_POST["annee"];
    $matiere = $_POST["matiere"];
    $files = glob("../$annee/Matieres/$matiere/uploaded_files/$section/*");
    $pattern = "~\.\.\/~";

    $numberOfParents = 6;
    $parents = str_repeat("../", $numberOfParents);
    
    $i = 0;
    foreach($files as $file){
        $files[$i] = preg_replace($pattern, $parents , $file);
        $i++;
    }
    echo(json_encode($files));
?>