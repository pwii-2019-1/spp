<?php
include_once 'venda.model.php';
include_once 'itemVenda.service.php';
include_once 'cliente.service.php';
include_once 'produto.service.php';
include_once 'colaborador.service.php';
include_once 'conexao.php';

class vendaService{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::conectar();
    }
    
    // Metodo para gravar as tabelas vendas e itensVendas simultaneamente no banco de dados.
    public function inserirVenda(Venda $venda){
        
        try {

            $sql = "INSERT INTO venda (idcliente, idcolaborador, descontoTotal, valorTotal, condicaoPgto, dataCompra)" 
                . " VALUES (:cliente, :colaborador, :descontoTotal, :valorTotal, :condicaoPgto, NOW())";

            $sttm = $this->conexao->prepare($sql);            
            $sttm->bindValue(':cliente', $venda->__get('cliente')->__get('codcliente'));
            $sttm->bindValue(':colaborador', $venda->__get('colaborador')->__get('codcolaborador'));
            $sttm->bindValue(':descontoTotal', $venda->__get('descontoTotal'));
            $sttm->bindValue(':valorTotal', $venda->__get('valorTotal'));
            $sttm->bindValue(':condicaoPgto', $venda->__get('condicaoPgto'));
            $sttm->execute();

            // pegar o id da venda que acabou de ser inserida no Banco para poder gravar este id no item da venda.
            $idVendaInserida = $this->conexao->lastInsertId();
            
            // Instancia  um objeto da classe ItemVendaService para ser utilizado no laço foreach abaixo.
            $is = new ItemVendaService();
            
            // Percorre o Array para pegar os valores dos atributos e levar para o metodo inserirItemVenda da classe ItemVenda.service
            foreach ($venda->__get('itens') as $item) {
                $is->inserirItemVenda($item, $idVendaInserida);
            }
            
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }
}



//----------------------------------------------------------------------------------

// Exemplo do Lucas para compor um objeto a partir da consuta do Banco
$ps = new ProdutoService();
$p = $ps->getProdutoByID(1);
$p2 = $ps->getProdutoByID(2);

// echo "<pre>";
// print_r($p2);
// echo "</pre>";

$cli = new ClienteService();
$c = $cli->getClienteByID(1);

// echo "<pre>";
// print_r($c);
// echo "</pre>";

$col =  new ColaboradorService();
$co = $col->getColaboradorByID(1);

// echo "<pre>";
// print_r($co);
// echo "</pre>";

$v = new Venda($c, $co, "Vista");

$iv = new ItemVenda(1, 10, $p);
$iv->calcularValorTotalItem();
$iv2 = new ItemVenda(2, 10, $p2);
$iv2->calcularValorTotalItem();
$v->addItens($iv);
$v->addItens($iv2);

echo "<pre>";
print_r($v);
echo "</pre>";

$vs = new vendaService();
$vs->inserirVenda($v);

//----------------------------------------------------------------------------------



// $cliente1 = new Cliente();
// $cliente1->__set("codigo", 1);
// $cliente1->__set("nome", "Welliton");
// $cliente1->__set("cpf", "028.897.697-55");
// $cliente1->__set("rg", "101850915");
// $cliente1->__set("sexo", "Masculino");
// $cliente1->__set("dataNascimento", "03031974");
// $cliente1->__set("tel", "98455-0300");
// $cliente1->__set("email", "wellcerv@hotmail.com");
// $cliente1->__set("logradouro", "Av Espatodia");
// $cliente1->__set("bairro", "Jardim Sorrizo I");
// $cliente1->__set("cidade", "Ceres");
// $cliente1->__set("estado", "GO");
// $cliente1->__set("cep", "76300-000");

// $colaborador1 = new Colaborador();
// $colaborador1->__set("codigo", 1);
// $colaborador1->__set("nome", "Lucas");
// $colaborador1->__set("cpf", "072.000.111-22");
// $colaborador1->__set("rg", "123456");
// $colaborador1->__set("sexo", "Masculino");
// $colaborador1->__set("dataNascimento", "01/01/2000");
// $colaborador1->__set("tel", "99999-8888");
// $colaborador1->__set("email", "lucas@ifgoiano.edu.gov.br");
// $colaborador1->__set("logradouro", "Av Brasil");
// $colaborador1->__set("bairro", "Centro");
// $colaborador1->__set("cidade", "Ceres");
// $colaborador1->__set("estado", "GO");
// $colaborador1->__set("cep", "76300-000");
// $colaborador1->__set("perfil", "ADM");
// $colaborador1->__set("senha", 123);


// $produto = new Produto();
// $produto->__set("codProduto", 1);
// $produto->__set("descricao", "Sapatenis");
// $produto->__set("numeracao", 40);
// $produto->__set("genero", "Masculino");
// $produto->__set("cor", "Azul");
// $produto->__set("marca", "Olimpicus");
// $produto->__set("valorUnitario", 260);
// $produto->__set("saldoProduto", 10);

// $produto2 = new Produto();
// $produto2->__set("codProduto", 2);
// $produto2->__set("descricao", "Sadalha");
// $produto2->__set("numeracao", 36);
// $produto2->__set("genero", "Feminino");
// $produto2->__set("cor", "Rosa");
// $produto2->__set("marca", "Santa Lola");
// $produto2->__set("valorUnitario", 260);
// $produto2->__set("saldoProduto", 25);

// echo "<pre>";
// print_r($cliente1);
// echo "</pre>";

// $v = new Venda($cliente1, $colaborador1, "Vista");

// $iv = new ItemVenda(1, 10, $produto);
// $iv->calcularValorTotalItem();
// $iv2 = new ItemVenda(2, 10, $produto2);
// $iv2->calcularValorTotalItem();
// $v->addItens($iv);
// $v->addItens($iv2);

// echo "<pre>";
// print_r($v);
// echo "</pre>";

// $vs = new vendaService();
// $vs->inserirVenda($v);

// echo "<pre>";
// print_r($v);
// echo "</pre>";

// echo "<pre>";
// print_r($vs);
// echo "</pre>";

// print_r(vendaService::conexao);

?>