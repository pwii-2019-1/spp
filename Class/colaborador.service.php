<?php

include_once 'colaborador.model.php';
include_once 'conexao.php';

class ColaboradorService {
    private $conexao;
    private $colaborador;

    public function __construct(){
        $this->conexao = Conexao::conectar();
    }

    public function inserirColaborador(Colaborador $colaborador){
        $sql = "INSERT INTO colaborador (nome, cpf, rg, sexo, dataNascimento, tel, email, logradouro, bairro, cidade, estado, cep, dataCadastro, perfil, senha)"
            ." VALUES (:nome, :cpf, :rg, :sexo, :dataNascimento, :tel, :email, :logradouro, :bairro, :cidade, :estado, :cep, NOW(), :perfil, :senha)";

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

        try {
            return $sttm->execute();
            echo 'Cadastrado com sucesso!';
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            echo 'Erro ao cadastrar!';
        }
    }

    public function alterarColaborador(Colaborador $colaborador){
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

        try {
            $sttm->execute();
            echo 'Alterado com sucesso!';
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            echo 'Erro ao alterar!';

        }
    }

    public function getColaboradorByID($idcolaborador) {
        $sql = "SELECT * FROM colaborador WHERE idcolaborador = :idcolaborador";

        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':idcolaborador', $idcolaborador);

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }

        $resul = $sttm->fetchAll(PDO::FETCH_ASSOC);

        $colaborador = new Colaborador();
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

    public function excluirColaborador($idcolaborador){
        $sql = 'DELETE FROM colaborador WHERE idcolaborador = :idcolaborador';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':idcolaborador', $idcolaborador);

        try {
            $sttm->execute();
            echo "$idcolaborador";
            echo 'Excluído com sucesso!';
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            echo 'Erro ao excluir!';
        }
    }

    public function populaTabela() {
      $sql = "SELECT * FROM colaborador";

      $sttm = $this->conexao->prepare($sql);

      try {
          $sttm->execute();
        } catch (PDOException $exc) {
          echo $exc->getTraceAsString();
        }
        return $sttm->fetchAll(PDO::FETCH_ASSOC);
      }

}

/*$co = new Colaborador("Roberto", "123.654.776-89", "456448", "Masculino", "06/09/1992", "62 99789-1234", "roberto@gmail.com", "Rua N", "Jardim Morada Nova", "Ceres", "GO", "76.350-000", "Vendedor", "12345");
echo "<pre>";
print_r($co);
echo "</pre>";
$cos = new ColaboradorService();
$cos->inserirColaborador($co);
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
$cos->alterarColaborador($co);
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
$cos->excluirColaborador($co);
echo "<pre>";
print_r($co);
echo "</pre>";*/
// // //

/*$c = new Colaborador();
$cos = new ColaboradorService();
$cos->getColaboradorByID(1);
echo "<pre>";
print_r($cos->getColaboradorByID(1));
echo "</pre>";*/

?>
