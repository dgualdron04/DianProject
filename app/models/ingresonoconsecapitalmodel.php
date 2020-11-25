<?php

class Ingresonoconsecapitalmodel extends Models{

    private $tablaingresonoconsecapital = "ingresonoconsecapital";
    private $tablausuarioingresonoconsecapital = "usuarioingresonoconsecapital";
    private $tablarentacapital = "rentacapital";
    private $tablacedulageneral = "cedulageneral";
    private $tablaaporteobligatoriocapital = "aporteobligatoriocapital";
    private $tablaaportevoluntariocapital = "aportevoluntariocapital";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconsecapital.'(ingresosnoconsecapitaltotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresonoconsecapital = $connect->lastInsertId();

            return $idingresonoconsecapital;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT incc.idingresonoconsecapital AS "id" FROM '.$this->tablaingresonoconsecapital.' incc JOIN '.$this->tablausuarioingresonoconsecapital.' uincc ON uincc.idingresonoconsecapital = incc.idingresonoconsecapital JOIN '.$this->tablarentacapital.' rc ON rc.idrentacapital = uincc.idrentacapital JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rc.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function calcularingresosnoconse($id){

        $aportesobligatorios = $this->db->connect()->prepare('SELECT IF(SUM(ao.valor) != 0,SUM(ao.valor),0) AS "aportesobligatorios" FROM '.$this->tablaaporteobligatoriocapital.' ao WHERE ao.idingresonoconsecapital = ?');
        $aportesobligatorios->execute([$id]);
        $aportesobligatorios = $aportesobligatorios->fetch(PDO::FETCH_ASSOC);

        $aportesvoluntarios = $this->db->connect()->prepare('SELECT IF(SUM(av.valor) != 0,SUM(av.valor),0) AS "aportesvoluntarios" FROM '.$this->tablaaportevoluntariocapital.' av WHERE av.idingresonoconsecapital = ?');
        $aportesvoluntarios->execute([$id]);
        $aportesvoluntarios = $aportesvoluntarios->fetch(PDO::FETCH_ASSOC);

        $ingresosnoconsetotal = $aportesobligatorios["aportesobligatorios"] + $aportesvoluntarios['aportesvoluntarios'];

        $ingresobrutocapital = $this->db->connect()->prepare('UPDATE '.$this->tablaingresonoconsecapital.' SET ingresosnoconsecapitaltotal = ? WHERE idingresonoconsecapital = ?');
        $ingresobrutocapital->execute([$ingresosnoconsetotal, $id]);

    }


}

?>