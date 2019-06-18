<!DOCTYPE html>
<html lang="pt-br">
    <?php
    include './cabec.php';
    ?>
    <head>
        <meta charset="utf-8">
        <title>Index- Tela de Vendas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo-venda.css">
    </head>
    <body background="img/sapatos2.jpg">
        <div class="container">

            <form class="form-horizontal" action="/action_page.php">
                <fieldset>
                    <div class="panel panel-primary">
                        </br>
                        <div class="panel-heading btn-primary"><h2>SPP- Sistema de Pesquisa de Produto</h2>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">

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
                            </br>

                            <div class="text-center">
                                <label for="Incluir"></label>
                                <button id="Salvar" name="Salvar" class="btn btn-success" type="Submit">Salvar</button>
                                <button type="button" class="btn btn-primary btn-lg">Sair</button>
                            </div>
                        </div>
                </fieldset>
            </form>
        </div>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/buscaEmTabela.js"></script>
        <script src="js/estilo-venda.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    </body>
</html>
