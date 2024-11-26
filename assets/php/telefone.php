<?php
//
include_once 'conectar.php';


class Doador{
    private $ID_doador;
    private $telefone;
    private $conn;


    public function getIDDoador()
    {
        return $this->ID_doador;
    }

    public function setIDDoador($ID_doador)
    {
        $this->ID_doador = $ID_doador;
    }

    public function gettelefone()
    {
        return $this->telefone;
    }

    public function setnome($telefone)
    {
        $this->telefone = $telefone;
    }



}



?>

