
<?php 


class Honorariosdesaproyeclaboralmodel extends Models{

    private $tablaaporteseconoedulaboralnoconse = "aporteseconoedulaboralnoconse";

    public function crear($nombre, $valor, $idingresosnoconselaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaaporteseconoedulaboralnoconse.'(nombre, valor, idingresosnoconselaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresosnoconselaboral]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>