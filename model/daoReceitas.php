<?php
    require_once "conexao.php";
    require_once "pojoReceitas.php";

    class DaoReceitas {

        public static $instance;

        private function __construct() {

        }

        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new DaoReceitas();
            
            return self::$instance;
        }

        public function inserir(PojoReceitas $receita) {
            try {
                $sql = "INSERT INTO receita (classificacao, nome, ingredientes, preparo) 
                    VALUES (:classificacao, :nome, :ingredientes, :preparo)";

                $p_sql = Conexao::getInstance()->prepare($sql);

                $p_sql->bindValue(":classificacao", $receita->getClassificacao());
                $p_sql->bindValue(":nome", $receita->getNome());
                $p_sql->bindValue(":ingredientes", $receita->getIngredientes());
                $p_sql->bindValue(":preparo", $receita->getPreparo());

                $p_sql->execute();

                $resultado = '1';
                
                return $resultado;
            } catch (Exception $erro) {
                return $erro;
            }
        }

        public function editar($id, PojoReceitas $receita) {
            try {
                $sql = "UPDATE receita set classificacao = :classificacao, nome = :nome, 
                    ingredientes = :ingredientes, preparo = :preparo WHERE id = :id";
                
                $p_sql = Conexao::getInstance()->prepare($sql);

                $p_sql->bindValue(":id", $id);
                $p_sql->bindValue(":classificacao", $receita->getClassificacao());
                $p_sql->bindValue(":nome", $receita->getNome());
                $p_sql->bindValue(":ingredientes", $receita->getIngredientes());
                $p_sql->bindValue(":preparo", $receita->getPreparo());

                $p_sql->execute();

                $resultado = '1';

                return $resultado;
            } catch (Exception $erro) {
                return $erro;
            }           
        }

        public function deletar($id) {
            try {
                $sql = "DELETE FROM receita WHERE id = :id";

                $p_sql = Conexao::getInstance()->prepare($sql);

                $p_sql->bindValue(":id", $id);

                $p_sql->execute();
                
                $resultado = '1';

                return $resultado;
            } catch (\Throwable $erro) {
                print "Ocorreu um erro ao tentar executar esta ação." . $erro;
            }
        }
    } 
?>