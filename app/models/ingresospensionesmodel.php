<?php 


class Ingresospensionesmodel extends Models{

    private $tablaingresospensiones = "ingresospensiones";

    public function crear($nombre,$valor,$idingresosbrutospensiones,$idtipoingresospensiones){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresospensiones.'(nombre,valor,idingresosbrutospensiones,idtipoingresospensiones) VALUES (?,?,?,?)')) {

            $query->execute([$nombre,$valor,$idingresosbrutospensiones,$idtipoingresospensiones]);

            /* $idrentaexededuccionlaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>