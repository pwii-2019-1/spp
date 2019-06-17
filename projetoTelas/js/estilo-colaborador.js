function limpa_formulario() {
          //Limpa valores do formulário.
          document.getElementById('nome').value=("Digite o nome");
          document.getElementById('cpf').value=("");
          document.getElementById('rg').value=("");
          document.getElementById('sexo').value=("");
          document.getElementById('dataNascimento').value=("");
          document.getElementById('tel').value=("");
          document.getElementById('email').value=("");
          document.getElementById('logradouro').value=("");
          document.getElementById('bairro').value=("");
          document.getElementById('cidade').value=("");
          document.getElementById('estado').value=("Escolher...");
          document.getElementById('cep').value=("");
          document.getElementById('perfil').value=("Escolher...");
          document.getElementById('senha').value=("");
  }

  function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          document.getElementById('nome').value=(conteudo.nome);
          document.getElementById('cpf').value=(conteudo.cpf);
          document.getElementById('rg').value=(conteudo.rg);
          document.getElementById('sexo').value=(conteudo.sexo);
          document.getElementById('dataNascimento').value=(conteudo.dataNascimento);
          document.getElementById('tel').value=(conteudo.tel);
          document.getElementById('email').value=(conteudo.email);
          document.getElementById('logradouro').value=(conteudo.logradouro);
          document.getElementById('bairro').value=(conteudo.bairro);
          document.getElementById('cidade').value=(conteudo.cidade);
          document.getElementById('estado').value=(conteudo.estado);
          document.getElementById('cep').value=(conteudo.cep);
          document.getElementById('perfil').value=(conteudo.perfil);
          document.getElementById('senha').value=(conteudo.senha);
      } //end if.
      else {
          //CPF não Encontrado.
          limpa_formulario_cpf();
          alert("CPF não encontrado.");
          document.getElementById('cpf').value=("");
      }
  }

  function pesquisacpf(valor) {

      //Nova variável "cpf" somente com dígitos.
      var cpf = valor.replace(/\D/g, '');

      //Verifica se campo cpf possui valor informado.
      if (cpf !== "") {

          //Expressão regular para validar o cpf.
          var validacpf = /^[0-12]{11}$/;

          //Valida o formato do cpf.
          if(validacpf.test(cpf)) {

              //Cria um elemento javascript.
              var script = document.createElement('script');

              //Sincroniza com o callback.
              script.src = '//viacpf.com.br/ws/'+ cpf + '/json/?callback=meu_callback';

              //Insere script no documento e carrega o conteúdo.
              document.body.appendChild(script);

          } //end if.
          else {
              //cep é inválido.
              limpa_formulario_cpf();
              alert("Formato de CPF inválido.");
          }
      } //end if.
      else {
          //cpf sem valor, limpa formulário.
          limpa_formulario_cpf();
      }
  }

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i);

if (texto.substring(0,1) != saida) {
          documento.value += texto.substring(0,1);
        }
}

function idade () {
  var data=document.getElementById("dtnasc").value;
  var dia=data.substr(0, 2);
  var mes=data.substr(3, 2);
  var ano=data.substr(6, 4);
  var d = new Date();
  var ano_atual = d.getFullYear(),
      mes_atual = d.getMonth() + 1,
      dia_atual = d.getDate();

      ano=+ano,
      mes=+mes,
      dia=+dia;

  var idade=ano_atual-ano;

  if (mes_atual < mes || mes_atual == mes_aniversario && dia_atual < dia) {
      idade--;
  }
return idade;
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

function showhide() {
     var div = document.getElementById("newpost");
     if(idade()>=18){
  div.style.display = "none";
  }
else if(idade()<18) {
  div.style.display = "inline";
  }
}

function carregaModal(nome, cpf, rg, sexo, dataNascimento, tel, email, logradouro, bairro, cidade, estado, cep, perfil, senha, idcolaborador) {
    alteraLabel(id);
    linkForm(id);
    document.getElementById('nomeModal').value = nome;
    document.getElementById('numeracaoModal').value = num;

    if (gen === 'M') {
        document.getElementById('sexoModalM').checked = true;
    } else if (gen === 'F') {
        document.getElementById('sexoModalF').checked = true;
    }
    document.getElementById('dataNascimentoModal').value = dataNascimento;
    document.getElementById('telModal').value = tel;
    document.getElementById('emailModal').value = email;
    document.getElementById('logradouroModal').value = logradouro;
    document.getElementById('bairroModal').value = bairro;
    document.getElementById('cidadeModal').value = cidade;
    document.getElementById('estadoModal').value = estado;
    document.getElementById('cepModal').value = cep;
    document.getElementById('perfilModal').value = perfil;
    document.getElementById('senhaModal').value = senha;
//    document.getElementById('linkEditarModal').href = "../Class/colaborador.controller.php?acao=editar&id="+id;

}

function linkForm(id){
    document.getElementById('formModal').action = "../Class/colaborador.controller.php?acao=editar&id="+id;
}

function alteraLabel(id) {
  document.getElementById("divCod").innerHTML = id;
}
