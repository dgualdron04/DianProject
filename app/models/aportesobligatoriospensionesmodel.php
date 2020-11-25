<?php 


class Aportesobligatoriospensionesmodel extends Models{

    private $tablaaportesobligatoriospensiones = "aportesobligatoriospensiones";

    public function crear($nombre,$valor,$idingresonoconsepensiones, $idtipoaportesobligatoriospensiones){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaaportesobligatoriospensiones.'(nombre,valor,idingresonoconsepensiones,idtipoaportesobligatoriospensiones) VALUES (?,?,?,?)')) {

            $query->execute([$nombre,$valor,$idingresonoconsepensiones, $idtipoaportesobligatoriospensiones]);

            /* $idrentaexededuccionlaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>