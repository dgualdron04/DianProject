<?php

class Direccionseccionalmodel extends Models{

    private $tabladireccionseccional = "direccionseccional";

    public function crear($idtipo, $idusuario){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tabladireccionseccional.'(idtipodireccionseccional, idusuario) VALUES (?, ?)')) {

            $query->execute([$idtipo, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT ds.iddireccionseccional AS "id", ds.idtipodireccionseccional AS "tipo", ds.idusuario FROM '.$this->tabladireccionseccional.' ds WHERE ds.iddireccionseccional = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editardireccionseccional($idtipo, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tabladireccionseccional.' SET idtipodireccionseccional  = ? WHERE iddireccionseccional = ?')) {
            $stmt->execute([$idtipo, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tabladireccionseccional.' WHERE iddireccionseccional = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>