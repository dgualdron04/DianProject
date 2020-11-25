<?php 


class Rentaexededuccionlaboralmodel extends Models{

    private $tablarentaexededuccionlaboral = "rentaexededuccionlaboral";

    public function crear($nombre,$valor,$idtiporentaexededuccionlaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentaexededuccionlaboral.'(nombre,valor,idtiporentaexededuccionlaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre,$valor,$idtiporentaexededuccionlaboral]);

            $idrentaexededuccionlaboral = $connect->lastInsertId();

            return $idrentaexededuccionlaboral;

        } else {

            return false;

        }

    }

}

?>