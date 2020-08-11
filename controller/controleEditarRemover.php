<?php 
    require_once "../model/daoReceitas.php";
    require_once "../model/pojoReceitas.php";

    $id = $__GET["id"];
    $classificacao = $__GET["classificacao"];
    $nome = $__GET["nome"];
    $ingredientes = $__GET["ingredientes"];
    $preparo = $__GET["preparo"];

    if ($_GET['action'] == 'editar') {
        $pojo = new PojoReceitas;

        $pojo -> setClassificacao($classificacao);
        $pojo -> setNome($nome);
        $pojo -> setIngredientes($ingredientes);
        $pojo -> setPreparo($preparo);

        $dao = DaoReceitas::getInstance();

        $dao -> editar($pojo);
    } 
    elseif ($__GET['action' == 'remover']) {
        $dao = DaoReceitas::getInstance();

        $dao -> deletar($id);
    }
    else {
        // action inválido.
    }
?>