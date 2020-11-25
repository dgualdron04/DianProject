<?php 


class Otrospagosmodel extends Models{

    private $tablasotrospagos = "otrospagos";

    public function crear($nombre, $valor, $idingresobruto){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablasotrospagos.'(nombre, valor, idingresobruto) VALUES (?,?,?)')) {

            $query->execute([$nombre,$valor, $idingresobruto]);

/*             $idsalario = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>