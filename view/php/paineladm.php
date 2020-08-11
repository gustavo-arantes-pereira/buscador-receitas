<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrador</title>
    <link rel="stylesheet" href="../estilos/estilopainel.css">
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
                <section class="opcoes-alteracoes-bd botao-buscar">
                    <p>Buscar</p>
                </section>
            </section>
            <section class="bloco-adicionar">
                <form method="GET" action="../../controller/controleAdd.php">
                    <table class="table-form tabela-adicionar">
                        <tr>
                            <td class="config-texto-table"><label for="classAdd">Classificação: </label></td>
                            <td class="config-celula-input"><input type="text" size="20" name="classAdd" placeholder="Ex.: Bolo, pudim, ..." autofocus required></td>
                        </tr>
                        <tr>
                            <td class="config-texto-table"><label for="nomeAdd">Nome: </label></td>
                            <td class="config-celula-input"><input id="input-nome" type="text" name="nomeAdd" required></td>
                        </tr>
                        <tr>
                            <td class="config-texto-table"><label for="ingAdd">Ingredientes: </label></td>
                            <td class="config-celula-input"><input id="input-ing" type="text" name="ingAdd" placeholder="Separar com ;" required></td>                                
                        </tr>
                        <tr>
                            <td class="config-texto-table"><label for="preparoAdd">Modo de preparo: </label></td>
                            <td class="config-celula-input"><textarea id="text-pre" name="preparoAdd" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button id="botao-adicionar"><span>Adicionar</span></button></td>
                        </tr>
                    </table>
                </form>                
            </section>
            <section class="bloco-buscar">
                <form method="GET" action="">
                    <table class="table-form table-buscar">
                        <tr>
                            <td class="config-texto-table"><label for="nome-busca">Nome: </label></td>
                            <td class="config-input-buscar"><input id="input-busca" type="text" name="nome-busca" placeholder="Buscar" required></td>
                            <td><button id="botao-buscar"><span>Buscar</span></button></td>                            
                        </tr>
                        <tr>
                            <td colspan="3">
                                <section id="mostra-result-busca">
                                    <table class="table-result-busca">
                                        <caption>x resultados encontrados</caption>
                                        <tr>
                                            <th>ID</th>
                                            <th>Classificação</th>
                                            <th>Nome</th>
                                            <th>Ingredientes</th>
                                        </tr>
                                    </table>
                                </section>
                            </td>
                        </tr>
                    </table>
                </form>
                <section class="bloco-manutencao">
                    <form method="GET" action="controleEditarRemover">
                        <input type="text" name="id" hidden>
                        <table class="table-form">
                            <tr>
                                <td class="config-texto-table"><label for="classificacao">Classificação: </label></td>
                                <td class="config-celula-input"><input type="text" size="20" name="classificacao" placeholder="Ex.: Bolo, pudim, ..." autofocus required></td>
                            </tr>
                            <tr>
                                <td class="config-texto-table"><label for="nome">Nome: </label></td>
                                <td class="config-celula-input"><input id="input-nome" type="text" name="nome" required></td>
                            </tr>
                            <tr>
                                <td class="config-texto-table"><label for="ingredientes">Ingredientes: </label></td>
                                <td class="config-celula-input"><input id="input-ing" type="text" name="ingredientes" placeholder="Separar com ;" required></td>                                
                            </tr>
                            <tr>
                                <td class="config-texto-table"><label for="preparo">Modo de preparo: </label></td>
                                <td class="config-celula-input"><textarea id="text-pre" name="preparo" rows="4"></textarea></td>
                            </tr>
                            <tr>
                                <td class="botoes" colspan="2">
                                    <button type="submit" formaction="editar" class="botao-editar"><span> Editar</span></button>
                                    <button type="submit" formaction="remover" class="botao-remover"><span> Remover</span></button>
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