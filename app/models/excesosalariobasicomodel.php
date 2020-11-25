
<?php 

class Excesosalariobasicomodel extends Models{

    private $tablaexcesosalariobasico = "excesosalariobasico";

    public function crear($valor, $idfuerzapublica){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaexcesosalariobasico.'(valor, idfuerzapublica) VALUES (?,?)')) {

            $query->execute([$valor, $idfuerzapublica]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>