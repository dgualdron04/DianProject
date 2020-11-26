
<?php 

class Deduccionesmodel extends Models{

    private $tabladeducciones = "deducciones";

    public function crear($nombre, $valor, $idtipodeduccion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tabladeducciones.'(nombre, valor, idtipodeduccion) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idtipodeduccion]);

            $iddeducciones = $connect->lastInsertId();
            
            return $iddeducciones;
        } else {

            return false;

        }

        

        

    }

    public function consultarvalor($iddeclaracion){

        $deducciones = $this->db->connect()->prepare('SELECT IF(SUM(d.valor) != 0,SUM(d.valor),0) AS "deducciones" FROM deducciones d JOIN usuariodeducciones ud ON ud.iddeducciones = d.iddeducciones JOIN rentatrabajo rt ON rt.idrentatrabajo = ud.idrentatrabajo JOIN cedulageneral cg on cg.idcedulageneral = rt.idcedulageneral WHERE iddeclaracion = ?');
        $deducciones->execute([$iddeclaracion]);
        $deducciones = $deducciones->fetch(PDO::FETCH_ASSOC);

        return $deducciones;

    }


}

?>