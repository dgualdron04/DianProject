<?php 


class Rentacapitalmodel extends Models{

    private $tablarentacapital = "rentacapital";
    private $tablacedulageneral = "cedulageneral";

    public function crear($idcedulageneral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentacapital.'(rentaliquida, rentasexentasdeduccion, rentaliquidaordinaria, rentaliquidacapital, idcedulageneral) VALUES (?,?,?,?,?)')) {

            $query->execute([0,0,0,0,$idcedulageneral]);

            $idrentacapital = $connect->lastInsertId();

            return $idrentacapital;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT rc.idrentacapital AS "id" FROM '.$this->tablarentacapital.' rc JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rc.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }


}


?>