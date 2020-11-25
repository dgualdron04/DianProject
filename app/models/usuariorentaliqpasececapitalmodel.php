<?php 


class Usuariorentaliqpasececapitalmodel extends Models{

    private $tablausuariorentaliqpasececapital = "usuariorentaliqpasececapital";

    public function crear($idrentaliqpasececapital, $idrentacapital, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariorentaliqpasececapital.'(idrentaliqpasececapital, idrentacapital, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idrentaliqpasececapital, $idrentacapital, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>