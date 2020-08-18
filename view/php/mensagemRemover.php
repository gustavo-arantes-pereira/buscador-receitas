<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem do sistema</title>
    <link rel="stylesheet" href="../estilos/estiloMensagens.css">
</head>
<body>
    <div id="operacao">
        <?php
            require_once "../../controller/controleAlteracoes.php";

            $id = $_GET["id"];

            $resultado = removerReceita($id);
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
                        Sua receita foi removida.
                    </div>";
                else
                    print "<div id='titulo-mensagem'>
                        Ops !
                    </div>
                    <div id='mensagem'>
                        Houve um erro ao remover sua receita.</br>
                        </br>
                        <b>Erro:</b> " . $resultado . "
                    </div>";                
            ?>           
        </div>
        <a href="paineladm.php">Voltar ao painel</a>
    </main>
</body>
</html>