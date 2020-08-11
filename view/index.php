<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Receitas</title>
    <link rel="shortcut icon" type="image/x-png" href="imagens/iconeBuscador.png">
    <link rel="stylesheet" href="estilos/estiloprincipal.css">
    <link rel="stylesheet" href="estilos/queries.css">
</head>
<body>
    <section id="container-menu">
        <header id="cabecalho">
            <div id="icone-menu">
                <a><svg width="21.999999999999996" height="21.999999999999996" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <line stroke="#000" class="firstLine" y2="4.146656" x2="25.477124" y1="4.146656" x1="-1.973854"
                            stroke-width="3.5" />
                        <line stroke="#000" class="secondLine" y2="11.151682" x2="25.607844" y1="11.020963" x1="-2.104574"
                            stroke-width="3.5" />
                        <line stroke="#000" class="thirdLine" y2="17.804165" x2="24.852663" y1="17.673446" x1="-1.683284"
                            stroke-width="3.5" />
                    </g>
                </svg></a>
            </div>        
        </header>
    </section>
    <main id="container">
        <div id="titulo">
            <h1>RECEITAS</h1>
        </div>
        <div id="buscador">            
            <img src="imagens/lupa.svg" alt="Lupa de pesquisa">
            <form method="GET" action="php/exibeBuscaOuMenu.php">
                <input type="text" size="30" autofocus name="pesquisa" required value="" placeholder="Buscar">                
            </form>
        </div>
    </main>
    <script src="scripts/main.js"></script>
</body>
</html>