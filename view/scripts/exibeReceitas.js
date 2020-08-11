$(document).ready(function (){ // Executa a função apenas quando todo o documento estiver carregado.
    let alturaHeader = $('#cabecalho').outerHeight(); // Recupera a altura do header.

    $('#rodape').css({'height' : alturaHeader + 'px'}); // Define a altura do footer.

    // Início do bloco do slider --------------------------------------------------------------------------------------------

    

});

function montarSelecaoReceita(marcador){ // A função recebe como parâmetro um número inteiro.
    let divMarcador = $('.marcador' + marcador), // Recupera a receita informada pelo parâmetro "marcador".
        sectionExibe = $('#exibe-receita-individual'), // Recupera a div que exibe uma receita.
        classeMarcar = 'marcar-receita',
        classeExibeOculto = 'exibe-oculto';

    if(!divMarcador.hasClass(classeMarcar) && sectionExibe.hasClass(classeExibeOculto)) { // Testa se a receita não foi marcada ainda e se a sectionExibe não está aberta.
        divMarcador.addClass(classeMarcar); // Adiciona a classe de marcação.
        sectionExibe.removeClass(classeExibeOculto); // Remove a classe exibe-oculto tornando a div visível.
        refreshTitulo(marcador); // Chama a função refreshTitulo que adiciona o titulo da receita clicada.
        refreshIngredientes(marcador); // Chama a função refreshIngredientes que adiciona os ingredientes da receita clicada.
        refreshPreparo(marcador); // Chama a função refreshPreparo que adiciona o modo de preparo da receita clicada.
    }
    else if (!divMarcador.hasClass(classeMarcar) && !sectionExibe.hasClass(classeExibeOculto)){ 
        let quantidade = quantidadeReceitas(); // Recupera a quantidade de receitas que estão sendo exibidas na tela.

        for (let i = 0; i <= quantidade; i++){
            if ($('.marcador' + i).hasClass(classeMarcar))
                $('.marcador' + i).removeClass(classeMarcar);
        }

        divMarcador.addClass(classeMarcar);
        refreshTitulo(marcador);
        refreshIngredientes(marcador);
        refreshPreparo(marcador);
    }
}

function fecharSelecaoReceita(marcador){ // A função recebe o indicador da receita marcada. 
    $('.marcador' + marcador).removeClass('marcar-receita'); // Remove a marcação da receita.
    $('#exibe-receita-individual').addClass('exibe-oculto'); // Oculta a exibição da receita individual.
}