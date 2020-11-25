
<?php 


class Aportesobligatorioslaboralnoconsemodel extends Models{

    private $tablaaportesobligatorioslaboralnoconse = "aportesobligatorioslaboralnoconse";

    public function crear($nombre, $valor, $idingresosnoconselaboral, $idtipoaporteobligatoriolaboralnoconse){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaaportesobligatorioslaboralnoconse.'(nombre, valor, idingresosnoconselaboral, idtipoaporteobligatoriolaboralnoconse) VALUES (?,?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresosnoconselaboral, $idtipoaporteobligatoriolaboralnoconse]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>