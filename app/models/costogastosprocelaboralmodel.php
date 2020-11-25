<?php

class Costogastosprocelaboralmodel extends Models{

    private $tablacostogastosprocelaboral = "costogastosprocelaboral";
    private $tablausuariocostogastosprocelaboral  = "usuariocostogastosprocelaboral ";
    private $tablaretanolaboral = "rentanolaboral";
    private $tablacedulageneral = "cedulageneral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablacostogastosprocelaboral.'(ingresocostogastoprocetotal) VALUES (?)')) {

            $query->execute([0]);

            $idcostogastosprocelaboral = $connect->lastInsertId();

            return $idcostogastosprocelaboral;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT cgpl.idcostogastosprocelaboral  AS "id" FROM '.$this->tablacostogastosprocelaboral.' cgpl JOIN '.$this->tablausuariocostogastosprocelaboral.' ucgpl ON ucgpl.idcostogastosprocelaboral = cgpl.idcostogastosprocelaboral JOIN '.$this->tablaretanolaboral.' rl ON rl.idrentanolaboral = ucgpl.idrentanolaboral JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rl.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}

?>