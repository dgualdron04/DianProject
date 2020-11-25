<?php

class Ingresosnoconselaboralmodel extends Models{

    private $tablaingresosnoconselaboral = "ingresosnoconselaboral"; //idingresosnoconselaboral
    private $tablausuarioingresonoconselaboral = "usuarioingresonoconselaboral";
    private $tablarentanolaboral = "rentanolaboral";
    private $tablacedulageneral = "cedulageneral";
    private $tablaaportesobligatorioslaboralnoconse = "aportesobligatorioslaboralnoconse";
    private $tablarecompensaslaboral = "recompensaslaboralnoconse";
    private $tablaaportesvoluntarioslaboralnoconse = "aportesvoluntarioslaboralnoconse";
    private $tablaaporteseconoedu = "aporteseconoedulaboralnoconse";
    private $tablaindemnizaaseguradoreslaboralnoconse = "indemnizaaseguradoreslaboralnoconse";
    private $tablarecibidosganancialeslaboral = "recibidosganancialeslaboralnoconse";
    private $tablacampanniaspoliticaslaboral = "campanniaspoliticaslaboralnoconse";
    private $tablaagroingresosegurolaboralnoconse = "agroingresosegurolaboralnoconse";
    private $tablahonorariosdesaproyeclaboral = "honorariosdesaproyeclaboral";

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

    public function calcularingresonoconselaboral($id){

        $honorariosdesaproyeclaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "honorariosdesaproyeclaboral" FROM '.$this->tablahonorariosdesaproyeclaboral.' WHERE idingresosnoconselaboral = ?');
        $honorariosdesaproyeclaboral->execute([$id]);
        $honorariosdesaproyeclaboral = $honorariosdesaproyeclaboral->fetch(PDO::FETCH_ASSOC);

        $agroingresosegurolaboralnoconse = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "agroingresosegurolaboralnoconse" FROM '.$this->tablaagroingresosegurolaboralnoconse.' WHERE idingresosnoconselaboral = ?');
        $agroingresosegurolaboralnoconse->execute([$id]);
        $agroingresosegurolaboralnoconse = $agroingresosegurolaboralnoconse->fetch(PDO::FETCH_ASSOC);
        
        $campanniaspoliticaslaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "campanniaspoliticaslaboral" FROM '.$this->tablacampanniaspoliticaslaboral.' WHERE idingresosnoconselaboral = ?');
        $campanniaspoliticaslaboral->execute([$id]);
        $campanniaspoliticaslaboral = $campanniaspoliticaslaboral->fetch(PDO::FETCH_ASSOC);

        $recibidosganancialeslaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "recibidosganancialeslaboral" FROM '.$this->tablarecibidosganancialeslaboral.' WHERE idingresosnoconselaboral = ?');
        $recibidosganancialeslaboral->execute([$id]);
        $recibidosganancialeslaboral = $recibidosganancialeslaboral->fetch(PDO::FETCH_ASSOC);

        $indemnizaaseguradoreslaboralnoconse = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "indemnizaaseguradoreslaboralnoconse" FROM '.$this->tablaindemnizaaseguradoreslaboralnoconse.' WHERE idingresosnoconselaboral = ?');
        $indemnizaaseguradoreslaboralnoconse->execute([$id]);
        $indemnizaaseguradoreslaboralnoconse = $indemnizaaseguradoreslaboralnoconse->fetch(PDO::FETCH_ASSOC);

        $aporteseconoedu = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "aporteseconoedu" FROM '.$this->tablaaporteseconoedu.' WHERE idingresosnoconselaboral = ?');
        $aporteseconoedu->execute([$id]);
        $aporteseconoedu = $aporteseconoedu->fetch(PDO::FETCH_ASSOC);

        $aportesvoluntarioslaboralnoconse = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "aportesvoluntarioslaboralnoconse" FROM '.$this->tablaaportesvoluntarioslaboralnoconse.' WHERE idingresosnoconselaboral = ?');
        $aportesvoluntarioslaboralnoconse->execute([$id]);
        $aportesvoluntarioslaboralnoconse = $aportesvoluntarioslaboralnoconse->fetch(PDO::FETCH_ASSOC);

        $recompensaslaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "recompensaslaboral" FROM '.$this->tablarecompensaslaboral.' WHERE idingresosnoconselaboral = ?');
        $recompensaslaboral->execute([$id]);
        $recompensaslaboral = $recompensaslaboral->fetch(PDO::FETCH_ASSOC);

        $aportesobligatorioslaboralnoconse = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "aportesobligatorioslaboralnoconse" FROM '.$this->tablaaportesobligatorioslaboralnoconse.' WHERE idingresosnoconselaboral = ?');
        $aportesobligatorioslaboralnoconse->execute([$id]);
        $aportesobligatorioslaboralnoconse = $aportesobligatorioslaboralnoconse->fetch(PDO::FETCH_ASSOC);

        $ingresosnoconsetotal = $honorariosdesaproyeclaboral['honorariosdesaproyeclaboral'] + $agroingresosegurolaboralnoconse['agroingresosegurolaboralnoconse'] + 
        $campanniaspoliticaslaboral['campanniaspoliticaslaboral'] + $recibidosganancialeslaboral['recibidosganancialeslaboral'] + 
        $indemnizaaseguradoreslaboralnoconse['indemnizaaseguradoreslaboralnoconse'] + $aporteseconoedu['aporteseconoedu'] +
        $aportesvoluntarioslaboralnoconse['aportesvoluntarioslaboralnoconse'] + $recompensaslaboral['recompensaslaboral'] + $aportesobligatorioslaboralnoconse['aportesobligatorioslaboralnoconse'];

        $ingresosnoconselaboral = $this->db->connect()->prepare('UPDATE '.$this->tablaingresosnoconselaboral.' SET ingresosnoconsetotal = ? WHERE idingresosnoconselaboral  = ?');
        $ingresosnoconselaboral->execute([$ingresosnoconsetotal, $id]);

    }

}
?>