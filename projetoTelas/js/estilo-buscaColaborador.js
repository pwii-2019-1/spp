function limpa_formulario() {
          //Limpa valores do formulário.
          document.getElementById('nome').value=("");
          document.getElementById('cpf').value=("");
          document.getElementById('rg').value=("");
          document.getElementById('sexo').value=("");
          document.getElementById('dataNascimento').value=("");
          document.getElementById('tel').value=("");
          document.getElementById('email').value=("");
          document.getElementById('logradouro').value=("");
          document.getElementById('bairro').value=("");
          document.getElementById('cidade').value=("");
          document.getElementById('estado').value=("");
          document.getElementById('cep').value=("");
          document.getElementById('perfil').value=("");
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
          //Nome não Encontrado.
          limpa_formulario_nome();
          alert("Nome não encontrado.");
          document.getElementById('nome').value=("");
      }
  }

  function pesquisanome(valor) {

      //Nova variável "nome" somente com dígitos.
      var nome = valor.replace(/\D/g, '');

      //Verifica se campo nome possui valor informado.
      if (nome !== "") {

          //Expressão regular para validar o nome.
          var validanome = /^[0-30]{29}$/;

          //Valida o formato do nome.
          if(validanome.test(nome)) {

              //Cria um elemento javascript.
              var script = document.createElement('script');

              //Sincroniza com o callback.
              script.src = '//viacpf.com.br/ws/'+ nome + '/json/?callback=meu_callback';

              //Insere script no documento e carrega o conteúdo.
              document.body.appendChild(script);

          } //end if.
          else {
              //nome é inválido.
              limpa_formulario_nome();
              alert("Formato de Nome inválido.");
          }
      } //end if.
      else {
          //nome sem valor, limpa formulário.
          limpa_formulario_nome();
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
  var data=document.getElementById("dataNascimento").value;
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
//
//function habilita(i) {
//      document.getElementById(i).disabled = false;
//  }

function carregaModal(idcolaborador, valor) {
    document.getElementById(idcolaborador).value = valor;
}
