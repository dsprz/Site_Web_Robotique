<?php
    //Echo la page html de cours
    function getCoursePage()
    {
        $course = $_POST["course"];
        $annee = $_POST["annee"];
        $page = glob("../$annee/Matieres/$course/page/*");
        return json_encode($page);
    }

    echo getCoursePage();
?>