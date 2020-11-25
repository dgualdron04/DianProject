<?php 


class Usuariorentaliqpasecedividendosmodel extends Models{

    private $tablausuariorentaliqpasecedividendos = "usuariorentaliqpasecedividendos";

    public function crear($idrentaliqpasecedividendos, $idceduladiviparti, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariorentaliqpasecedividendos.'(idrentaliqpasecedividendos, idceduladiviparti, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idrentaliqpasecedividendos, $idceduladiviparti, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>