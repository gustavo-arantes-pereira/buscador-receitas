<?php
    require_once "../../controller/controleBusca.php";
    
    $pesquisa = $_GET["pesquisa"];
    $busca = fazerPesquisa($pesquisa);

    function contadorArrayPesquisa() { // Varre o array, contando quantas receitas foram encontradas.
        global $busca;
        $quantidade = 0;

        foreach ($busca as $row):
            $quantidade++;
        endforeach;

        return $quantidade;
    }

    function contadorPaginasSlider() {
        $quantidadeReceitas = contadorArrayPesquisa(); // Recupera a quantidade de receitas pesquisadas
        $resultadoDivisao = intval($quantidadeReceitas / 4); // Divide a quantidade de receitas por 4 (valor máximo de receitas que podem ser exibidas na tela), converto o resultado para um valor inteiro e armazeno na variável $resultadoDivisao.
        $restoOperacao = $quantidadeReceitas % 4; // Divide a quantidade de receitas por 4 e armazena o resto da operação na variável $restoOperacao.

        if($resultadoDivisao == 0) // Com a conversão feita acima, o valor 0,75 (que neste caso seriam 3 receitas encontradas) por exemplo, é arredondado pra 0 e assim não mostraria nenhuma.
            $quantidadePaginas = 1; // Então por mais que não haja realmente nenhuma receita, haverá sempre 1 sessão carregada.
        elseif($restoOperacao > 0 && $restoOperacao < 4) // Se houver resto (que se houver, sempre vai estar entre este intervalo).
            $quantidadePaginas = $resultadoDivisao + 1; // Adiciona mais uma página no marcador.
        else 
            $quantidadePaginas = $resultadoDivisao;

        return $quantidadePaginas; // Retorna a quantidade de páginas.
    }
?>

<script>
    function quantidadeReceitas(){ // Converte a função php para javascript.
        return <?php print contadorArrayPesquisa() ?>
    }

    function quantidadePaginas(){ // Converte a função php para javascript.
        return <?php print contadorPaginasSlider() ?>
    }
</script>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print $pesquisa; ?> - Buscador de Receitas</title>
    <link rel="shortcut icon" type="image/x-png" href="../imagens/iconeBuscador.png">
    <link rel="stylesheet" href="../estilos/estiloExibir.css">
    <link rel="stylesheet" href="../estilos/queriesExibe.css">
</head>
<body>
    <header id="cabecalho">
        <div id="buscador">            
            <img src="../imagens/lupa.svg" alt="Lupa de pesquisa">
            <form method="GET" action="exibeBuscaOuMenu.php">
                <input type="text" size="30" name="pesquisa" required value="<?php print $pesquisa; ?>" placeholder="Buscar">                
            </form>
        </div>
    </header>
    <main>                
        <div id="quantidade-resultados">
            <b><?php print contadorArrayPesquisa() ?></b> resultados encontrados. 
        </div>
        <section class="exibe-receitas">
            <div class="slider">
                <span class="mover-slider-esquerda"><img src="../imagens/arrow-left.svg" alt="Seta para esquerda"></span>
                <ul class="indicador-paginas-slider">
                    <?php 
                        for ($indicador = 1; $indicador <= contadorPaginasSlider(); $indicador++){ 
                            if($indicador == 1)
                                print "<li class='ativo'>";
                            else
                                print "<li class=''></li>";
                        }
                    ?>
                </ul>
                <div class="mascara-slider">
                    <div class="conteudo-slider">
                        <?php                
                            global $busca;
                            $contador = 0;

                            foreach ($busca as $row):
                                $contador++;
                                $classeIngredientes = 'ingredientes-resultado' . $contador;
                                print " <div class='flip'>
                                            <div class='marcador" . $contador . "' onclick='fecharSelecaoReceita(". $contador .")'></div>
                                            <div class='resultado r" . $contador . "'>
                                                <div class='frente'>
                                                    <div class='titulo'>
                                                        <div class='titulo-resultado titulo-resultado" . $contador . "'>" . $row['nome'] . "</div>
                                                    </div>
                                                </div>
                                                <div class='verso'>
                                                    <span class='expandir-resultado' onclick='montarSelecaoReceita(" . $contador . ")'>
                                                        <div class='arrow-dawn-resultado'>
                                                            <img src='../imagens/arrow-dawn-resultado.svg' alt='Seta para baixo'>
                                                        </div>
                                                    </span>
                                                    <div class='ingredientes-resultado " . $classeIngredientes . "'>
                                                        <div class='topico-verso topico-ingredientes'>Ingredientes:</div>
                                                        <div class='ingredientes-texto'>";?>
                                                            <script type="text/javascript">
                                                                var ingredientes = '<?php echo $row['ingredientes']; ?>'; // Armazena na variável ingredientes os ingredientes presentes nesta linha do array.
                                                                var ingredientesFormatados = ingredientes.replace(/;/g, '.</br>'); // Substitui todos os ';' por '</br>', ou seja, aonde tem ponto e vírgula é colocado uma quebra de linha

                                                                var classeIngredientes = document.querySelector('.<?php print $classeIngredientes ?> .ingredientes-texto'); // Seleciona a div alvo.

                                                                classeIngredientes.insertAdjacentHTML('afterbegin', ingredientesFormatados); // Insere no início interno da div alvo o HTML já formatado.
                                                            </script>
                                                        <?php print "</div>
                                                    </div>
                                                    <div class='preparo-resultado preparo-resultado" . $contador . "'>
                                                        <div class='topico-verso'>Modo de Preparo:</div>
                                                        " . $row['preparo'] . "
                                                    </div>                                        
                                                </div>
                                            </div>
                                        </div>";
                            endforeach;
                        ?>
                    </div>
                </div>
                <span class="mover-slider-direita"><img src="../imagens/arrow-right.svg" alt="Seta para direita"></span>
            </div>
            </div>
        </section>
        <section id="exibe-receita-individual" class="exibe-oculto">
            <div id="conteudo-geral-individual">
                <div id="bloco-individual-esquerda">
                    <div id="titulo-receita-individual">
                        <script>
                            function refreshTitulo(receita){
                                let titulo = document.querySelector('.titulo-resultado' + receita).innerText; // Recupera o conteúdo da div clicada.
                                let thisDiv = document.querySelector('#titulo-receita-individual'); // Recupera a div alvo. 

                                thisDiv.innerHTML = ""; // Limpa o conteúdo da div.
                                thisDiv.insertAdjacentText('afterbegin', titulo); // Insere o novo conteúdo na div.
                            }
                        </script>
                    </div>
                    <div id="ingredientes-receita-individual">
                        <script>
                            function refreshIngredientes(receita){
                                let ingredientes = document.querySelector('.ingredientes-resultado' + receita).innerHTML;
                                let thisDiv = document.querySelector('#ingredientes-receita-individual');

                                thisDiv.innerHTML = "";
                                thisDiv.insertAdjacentHTML('afterbegin', ingredientes);
                            }
                        </script>
                    </div>
                </div>
                <span id="faixa-central"></span>
                <div id="bloco-individual-direita">
                    <div id="preparo-receita-individual">
                        <script>
                            function refreshPreparo(receita){
                                let preparo = document.querySelector('.preparo-resultado' + receita).innerHTML;
                                let thisDiv = document.querySelector('#preparo-receita-individual');

                                thisDiv.innerHTML = "";
                                thisDiv.insertAdjacentHTML('afterbegin', preparo);
                            }
                        </script>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div id="rodape"></div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="../scripts/exibeReceitas.js"></script>
</body>
</html>