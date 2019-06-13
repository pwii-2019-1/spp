<?php
  include_once 'venda.service.php';
  $vs = new vendaService();
?>

<!DOCTYPE html>
<html lang="pt-br">
      <head>
      <meta charset="utf-8">
      <title>Vendas</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/estilo-cliente.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      </head>
      <body background="img/sapatos2.jpg">
<div class="container">

<form class="form-horizontal" action="venda.controller.php?acao=inserir" method="post" >
      <fieldset>
    <div class="panel panel-primary">
</br>
                                <div class="panel-heading btn-primary"><h2>Tela de Vendas- SPP</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                    </div>

                                    <div class="form-row">
                                    <label for="Incluir"></label>
                                    <button id="Incluir" name="Incluir" class="btn btn-success" type="Submit">Incluir Item</button>
                                  </div>

                                </div>

                                <!--                        campo de busca-->
                                <!--                        <div class="active-pink-3 active-pink-4 mb-4" id="buscaProdTab">
                                                        <input class="form-control" type="text" placeholder="Buscar" aria-label="Search">
                                                    </div>-->
                                <!-- mostrar tabela -->
                                <div class="tabelaItemVenda table-responsive" id="tabelaItemVenda">

                                <table class="table table-dark  table-striped table-hover" >

                                    <thead>
                                        <tr>
                                            <th scope="col">Produto</th>
                                            <th scope="col">Quantidade do Produto</th>
                                            <th scope="col">Desconto do Item</th>
                                            <th scope="col">Valor Total do Item</th>
                                            <th scope="col">Ação</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                                                       <?php
                                                                       foreach ($vs->populaTabela() as $key) {
                                                                       ?>
                                                                               <tr>
                                                                                 <th scope="row">"<?php echo $key['qtdProduto'];?></th>
                                                                                  <td><?php echo $key['valor'];?></td>
                                                                                  <td><?php echo $key['desconto'];?></td>
                                                                                  <td><?php echo $key['idvenda'];?></td>
                                                                                  <td><?php echo $key['idproduto'];?></td>
                                                                                   <td>
                                                                                       <button type="button" id="btn-editar" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                                                           <a href="#" > <img id="editar" src="img/icons8-editar-26.png">
                                                                                       </button>

                                                                                       <button type="button" id="btn-excluir" class="btn btn-primary" data-toggle="modal">
                                                                                           <a href="#" > <img id="excluir" src="img/icons8-excluir-26.png">
                                                                                       </button>
                                                                                   </td>
                                                                               </tr>
                                                                       <?php } ?>

                                        </tbody>
                                      </table>


                                <fieldset>
                                <div class="panel panel-primary">

                                      <div class="panel-body">
                                          <div class="form-group">

                                              <div class="col-md-15 control-label">
                                                  <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
                                              </div>
                                          </div>

                              </form>
                              </div>
                                                        <form class="form-horizontal" action="venda.controller.php?acao=inserir" method="post" >

                                </br>
                                    <label for="Buscar"></label>
                                    <button id="Buscar" name="Buscar" class="btn btn-inverse">Cliente</button>
                                <br/>
                                    <label for="Buscar"></label>
                                    <button id="Buscar" name="Buscar" class="btn btn-inverse">Colaborador</button>
                                    </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="nome" class="font-italic">Venda nº </label>
                                      <input id="nome" name="nome" class="form-control" type="text">
                                      </div>
                                    <div class="form-group col-md-2">
                                      <label for="nome" class="font-italic">Cliente nº </label>
                                      <input id="nome" name="nome" class="form-control" type="text">
                                      </div>
                                    <div class="form-group col-md-2">
                                      <label for="nome" class="font-italic">Colaborador nº </label>
                                      <input id="nome" name="nome" class="form-control" type="text">
                                      </div>
                                    </div>

                                        <div class="form-row">
                                          <div class="form-group col-md-4">
                                            <label class="radio-inline" for="radios-2">
                                              <input name="condicaoPgto" id="condicaoPgto" value="boleto" type="radio">
                                              À prazo
                                            </label>
                                            <label class="radio-inline" for="radios-3">
                                              <input name="condicaoPgto" id="condicaoPgto" value="dinheiro" type="radio">
                                              À vista
                                            </label>
                                          </br>
                                          </div>
                                      </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-4" text-center>
                                      <label for="descontoTotal" class="font-weight-bold">Desconto Total </label>
                                          <input id="descontoTotal" name="descontoTotal" class="form-control" placeholder="R$ " type="text" maxlength="15" OnKeyPress="formatar('## ###,###,##', this)">
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="valorTotal" class="font-weight-bold">Valor Total</label>
                                          <input id="valorTotal" name="valorTotal" class="form-control" placeholder="R$ " type="text">
                                        </div>
                                      </div>

                                      <div class="text-center">
                                      <label for="Incluir"></label>
                                      <button id="Salvar" name="Salvar" class="btn btn-success" type="Submit">Salvar</button>
                                      <button type="button" class="btn btn-primary btn-lg">Sair</button>
                                      </div>
                                      </fieldset>
                                    </form>
                                </div>
                                <!--                        campo de busca-->
                                <!--                        <div class="active-pink-3 active-pink-4 mb-4" id="buscaProdTab">
                                                            <input class="form-control" type="text" placeholder="Buscar" aria-label="Search">
                                                        </div>-->
                                <!-- mostrar tabela -->
                                <div class="tabelaVenda table-responsive" id="tabelaVenda">

                                    <table class="table table-dark  table-striped table-hover" >

                                        <thead>
                                            <tr>
                                                <th scope="col">Código da Venda</th>
                                                <th scope="col">Código do Cliente</th>
                                                <th scope="col">Código do Colaborador</th>
                                                <th scope="col">Desconto Total</th>
                                                <th scope="col">Valor Total</th>
                                                <th scope="col">Cond. de Pagamento</th>
                                                <th scope="col">Data da Compra</th>
                                                <th scope="col">Item da Venda</th>
                                                <th scope="col">Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                                                           <?php
                                                                           foreach ($vs->populaTabela() as $key) {
                                                                           ?>
                                                                                   <tr>
                                                                                     <th scope="row">"<?php echo $key['idvenda'];?></th>
                                                                                      <td><?php echo $key['idcliente'];?></td>
                                                                                      <td><?php echo $key['idcolaborador'];?></td>
                                                                                      <td><?php echo $key['descontoTotal'];?></td>
                                                                                      <td><?php echo $key['valorTotal'];?></td>
                                                                                      <td><?php echo $key['condicaoPgto'];?></td>
                                                                                      <td><?php echo $key['dataCompra'];?></td>
                                                                                      <td><?php echo $key['itemVenda'];?></td>
                                                                                       <td>
                                                                                           <button type="button" id="btn-editar" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                                                               <a href="#" > <img id="editar" src="img/icons8-editar-26.png">
                                                                                           </button>

                                                                                           <button type="button" id="btn-excluir" class="btn btn-primary" data-toggle="modal">
                                                                                               <a href="#" > <img id="excluir" src="img/icons8-excluir-26.png">
                                                                                           </button>
                                                                                       </td>
                                                                                   </tr>
                                                                           <?php } ?>

                                            </tbody>
                                          </table>

                                          <form action="cadastroVenda.php" method="POST">
                                              <button id="topo" name="topo" class="btn btn-danger" type="submit" >Ir para o topo</button>

                                          </form>
                                          </div>
                                          <script src="js/bootstrap.min.js"></script>
                                          <script src="js/estilo-cliente.js"></script>

        <!--                        MODAL-->

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
        <div class="container">

          <form class="form-horizontal"  action="/action_page.php" >
                <fieldset>
              <div class="panel panel-primary">
          </br>
                                          <div class="panel-heading btn-primary"><h2>Tela de Vendas- SPP</h2>
                                          </div>
                                          <div class="panel-body">
                                              <div class="form-group">

                                                  <div class="col-md-15 control-label">
                                                      <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
                                                  </div>
                                              </div>

                                              <div class="form-row">
                                              <label for="Incluir"></label>
                                              <button id="Incluir" name="Incluir" class="btn btn-success" type="Submit">Incluir Item</button>
                                          </br>
                                              <label for="Buscar"></label>
                                              <button id="Buscar" name="Buscar" class="btn btn-inverse">Cliente</button>
                                          <br/>
                                              <label for="Buscar"></label>
                                              <button id="Buscar" name="Buscar" class="btn btn-inverse">Colaborador</button>
                                              </div>

                                              <div class="form-row">
                                              <div class="form-group col-md-2">
                                                  <label for="nome" class="font-italic">Venda nº </label>
                                                <input id="nome" name="nome" class="form-control" type="text">
                                                </div>
                                              <div class="form-group col-md-2">
                                                <label for="nome" class="font-italic">Cliente nº </label>
                                                <input id="nome" name="nome" class="form-control" type="text">
                                                </div>
                                              <div class="form-group col-md-2">
                                                <label for="nome" class="font-italic">Colaborador nº </label>
                                                <input id="nome" name="nome" class="form-control" type="text">
                                                </div>
                                              </div>

                                                  <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="radios" class="font-weight-bold">Condição de Pagamento: </label>
                                                  </br>
                                                      <label class="radio-inline" for="radios-0" >
                                                        <input name="condicaoPgto" id="condicaoPgto" value="credito" type="radio">
                                                        Cartão de Crédito
                                                      </label>
                                                    <div class="form-group col-md-8">
                                                      <select id="marca" name="marca" class="form-control">
                                                        <option selected>Nº de parcelas...</option>
                                                        <option>1x</option>
                                                        <option>2x</option>
                                                        <option>3x</option>
                                                        <option>4x</option>
                                                        <option>5x</option>
                                                      </select>
                                                    </div>
                                                      <label class="radio-inline" for="radios-1" >
                                                        <input name="condicaoPgto" id="condicaoPgto" value="debito" type="radio">
                                                        Cartão de Débito
                                                      </label>
                                                    <div class="form-group col-md-8">
                                                        <select id="marca" name="marca" class="form-control">
                                                          <option selected>Nº de parcelas...</option>
                                                          <option>1x</option>
                                                          <option>2x</option>
                                                          <option>3x</option>
                                                          <option>4x</option>
                                                          <option>5x</option>
                                                        </select>
                                                      </div>
                                                      <label class="radio-inline" for="radios-2">
                                                        <input name="condicaoPgto" id="condicaoPgto" value="boleto" type="radio">
                                                        Boleto Bancário
                                                      </label>
                                                    <div class="form-group col-md-8">
                                                      <select id="marca" name="marca" class="form-control">
                                                        <option selected>Nº de parcelas...</option>
                                                        <option>1x</option>
                                                        <option>2x</option>
                                                        <option>3x</option>
                                                        <option>4x</option>
                                                        <option>5x</option>
                                                      </select>
                                                    </div>
                                                      <label class="radio-inline" for="radios-3">
                                                        <input name="condicaoPgto" id="condicaoPgto" value="dinheiro" type="radio">
                                                        À vista em dinheiro
                                                      </label>
                                                    </br>
                                                      <label class="radio-inline" for="radios-4">
                                                        <input name="condicaoPgto" id="condicaoPgto" value="cheque" type="radio">
                                                        Cheque
                                                      </label>
                                                    </div>
                                                </div>

                                              <div class="form-row">
                                              <div class="form-group col-md-4" text-center>
                                                <label for="descontoTotal" class="font-weight-bold">Desconto Total </label>
                                                    <input id="descontoTotal" name="descontoTotal" class="form-control" placeholder="R$ " type="text" maxlength="15" OnKeyPress="formatar('## ###,###,##', this)">
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label for="valorTotal" class="font-weight-bold">Valor Total</label>
                                                    <input id="valorTotal" name="valorTotal" class="form-control" placeholder="R$ " type="text">
                                                  </div>
                                                </div>

                                                <div class="text-center">
                                                <label for="Incluir"></label>
                                                <button id="Salvar" name="Salvar" class="btn btn-success" type="Submit">Salvar</button>
                                                <button type="button" class="btn btn-primary btn-lg">Sair</button>
                                                  </div>
                                                </div>
                                                </fieldset>

                                    </form>
                                </div>
                              </div>
                              </div>
                                </body>
                                </html>
