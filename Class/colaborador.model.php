<?php
include_once 'pessoa.model.php';
class Colaborador extends Pessoa {
    private $perfil;
    private $senha;

    public function __construct($nome, $cpf, $rg, $sexo, $dataNascimento, $tel, $email, $logradouro, $bairro, $cidade, $estado, $cep, $perfil, $senha){
        parent::__construct($nome, $cpf, $rg, $sexo, $dataNascimento, $tel, $email, $logradouro, $bairro, $cidade, $estado, $cep);
        $this->__set('nome', $nome);
        $this->__set('cpf', $cpf);
        $this->__set('rg', $rg);
        $this->__set('sexo', $sexo);
        $this->__set('dataNascimento', $dataNascimento);
        $this->__set('tel', $tel);
        $this->__set('email', $email);
        $this->__set('logradouro', $logradouro);
        $this->__set('bairro', $bairro);
        $this->__set('cidade', $cidade);
        $this->__set('estado', $estado);
        $this->__set('cep', $cep);
        $this->__set('perfil', $perfil);
        $this->__set('senha', $senha);
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

/*$col = new Colaborador("Laila", "234.654.789-09", "5363728", "Feminino", "20/09/1987", "62 98789-0000", "laila@gmail.com", "Rua A", "Jardim Sorriso", "Itapaci", "GO", "76.360-000", "ADM", "123");
echo "<pre>";
print_r($col);
echo "</pre>";*/

?>
