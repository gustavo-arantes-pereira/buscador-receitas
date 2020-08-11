<?php    
    require_once "../../model/seletoresDB.php";
    
    function fazerPesquisa($pesquisa) {
        $seletor = new Seletores;
    
        $busca = $seletor->selectBusca($pesquisa);

        return $busca;
    }    
?>