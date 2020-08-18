<?php
    require_once "../../model/seletoresDB.php";

    function fazerPesquisa($pesquisa){
        $seletor = new Seletores;

        $busca = $seletor->selectAll($pesquisa);

        return $busca;
    }
?>