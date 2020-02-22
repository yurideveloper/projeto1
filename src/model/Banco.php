<?php

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setMedico($nome,$email,$senha,$endereco_consultorio,$data_criacao,$data_alteracao){
        $stmt = $this->mysqli->prepare("INSERT INTO medico  (nome,email,senha,endereco_consultorio,data_criacao,data_alteracao) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss',$nome,$email,$senha,$endereco_consultorio,$data_criacao,$data_alteracao);
        if( $stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getMedico(){
        $result = $this->mysqli->query("SELECT * FROM medico");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $medicos[] = $row;
        }
        if(isset($medicos) && ($medicos!==null))
        {
            return $medicos;
        }
    }

    public function deleteMedico($id){
        if($this->mysqli->query("DELETE FROM medico WHERE id = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }
    }
    public function pesquisaMedico($id){
        $result = $this->mysqli->query("SELECT * FROM medico WHERE id='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    public function updateMedico($id,$nome,$senha,$endereco_consultorio,$data_alteracao){ 
        $stmt = $this->mysqli->prepare("UPDATE medico SET nome = ?, senha = ?, endereco_consultorio = ?,data_alteracao = ?  WHERE id = ?");
        $stmt->bind_param("sssss",$nome,$senha,$endereco_consultorio,$data_alteracao,$id);
        
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }

    }
}
?>
