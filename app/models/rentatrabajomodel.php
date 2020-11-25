<?php 


class Rentatrabajomodel extends Models{

    private $tablarentatrabajo = "rentatrabajo";
    private $tablacedulageneral = "cedulageneral";

    public function crear($idcedulageneral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentatrabajo.'(rentaliquida, rentasexentasdeduccion, rentaliquidatrabajo, idcedulageneral) VALUES (?,?,?,?)')) {

            $query->execute([0,0,0,$idcedulageneral]);

            $idrentatrabajo = $connect->lastInsertId();

            return $idrentatrabajo;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT rt.idrentatrabajo AS "id" FROM '.$this->tablarentatrabajo.' rt JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }


}


?>