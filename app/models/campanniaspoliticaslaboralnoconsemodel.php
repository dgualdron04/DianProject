
<?php 


class Campanniaspoliticaslaboralnoconsemodel extends Models{

    private $tablacampanniaspoliticaslaboralnoconse = "campanniaspoliticaslaboralnoconse";

    public function crear($nombre, $valor, $idingresosnoconselaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablacampanniaspoliticaslaboralnoconse.'(nombre, valor, idingresosnoconselaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresosnoconselaboral]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>