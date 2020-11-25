<?php

class Ingresobrutolaboralmodel extends Models{

    private $tablaingresobrutolaboral = "ingresobrutolaboral";
    private $tablausuarioingresobrutolaboral = "usuarioingresobrutolaboral";
    private $tablarentanolaboral = "rentanolaboral";
    private $tablacedulageneral = "cedulageneral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresobrutolaboral.'(ingresobrutototal) VALUES (?)')) {

            $query->execute([0]);

            $idingresobrutolaboral = $connect->lastInsertId();

            return $idingresobrutolaboral;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT ibl.idingresobrutolaboral AS "id" FROM '.$this->tablaingresobrutolaboral.' ibl JOIN '.$this->tablausuarioingresobrutolaboral.' uibl ON uibl.idingresobrutolaboral  = ibl.idingresobrutolaboral  JOIN '.$this->tablarentanolaboral.' rl ON rl.idrentanolaboral = uibl.idrentanolaboral JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rl.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}

?>