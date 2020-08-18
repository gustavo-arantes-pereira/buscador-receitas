<?php
    require_once "conexao.php";

    class Seletores {
        public function selectBusca($pesquisa) {
            try {
                $sql = "SELECT classificacao, nome, ingredientes, preparo FROM receita WHERE nome like '%$pesquisa%'";

                $p_sql = Conexao::getInstance() -> prepare($sql);

                $p_sql -> execute(array("%$sql%"));

                $resultado = $p_sql -> fetchAll();

                return $resultado;
            } catch (Exception $erro) {
                print "Houve um erro ao selecionar a pesquisa" . $erro;
            }
        }

        public function selectAll($pesquisa) {
            try {
                $sql = "SELECT id, classificacao, nome, ingredientes, preparo FROM receita WHERE nome like '%$pesquisa%'";

                $p_sql = Conexao::getInstance() -> prepare($sql);

                $p_sql -> execute(array("%$sql%"));

                $resultado = $p_sql -> fetchAll();

                return $resultado;
            } catch (Exception $erro) {
                print "Houve um erro ao selecionar a pesquisa" . $erro;
            }
        }
    }
?>