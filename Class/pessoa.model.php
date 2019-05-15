<<?php
  class Pessoa {
    private $codigo;
    private $nome;
    private $cpf;
    private $rg;
    private $sexo;
    private $dataNascimento;
    private $tel;
    private $email;
    private $logradouro;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;
    private $dataCadastro;


    public function __get($atributo) {
      return $this->$atributo;
        }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
        }


    // metodos...

    function incluirPessoa() {
      return $this - > __get() ;
    }

    function alterarPessoa() {
      return $this - > __get() ;
    }

    function excluirPessoa() {
      return $this - > __get() ;
    }

    function listasPorCodigo() {
      return $this - > __get() ;
    }

    function listarPorNome() {
      return $this - > __get() ;
    }

    function listarPorCpf() {
      return $this - > __get() ;
    }

    function listarTodos() {
      return $this - > __get() ;
    }


}


 ?>
