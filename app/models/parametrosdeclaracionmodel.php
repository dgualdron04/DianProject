<?php 

class Parametrosdeclaracionmodel extends Models{

    private $tablaparametrosdeclaracion = "parametrosdeclaracion";
    private $tablaparametros = "parametros";
    private $tabladeclaracion = "declaracion";

    public function listar($id){

            $query = $this->db->connect()->prepare('SELECT p.annoperiodo FROM '.$this->tablaparametrosdeclaracion.' pd JOIN '.$this->tablaparametros.' p ON p.idparametro = pd.idparametro JOIN '.$this->tabladeclaracion.' d ON d.iddeclaracion = pd.iddeclaracion WHERE d.idusuario = ?;');
            $query->execute([$id]);
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            return $myquery;

    }

    public function crear($iddeclaracion){
        
        $fecha = getdate();

        $parametro = $this->db->connect()->prepare('SELECT p.idparametro FROM parametros p WHERE annoperiodo = ?');
        $parametro->execute([$fecha['year']-1]);
        $parametro = $parametro->fetch(PDO::FETCH_ASSOC);

        $query = $this->db->connect()->prepare('INSERT INTO '.$this->tablaparametrosdeclaracion.'(idparametro, iddeclaracion) VALUES (?,?)');
        $query->execute([$parametro['idparametro'], $iddeclaracion]);
    }

}



?>