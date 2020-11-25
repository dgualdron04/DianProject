<?php 


class Pensionesexteriorpensionesmodel extends Models{

    private $tablapensionesexteriorpensiones = "pensionesexteriorpensiones";

    public function crear($nombre,$valor,$idingresosbrutospensiones){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablapensionesexteriorpensiones.'(nombre,valor,idingresosbrutospensiones) VALUES (?,?,?)')) {

            $query->execute([$nombre,$valor,$idingresosbrutospensiones]);

            /* $idrentaexededuccionlaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>