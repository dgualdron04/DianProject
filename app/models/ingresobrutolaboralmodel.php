<?php

class Ingresobrutolaboralmodel extends Models{

    private $tablaingresobrutolaboral = "ingresobrutolaboral"; //idingresobrutolaboral
    private $tablausuarioingresobrutolaboral = "usuarioingresobrutolaboral";
    private $tablarentanolaboral = "rentanolaboral";
    private $tablacedulageneral = "cedulageneral";
    private $tablaingresosnoclasificanlaboral = "ingresosnoclasificanlaboral"; //idingresosnoclasificanlaboral
    private $tablaindemnizacionnolaboral = "indemnizacionnolaboral"; //idindemnizacionnolaboral
    private $tabladerechosexplotpropielaboral = "derechosexplotpropielaboral"; //idderechosexplotpropielaboral
    private $tablarecibidosganancialeslaboral = "recibidosganancialeslaboral"; //idrecibidosganancialeslaboral
    private $tablavalorbrutoventaslaboral = "valorbrutoventaslaboral"; //idvalorbrutoventaslaboral
    private $tablarecompensaslaboral = "recompensaslaboral"; //idrecompensaslaboral
    private $tablaexplotfranquiciaslaboral = "explotfranquiciaslaboral"; //idexplotfranquiciaslaboral
    private $tablaretirodinerosfondovolulaboral = "retirodinerosfondovolulaboral"; //idretirodinerosfondovolulaboral
    private $tablacampanniaspoliticas = "campanniaspoliticaslaboral"; //idcampanniaspoliticaslaboral
    private $tablaapoyoseconoestado = "apoyoseconoestadolaboral"; //idapoyoseconoestadolaboral

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

    public function calcularingresobrutolaboral($id)
    {

        $ingresosnoclasificanlaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "ingresosnoclasificanlaboral" FROM '.$this->tablaingresosnoclasificanlaboral.' WHERE idingresobrutolaboral = ?');
        $ingresosnoclasificanlaboral->execute([$id]);
        $ingresosnoclasificanlaboral = $ingresosnoclasificanlaboral->fetch(PDO::FETCH_ASSOC);

        $indemnizacionnolaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "indemnizacionnolaboral" FROM '.$this->tablaindemnizacionnolaboral.' WHERE idingresobrutolaboral = ?');
        $indemnizacionnolaboral->execute([$id]);
        $indemnizacionnolaboral = $indemnizacionnolaboral->fetch(PDO::FETCH_ASSOC);

        $derechosexplotpropielaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "derechosexplotpropielaboral" FROM '.$this->tabladerechosexplotpropielaboral.' WHERE idingresobrutolaboral = ?');
        $derechosexplotpropielaboral->execute([$id]);
        $derechosexplotpropielaboral = $derechosexplotpropielaboral->fetch(PDO::FETCH_ASSOC);

        $recibidosganancialeslaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "recibidosganancialeslaboral" FROM '.$this->tablarecibidosganancialeslaboral.' WHERE idingresobrutolaboral = ?');
        $recibidosganancialeslaboral->execute([$id]);
        $recibidosganancialeslaboral = $recibidosganancialeslaboral->fetch(PDO::FETCH_ASSOC);

        $valorbrutoventaslaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "valorbrutoventaslaboral" FROM '.$this->tablavalorbrutoventaslaboral.' WHERE idingresobrutolaboral = ?');
        $valorbrutoventaslaboral->execute([$id]);
        $valorbrutoventaslaboral = $valorbrutoventaslaboral->fetch(PDO::FETCH_ASSOC);
        
        $recompensaslaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "recompensaslaboral" FROM '.$this->tablarecompensaslaboral.' WHERE idingresobrutolaboral = ?');
        $recompensaslaboral->execute([$id]);
        $recompensaslaboral = $recompensaslaboral->fetch(PDO::FETCH_ASSOC);

        $explotfranquiciaslaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "explotfranquiciaslaboral" FROM '.$this->tablaexplotfranquiciaslaboral.' WHERE idingresobrutolaboral = ?');
        $explotfranquiciaslaboral->execute([$id]);
        $explotfranquiciaslaboral = $explotfranquiciaslaboral->fetch(PDO::FETCH_ASSOC);

        $retirodinerosfondovolulaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "retirodinerosfondovolulaboral" FROM '.$this->tablaretirodinerosfondovolulaboral.' WHERE idingresobrutolaboral = ?');
        $retirodinerosfondovolulaboral->execute([$id]);
        $retirodinerosfondovolulaboral = $retirodinerosfondovolulaboral->fetch(PDO::FETCH_ASSOC);

        $campanniaspoliticaslaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "campanniaspoliticaslaboral" FROM '.$this->tablacampanniaspoliticas.' WHERE idingresobrutolaboral = ?');
        $campanniaspoliticaslaboral->execute([$id]);
        $campanniaspoliticaslaboral = $campanniaspoliticaslaboral->fetch(PDO::FETCH_ASSOC);

        $apoyoseconoestadolaboral = $this->db->connect()->prepare('SELECT IF(SUM(valor) != 0,SUM(valor),0) AS "apoyoseconoestadolaboral" FROM '.$this->tablaapoyoseconoestado.' WHERE idingresobrutolaboral = ?');
        $apoyoseconoestadolaboral->execute([$id]);
        $apoyoseconoestadolaboral = $apoyoseconoestadolaboral->fetch(PDO::FETCH_ASSOC);

        $ingresobrutototal = $ingresosnoclasificanlaboral['ingresosnoclasificanlaboral'] + 
        $indemnizacionnolaboral['indemnizacionnolaboral'] +
        $derechosexplotpropielaboral['derechosexplotpropielaboral'] +
        $recibidosganancialeslaboral['recibidosganancialeslaboral'] +
        $valorbrutoventaslaboral['valorbrutoventaslaboral'] +
        $recompensaslaboral['recompensaslaboral'] +
        $explotfranquiciaslaboral['explotfranquiciaslaboral'] +
        $retirodinerosfondovolulaboral['retirodinerosfondovolulaboral'] +
        $campanniaspoliticaslaboral['campanniaspoliticaslaboral'] +
        $apoyoseconoestadolaboral['apoyoseconoestadolaboral'];

        $ingresobrutolaboral = $this->db->connect()->prepare('UPDATE '.$this->tablaingresobrutolaboral.' SET ingresobrutototal = ? WHERE idingresobrutolaboral = ?');
        $ingresobrutolaboral->execute([$ingresobrutototal, $id]);

    }

}

?>