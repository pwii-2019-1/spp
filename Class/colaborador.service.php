<?php

include_once './colaborador.model.php';
include_once './conexao.php';

class ColaboradorService {
    private $conexao;
    private $colaborador;

    public function __construct(){
        $this->conexao = Conexao::conectar();
    }

    public function CadastrarColaborador(Colaborador $colaborador){
        $sql = "INSERT INTO colaborador (nome, cpf, rg, sexo, dataNascimento, tel, email, logradouro, bairro, cidade, estado, cep, dataCadastro, perfil, senha)"
            ." VALUES (:nome, :cpf, :rg, :sexo, :dataNascimento, :tel, :email, :logradouro, :bairro, :cidade, :estado, :cep, NOW(), :perfil, :senha)";

        $sttm = $this->conexao->prepare($sql);

        $sttm-> bindValue(':nome',$colaborador-> __get('nome'));
        $sttm-> bindValue(':cpf',$colaborador-> __get('cpf'));
        $sttm-> bindValue(':rg', $colaborador-> __get('rg'));
        $sttm-> bindValue(':sexo', $colaborador-> __get('sexo'));
        $sttm-> bindValue(':dataNascimento',$colaborador-> __get('dataNascimento'));
				$sttm-> bindValue(':tel',$colaborador-> __get('tel'));
				$sttm-> bindValue(':email',$colaborador-> __get('email'));
				$sttm-> bindValue(':logradouro', $colaborador-> __get('logradouro'));
				$sttm-> bindValue(':bairro', $colaborador-> __get('bairro'));
				$sttm-> bindValue(':cidade',$colaborador-> __get('cidade'));
				$sttm-> bindValue(':estado',$colaborador-> __get('estado'));
				$sttm-> bindValue(':cep',$colaborador-> __get('cep'));
        $sttm-> bindValue(':perfil',$colaborador-> __get('perfil'));
        $sttm-> bindValue(':senha',$colaborador-> __get('senha'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function BuscarColaborador(Colaborador $colaborador){
        $sql = "SELECT cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), perfil = :perfil, senha = :senha FROM colaborador WHERE nome = :nome";

        $sttm = $this->conexao->prepare($sql);

        $sttm-> bindValue(':nome',$colaborador-> __get('nome'));
        $sttm-> bindValue(':cpf',$colaborador-> __get('cpf'));
        $sttm-> bindValue(':rg', $colaborador-> __get('rg'));
        $sttm-> bindValue(':sexo', $colaborador-> __get('sexo'));
        $sttm-> bindValue(':dataNascimento',$colaborador-> __get('dataNascimento'));
        $sttm-> bindValue(':tel',$colaborador-> __get('tel'));
        $sttm-> bindValue(':email',$colaborador-> __get('email'));
        $sttm-> bindValue(':logradouro', $colaborador-> __get('logradouro'));
        $sttm-> bindValue(':bairro', $colaborador-> __get('bairro'));
        $sttm-> bindValue(':cidade',$colaborador-> __get('cidade'));
        $sttm-> bindValue(':estado',$colaborador-> __get('estado'));
        $sttm-> bindValue(':cep',$colaborador-> __get('cep'));
        $sttm-> bindValue(':perfil',$colaborador-> __get('perfil'));
        $sttm-> bindValue(':senha',$colaborador-> __get('senha'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function AlterarColaborador(Colaborador $colaborador){
        $sql = 'UPDATE colaborador SET cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), perfil = :perfil, senha = :senha WHERE nome = :nome';

        $sttm = $this->conexao->prepare($sql);

        $sttm-> bindValue(':nome',$colaborador-> __get('nome'));
        $sttm-> bindValue(':cpf',$colaborador-> __get('cpf'));
        $sttm-> bindValue(':rg', $colaborador-> __get('rg'));
        $sttm-> bindValue(':sexo', $colaborador-> __get('sexo'));
        $sttm-> bindValue(':dataNascimento',$colaborador-> __get('dataNascimento'));
        $sttm-> bindValue(':tel', $colaborador-> __get('tel'));
        $sttm-> bindValue(':email', $colaborador-> __get('email'));
        $sttm-> bindValue(':logradouro', $colaborador-> __get('logradouro'));
        $sttm-> bindValue(':bairro', $colaborador-> __get('bairro'));
        $sttm-> bindValue(':cidade', $colaborador-> __get('cidade'));
        $sttm-> bindValue(':estado', $colaborador-> __get('estado'));
        $sttm-> bindValue(':cep', $colaborador-> __get('cep'));
        $sttm-> bindValue(':perfil',$colaborador-> __get('perfil'));
        $sttm-> bindValue(':senha',$colaborador-> __get('senha'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function ExcluirColaborador(Colaborador $colaborador){
        $sql = 'DELETE FROM colaborador WHERE nome = :nome, cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), perfil = :perfil, senha = :senha';

        $sttm = $this->conexao->prepare($sql);

        $sttm-> bindValue(':nome',$colaborador-> __get('nome'));
        $sttm-> bindValue(':cpf',$colaborador-> __get('cpf'));
        $sttm-> bindValue(':rg', $colaborador-> __get('rg'));
        $sttm-> bindValue(':sexo', $colaborador-> __get('sexo'));
        $sttm-> bindValue(':dataNascimento', $colaborador-> __get('dataNascimento'));
        $sttm-> bindValue(':tel', $colaborador-> __get('tel'));
        $sttm-> bindValue(':email', $colaborador-> __get('email'));
        $sttm-> bindValue(':logradouro', $colaborador-> __get('logradouro'));
        $sttm-> bindValue(':bairro', $colaborador-> __get('bairro'));
        $sttm-> bindValue(':cidade', $colaborador-> __get('cidade'));
        $sttm-> bindValue(':estado', $colaborador-> __get('estado'));
        $sttm-> bindValue(':cep', $colaborador-> __get('cep'));
        $sttm-> bindValue(':perfil', $colaborador-> __get('perfil'));
        $sttm-> bindValue(':senha', $colaborador-> __get('senha'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }
}

$co = new Colaborador("Ana", "234.654.789-89", "5363728", "Feminino", "20/09/1987", "62 98789-0000", "ana@gmail.com", "Rua A", "Jardim Sorriso", "Itapaci", "GO", "76.360-000", "Administrador", "123456");

echo "<pre>";
print_r($co);
echo "</pre>";

$cos = new ColaboradorService();
$cos->CadastrarColaborador($co);

echo "<pre>";
print_r($co);
echo "</pre>";

$cos = new ColaboradorService();
$cos->BuscarColaborador($co);

echo "<pre>";
print_r($co);
echo "</pre>";

$cos = new ColaboradorService();
$cos->AlterarColaborador($co);

echo "<pre>";
print_r($co);
echo "</pre>";

$cos = new ColaboradorService();
$cos->ExcluirColaborador($co);

echo "<pre>";
print_r($co);
echo "</pre>";

?>
