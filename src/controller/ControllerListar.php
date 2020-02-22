<?php
require_once("../model/banco.php");
class ControllerListar{

    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();
    }

    private function criarTabela(){
        $row = $this->lista->getMedico();
        if(!empty($row))
        {
            foreach ($row as $value){
            echo "<tr>";
            echo "<th>".$value['nome'] ."</th>";
            echo "<td>".$value['endereco_consultorio'] ."</td>";
            echo "<td>
                    <a class='btn btn-warning' href='editar.php?id=".$value['id']."'>Editar</a>
                    <a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=".$value['id']."'> Excluir</a>
                  </td>";
            echo "</tr>";
            }
        }
    }
}

