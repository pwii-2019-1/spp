<?php

include_once 'cliente.model.php';
include_once 'conexao.php';

class ClienteService {
    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::conectar();
    }

    public function CadastrarCliente(Cliente $cliente){
      $sql = 'INSERT INTO cliente (nome, cpf, rg, sexo, dataNascimento, tel, email, logradouro, bairro, cidade, estado, cep, dataCadastro, dataUltimaCompra)'
              .' VALUES (:nome, :cpf, :rg, :sexo, :dataNascimento, :tel, :email, :logradouro, :bairro, :cidade, :estado, :cep, NOW(), NOW())';

      $sttm = $this->conexao->prepare($sql);

      $sttm->bindValue(':nome',$cliente->__get('nome'));
      $sttm->bindValue(':cpf',$cliente->__get('cpf'));
      $sttm->bindValue(':rg',$cliente->__get('rg'));
      $sttm->bindValue(':sexo',$cliente->__get('sexo'));
      $sttm->bindValue(':dataNascimento',$cliente->__get('dataNascimento'));
    	$sttm->bindValue(':tel',$cliente->__get('tel'));
    	$sttm->bindValue(':email',$cliente->__get('email'));
    	$sttm->bindValue(':logradouro',$cliente->__get('logradouro'));
    	$sttm->bindValue(':bairro',$cliente->__get('bairro'));
    	$sttm->bindValue(':cidade',$cliente->__get('cidade'));
    	$sttm->bindValue(':estado',$cliente->__get('estado'));
    	$sttm->bindValue(':cep',$cliente->__get('cep'));

        try {
            $sttm->execute();
            echo 'Cadastrado com sucesso!';
          } catch (PDOException $exc) {
                echo $exc->getTraceAsString();
            echo 'Erro ao cadastrar!';
          }
      }

      public function getClienteByID($id) {
        $sql = "SELECT * FROM cliente WHERE idcliente = :id";

        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':id', $id);

          try {
              $sttm->execute();
            } catch (PDOException $exc) {
                echo $exc->getTraceAsString();
            }

        $resul = $sttm->fetchAll(PDO::FETCH_ASSOC);

        $cliente = new Produto();
        $cliente->__set('codcliente', $resul[0]['idcliente']);
        $cliente->__set('nome', $resul[0]['nome']);
        $cliente->__set('cpf', $resul[0]['cpf']);
        $cliente->__set('rg', $resul[0]['rg']);
        $cliente->__set('sexo', $resul[0]['sexo']);
        $cliente->__set('dataNascimento', $resul[0]['dataNascimento']);
        $cliente->__set('tel', $resul[0]['tel']);
        $cliente->__set('email', $resul[0]['email']);
        $cliente->__set('logradouro', $resul[0]['logradouro']);
        $cliente->__set('bairro', $resul[0]['bairro']);
        $cliente->__set('cidade', $resul[0]['cidade']);
        $cliente->__set('estado', $resul[0]['estado']);
        $cliente->__set('cep', $resul[0]['cep']);
        $cliente->__set('dataCadastro', $resul[0]['dataCadastro']);
        $cliente->__set('dataUltimaCompra', $resul[0]['dataUltimaCompra']);

        return $cliente;
          }

    public function AlterarCliente(Cliente $cliente){
      $sql = 'UPDATE cliente SET nome = :nome, cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), dataUltimaCompra = NOW() WHERE idcliente = :idcliente';

      $sttm = $this->conexao->prepare($sql);

      $sttm->bindValue(':nome',$cliente->__get('nome'));
      $sttm->bindValue(':cpf',$cliente->__get('cpf'));
      $sttm->bindValue(':rg', $cliente->__get('rg'));
      $sttm->bindValue(':sexo',$cliente->__get('sexo'));
      $sttm->bindValue(':dataNascimento',$cliente->__get('dataNascimento'));
      $sttm->bindValue(':tel',$cliente->__get('tel'));
      $sttm->bindValue(':email',$cliente->__get('email'));
      $sttm->bindValue(':logradouro',$cliente->__get('logradouro'));
      $sttm->bindValue(':bairro',$cliente->__get('bairro'));
      $sttm->bindValue(':cidade',$cliente->__get('cidade'));
      $sttm->bindValue(':estado',$cliente->__get('estado'));
      $sttm->bindValue(':cep',$cliente->__get('cep'));
      $sttm->bindValue(':idcliente',$cliente->__get('idcliente'));

        try {
            $sttm->execute();
            echo 'Alterado com sucesso!';
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            echo 'Erro ao alterar!';
        }
    }

    public function ExcluirCliente(Cliente $cliente){
        $sql = 'DELETE FROM cliente WHERE idcliente = :idcliente';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':idcliente',$cliente->__get('idcliente'));

        try {
            $sttm->execute();
            echo 'Excluído com sucesso!';
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            echo 'Erro ao excluir!';
        }
    }

    public function BuscarCliente(Cliente $cliente){
        $sql = "SELECT nome = :nome, cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), dataUltimaCompra = NOW() FROM cliente WHERE idcliente = :idcliente";

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome',$cliente->__get('nome'));
        $sttm->bindValue(':cpf',$cliente->__get('cpf'));
        $sttm->bindValue(':rg',$cliente->__get('rg'));
        $sttm->bindValue(':sexo',$cliente->__get('sexo'));
        $sttm->bindValue(':dataNascimento',$cliente->__get('dataNascimento'));
        $sttm->bindValue(':tel',$cliente->__get('tel'));
        $sttm->bindValue(':email',$cliente->__get('email'));
        $sttm->bindValue(':logradouro',$cliente->__get('logradouro'));
        $sttm->bindValue(':bairro',$cliente->__get('bairro'));
        $sttm->bindValue(':cidade',$cliente->__get('cidade'));
        $sttm->bindValue(':estado',$cliente->__get('estado'));
        $sttm->bindValue(':cep',$cliente->__get('cep'));
        $sttm->bindValue(':idcliente',$cliente->__get('idcliente'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function BuscarPorNome(Cliente $cliente){
        $sql = 'SELECT FROM cliente WHERE nome = :nome';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome',$cliente->__get('nome'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function ListarTodos(Cliente $cliente){
        $sql = 'SELECT * FROM cliente';

        $sttm = $this->conexao->prepare($sql);

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }
    }

// // // Para cadastrar novo cliente
/*$c = new Cliente("Marcela", "267.654.780-19", "789637524", "Feminino", "20/09/1987", "62 98789-9876", "anapaula@gmail.com", "Rua H", "Centro", "Rubiataba", "GO", "76.37-000");
echo "<pre>";
print_r($c);
echo "</pre>";
$cs = new ClienteService();
$cs->CadastrarCliente($c);
echo "<pre>";
print_r($cs);
echo "</pre>";*/
// // //

// // // Para alterar cliente
/*$c = new Cliente("Marcela", "267.654.780-19", "789637524", "Feminino", "20/09/1987", "62 98789-9876", "anapaula@gmail.com", "Rua H", "Centro", "Rubiataba", "GO", "76.37-000");
$c->__set("idcliente", 3);
echo "<pre>";
print_r($c);
echo "</pre>";
$cs = new ClienteService();
$cs->AlterarCliente($c);
echo "<pre>";
print_r($c);
echo "</pre>";*/
// // //

// // // Para excluir cliente
/*$c = new Cliente("Marcela", "267.654.780-19", "789637524", "Feminino", "20/09/1987", "62 98789-9876", "anapaula@gmail.com", "Rua H", "Centro", "Rubiataba", "GO", "76.37-000");
$c->__set("idcliente", "1");
echo "<pre>";
print_r($c);
echo "</pre>";
$cs = new ClienteService();
$cs->ExcluirCliente($c);
echo "<pre>";
print_r($c);
echo "</pre>";*/
// // //

// // // Para buscar cliente
/*$c = new Cliente("Marcela", "267.654.780-19", "789637524", "Feminino", "20/09/1987", "62 98789-9876", "anapaula@gmail.com", "Rua H", "Centro", "Rubiataba", "GO", "76.37-000");
$c->__set("idcliente", 3);
echo "<pre>";
print_r($c);
echo "</pre>";
$cs = new ClienteService();
$cs->BuscarCliente($c);
echo "<pre>";
print_r($cs);
echo "</pre>";*/
// // //

// // // Para buscar por nome
/*$c = new Cliente("Marcela", "267.654.780-19", "789637524", "Feminino", "20/09/1987", "62 98789-9876", "anapaula@gmail.com", "Rua H", "Centro", "Rubiataba", "GO", "76.37-000");
$c->__set("nome", "Marcela");
echo "</pre>";
print_r($c);
echo "</pre>";
$cs = new ClienteService();
$cs->BuscarPorNome($c);
echo "<pre>";
print_r($cs);
echo "</pre>";*/
// // //

// // // Para listar todos os clientes
/*$c = new Cliente("", "", "", "", "", "", "", "", "", "", "", "");
echo "<pre>";
print_r($c);
echo "</pre>";
$cs = new ClienteService();
$cs->ListarTodos($c);
echo "<pre>";
print_r($cs);
echo "</pre>";*/
// // //

?>
