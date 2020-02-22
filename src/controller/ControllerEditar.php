<?php
require_once("../model/banco.php");

class ControllerEditar {

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $endereco_consultorio;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }

    private function criarFormulario($id){
        $row = $this->editar->pesquisaMedico($id);
        $this->id           =$row['id'];
        $this->nome         =$row['nome'];
        $this->endereco_consultorio        =$row['endereco_consultorio'];
        $this->senha        =$row['senha'];
    }
    public function editarFormulario($id,$nome,$endereco_consultorio,$senha){
    //Recebendo dados por post
        $nome      = $_POST['nome'];
        $endereco_consultorio = $_POST['endereco_consultorio'];
        $senha     = $_POST['senha'];

        $teste = 0;
    //Testes backend para validar inserção correta
        if(strlen($nome) < 6 OR strlen($nome) > 112)
        {
            $teste += 0;
            echo "<script>alert('Nome com quantidade de caracteres não aceito!');document.location='../view/cadastro.php'</script>";
        }

        if(strlen($endereco_consultorio) < 6 OR strlen($endereco_consultorio) > 112)
        {
            $teste += 0;
            echo "<script>alert('Endereço com quantidade de caracteres não aceito!');document.location='../view/cadastro.php'</script>";
        }

        if(strlen($senha) < 6 OR strlen($senha) > 112)
        {
            $teste += 0;
            echo "<script>alert('Senha com quantidade de caracteres não aceito!');document.location='../view/cadastro.php'</script>";
        }
        
        if($teste == 0){
            $data_alteracao = date("Y-m-d H:i:s");
            if($this->editar->updateMedico($id,$nome,md5($senha),$endereco_consultorio,$data_alteracao) == TRUE){
                echo "<script>alert('Registro Alterado com sucesso!');document.location='../view/index.php'</script>";
            }else{
                echo "<script>alert('Erro ao alterar registro!');history.back()</script>";
            } 
        }
    }

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
}

$id = filter_input(INPUT_GET, 'id');
$editar = new ControllerEditar($id);
if(isset($_POST['submit']))
{
    $editar->editarFormulario($_POST['id'],$_POST['nome'],$_POST['endereco_consultorio'],$_POST['senha']);
}
?>
