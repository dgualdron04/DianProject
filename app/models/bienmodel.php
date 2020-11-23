<?php 


class Bienmodel extends Models{

    private $tablabien = "bien";

    public function crear($valorbien,$idtipo, $idmoneda, $idmodelo){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablabien.'(valorbien, idtipobien, idtipomoneda, idmodelo) VALUES (?,?,?,?)')) {

            $query->execute([$valorbien,$idtipo, $idmoneda, $idmodelo]);

            $idbien = $connect->lastInsertId();
            
            return $idbien;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT b.idbien AS "id", b.idtipobien AS "tipo", b.idtipomoneda AS "tipomoneda", b.idmodelo AS "modelo", b.valorbien AS "valor" FROM '.$this->tablabien.' b WHERE b.idbien = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editarbien($idtipo, $valor, $tipomoneda, $modelo, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablabien.' SET idtipobien  = ?, valorbien = ?, idtipomoneda = ?, idmodelo = ? WHERE idbien = ?')) {
            $stmt->execute([$idtipo, $valor, $tipomoneda, $modelo, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablabien.' WHERE idbien = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}


?>