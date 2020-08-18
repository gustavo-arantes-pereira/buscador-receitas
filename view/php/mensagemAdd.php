<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem do sitema</title>
    <link rel="stylesheet" href="../estilos/estiloMensagens.css">
</head>
<body>
    <div id="operacao">
        <?php
            require_once "../../controller/controleAlteracoes.php";

            $classificacao = $_GET["classAdd"];
            $nome = $_GET["nomeAdd"];
            $ingredientes = $_GET["ingAdd"];
            $preparo = $_GET["preparoAdd"];

            $resultado = addReceita($classificacao, $nome, $ingredientes, $preparo);
        ?>
    </div>
    <main>
        <div id="conteudo-mensagem">
            <?php
                if ($resultado == '1')
                    print "<div id='titulo-mensagem'>
                        Sucesso !
                    </div>
                    <div id='mensagem'>
                        Sua receita foi adicionada.
                    </div>";
                else
                    print "<div id='titulo-mensagem'>
                        Ops !
                    </div>
                    <div id='mensagem'>
                        Houve um erro ao adicionar sua receita.</br>
                        </br>
                        <b>Erro:</b> " . $resultado . "
                    </div>";
            ?>           
        </div>
        <a href="paineladm.php">Voltar ao painel</a>
    </main>
</body>
</html>