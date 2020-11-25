
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


}

?>