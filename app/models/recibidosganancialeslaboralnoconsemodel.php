
<?php 


class Recibidosganancialeslaboralnoconsemodel extends Models{

    private $tablarecibidosganancialeslaboralnoconse = "recibidosganancialeslaboralnoconse";

    public function crear($nombre, $valor, $idingresosnoconselaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarecibidosganancialeslaboralnoconse.'(nombre, valor, idingresosnoconselaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresosnoconselaboral]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>