<?php
    // Renvoie tous les répertoires dans un dossier
    function allDirectories($path)
    {
        $dirs = glob($path, GLOB_ONLYDIR);
        return json_encode($dirs);
    }
?>