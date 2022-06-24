<?php
    function createPage($pageName, $annee)
    {
        $myFile = $pageName.'.html'; // or .php   
        $fh = fopen($myFile, 'w'); // or die('error'); 
        $numberOfParents = 6;
        $repeatedParents = str_repeat('../', $numberOfParents);
        $tokens = explode("/", $pageName);
        $inputFileName = $tokens[count($tokens) - 1];
        $stringData = "<!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset = 'utf-8'>
                <link rel = 'stylesheet' type = 'text/css' href = '{$repeatedParents}css/style.css'>
                <script src = '{$repeatedParents}js/simpleajax.js'></script>
                <script src = '{$repeatedParents}js/images.js'></script>
            </head>
            <body id = '{$annee}'>
                <div class = 'fixed'>
                    <img id = 'right_arrow' src = '{$repeatedParents}img/fleche_droite.png' title = 'Feuille suivante'>
                    <img id = 'left_arrow' src = '{$repeatedParents}img/fleche_gauche.png' title = 'Feuille précédente'>
                    <img id = 'more_opacity' src = '{$repeatedParents}img/more_opacity.png' title = 'Augmenter la luminosité de la feuille'>
                    <img id = 'less_opacity' src = '{$repeatedParents}img/more_opacity.png' title = 'Diminuer la luminosité de la feuille'>
                    <span id = 'titre'></span>
                </div>
                <form class = 'fileForm' method = 'POST' enctype = 'multipart/form-data'>
                    <input type = 'file' name = '{$inputFileName}[]' accept = 'image/png, image/jpg, image/jpeg' multiple>
                    <input type = 'submit' name = 'submit' value = 'Upload file'>
                </form>
                <div id = 'image_container'>
                    <input type = 'checkbox' id = 'btnControl'/>
                    <label class = 'btn' for = 'btnControl'><img id = 'show'></label>
                </div>
            </body>
        </html>";   
        fwrite($fh, $stringData);
        fclose($fh);

    }