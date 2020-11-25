<?php

class Ingresobrutocapitalmodel extends Models{

    private $tablaingresobrutocapital = "ingresobrutocapital";
    private $tablausuarioingresobrutocapital = "usuarioingresobrutocapital";
    private $tablarentacapital = "rentacapital";
    private $tablacedulageneral = "cedulageneral";
    private $tablainteresesrendimientoscapital = "interesesrendimientoscapital";
    private $tablaotrosingresoscapital = "otrosingresoscapital";

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

    public function calcularingresobrutocapital($id){

        $interesesrendimientos = $this->db->connect()->prepare('SELECT IF(SUM(ir.valor) != 0,SUM(ir.valor),0) AS "interesesrendimientos" FROM '.$this->tablainteresesrendimientoscapital.' ir WHERE ir.idingresobrutocapital = ?');
        $interesesrendimientos->execute([$id]);
        $interesesrendimientos = $interesesrendimientos->fetch(PDO::FETCH_ASSOC);

        $otrosingresoscapital = $this->db->connect()->prepare('SELECT IF(SUM(oi.valor) != 0,SUM(oi.valor),0) AS "otrosingresos" FROM '.$this->tablaotrosingresoscapital.' oi WHERE oi.idingresobrutocapital = ?');
        $otrosingresoscapital->execute([$id]);
        $otrosingresoscapital = $otrosingresoscapital->fetch(PDO::FETCH_ASSOC);

        $ingresobrutototal = $interesesrendimientos["interesesrendimientos"] + $otrosingresoscapital['otrosingresos'];

        $ingresobrutocapital = $this->db->connect()->prepare('UPDATE '.$this->tablaingresobrutocapital.' SET ingresobrutocapitaltotal = ? WHERE idingresobrutocapital = ?');
        $ingresobrutocapital->execute([$ingresobrutototal, $id]);

    }

}

?>