
<?php 

class Exogenasmodel extends Models{

    private $tablaexogenas = "exogenas";

    public function listar($id){
        $query = $this->db->connect()->prepare('SELECT idexogenas as "id",ruta FROM exogenas WHERE iddeclaracion = ?;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;
    }

    public function crear($ruta, $iddeclaracion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaexogenas.'(ruta, iddeclaracion) VALUES (?,?)')) {

            $query->execute([$ruta, $iddeclaracion]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>