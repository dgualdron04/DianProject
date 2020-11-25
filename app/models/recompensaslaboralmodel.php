
<?php 

class Recompensaslaboralmodel extends Models{

    private $tablarecompensaslaboral = "recompensaslaboral";

    public function crear($nombre, $valor, $idingresobrutolaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarecompensaslaboral.'(nombre, valor, idingresobrutolaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresobrutolaboral]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>