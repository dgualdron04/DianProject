
<?php 

class Indemnizacionmodel extends Models{

    private $tablaindemnizacion = "indemnizacion";

    public function crear($nombre, $valor, $idtipoindemnizacion, $idrentaexenta){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaindemnizacion.'(nombre, valor, idtipoindemnizacion, idrentaexenta) VALUES (?,?,?,?)')) {

            $query->execute([$nombre, $valor, $idtipoindemnizacion, $idrentaexenta]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>