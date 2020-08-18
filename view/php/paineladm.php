<?php
    require_once "../../controller/controleBuscaPainel.php";

    if(isset($_GET["nome-busca"])) {
        $pesquisa = $_GET["nome-busca"];
        $resultado = fazerPesquisa($pesquisa);
        $vazio = 'não'; 
    }
    else 
        $vazio = 'sim';
    
    function contadorArrayPesquisa() { // Varre o array, contando quantas receitas foram encontradas.
        global $resultado;
        $quantidade = 0;

        foreach ($resultado as $row):
            $quantidade++;
        endforeach;

        return $quantidade;
    }
?>

<script>
    function quantidadeReceitas(){
        return <?php 
            if ($vazio == 'não')
                print contadorArrayPesquisa()
        ?>;
    }

    window.onload = function () {
        let vazio = "<?php print $vazio?>";
        if (vazio == 'não')
            abreBuscar();
    }
</script>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrador</title>
    <link rel="stylesheet" href="../estilos/estiloPainel.css">
</head>
<body>
    <header>
        <h1>Bem vindo !</h1>
    </header>
    <main>
        <section class="conteudo">
            <h2>Faça aqui alterações nas receitas</h2>
            <section id="alteracoes-bd">
                <div class="opcoes-alteracoes-bd botao-adicionar">
                    <p>Adicionar</p>                    
                </div>
                <div class="opcoes-alteracoes-bd botao-buscar">
                    <p>Buscar</p>
                </div>
            </section>
            <section class="bloco-adicionar">
                <form method="GET" action="mensagemAdd.php">
                    <table class="table-form tabela-adicionar">
                        <tr>
                            <td class="config-texto-table"><label for="classAdd">Classificação: </label></td>
                            <td class="config-celula-input"><input type="text" size="20" name="classAdd" placeholder="Ex.: Bolo, pudim, ..." autofocus required></td>
                        </tr>
                        <tr>
                            <td class="config-texto-table"><label for="nomeAdd">Nome: </label></td>
                            <td class="config-celula-input"><input class="input-nome" type="text" name="nomeAdd" required></td>
                        </tr>
                        <tr>
                            <td class="config-texto-table"><label for="ingAdd">Ingredientes: </label></td>
                            <td class="config-celula-input"><input class="input-ing" type="text" name="ingAdd" placeholder="Separar com ;" required></td>                                
                        </tr>
                        <tr>
                            <td class="config-texto-table"><label for="preparoAdd">Modo de preparo: </label></td>
                            <td class="config-celula-input"><textarea class="text-pre" name="preparoAdd" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button id="botao-adicionar"><span>Adicionar</span></button></td>
                        </tr>
                    </table>
                </form>                
            </section>
            <section class="bloco-buscar">
                <form method="GET" action="">
                    <div class="conteudo-buscar">
                        <label for="nome-busca">Nome da receita: </label>
                        <input id="input-busca" type="text" name="nome-busca" placeholder="Buscar" value="<?php if ($vazio == 'não') print $pesquisa?>" required>
                        <button id="botao-buscar"><span></span></button>
                    </div>
                    <div class="faixa-horizontal"></div>
                    <div class="lista-resultado">
                        <div class="linha-fixa">
                            <div class="coluna-id">Id</div>
                            <div class="coluna-classificacao">Classificação</div>
                            <div class="coluna-nome">Nome</div>                            
                        </div>
                        <?php
                            global $resultado;
                            $contador = 0;

                            if($vazio == 'não'){
                                foreach ($resultado as $row):
                                    $contador++;
                                    print "<div class='linha linha" . $contador . "'>
                                        <div class='coluna-id'>" . $row['id'] . "</div>
                                        <div class='coluna-classificacao'>" . $row['classificacao'] . "</div>
                                        <div class='coluna-nome'>" . $row['nome'] . "</div>
                                        <div class='coluna-oculta coluna-ingredientes'>" . $row['ingredientes'] . "</div>
                                        <div class='coluna-oculta coluna-preparo'>" . $row['preparo'] . "</div>
                                    </div>";
                                endforeach;
                            }
                        ?>
                    </div>  
                </form>
                <section class="bloco-manutencao">
                    <form method="GET" action="mensagemEditarOuRemover.php">
                        <table class="table-form">
                            <tr>
                                <td class="config-texto-table"><label for="id">ID: </label></td>
                                <td class="config-celula-input">
                                    <input class="input-id" type="text" size="3" name="id" readonly>
                                    <script>
                                        function carregaValorInputId(receita) {
                                            let id = document.querySelector('.linha' + receita + ' .coluna-id').innerText; // Recupera o conteúdo da div clicada.
                                            let thisDiv = document.querySelector('.input-id'); // Recupera a div alvo.

                                            thisDiv.setAttribute('value', id);
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="config-texto-table"><label for="classificacao">Classificação: </label></td>
                                <td class="config-celula-input">
                                    <input class="input-classificacao" type="text" size="20" name="classificacao" placeholder="Ex.: Bolo, pudim, ..." autofocus required>
                                    <script>
                                        function carregaValorInputClassificacao(receita) {
                                            let classificacao = document.querySelector('.linha' + receita + ' .coluna-classificacao').innerText; // Recupera o conteúdo da div clicada.
                                            let thisDiv = document.querySelector('.input-classificacao'); // Recupera a div alvo.

                                            thisDiv.setAttribute('value', classificacao);
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="config-texto-table"><label for="nome">Nome: </label></td>
                                <td class="config-celula-input">
                                    <input class="input-nome" id="input-nome" type="text" name="nome" required>
                                    <script>
                                        function carregaValorInputNome(receita) {
                                            let nome = document.querySelector('.linha' + receita + ' .coluna-nome').innerText; // Recupera o conteúdo da div clicada.
                                            let thisDiv = document.querySelector('#input-nome'); // Recupera a div alvo.

                                            thisDiv.setAttribute('value', nome);
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="config-texto-table"><label for="ingredientes">Ingredientes: </label></td>
                                <td class="config-celula-input">
                                    <input class="input-ing" id="input-ingredientes" type="text" name="ingredientes" placeholder="Separar com ;" required>
                                    <script>
                                        function carregaValorInputIngredientes(receita) {
                                            let ingredientes = document.querySelector('.linha' + receita + ' .coluna-ingredientes').innerText; // Recupera o conteúdo da div clicada.
                                            let thisDiv = document.querySelector('#input-ingredientes'); // Recupera a div alvo.

                                            thisDiv.setAttribute('value', ingredientes);
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="config-texto-table"><label for="preparo">Modo de preparo: </label></td>
                                <td class="config-celula-input">
                                    <textarea class="text-pre" id="text-preparo" name="preparo" rows="4"></textarea>
                                    <script>
                                        function carregaValorTextPreparo(receita) {
                                            let preparo = document.querySelector('.linha' + receita + ' .coluna-preparo').innerText; // Recupera o conteúdo da div clicada.
                                            let thisDiv = document.querySelector('#text-preparo'); // Recupera a div alvo.

                                            thisDiv.innerText = "";
                                            thisDiv.insertAdjacentText('afterbegin', preparo);
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="botoes" colspan="2">
                                    <button type="submit" formaction="mensagemEditar.php" class="botao-editar"><span> Editar</span></button>
                                    <button type="submit" formaction="mensagemRemover.php" class="botao-remover"><span> Remover</span></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </section>
            </section>              
        </section>        
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../scripts/painel.js"></script>
</body>
</html>