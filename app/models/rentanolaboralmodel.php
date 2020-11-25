<?php 


class Rentanolaboralmodel extends Models{

    private $tablarentanolaboral = "rentanolaboral";
    private $tablacedulageneral = "cedulageneral";

    public function crear($idcedulageneral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentanolaboral.'(rentaliquida, rentasexentasdeduccion, rentaliquidaordinaria, rentaliquidanolaboral, idcedulageneral) VALUES (?,?,?,?,?)')) {

            $query->execute([0,0,0,0,$idcedulageneral]);

            $idrentanolaboral = $connect->lastInsertId();

            return $idrentanolaboral;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT rl.idrentanolaboral AS "id" FROM '.$this->tablarentanolaboral.' rl JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rl.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }


}


?>