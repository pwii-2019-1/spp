<?php
include_once 'venda.model.php';
include_once 'itemVenda.model.php';
include_once 'itemVenda.service.php';
include_once 'cliente.model.php';
include_once 'produto.model.php';
include_once 'colaborador.model.php';
include_once 'conexao.php';

class vendaService{

    private $conexao;

    private $pedido;

    
    public function __construct(){
        $this->conexao = Conexao::conectar();
    }

    public function addItens($itemVenda){
        $this->pedido = [            
            "ItemVenda" => [$itemVenda]
        ];
    }

    function exibirPedidos(){    
//         foreach ($this->pedido as $values){
//             echo $values->__get('Venda')->__get('cliente')->__get('nome');
//         }
//         echo $this->pedido['ItemVenda'];
        return $this->pedido;
    }

    public function inserirVenda(Venda $venda){
        $sql = "INSERT INTO venda (idcliente, idcolaborador, descontoTotal, valorTotal, condicaoPgto, dataCompra)" 
            . " VALUES (:cliente, :colaborador, :descontoTotal, :valorTotal, :condicaoPgto, NOW())";

        $sttm = $this->conexao->prepare($sql);

        // Acesso direto ao objeto cliente quando a classe cliente e colaborador estiver pronta
        // $sttm-> bindValue(':cliente',$venda-> __get('cliente')-> __get('id'));

        $sttm->bindValue(':cliente', $venda->__get('cliente')->__get('codigo'));
        $sttm->bindValue(':colaborador', $venda->__get('colaborador')->__get('codigo'));
        $sttm->bindValue(':descontoTotal', $venda->__get('descontoTotal'));
        $sttm->bindValue(':valorTotal', $venda->__get('valorTotal'));
        $sttm->bindValue(':condicaoPgto', $venda->__get('condicaoPgto'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }
}

$cliente1 = new Cliente();
$cliente1->__set("nome", "Welliton");
$cliente1->__set("cpf", "028.897.697-55");
$cliente1->__set("rg", "101850915");
$cliente1->__set("sexo", "Masculino");
$cliente1->__set("dataNascimento", "03031974");
$cliente1->__set("tel", "98455-0300");
$cliente1->__set("email", "wellcerv@hotmail.com");
$cliente1->__set("logradouro", "Av Espatodia");
$cliente1->__set("bairro", "Jardim Sorrizo I");
$cliente1->__set("cidade", "Ceres");
$cliente1->__set("estado", "GO");
$cliente1->__set("cep", "76300-000");

$colaborador1 = new Colaborador();
$colaborador1->__set("nome", "Lucas");
$colaborador1->__set("cpf", "072.000.111-22");
$colaborador1->__set("rg", "123456");
$colaborador1->__set("sexo", "Masculino");
$colaborador1->__set("dataNascimento", "01/01/2000");
$colaborador1->__set("tel", "99999-8888");
$colaborador1->__set("email", "lucas@ifgoiano.edu.gov.br");
$colaborador1->__set("logradouro", "Av Brasil");
$colaborador1->__set("bairro", "Centro");
$colaborador1->__set("cidade", "Ceres");
$colaborador1->__set("estado", "GO");
$colaborador1->__set("cep", "76300-000");
$colaborador1->__set("perfil", "ADM");
$colaborador1->__set("senha", 123);

$produto = new Produto();
$produto->__set("descricao", "Sapatenis");
$produto->__set("numeracao", 40);
$produto->__set("genero", "Masculino");
$produto->__set("cor", "Azul");
$produto->__set("marca", "Olimpicus");
$produto->__set("valorUnitario", 250);
$produto->__set("saldoProduto", 10);

$produto2 = new Produto();
$produto2->__set("descricao", "Sadalha");
$produto2->__set("numeracao", 36);
$produto2->__set("genero", "Feminino");
$produto2->__set("cor", "Rosa");
$produto2->__set("marca", "Santa Lola");
$produto2->__set("valorUnitario", 450);
$produto2->__set("saldoProduto", 25);

// echo "<pre>";
// print_r($cliente1);
// echo "</pre>";

$v = new Venda($cliente1, $colaborador1, 5, 150, "Vista");

$iv = new ItemVenda($v, 1, 10, 240, $produto);

$iv2 = new ItemVenda($v, 2, 0, 900, $produto2);


$teste = [$iv,$iv2];

// echo "<pre>";
// print_r($teste);
// echo "</pre>";

$vs = new vendaService();
$vs->addItens($teste);


echo "<pre>";
print_r($vs->exibirPedidos());
echo "</pre>";


// echo "<pre>";
// print_r($v);
// echo "</pre>";
// echo $v-> __get('codCliente');

// $vs->iserirVenda($v);

// echo "<pre>";
// print_r($vs);
// echo "</pre>";

// print_r(vendaService::conexao);

?>