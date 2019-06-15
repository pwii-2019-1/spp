function limpa_formulario() {
    //Limpa valores do formulário.
    document.getElementById('nome').value = "Digite o nomeqqq";
    document.getElementById('numeracao').value = "Escolher...";
    document.getElementById('sexo').checked = false;
    document.getElementById('cor').value = "Escolher...";
    document.getElementById('marca').value = "Escolher...";
    document.getElementById('valorunit').value = ("");
    document.getElementById('saldoproduto').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('descricaoProd').value = (conteudo.descricaoProd);
        document.getElementById('numeracao').value = (conteudo.numeracao);
        document.getElementById('genero').value = (conteudo.genero);
        document.getElementById('cor').value = (conteudo.cor);
        document.getElementById('marca').value = (conteudo.marca);
        document.getElementById('valorUnitario').value = (conteudo.valorUnitario);
        document.getElementById('saldoProduto').value = (conteudo.saldoProduto);
    } //end if.
    else {
        //Descrição não Encontrada.
        limpa_formulario_descricaoProd();
        alert("Descrição não encontrada.");
        document.getElementById('descricaoProd').value = ("");
    }
}

function pesquisadescricaoProd(valor) {

    //Nova variável "cpf" somente com dígitos.
    var descricaoProd = valor.replace(/\D/g, '');

    //Verifica se campo descricaoProd possui valor informado.
    if (descricaoProd !== "") {

        //Expressão regular para validar o descricaoProd.
        var validadescricaoProd = /^[0-30]{29}$/;

        //Valida o formato do descricaoProd.
        if (validadescricaoProd.test(descricaoProd)) {

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = '//viadescricaoProd.com.br/ws/' + descricaoProd + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //descricaoProd é inválida.
            limpa_formulario_descricaoProd();
            alert("Formato de descrição é inválida.");
        }
    } //end if.
    else {
        //descricaoProd sem valor, limpa formulário.
        limpa_formulario_descricaoProd();
    }
}

function formatar(mascara, documento) {
    var i = documento.value.length;
    var saida = mascara.substring(0, 1);
    var texto = mascara.substring(i);

    if (texto.substring(0, 1) != saida) {
        documento.value += texto.substring(0, 1);
    }
}

function exibe(i) {
    document.getElementById(i).readOnly = true;
}

function desabilita(i) {
    document.getElementById(i).disabled = true;
}

function habilita(i) {
    document.getElementById(i).disabled = false;
}

function carregaModal(nome, num, gen, cor, marca, valor, saldo, id) {
    document.getElementById('nomeModal').value = nome;
    document.getElementById('numeracaoModal').value = num;

    if (gen === 'M') {
        document.getElementById('sexoModalM').checked = true;
    } else if (gen === 'F') {
        document.getElementById('sexoModalF').checked = true;
    }

    document.getElementById('corModal').value = cor;
    document.getElementById('marcaModal').value = marca;
    document.getElementById('valorunitModal').value = valor;
    document.getElementById('saldoprodModal').value = saldo;
    document.getElementById('linkEditarModal').href = "../Class/produto.controller.php?acao=editar&&id="+id;
    alteraLabel(id);


}

function alteraLabel(id) {
  document.getElementById("divCod").innerHTML = id;
  
}