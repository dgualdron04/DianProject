<?php 


class Deudamodel extends Models{

    private $tabladeuda = "deuda";

    public function crear($nombre, $valorbien, $idtipo, $idmoneda, $idmodelo){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tabladeuda.'(nombre, valordeuda, idtipodeuda, idtipomoneda, idmodelo) VALUES (?,?,?,?,?)')) {

            $query->execute([$nombre, $valorbien,$idtipo, $idmoneda, $idmodelo]);

            $iddeuda = $connect->lastInsertId();
            
            return $iddeuda;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT d.iddeuda AS "id", d.nombre AS "nombre", d.idtipodeuda AS "tipo", d.idtipomoneda AS "tipomoneda", d.idmodelo AS "modelo", d.valordeuda AS "valor" FROM '.$this->tabladeuda.' d WHERE d.iddeuda = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editardeuda($nombre, $idtipo, $valor, $tipomoneda, $modelo, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tabladeuda.' SET idtipodeuda  = ?, nombre = ?, valordeuda = ?, idtipomoneda = ?, idmodelo = ? WHERE iddeuda = ?')) {
            $stmt->execute([$idtipo, $nombre, $valor, $tipomoneda, $modelo, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tabladeuda.' WHERE iddeuda = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}


?>