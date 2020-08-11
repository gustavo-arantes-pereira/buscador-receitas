let altura_conteudo = $('.conteudo').outerHeight();

function calculaAlturaConteudo(x) {    
    let comprimento_conteudo = $('.conteudo').outerWidth();
    let margem_blocos = 4/100 * comprimento_conteudo;

    if(x == 1){
        let altura_bloco_adicionar = $('.bloco-adicionar').outerHeight();

        let valor_final = altura_conteudo + margem_blocos + altura_bloco_adicionar;

        return valor_final
    }
    else {
        let altura_bloco_buscar = $('.bloco-buscar').outerHeight();

        let valor_final = altura_conteudo + margem_blocos + altura_bloco_buscar;

        return valor_final
    }
}

function fechaAdicionar() {    
    $('.botao-adicionar').removeClass('adicionar-ativo');
    $('.bloco-adicionar').removeClass('anima-bloco-adicionar');        
    $('.conteudo').css({'height' : altura_conteudo});
}

function fechaBuscar() {
    $('.botao-buscar').removeClass('buscar-ativo');
    $('.bloco-buscar').removeClass('anima-bloco-buscar');
    $('.conteudo').css({'height' : altura_conteudo});
}

function abreAdicionar() {
    $('.botao-adicionar').addClass('adicionar-ativo'); // adiciona a classe 'ativo' se não houver
    $('.bloco-adicionar').addClass('anima-bloco-adicionar');        
    $('.conteudo').css({'height' : calculaAlturaConteudo(1)});
}

function abreBuscar() {
    $('.botao-buscar').addClass('buscar-ativo');
    $('.bloco-buscar').addClass('anima-bloco-buscar');
    $('.conteudo').css({'height' : calculaAlturaConteudo(2)});
}

$('.botao-adicionar').click(function() {
    if($('.botao-adicionar').hasClass('adicionar-ativo')){
        fechaAdicionar();
    }
    else if($('.botao-buscar').hasClass('buscar-ativo')){
        fechaBuscar();
        abreAdicionar();
    }
    else {
        abreAdicionar();
    }
});

$('.botao-buscar').click(function() {
    if($('.botao-buscar').hasClass('buscar-ativo')){
        fechaBuscar();
    }
    else if ($('.botao-adicionar').hasClass('adicionar-ativo')){
        fechaAdicionar();
        abreBuscar();
    }
    else {
        abreBuscar();
    }
})

function resultado(x) {
    let tabela = $('.tabela-adicionar');
    if(x == 1) {
        tabela.append('<th>')
    }
}