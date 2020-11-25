
<?php 

class Derechosexplotpropielaboralmodel extends Models{

    private $tabladerechosexplotpropielaboral = "derechosexplotpropielaboral";

    public function crear($nombre, $valor, $idingresobrutolaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tabladerechosexplotpropielaboral.'(nombre, valor, idingresobrutolaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresobrutolaboral]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>