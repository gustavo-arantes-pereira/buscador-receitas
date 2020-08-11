<?php
    require_once "../model/daoReceitas.php";
    require_once "../model/pojoReceitas.php";

    $classificacao = $_GET["classAdd"];
    $nome = $_GET["nomeAdd"];
    $ingredientes = $_GET["ingAdd"];
    $preparo = $_GET["preparoAdd"];

    $pojo = new PojoReceitas;

    $pojo->setClassificacao($classificacao);
    $pojo->setNome($nome);
    $pojo->setIngredientes($ingredientes);
    $pojo->setPreparo($preparo);

    $dao = DaoReceitas::getInstance();

    $dao->inserir($pojo);
?>