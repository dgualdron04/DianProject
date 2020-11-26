<?php

class Ingresobrutomodel extends Models{

    private $tablaingresobruto = "ingresobruto";
    private $tablausuarioingresobruto = "usuarioingresobruto";
    private $tablarentatrabajo = "rentatrabajo";
    private $tablacedulageneral = "cedulageneral";
    private $tablasalario = "salario";
    private $tablaprestasociales = "prestasociales";
    private $tablahonorarios = "honorarios";
    private $tablaviaticos = "viaticos";
    private $tablaotrospagos = "otrospagos";
    private $tablacesantiaintereses = "cesantiaintereses";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresobruto.'(ingresobrutototal) VALUES (?)')) {

            $query->execute([0]);

            $idingresobruto = $connect->lastInsertId();

            return $idingresobruto;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT ib.idingresobruto AS "id" FROM '.$this->tablaingresobruto.' ib JOIN '.$this->tablausuarioingresobruto.' uib ON uib.idingresobruto = ib.idingresobruto JOIN '.$this->tablarentatrabajo.' rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function calcularingresobruto($id){

        $salario = $this->db->connect()->prepare('SELECT IF(SUM(s.valor * s.meseslaborados) != 0,SUM(s.valor * s.meseslaborados),0) AS "salario" FROM '.$this->tablasalario.' s WHERE s.idingresobruto = ?');
        $salario->execute([$id]);
        $salario = $salario->fetch(PDO::FETCH_ASSOC);

        $prestasociales = $this->db->connect()->prepare('SELECT IF(SUM(ps.valor) != 0, SUM(ps.valor),0) AS "prestacionsocial" FROM '.$this->tablaprestasociales.' ps WHERE ps.idingresobruto = ?');
        $prestasociales->execute([$id]);
        $prestasociales = $prestasociales->fetch(PDO::FETCH_ASSOC);

        $honorarios = $this->db->connect()->prepare('SELECT IF(SUM(h.valor) != 0, SUM(h.valor),0) AS "honorarios" FROM '.$this->tablahonorarios.' h WHERE h.idingresobruto = ?');
        $honorarios->execute([$id]);
        $honorarios = $honorarios->fetch(PDO::FETCH_ASSOC);

        $viaticos = $this->db->connect()->prepare('SELECT IF(SUM(v.valor) != 0, SUM(v.valor),0) AS "viaticos" FROM '.$this->tablaviaticos.' v WHERE v.idingresobruto = ?');
        $viaticos->execute([$id]);
        $viaticos = $viaticos->fetch(PDO::FETCH_ASSOC);

        $otrospagos = $this->db->connect()->prepare('SELECT IF(SUM(op.valor) != 0, SUM(op.valor),0) AS "otrospagos" FROM '.$this->tablaotrospagos.' op WHERE op.idingresobruto = ?');
        $otrospagos->execute([$id]);
        $otrospagos = $otrospagos->fetch(PDO::FETCH_ASSOC);

        $cesantiaintereses = $this->db->connect()->prepare('SELECT IF(SUM(ci.valor) != 0, SUM(ci.valor),0) AS "cesantiaintereses" FROM '.$this->tablacesantiaintereses.' ci WHERE ci.idingresobruto = ?');
        $cesantiaintereses->execute([$id]);
        $cesantiaintereses = $cesantiaintereses->fetch(PDO::FETCH_ASSOC);

        $ingresobrutototal = $salario['salario'] + $prestasociales['prestacionsocial'] + $honorarios['honorarios'] + $viaticos['viaticos'] + $otrospagos['otrospagos'] + $cesantiaintereses['cesantiaintereses'];

        $ingresobruto = $this->db->connect()->prepare('UPDATE '.$this->tablaingresobruto.' SET ingresobrutototal = ? WHERE idingresobruto  = ?');
        $ingresobruto->execute([$ingresobrutototal, $id]);

    }

    public function consultarvalor($iddeclaracion){

        $ingresobruto = $this->db->connect()->prepare('SELECT ib.ingresobrutototal FROM ingresobruto ib JOIN usuarioingresobruto uib ON uib.idingresobruto = ib.idingresobruto JOIN rentatrabajo rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN cedulageneral cg on cg.idcedulageneral = rt.idcedulageneral WHERE iddeclaracion = ?');
        $ingresobruto->execute([$iddeclaracion]);
        $ingresobruto = $ingresobruto->fetch(PDO::FETCH_ASSOC);

        return $ingresobruto;

    }

}
?>