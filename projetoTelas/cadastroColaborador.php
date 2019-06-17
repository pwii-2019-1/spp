<?php
  include_once '../Class/colaborador.service.php';
  include './cabec.php';
  //include './rodape.php';
  $cos = new ColaboradorService();
  
?>

<!DOCTYPE html>
<html lang="pt-br">
      <head>
      <meta charset="utf-8">
      <title>Cadastro de Colaborador</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/estilo-colaborador.css">
    </head>

      <body background="img/sapatos2.jpg">

<div class="container">

<form class="form-horizontal" action="../Class/colaborador.controller.php?acao=inserir" method="post" >
      <fieldset>
    <div class="panel panel-primary">
</br>

<div class="panel-heading btn-primary"><h2>Cadastro de Colaborador - SPP</h2>
</div>
 <div class="panel-body">
<div class="form-group">

<div class="col-md-15 control-label">
    <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-8">
<label for="nome">Nome <h11>*</h11></label>
<input id="nome" name="nome" placeholder="Digite o Nome" class="form-control" required="" type="text">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label for="cpf">CPF <h11>*</h11></label>
<input id="cpf" name="cpf" placeholder="000.000.000-00" class="form-control" required="" type="text" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
</div>
<div class="form-group col-md-4">
<label for="rg">RG <h11>*</h11></label>
<input id="rg" name="rg" placeholder="Digite o RG" class="form-control" required="" type="text">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label for="radios">Sexo <h11>*</h11></label>
</br>
<label required="" class="radio-inline" for="radios-0" >
  <input name="sexo" id="sexo" value="feminino" type="radio" required>
  Feminino
</label>
<label class="radio-inline" for="radios-1">
  <input name="sexo" id="sexo" value="masculino" type="radio">
  Masculino
</label>
</div>
<div class="form-group col-md-4">
<label for="dataNasc">Data de Nascimento <h11>*</h11></label>
<input id="dataNascimento" name="dataNascimento" placeholder="DD/MM/AAAA" class="form-control" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label for="telefone">Telefone <h11>*</h11></label>
<div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input id="tel" name="tel" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" OnKeyPress="formatar('## #####-####', this)">
</div>
</div>
<div class="form-group col-md-4">
<label for="email">Email </label>
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input id="email" name="email" class="form-control" placeholder="email@email.com" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
</div>
</div>
</div>
</br>
<div class="form-row">
<div class="form-group col-md-4">
<label for="prependedtext"><h5>Endereço:</h5></label>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-4">
    <span class="input-group-addon">Logradouro <h11>*</h11></span>
    <input id="logradouro" name="logradouro" class="form-control" placeholder="Digite o Logradouro" required="" type="text">
  </div>
<div class="form-group col-md-4">
<label for="cep">CEP</label>
<input id="cep" name="cep" class="form-control" placeholder="00.000-000" type="search" maxlength="10" OnKeyPress="formatar('##.###-###', this)">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-4">
  <span class="input-group-addon">Bairro <h11>*</h11></span>
  <input id="bairro" name="bairro" class="form-control" placeholder="Digite o bairro" required="" type="text">
</div>
<div class="form-group col-md-4">
<label for="prependedtext"></label>
  <span class="input-group-addon">Cidade <h11>*</h11></span>
  <input id="cidade" name="cidade" class="form-control" placeholder="Digite a Cidade" required="" type="text">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-4">
<label for="estado">Estado <h11>*</h11></label>
<select id="estado" name="estado" class="form-control">
  <option selected>Selecione...</option>
  <option>AC</option>
  <option>AL</option>
  <option>AP</option>
  <option>AM</option>
  <option>BA</option>
  <option>CE</option>
  <option>DF</option>
  <option>ES</option>
  <option>GO</option>
  <option>MA</option>
  <option>MT</option>
  <option>MS</option>
  <option>MG</option>
  <option>PA</option>
  <option>PB</option>
  <option>PR</option>
  <option>PE</option>
  <option>PI</option>
  <option>RJ</option>
  <option>RN</option>
  <option>RS</option>
  <option>RO</option>
  <option>RR</option>
  <option>SC</option>
  <option>SP</option>
  <option>SE</option>
  <option>TO</option>
</select>
</div>
</div>
</br>
<div class="form-row">
<div class="form-group col-md-4">
<label for="prependedtext"><h5>Login:</h5></label>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label for="tipoColaborador">Perfil do novo colaborador <h11>*</h11></label>
<select id="tipoColaborador" name="tipoColaborador" class="form-control">
  <option selected>Selecione...</option>
  <option>Administrador</option>
  <option>Vendedor</option>
  <option>Caixa</option>
</select>
</div>
<div class="form-group col-md-4">
<label for="password">Senha <h11>*</h11></label>
<input type="password" class="form-control" id="pwd" placeholder="Digite a senha" name="pwd" required >
</div>
</div>

<div class="text-center">
    <label for="Cadastrar"></label>
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="submit">Cadastrar</button>
    <button id="limpar" name="Limpar" class="btn btn-warning" onclick="limpa_formulario()" type="reset">Limpar</button>
    <button id="Buscar" name="Buscar" class="btn btn-inverse">Buscar</button>
</div>
</fieldset>
</form>
</div>

<!--                        campo de busca-->
<!--                        <div class="active-pink-3 active-pink-4 mb-4" id="buscaProdTab">
                            <input class="form-control" type="text" placeholder="Buscar" aria-label="Search">
                        </div>-->
<!-- mostrar tabela -->
<div class="tabelaColaborador table-responsive" id="tabelaColaborador">

    <table class="table table-dark  table-striped table-hover" >

        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">RG</th>
                <th scope="col">Sexo</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Logradouro</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">CEP</th>
                <th scope="col">Data do Cadastro</th>
                <th scope="col">Perfil</th>
                <th scope="col">Senha</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
                                           <?php
                                           foreach ($cos->populaTabela() as $key) {
                                           ?>
                                                   <tr>
                                                     <th scope="row">"<?php echo $key['idcolaborador'];?></th>
                                                      <td><?php echo $key['nome'];?></td>
                                                      <td><?php echo $key['cpf'];?></td>
                                                      <td><?php echo $key['rg'];?></td>
                                                      <td><?php echo $key['sexo'];?></td>
                                                      <td><?php echo $key['dataNascimento'];?></td>
                                                      <td><?php echo $key['tel'];?></td>
                                                      <td><?php echo $key['email'];?></td>
                                                      <td><?php echo $key['logradouro'];?></td>
                                                      <td><?php echo $key['bairro'];?></td>
                                                      <td><?php echo $key['cidade'];?></td>
                                                      <td><?php echo $key['estado'];?></td>
                                                      <td><?php echo $key['cep'];?></td>
                                                      <td><?php echo $key['dataCadastro'];?></td>
                                                      <td><?php echo $key['perfil'];?></td>
                                                      <td><?php echo $key['senha'];?></td>
                                                       <td>
                                                         <button type="button" onclick="carregaModal('<?php echo $key['nome']; ?>',
                                                                                                      <?php echo $key['cpf']; ?>,
                                                                                                      <?php echo $key['rg']; ?>,
                                                                                                      <?php echo $key['sexo']; ?>,
                                                                                                      <?php echo $key['dataNascimento']; ?>,
                                                                                                      <?php echo $key['tel']; ?>,
                                                                                                      <?php echo $key['email']; ?>,
                                                                                                      <?php echo $key['logradouro']; ?>,
                                                                                                      <?php echo $key['bairro']; ?>,
                                                                                                      <?php echo $key['cidade']; ?>,
                                                                                                      <?php echo $key['estado']; ?>,
                                                                                                      <?php echo $key['cep']; ?>,
                                                                                                      <?php echo $key['perfil']; ?>,
                                                                                                      <?php echo $key['senha']; ?>,
                                                                                                      <?php echo $key['idcolaborador']; ?>)"
                                                                        data-target=".bd-example-modal-lg" data-toggle="modal" id="btn-editar" class="btn btn-primary"  >
                                                                          <img id="editar" src="img/icons8-editar-26.png">
                                                           </button>

                                                           <button type="button" id="btn-excluir" class="btn btn-primary" data-toggle="modal">
                                                               <a href="../Class/colaborador.controller.php?acao=deletar" > <img id="editar" src="img/icons8-excluir-26.png">
                                                           </button>
                                                       </td>
                                                   </tr>
                                           <?php } ?>

            </tbody>
          </table>

          <!--   modal inicio-->
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="containerModal">

                          <form class="form-horizontal" id="formModal"  action="../Class/colaborador.controller.php?acao=editar" method="post">

                              <fieldset>
                                 <div class="panel panel-primary">
                                  <br/>
                                  <div class="panel-heading btn-primary">
                                      <h2>Alterar Produto</h2>
                                  </div>

                                  <div id="codModal" class="panel-body">
                                      <h4>Cód:
                                          <label for="cod" id="divCod"/>
                                      </h4>

                                  </div>

    <div class="col-md-15 control-label">
            <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
    </div>

    <div class="form-row">
    <div class="form-group col-md-8">
      <label for="nome">Nome <h11>*</h11></label>
      <input id="nomeModal" name="nome" placeholder="Digite o Nome" class="form-control" required="" type="text">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
      <label for="cpf">CPF <h11>*</h11></label>
      <input id="cpf" name="cpf" placeholder="000.000.000-00" class="form-control" required="" type="text" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
      </div>
      <div class="form-group col-md-4">
      <label for="rg">RG <h11>*</h11></label>
      <input id="rg" name="rg" placeholder="Digite o RG" class="form-control" required="" type="text">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
      <label for="radios">Sexo <h11>*</h11></label>
    </br>
        <label required="" class="radio-inline" for="radios-0" >
          <input name="sexo" id="sexo" value="feminino" type="radio" required>
          Feminino
        </label>
        <label class="radio-inline" for="radios-1">
          <input name="sexo" id="sexo" value="masculino" type="radio">
          Masculino
        </label>
      </div>
      <div class="form-group col-md-4">
      <label for="dataNasc">Data de Nascimento <h11>*</h11></label>
      <input id="dataNascimento" name="dataNascimento" placeholder="DD/MM/AAAA" class="form-control" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
      </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="telefone">Telefone <h11>*</h11></label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
          <input id="tel" name="tel" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" OnKeyPress="formatar('## #####-####', this)">
        </div>
      </div>
    <div class="form-group col-md-4">
      <label for="email">Email </label>
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input id="email" name="email" class="form-control" placeholder="email@email.com" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
        </div>
      </div>
    </div>
    </br>
      <div class="form-row">
      <div class="form-group col-md-4">
        <label for="prependedtext"><h5>Endereço:</h5></label>
      </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
            <span class="input-group-addon">Logradouro <h11>*</h11></span>
            <input id="logradouro" name="logradouro" class="form-control" placeholder="Digite o Logradouro" required="" type="text">
          </div>
      <div class="form-group col-md-4">
        <label for="cep">CEP</label>
        <input id="cep" name="cep" class="form-control" placeholder="00.000-000" type="search" maxlength="10" OnKeyPress="formatar('##.###-###', this)">
        </div>
      </div>

      <div class="form-row">
      <div class="form-group col-md-4">
          <span class="input-group-addon">Bairro <h11>*</h11></span>
          <input id="bairro" name="bairro" class="form-control" placeholder="Digite o bairro" required="" type="text">
      </div>
      <div class="form-group col-md-4">
      <label for="prependedtext"></label>
          <span class="input-group-addon">Cidade <h11>*</h11></span>
          <input id="cidade" name="cidade" class="form-control" placeholder="Digite a Cidade" required="" type="text">
      </div>
        </div>
      <div class="form-row">
      <div class="form-group col-md-4">
        <label for="estado">Estado <h11>*</h11></label>
        <select id="estado" name="estado" class="form-control">
          <option selected>Selecione...</option>
          <option>AC</option>
          <option>AL</option>
          <option>AP</option>
          <option>AM</option>
          <option>BA</option>
          <option>CE</option>
          <option>DF</option>
          <option>ES</option>
          <option>GO</option>
          <option>MA</option>
          <option>MT</option>
          <option>MS</option>
          <option>MG</option>
          <option>PA</option>
          <option>PB</option>
          <option>PR</option>
          <option>PE</option>
          <option>PI</option>
          <option>RJ</option>
          <option>RN</option>
          <option>RS</option>
          <option>RO</option>
          <option>RR</option>
          <option>SC</option>
          <option>SP</option>
          <option>SE</option>
          <option>TO</option>
        </select>
      </div>
      </div>
  </br>
      <div class="form-row">
      <div class="form-group col-md-4">
        <label for="prependedtext"><h5>Login:</h5></label>
      </div>
      </div>

      <div class="form-row">
      <div class="form-group col-md-4">
        <label for="tipoColaborador">Perfil do novo colaborador <h11>*</h11></label>
        <select id="tipoColaborador" name="tipoColaborador" class="form-control">
          <option selected>Selecione...</option>
          <option>Administrador</option>
          <option>Vendedor</option>
          <option>Caixa</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="password">Senha <h11>*</h11></label>
        <input type="password" class="form-control" id="pwd" placeholder="Digite a senha" name="pwd" required >
      </div>
      </div>

        <div class="text-center">
        <label for="Cadastrar"></label>
        <button id="Alterar" type="submit" name="Alterar" class="btn btn-warning"> Atualizar </button>
      </div>
    </div>
  </fieldset>
  </form>
</div>
</div>
</div>
</div>

<!--   modal fim-->
<form action="cadastroColaborador.php" method="POST">
    <button name="topo" class="btn btn-danger" type="submit" >Ir para o topo</button>

</form>
</div>

<!--                        MODAL-->

<script src="js/estilo-colaborador.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>
