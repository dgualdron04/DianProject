<?php 

class Usuarioingresobrutolaboralmodel extends Models{

    private $tablausuarioingresobrutolaboral = "usuarioingresobrutolaboral";

    public function crear($idingresobrutolaboral, $idrentanolaboral, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresobrutolaboral.'(idingresobrutolaboral , idrentanolaboral, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresobrutolaboral, $idrentanolaboral, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>