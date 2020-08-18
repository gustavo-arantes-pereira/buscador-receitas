<?php
    require_once "../../model/daoReceitas.php";
    require_once "../../model/pojoReceitas.php";

    function addReceita($classificacao, $nome, $ingredientes, $preparo){
        $pojo = new PojoReceitas;

        $pojo->setClassificacao($classificacao);
        $pojo->setNome($nome);
        $pojo->setIngredientes($ingredientes);
        $pojo->setPreparo($preparo);

        $dao = DaoReceitas::getInstance();

        $resultado = $dao->inserir($pojo);

        return $resultado;
    }

    function editarReceita($id, $classificacao, $nome, $ingredientes, $preparo){
        $pojo = new PojoReceitas;

        $pojo -> setClassificacao($classificacao);
        $pojo -> setNome($nome);
        $pojo -> setIngredientes($ingredientes);
        $pojo -> setPreparo($preparo);

        $dao = DaoReceitas::getInstance();

        $resultado = $dao -> editar($id, $pojo);

        return $resultado;
    }

    function removerReceita($id){
        $dao = DaoReceitas::getInstance();

        $resultado = $dao -> deletar($id);

        return $resultado;
    }
?>