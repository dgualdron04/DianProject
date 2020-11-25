
<?php 


class Aportesvoluntarioslaboralnoconsemodel extends Models{

    private $tablaaportesvoluntarioslaboralnoconse = "aportesvoluntarioslaboralnoconse";

    public function crear($nombre, $valor, $idingresosnoconselaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaaportesvoluntarioslaboralnoconse.'(nombre, valor, idingresosnoconselaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresosnoconselaboral]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>