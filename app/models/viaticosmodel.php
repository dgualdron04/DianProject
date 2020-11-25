<?php 


class Viaticosmodel extends Models{

    private $tablasviaticos = "viaticos";

    public function crear($nombre, $valor, $idingresobruto){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablasviaticos.'(nombre, valor, idingresobruto) VALUES (?,?,?)')) {

            $query->execute([$nombre,$valor, $idingresobruto]);

/*             $idsalario = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>
