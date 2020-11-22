<?php

class Actividadeconomicamodel extends Models{

    private $tablaactividadeconomica = "actividadeconomica";

    public function crear($idtipo, $idusuario){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablaactividadeconomica.'(idtipoactividad, idusuario) VALUES (?, ?)')) {

            $query->execute([$idtipo, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT ac.idactividadeconomica AS "id", ac.idtipoactividad AS "tipo", ac.idusuario FROM '.$this->tablaactividadeconomica.' ac WHERE ac.idactividadeconomica = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editaractividadeconomica($idtipo, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablaactividadeconomica.' SET idtipoactividad  = ? WHERE idactividadeconomica = ?')) {
            $stmt->execute([$idtipo, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }
    
    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablaactividadeconomica.' WHERE idactividadeconomica = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}

?>