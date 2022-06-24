<?php
    function createCoursPage($pathToFile, $annee, $matiere)
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
                <script type = 'module' src = '{$repeatedParents}js/qol.js'></script>
                <script type = 'module' src = '{$repeatedParents}js/section.js'></script>
            </head>
            <body>
                <!--<h1>Mathématiques pour la Robotique 3<sup>e</sup> année</h1>-->
                <form action = '{$repeatedParents}php/upload.php?matiere=$matiere&annee=$annee&section=Cours&inputName=cours' method = 'POST' enctype = 'multipart/form-data'>
                    <input type = 'file' name = 'cours[]' accept = 'image/png, image/jpg, image/jpeg' multiple>
                    <input type = 'submit' name = 'submit' value = 'Upload file'>
                </form>
                <nav>
                    <ul>
                        <!--<li><a href = completion><span>completion</span></a></li>-->
                    </ul>
                </nav>
            </body>
        </html>";
        fwrite($fh, $stringData);
        fclose($fh);
    }
?>