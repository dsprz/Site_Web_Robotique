<?php
    //Echo la page html de cours
    function getTD_Page()
    {
        $matiere = $_POST["matiere"];
        $td = $_POST["td"];
        $annee = $_POST["annee"];
        $TD_Page = glob("../$annee/Matieres/$matiere/uploaded_files/TD/$td/*");
        return json_encode($TD_Page);
    }

    echo getTD_Page();
?>