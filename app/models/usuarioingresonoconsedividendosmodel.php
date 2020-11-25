<?php 


class Usuarioingresonoconsedividendosmodel extends Models{

    private $tablausuarioingresonoconsedividendos = "usuarioingresonoconsedividendos";

    public function crear($idingresonoconsedividendos, $idceduladiviparti, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresonoconsedividendos.'(idingresonoconsedividendos, idceduladiviparti, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresonoconsedividendos, $idceduladiviparti, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>