<?php

class Costogastosprocelaboralmodel extends Models{

    private $tablacostogastosprocelaboral = "costogastosprocelaboral";
    private $tablausuariocostogastosprocelaboral  = "usuariocostogastosprocelaboral ";
    private $tablaretanolaboral = "rentanolaboral";
    private $tablacedulageneral = "cedulageneral";
    private $tablainteresesprestamoslaboral = "interesesprestamoslaboral";
    private $tablaotroscostogastolaboral = "otroscostogastolaboral";
    private $tablacostofiscallaboral = "costofiscallaboral";

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

    public function calcularcostogastosprocelaboral($id)
    {
        $interesesprestamoslaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "interesesprestamoslaboral" FROM '.$this->tablainteresesprestamoslaboral.' WHERE idcostogastosprocelaboral = ?');
        $interesesprestamoslaboral->execute([$id]);
        $interesesprestamoslaboral = $interesesprestamoslaboral->fetch(PDO::FETCH_ASSOC);

        $otroscostogastolaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "otroscostogastolaboral" FROM '.$this->tablaotroscostogastolaboral.' WHERE idcostogastosprocelaboral = ?');
        $otroscostogastolaboral->execute([$id]);
        $otroscostogastolaboral = $otroscostogastolaboral->fetch(PDO::FETCH_ASSOC);

        $costofiscallaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "costofiscallaboral" FROM '.$this->tablacostofiscallaboral.' WHERE idcostogastosprocelaboral = ?');
        $costofiscallaboral->execute([$id]);
        $costofiscallaboral = $costofiscallaboral->fetch(PDO::FETCH_ASSOC);
        
        $ingresocostogastoprocetotal = $interesesprestamoslaboral['interesesprestamoslaboral'] + $otroscostogastolaboral['otroscostogastolaboral'] + $costofiscallaboral['costofiscallaboral'];

        $costogastosprocelaboral = $this->db->connect()->prepare('UPDATE '.$this->tablacostogastosprocelaboral.' SET ingresocostogastoprocetotal = ? WHERE idcostogastosprocelaboral = ?');
        $costogastosprocelaboral->execute([$ingresocostogastoprocetotal, $id]);
    }

}

?>