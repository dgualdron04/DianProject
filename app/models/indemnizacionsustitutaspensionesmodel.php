<?php 


class Indemnizacionsustitutaspensionesmodel extends Models{

    private $tablaindemnizacionsustitutaspensiones = "indemnizacionsustitutaspensiones";

    public function crear($nombre,$valor,$idingresosbrutospensiones){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaindemnizacionsustitutaspensiones.'(nombre,valor,idingresosbrutospensiones) VALUES (?,?,?)')) {

            $query->execute([$nombre,$valor,$idingresosbrutospensiones]);

            /* $idrentaexededuccionlaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>