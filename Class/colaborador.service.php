<?php
<<<<<<< HEAD

include_once 'colaborador.model.php';
include_once 'conexao.php';
=======
include_once './colaborador.model.php';
include_once './conexao.php';
>>>>>>> 036694f25717b7b609f699e810c1a6372a5bd517

class ColaboradorService
{

    private $conexao;

    private $colaborador;

    public function __construct(){
        
        $this->conexao = Conexao::conectar();
    }

    public function InserirColaborador(Colaborador $colaborador){
        
        $sql = "INSERT INTO colaborador (nome, cpf, rg, sexo, dataNascimento, tel, email, logradouro, bairro, cidade, estado, cep, dataCadastro, perfil, senha)" 
            . " VALUES (:nome, :cpf, :rg, :sexo, :dataNascimento, :tel, :email, :logradouro, :bairro, :cidade, :estado, :cep, NOW(), :perfil, :senha)";

        $sttm = $this->conexao->prepare($sql);

<<<<<<< HEAD
        $sttm->bindValue(':nome',$colaborador->__get('nome'));
        $sttm->bindValue(':cpf',$colaborador->__get('cpf'));
        $sttm->bindValue(':rg', $colaborador->__get('rg'));
        $sttm->bindValue(':sexo',$colaborador->__get('sexo'));
        $sttm->bindValue(':dataNascimento',$colaborador->__get('dataNascimento'));
				$sttm->bindValue(':tel',$colaborador->__get('tel'));
				$sttm->bindValue(':email',$colaborador->__get('email'));
				$sttm->bindValue(':logradouro',$colaborador->__get('logradouro'));
				$sttm->bindValue(':bairro',$colaborador->__get('bairro'));
				$sttm->bindValue(':cidade',$colaborador->__get('cidade'));
				$sttm->bindValue(':estado',$colaborador->__get('estado'));
				$sttm->bindValue(':cep',$colaborador->__get('cep'));
        $sttm->bindValue(':perfil',$colaborador->__get('perfil'));
        $sttm->bindValue(':senha',$colaborador->__get('senha'));
=======
        $sttm->bindValue(':nome', $colaborador->__get('nome'));
        $sttm->bindValue(':cpf', $colaborador->__get('cpf'));
        $sttm->bindValue(':rg', $colaborador->__get('rg'));
        $sttm->bindValue(':sexo', $colaborador->__get('sexo'));
        $sttm->bindValue(':dataNascimento', $colaborador->__get('dataNascimento'));
        $sttm->bindValue(':tel', $colaborador->__get('tel'));
        $sttm->bindValue(':email', $colaborador->__get('email'));
        $sttm->bindValue(':logradouro', $colaborador->__get('logradouro'));
        $sttm->bindValue(':bairro', $colaborador->__get('bairro'));
        $sttm->bindValue(':cidade', $colaborador->__get('cidade'));
        $sttm->bindValue(':estado', $colaborador->__get('estado'));
        $sttm->bindValue(':cep', $colaborador->__get('cep'));
        $sttm->bindValue(':perfil', $colaborador->__get('perfil'));
        $sttm->bindValue(':senha', $colaborador->__get('senha'));
>>>>>>> 036694f25717b7b609f699e810c1a6372a5bd517

        try {
            $sttm->execute();
            echo 'Cadastrado com sucesso!';
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            echo 'Erro ao cadastrar!';
        }
    }
    
    public function getColaboradorByID($id) {
        $sql = "SELECT * FROM colaborador WHERE idcolaborador = :id";
        
        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':id', $id);
        
        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
        
        $resul = $sttm->fetchAll(PDO::FETCH_ASSOC);
        
        $colaborador = new Produto();
        $colaborador->__set('codcolaborador', $resul[0]['idcolaborador']);
        $colaborador->__set('nome', $resul[0]['nome']);
        $colaborador->__set('cpf', $resul[0]['cpf']);
        $colaborador->__set('rg', $resul[0]['rg']);
        $colaborador->__set('sexo', $resul[0]['sexo']);
        $colaborador->__set('dataNascimento', $resul[0]['dataNascimento']);
        $colaborador->__set('senha', $resul[0]['senha']);
        $colaborador->__set('perfil', $resul[0]['perfil']);
        $colaborador->__set('tel', $resul[0]['tel']);
        $colaborador->__set('email', $resul[0]['email']);
        $colaborador->__set('logradouro', $resul[0]['logradouro']);
        $colaborador->__set('bairro', $resul[0]['bairro']);
        $colaborador->__set('cidade', $resul[0]['cidade']);
        $colaborador->__set('estado', $resul[0]['estado']);
        $colaborador->__set('cep', $resul[0]['cep']);
        $colaborador->__set('dataCadastro', $resul[0]['dataCadastro']);
        
        
        return $colaborador;
    }

<<<<<<< HEAD
    public function getColaboradorByID($id) {
        $sql = "SELECT * FROM colaborador WHERE idcolaborador = :id";

        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':id', $id);
=======
    public function BuscarColaborador(Colaborador $colaborador){
        
        $sql = "SELECT cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), perfil = :perfil, senha = :senha FROM colaborador WHERE nome = :nome";

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome', $colaborador->__get('nome'));
        $sttm->bindValue(':cpf', $colaborador->__get('cpf'));
        $sttm->bindValue(':rg', $colaborador->__get('rg'));
        $sttm->bindValue(':sexo', $colaborador->__get('sexo'));
        $sttm->bindValue(':dataNascimento', $colaborador->__get('dataNascimento'));
        $sttm->bindValue(':tel', $colaborador->__get('tel'));
        $sttm->bindValue(':email', $colaborador->__get('email'));
        $sttm->bindValue(':logradouro', $colaborador->__get('logradouro'));
        $sttm->bindValue(':bairro', $colaborador->__get('bairro'));
        $sttm->bindValue(':cidade', $colaborador->__get('cidade'));
        $sttm->bindValue(':estado', $colaborador->__get('estado'));
        $sttm->bindValue(':cep', $colaborador->__get('cep'));
        $sttm->bindValue(':perfil', $colaborador->__get('perfil'));
        $sttm->bindValue(':senha', $colaborador->__get('senha'));
>>>>>>> 036694f25717b7b609f699e810c1a6372a5bd517

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }

        $resul = $sttm->fetchAll(PDO::FETCH_ASSOC);

        $colaborador = new Produto();
        $colaborador->__set('codcolaborador', $resul[0]['idcolaborador']);
        $colaborador->__set('nome', $resul[0]['nome']);
        $colaborador->__set('cpf', $resul[0]['cpf']);
        $colaborador->__set('rg', $resul[0]['rg']);
        $colaborador->__set('sexo', $resul[0]['sexo']);
        $colaborador->__set('dataNascimento', $resul[0]['dataNascimento']);
        $colaborador->__set('senha', $resul[0]['senha']);
        $colaborador->__set('perfil', $resul[0]['perfil']);
        $colaborador->__set('tel', $resul[0]['tel']);
        $colaborador->__set('email', $resul[0]['email']);
        $colaborador->__set('logradouro', $resul[0]['logradouro']);
        $colaborador->__set('bairro', $resul[0]['bairro']);
        $colaborador->__set('cidade', $resul[0]['cidade']);
        $colaborador->__set('estado', $resul[0]['estado']);
        $colaborador->__set('cep', $resul[0]['cep']);
        $colaborador->__set('dataCadastro', $resul[0]['dataCadastro']);

        return $colaborador;
    }

    public function AlterarColaborador(Colaborador $colaborador){
<<<<<<< HEAD
        $sql = 'UPDATE colaborador SET nome = :nome, cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), perfil = :perfil, senha = :senha WHERE idcolaborador = :idcolaborador';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome',$colaborador->__get('nome'));
        $sttm->bindValue(':cpf',$colaborador->__get('cpf'));
        $sttm->bindValue(':rg', $colaborador->__get('rg'));
        $sttm->bindValue(':sexo',$colaborador->__get('sexo'));
        $sttm->bindValue(':dataNascimento',$colaborador->__get('dataNascimento'));
        $sttm->bindValue(':tel',$colaborador->__get('tel'));
        $sttm->bindValue(':email',$colaborador->__get('email'));
        $sttm->bindValue(':logradouro',$colaborador->__get('logradouro'));
        $sttm->bindValue(':bairro',$colaborador->__get('bairro'));
        $sttm->bindValue(':cidade',$colaborador->__get('cidade'));
        $sttm->bindValue(':estado',$colaborador->__get('estado'));
        $sttm->bindValue(':cep',$colaborador->__get('cep'));
        $sttm->bindValue(':perfil',$colaborador->__get('perfil'));
        $sttm->bindValue(':senha',$colaborador->__get('senha'));
        $sttm->bindValue(':idcolaborador',$colaborador->__get('idcolaborador'));
=======
        
        $sql = 'UPDATE colaborador SET cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), perfil = :perfil, senha = :senha WHERE nome = :nome';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome', $colaborador->__get('nome'));
        $sttm->bindValue(':cpf', $colaborador->__get('cpf'));
        $sttm->bindValue(':rg', $colaborador->__get('rg'));
        $sttm->bindValue(':sexo', $colaborador->__get('sexo'));
        $sttm->bindValue(':dataNascimento', $colaborador->__get('dataNascimento'));
        $sttm->bindValue(':tel', $colaborador->__get('tel'));
        $sttm->bindValue(':email', $colaborador->__get('email'));
        $sttm->bindValue(':logradouro', $colaborador->__get('logradouro'));
        $sttm->bindValue(':bairro', $colaborador->__get('bairro'));
        $sttm->bindValue(':cidade', $colaborador->__get('cidade'));
        $sttm->bindValue(':estado', $colaborador->__get('estado'));
        $sttm->bindValue(':cep', $colaborador->__get('cep'));
        $sttm->bindValue(':perfil', $colaborador->__get('perfil'));
        $sttm->bindValue(':senha', $colaborador->__get('senha'));
>>>>>>> 036694f25717b7b609f699e810c1a6372a5bd517

        try {
            $sttm->execute();
            echo 'Alterado com sucesso!';
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            echo 'Erro ao alterar!';

        }
    }

    public function ExcluirColaborador(Colaborador $colaborador){
<<<<<<< HEAD
        $sql = 'DELETE FROM colaborador WHERE idcolaborador = :idcolaborador';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':idcolaborador',$colaborador->__get('idcolaborador'));
=======
        
        $sql = 'DELETE FROM colaborador WHERE nome = :nome, cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), perfil = :perfil, senha = :senha';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome', $colaborador->__get('nome'));
        $sttm->bindValue(':cpf', $colaborador->__get('cpf'));
        $sttm->bindValue(':rg', $colaborador->__get('rg'));
        $sttm->bindValue(':sexo', $colaborador->__get('sexo'));
        $sttm->bindValue(':dataNascimento', $colaborador->__get('dataNascimento'));
        $sttm->bindValue(':tel', $colaborador->__get('tel'));
        $sttm->bindValue(':email', $colaborador->__get('email'));
        $sttm->bindValue(':logradouro', $colaborador->__get('logradouro'));
        $sttm->bindValue(':bairro', $colaborador->__get('bairro'));
        $sttm->bindValue(':cidade', $colaborador->__get('cidade'));
        $sttm->bindValue(':estado', $colaborador->__get('estado'));
        $sttm->bindValue(':cep', $colaborador->__get('cep'));
        $sttm->bindValue(':perfil', $colaborador->__get('perfil'));
        $sttm->bindValue(':senha', $colaborador->__get('senha'));
>>>>>>> 036694f25717b7b609f699e810c1a6372a5bd517

        try {
            $sttm->execute();
            echo 'Excluído com sucesso!';
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            echo 'Erro ao excluir!';
        }
    }

<<<<<<< HEAD
    public function BuscarColaborador(Colaborador $colaborador){
        $sql = "SELECT nome = :nome, cpf = :cpf, rg = :rg, sexo = :sexo, dataNascimento = :dataNascimento, tel = :tel, email = :email, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, dataCadastro = NOW(), perfil = :perfil, senha = :senha FROM colaborador WHERE idcolaborador = :idcolaborador";

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':nome',$colaborador->__get('nome'));
        $sttm->bindValue(':cpf',$colaborador->__get('cpf'));
        $sttm->bindValue(':rg', $colaborador->__get('rg'));
        $sttm->bindValue(':sexo',$colaborador->__get('sexo'));
        $sttm->bindValue(':dataNascimento',$colaborador->__get('dataNascimento'));
        $sttm->bindValue(':tel',$colaborador->__get('tel'));
        $sttm->bindValue(':email',$colaborador->__get('email'));
        $sttm->bindValue(':logradouro',$colaborador->__get('logradouro'));
        $sttm->bindValue(':bairro',$colaborador->__get('bairro'));
        $sttm->bindValue(':cidade',$colaborador->__get('cidade'));
        $sttm->bindValue(':estado',$colaborador->__get('estado'));
        $sttm->bindValue(':cep',$colaborador->__get('cep'));
        $sttm->bindValue(':perfil',$colaborador->__get('perfil'));
        $sttm->bindValue(':senha',$colaborador->__get('senha'));
        $sttm->bindValue(':idcolaborador',$colaborador->__get('idcolaborador'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }


}

/*$co = new Colaborador("Roberto", "123.654.776-89", "456448", "Masculino", "06/09/1992", "62 99789-1234", "roberto@gmail.com", "Rua N", "Jardim Morada Nova", "Ceres", "GO", "76.350-000", "Vendedor", "12345");
echo "<pre>";
print_r($co);
echo "</pre>";
$cos = new ColaboradorService();
$cos->CadastrarColaborador($co);
echo "<pre>";
print_r($co);
echo "</pre>";*/

// // // Para alterar colaborador
/*$co = new Colaborador("Roberto Casaldáliga", "123.654.776-89", "456448", "Masculino", "06/09/1992", "62 99789-1234", "roberto@gmail.com", "Rua N", "Jardim Morada Nova", "Ceres", "GO", "76.350-000", "Vendedor", "12345");
$co->__set("idcolaborador", 2);
echo "<pre>";
print_r($co);
echo "</pre>";
$cos = new ColaboradorService();
$cos->AlterarColaborador($co);
echo "<pre>";
print_r($co);
echo "</pre>";*/
// // //

// // // Para excluir colaborador
/*$co = new Colaborador("Roberto Casaldáliga", "123.654.776-89", "456448", "Masculino", "06/09/1992", "62 99789-1234", "roberto@gmail.com", "Rua N", "Jardim Morada Nova", "Ceres", "GO", "76.350-000", "Vendedor", "12345");
$co->__set("idcolaborador", "2");
echo "<pre>";
print_r($co);
echo "</pre>";
$cos = new ColaboradorService();
$cos->ExcluirColaborador($co);
echo "<pre>";
print_r($co);
echo "</pre>";*/
// // //

// // // Para buscar colaborador
/*$co = new Colaborador("Roberto", "123.654.776-89", "456448", "Masculino", "06/09/1992", "62 99789-1234", "roberto@gmail.com", "Rua N", "Jardim Morada Nova", "Ceres", "GO", "76.350-000", "Vendedor", "12345");
$co->__set("idcolaborador", "3");
echo "<pre>";
print_r($co);
echo "</pre>";
$cos = new ColaboradorService();
$cos->BuscarColaborador($co);
echo "<pre>";
print_r($co);
echo "</pre>";*/
// // //
=======
// $col = new Colaborador("Laila", "234.654.789-09", "5363728", "Feminino", "20/09/1987", "62 98789-0000", "laila@gmail.com", "Rua A", "Jardim Sorriso", "Itapaci", "GO", "76.360-000", "ADM", "123");



// $co = new Colaborador("Ana", "234.654.789-89", "5363728", "Feminino", "20/09/1987", "62 98789-0000", "ana@gmail.com", "Rua A", "Jardim Sorriso", "Itapaci", "GO", "76.360-000", "Administrador", "123456");

// echo "<pre>";
// print_r($co);
// echo "</pre>";

// $cols = new ColaboradorService();
// $cols->CadastrarColaborador($col);

// echo "<pre>";
// print_r($co);
// echo "</pre>";

// $cos = new ColaboradorService();
// $cos->BuscarColaborador($co);

// echo "<pre>";
// print_r($co);
// echo "</pre>";

// $cos = new ColaboradorService();
// $cos->AlterarColaborador($co);

// echo "<pre>";
// print_r($co);
// echo "</pre>";

// $cos = new ColaboradorService();
// $cos->ExcluirColaborador($co);

// echo "<pre>";
// print_r($co);
// echo "</pre>";
>>>>>>> 036694f25717b7b609f699e810c1a6372a5bd517

?>
