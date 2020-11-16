<?php 


class Declaracionmodel extends Models{

    private $tabladeclaracion = "declaracion";

    public function listar($id, $nomrol){

        if (strtolower($nomrol) == "declarante") {

            $query = $this->db->connect()->prepare('SELECT d.iddeclaracion, d.pagototal, d.estadoarchivo, d.estadorevision, d.estadodeclaracion, d.observaciones FROM '.$this->tabladeclaracion.' d WHERE d.idusuario = ? ;');
            $query->execute([$id]);
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            return $myquery;

        } else if (strtolower($nomrol) == "contador") {
            
            $query = $this->db->connect()->prepare('SELECT d.iddeclaracion, d.pagototal, d.estadoarchivo, d.estadorevision, d.estadodeclaracion, d.observaciones FROM '.$this->tabladeclaracion.' d WHERE d.estadorevision = 1 ;');
            $query->execute([$id]);
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            return $myquery;

        } else {

            return false;

        }

    }

}



?>