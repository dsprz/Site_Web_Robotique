<?php
    function createTDPageBis($pathToFile, $annee, $matiere)
    {
        $myFile = $pathToFile.'.html'; // or .php   
        $fh = fopen($myFile, 'w'); // or die('error'); 
        $numberOfParents = 3;
        $repeatedParents = str_repeat('../', $numberOfParents);
        $stringData = "<!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset = 'utf-8'>
                <link rel = 'stylesheet' type = 'text/css' href = '{$repeatedParents}css/style.css'>
                <script src = '{$repeatedParents}js/simpleajax.js'></script>
                <script type = 'module' src = '{$repeatedParents}js/displayTDS.js'></script>
            </head>
            <body id = '{$annee}'>
                <h1></h1>
                <form action = '{$repeatedParents}php/createTDFolder.php?annee=$annee&matiere=$matiere' method = 'POST'>
                    <input type = 'text' name = 'folderName'>
                    <input type = 'submit' name = 'submitFolder' value = 'Create Folder'>
                </form>
                <ul>
                </ul>
            </body>
        </html>";
        fwrite($fh, $stringData);
        fclose($fh);
    }