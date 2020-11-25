<?php

class Ingresobrutocapitalmodel extends Models{

    private $tablaingresobrutocapital = "ingresobrutocapital";
    private $tablausuarioingresobrutocapital = "usuarioingresobrutocapital";
    private $tablarentacapital = "rentacapital";
    private $tablacedulageneral = "cedulageneral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresobrutocapital.'(ingresobrutocapitaltotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresobrutocapital = $connect->lastInsertId();

            return $idingresobrutocapital;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT ibc.idingresobrutocapital AS "id" FROM '.$this->tablaingresobrutocapital.' ibc JOIN '.$this->tablausuarioingresobrutocapital.' uibc ON uibc.idingresobrutocapital = ibc.idingresobrutocapital JOIN '.$this->tablarentacapital.' rc ON rc.idrentacapital = uibc.idrentacapital JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rc.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}

?>