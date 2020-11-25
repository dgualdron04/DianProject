<?php

class Ingresosnoconselaboralmodel extends Models{

    private $tablaingresosnoconselaboral = "ingresosnoconselaboral";
    private $tablausuarioingresonoconselaboral = "usuarioingresonoconselaboral";
    private $tablarentanolaboral = "rentanolaboral";
    private $tablacedulageneral = "cedulageneral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresosnoconselaboral.'(ingresosnoconsetotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresosnoconselaboral = $connect->lastInsertId();

            return $idingresosnoconselaboral;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT icl.idingresosnoconselaboral AS "id" FROM '.$this->tablaingresosnoconselaboral.' icl JOIN '.$this->tablausuarioingresonoconselaboral.' uicl ON uicl.idingresosnoconselaboral = icl.idingresosnoconselaboral JOIN '.$this->tablarentanolaboral.' rl ON rl.idrentanolaboral = uicl.idrentanolaboral JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rl.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}
?>