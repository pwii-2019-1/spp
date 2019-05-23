<?php
include_once './cliente.model.php';
include_once './conexao.php';

class ClienteService{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::conectar();
    }

    public function InserirCliente(Cliente $cliente){
        $sql = 'INSERT INTO cliente (nome, cpf, rg, sexo, dataNascimento, tel, email, logradouro, bairro, cidade, estado, cep, dataCadastro, dataUltimaCompra)' 
            . ' VALUES (:nome, :cpf, :rg, :sexo, :dataNascimento, :tel, :email, :logradouro, :bairro, :cidade, :estado, :cep, NOW(), NOW())';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome', $cliente->__get('nome'));
        $sttm->bindValue(':cpf', $cliente->__get('cpf'));
        $sttm->bindValue(':rg', $cliente->__get('rg'));
        $sttm->bindValue(':sexo', $cliente->__get('sexo'));
        $sttm->bindValue(':dataNascimento', $cliente->__get('dataNascimento'));
        $sttm->bindValue(':tel', $cliente->__get('tel'));
        $sttm->bindValue(':email', $cliente->__get('email'));
        $sttm->bindValue(':logradouro', $cliente->__get('logradouro'));
        $sttm->bindValue(':bairro', $cliente->__get('bairro'));
        $sttm->bindValue(':cidade', $cliente->__get('cidade'));
        $sttm->bindValue(':estado', $cliente->__get('estado'));
        $sttm->bindValue(':cep', $cliente->__get('cep'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
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

    public function BuscarCliente(Cliente $cliente){
        $sql = "SELECT cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), dataUltimaCompra = NOW() FROM cliente WHERE nome = :nome";

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome', $cliente->__get('nome'));
        $sttm->bindValue(':cpf', $cliente->__get('cpf'));
        $sttm->bindValue(':rg', $cliente->__get('rg'));
        $sttm->bindValue(':sexo', $cliente->__get('sexo'));
        $sttm->bindValue(':dataNascimento', $cliente->__get('dataNascimento'));
        $sttm->bindValue(':tel', $cliente->__get('tel'));
        $sttm->bindValue(':email', $cliente->__get('email'));
        $sttm->bindValue(':logradouro', $cliente->__get('logradouro'));
        $sttm->bindValue(':bairro', $cliente->__get('bairro'));
        $sttm->bindValue(':cidade', $cliente->__get('cidade'));
        $sttm->bindValue(':estado', $cliente->__get('estado'));
        $sttm->bindValue(':cep', $cliente->__get('cep'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function AlterarCliente(Cliente $cliente)
    {
        $sql = 'UPDATE cliente SET cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), dataUltimaCompra = NOW() WHERE nome = :nome';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome', $cliente->__get('nome'));
        $sttm->bindValue(':cpf', $cliente->__get('cpf'));
        $sttm->bindValue(':rg', $cliente->__get('rg'));
        $sttm->bindValue(':sexo', $cliente->__get('sexo'));
        $sttm->bindValue(':dataNascimento', $cliente->__get('dataNascimento'));
        $sttm->bindValue(':tel', $cliente->__get('tel'));
        $sttm->bindValue(':email', $cliente->__get('email'));
        $sttm->bindValue(':logradouro', $cliente->__get('logradouro'));
        $sttm->bindValue(':bairro', $cliente->__get('bairro'));
        $sttm->bindValue(':cidade', $cliente->__get('cidade'));
        $sttm->bindValue(':estado', $cliente->__get('estado'));
        $sttm->bindValue(':cep', $cliente->__get('cep'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function ExcluirCliente(Cliente $cliente)
    {
        $sql = 'DELETE FROM cliente WHERE nome = :nome, cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), dataUltimaCompra = NOW()';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome', $cliente->__get('nome'));
        $sttm->bindValue(':cpf', $cliente->__get('cpf'));
        $sttm->bindValue(':rg', $cliente->__get('rg'));
        $sttm->bindValue(':sexo', $cliente->__get('sexo'));
        $sttm->bindValue(':dataNascimento', $cliente->__get('dataNascimento'));
        $sttm->bindValue(':tel', $cliente->__get('tel'));
        $sttm->bindValue(':email', $cliente->__get('email'));
        $sttm->bindValue(':logradouro', $cliente->__get('logradouro'));
        $sttm->bindValue(':bairro', $cliente->__get('bairro'));
        $sttm->bindValue(':cidade', $cliente->__get('cidade'));
        $sttm->bindValue(':estado', $cliente->__get('estado'));
        $sttm->bindValue(':cep', $cliente->__get('cep'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }
}


// $c = new Cliente("Ana Maria", "234.654.789-09", "5363728", "Feminino", "20/09/1987", "62 98789-0000", "anamaria@gmail.com", "Rua A", "Jardim Sorriso", "Itapaci", "GO", "76.360-000");

// echo "<pre>";
// print_r($c);
// echo "</pre>";

// $cs = new ClienteService();
// $cs->CadastrarCliente($c);



// echo "<pre>";
// print_r($cs);
// echo "</pre>";

// $cs = new ClienteService();
// $cs->BuscarCliente($c);

// echo "<pre>";
// print_r($cs);
// echo "</pre>";

// $cs = new ClienteService();
// $cs->AlterarCliente($c);

// echo "<pre>";
// print_r($cs);
// echo "</pre>";

// $cs = new ClienteService();
// $cs->ExcluirCliente($c);

// echo "<pre>";
// print_r($cs);
// echo "</pre>";


?>
