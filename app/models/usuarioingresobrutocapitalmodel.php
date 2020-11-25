<?php 

class Usuarioingresobrutocapitalmodel extends Models{

    private $tablausuarioingresobrutocapital = "usuarioingresobrutocapital";

    public function crear($idingresobrutocapital, $idrentacapital, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresobrutocapital.'(idingresobrutocapital , idrentacapital, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresobrutocapital, $idrentacapital, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>