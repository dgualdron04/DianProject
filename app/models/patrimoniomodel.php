<?php 


class Patrimoniomodel extends Models{

    private $tablapatrimonio = "patrimonio";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tb.idtipobien, tb.nombre, tb.descripcion, tb.ayuda FROM '.$this->tablatipobienes.' tb ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($iddeclaracion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablapatrimonio.'(patliquitotal, deudatotal, patbrutototal, iddeclaracion) VALUES (?,?,?,?)')) {

            $query->execute([0,0,0,$iddeclaracion]);

            return true;

        } else {

            return false;

        }

    }


}


?>