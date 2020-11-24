<?php 


class Bienmodel extends Models{

    private $tablabien = "bien";

    public function crear($nombre, $valorbien,$idtipo, $idmoneda, $idmodelo){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablabien.'(nombre, valorbien, idtipobien, idtipomoneda, idmodelo) VALUES (?,?,?,?,?)')) {

            $query->execute([$nombre,$valorbien,$idtipo, $idmoneda, $idmodelo]);

            $idbien = $connect->lastInsertId();
            
            return $idbien;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT b.idbien AS "id", b.nombre AS "nombre", b.idtipobien AS "tipo", b.idtipomoneda AS "tipomoneda", b.idmodelo AS "modelo", b.valorbien AS "valor" FROM '.$this->tablabien.' b WHERE b.idbien = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editarbien($nombre, $idtipo, $valor, $tipomoneda, $modelo, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablabien.' SET idtipobien  = ?, nombre = ?, valorbien = ?, idtipomoneda = ?, idmodelo = ? WHERE idbien = ?')) {
            $stmt->execute([$idtipo, $nombre, $valor, $tipomoneda, $modelo, $id]);
            
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