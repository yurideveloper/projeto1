<?php
require_once("banco.php");

class Medico extends Banco {

    private $id;
    private $email;
    private $nome;
    private $senha;
    private $endereco_consultorio;
    private $data_criacao;
    private $data_alteracao;

    //Getters e Setters
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getEndereco_consultorio(){
        return $this->endereco_consultorio;
    }

    public function setEndereco_consultorio($endereco_consultorio){
        $this->endereco_consultorio = $endereco_consultorio;
    }

    public function getData_criacao(){
        return $this->data_criacao;
    }

    public function setData_criacao($data_criacao){
        $this->data_criacao = $data_criacao;
    }

    public function getData_alteracao(){
        return $this->data_alteracao;
    }

    public function setData_alteracao($data_alteracao){
        $this->data_alteracao = $data_alteracao;
    }
    
    public function incluir(){
        return $this->setMedico($this->getNome(),$this->getEmail(),$this->getSenha(),$this->getEndereco_consultorio(),$this->getData_criacao(),$this->getData_alteracao());
    }
    
}
?>
