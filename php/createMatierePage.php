<?php
    function createMatierePage($pathToFile, $annee, $matiere)
    {
        $myFile = $pathToFile.".html"; // or .php   
        $fh = fopen($myFile, 'w'); // or die('error'); 
        $numberOfParents = 4;
        $repeatedParents = str_repeat("../", $numberOfParents);
        $stringData = "<!DOCTYPE html>
        <html>
            <head>
                <title>$matiere</title>
                <meta charset = 'utf-8'>
                <link rel = 'stylesheet' type = 'text/css' href = '{$repeatedParents}css/style.css'>
                <script src = '{$repeatedParents}js/simpleajax.js'></script>
                <script type = 'module' src = '{$repeatedParents}js/qol.js'></script>
            </head>
            <body>
                <nav>
                    <ul>
                        <li><a href = '../cours.html'><span>Cours</span></a></li>
                        <li><a href = '../tds.html'><span>TD</span></a></li>
                    </ul>
                </nav>
            </body>
        </html>";
        fwrite($fh, $stringData);
        fclose($fh);
    }
?>