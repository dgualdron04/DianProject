
<?php 


class Indemnizaaseguradoreslaboralnoconsemodel extends Models{

    private $tablaindemnizaaseguradoreslaboralnoconse = "indemnizaaseguradoreslaboralnoconse";

    public function crear($nombre, $valor, $idingresosnoconselaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaindemnizaaseguradoreslaboralnoconse.'(nombre, valor, idingresosnoconselaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresosnoconselaboral]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>