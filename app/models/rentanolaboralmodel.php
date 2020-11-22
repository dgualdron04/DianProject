<?php 


class Rentanolaboralmodel extends Models{

    private $tablarentanolaboral = "rentanolaboral";

    public function crear($idcedulageneral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentanolaboral.'(rentaliquida, rentasexentasdeduccion, rentaliquidaordinaria, rentaliquidanolaboral, idcedulageneral) VALUES (?,?,?,?,?)')) {

            $query->execute([0,0,0,0,$idcedulageneral]);

            return true;

        } else {

            return false;

        }

    }


}


?>