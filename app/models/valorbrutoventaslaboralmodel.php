
<?php 

class Valorbrutoventaslaboralmodel extends Models{

    private $tablavalorbrutoventaslaboral = "valorbrutoventaslaboral";

    public function crear($nombre, $valor, $idingresobrutolaboral, $idtipovalorbrutoventaslaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablavalorbrutoventaslaboral.'(nombre, valor, idingresobrutolaboral, idtipovalorbrutoventaslaboral) VALUES (?,?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresobrutolaboral, $idtipovalorbrutoventaslaboral]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>