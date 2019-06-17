function limpa_formulario() {
          //Limpa valores do formulário.
          document.getElementById('codVenda').value=("");
          document.getElementById('codCliente').value=("");
          document.getElementById('codColaborador').value=("");
          document.getElementById('descontoTotal').value=("");
          document.getElementById('valorTotal').value=("");
          document.getElementById('condicaoPgto').value=("");
          document.getElementById('itemVenda').value=("Item");
  }

  function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          document.getElementById('codVenda').value=(conteudo.codVenda);
          document.getElementById('codCliente').value=(conteudo.codCliente);
          document.getElementById('codColaborador').value=(conteudo.codColaborador);
          document.getElementById('descontoTotal').value=(conteudo.descontoTotal);
          document.getElementById('valorTotal').value=(conteudo.valorTotal);
          document.getElementById('condicaoPgto').value=(conteudo.condicaoPgto);
          document.getElementById('itemVenda').value=(conteudo.itemVenda);
      } //end if.
      else {
          //Descrição não Encontrada.
          limpa_formulario_descricaoProd();
          alert("Descrição não encontrada.");
          document.getElementById('descricaoProd').value=("");
      }
  }

function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i);

if (texto.substring(0,1) != saida){
          documento.value += texto.substring(0,1);
        }
}

function exibe(i) {
document.getElementById(i).readOnly= true;
  }

function desabilita(i) {
   document.getElementById(i).disabled = true;
  }

function habilita(i) {
      document.getElementById(i).disabled = false;
  }

<<<<<<< HEAD
=======

  function carregaModal(descontoTotal, valorTotal, condicaoPgto, itemVenda, id) {
      alteraLabel(id);
      linkForm(id);
      document.getElementById('descontoTotalModal').value = descontoTotal;
      document.getElementById('valorTotalModal').value = valorTotal;
      document.getElementById('condicaoPgtoModal').value = condicaoPgto;
      document.getElementById('itemVendaModal').value = itemVenda;
  //    document.getElementById('linkEditarModal').href = "../Class/venda.controller.php?acao=editar&id="+id;

  }

  function linkForm(id){
      document.getElementById('formModal').action = "../Class/venda.controller.php?acao=editar&id="+id;
  }

  function alteraLabel(id) {
    document.getElementById("divCod").innerHTML = id;
  }
>>>>>>> c02ca57428725d9710e50949286b829cd2556722
