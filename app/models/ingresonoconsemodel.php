<?php

class Ingresonoconsemodel extends Models{

    private $tablaingresonoconse = "ingresonoconse";
    private $tablausuarioingresonoconse = "usuarioingresonoconse";
    private $tablarentatrabajo = "rentatrabajo";
    private $tablacedulageneral = "cedulageneral";
    private $tablaaporteobligatorio = "aporteobligatorio";
    private $tablaaportevoluntario = "aportevoluntario";
    private $tablaaporteseconoedu = "aporteseconoedu";
    private $tablapagosalimen = "pagosalimen";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconse.'(ingresosnoconsetotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresonoconse = $connect->lastInsertId();

            return $idingresonoconse;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT ic.idingresonoconse AS "id" FROM '.$this->tablaingresonoconse.' ic JOIN '.$this->tablausuarioingresonoconse.' uic ON uic.idingresonoconse = ic.idingresonoconse JOIN '.$this->tablarentatrabajo.' rt ON rt.idrentatrabajo = uic.idrentatrabajo JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function calcularingresonoconse($id){

        $aportesobligatorios = $this->db->connect()->prepare('SELECT IF(SUM(ao.valor) != 0,SUM(ao.valor),0) AS "aporteobligatorio" FROM '.$this->tablaaporteobligatorio.' ao WHERE ao.idingresonoconse = ?');
        $aportesobligatorios->execute([$id]);
        $aportesobligatorios = $aportesobligatorios->fetch(PDO::FETCH_ASSOC);

        $aportesvoluntarios = $this->db->connect()->prepare('SELECT IF(SUM(av.valor) != 0, SUM(av.valor),0) AS "aportevoluntario" FROM '.$this->tablaaportevoluntario.' av WHERE av.idingresonoconse = ?');
        $aportesvoluntarios->execute([$id]);
        $aportesvoluntarios = $aportesvoluntarios->fetch(PDO::FETCH_ASSOC);

        $aporteseconoedu = $this->db->connect()->prepare('SELECT IF(SUM(aee.valor) != 0, SUM(aee.valor),0) AS "aporteseconoedu" FROM '.$this->tablaaporteseconoedu.' aee WHERE aee.idingresonoconse = ?');
        $aporteseconoedu->execute([$id]);
        $aporteseconoedu = $aporteseconoedu->fetch(PDO::FETCH_ASSOC);

        $pagosalimen = $this->db->connect()->prepare('SELECT IF(SUM(pa.valor * pa.cantidadmeses) != 0, SUM(pa.valor * pa.cantidadmeses),0) AS "pagosalimen" FROM '.$this->tablapagosalimen.' pa WHERE pa.idingresonoconse = ?');
        $pagosalimen->execute([$id]);
        $pagosalimen = $pagosalimen->fetch(PDO::FETCH_ASSOC);

        $ingresosnoconsetotal = $aportesobligatorios['aporteobligatorio'] + $aportesvoluntarios['aportevoluntario'] + $aporteseconoedu['aporteseconoedu'] + $pagosalimen['pagosalimen'];

        $ingresosnoconse = $this->db->connect()->prepare('UPDATE '.$this->tablaingresonoconse.' SET ingresosnoconsetotal = ? WHERE idingresonoconse  = ?');
        $ingresosnoconse->execute([$ingresosnoconsetotal, $id]);

    }

    public function consultarvalor($iddeclaracion){

        $cedulageneral = $this->db->connect()->prepare('SELECT inct.ingresosnoconsetotal FROM ingresonoconse inct JOIN usuarioingresonoconse uinct ON uinct.idingresonoconse = uinct.idingresonoconse = inct.idingresonoconse JOIN rentatrabajo rt ON rt.idrentatrabajo = uinct.idrentatrabajo JOIN cedulageneral cg on cg.idcedulageneral = rt.idcedulageneral WHERE iddeclaracion = ?');
        $cedulageneral->execute([$iddeclaracion]);
        $cedulageneral = $cedulageneral->fetch(PDO::FETCH_ASSOC);

        return $cedulageneral;

    }

}
?>