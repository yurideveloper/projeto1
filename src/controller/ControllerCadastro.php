<?php
require_once("../model/Medico.php");
class ControllerCadastro{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Medico();
        $this->incluir();
    }

    private function incluir(){
    //Recebendo dados por post
        $nome      = $_POST['nome'];
        $email     = $_POST['email'];
        $senha     = $_POST['senha'];
        $endereco_consultorio  = $_POST['endereco_consultorio'];

        $teste = 0;
    //Testes backend para validar inserção correta
        if(strlen($nome) < 6 OR strlen($nome) > 112)
        {
            $teste += 1;
            echo "<script>alert('Nome com quantidade de caracteres não aceito!');document.location='../view/cadastro.php'</script>";
        }

        if(strlen($email) < 6 OR strlen($email) > 112)
        {
            $teste += 1;
            echo "<script>alert('Email com quantidade de caracteres não aceito!');document.location='../view/cadastro.php'</script>";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $teste += 1;
            echo "<script>alert('Email inforado esta no fomato incorreto!');document.location='../view/cadastro.php'</script>";
        }

        if(strlen($senha) < 6 OR strlen($senha) > 112)
        {
            $teste += 1;
            echo "<script>alert('Senha com quantidade de caracteres não aceito!');document.location='../view/cadastro.php'</script>";
        }

        if(strlen($endereco_consultorio) < 6 OR strlen($endereco_consultorio) > 112)
        {
            $teste += 1;
            echo "<script>alert('Endereço com quantidade de caracteres não aceito!');document.location='../view/cadastro.php'</script>";
        }
        
        if($teste == 0){
            $this->cadastro->setNome($nome);
            $this->cadastro->setEmail($email);
            $this->cadastro->setSenha(md5($senha));
            $this->cadastro->setEndereco_consultorio($endereco_consultorio);

            $this->cadastro->setData_criacao(date("Y-m-d H:i:s"));
            $this->cadastro->setData_alteracao(date("Y-m-d H:i:s"));      
            $result = $this->cadastro->incluir();
            if($result >= 1){
                echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
            }else{
                echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
            }   
        }
    }
}
new ControllerCadastro();
