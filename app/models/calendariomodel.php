<?php 

class Calendariomodel extends Models{

    private $tablacalendario = "calendariofiscal";
    private $tablaparametro = "parametros";
    private $tablaperiododeclarante = "periododeclarante";

    public function listar(){
        $query = $this->db->connect()->prepare('SELECT c.idcalendario, c.dia1, c.dia2, p.annoperiodo FROM '.$this->tablacalendario.' c JOIN '.$this->tablaparametro.' p ON p.idparametro = c.idparametro ORDER BY p.annoperiodo DESC;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;
    }

    public function crear($dia1, $dia2, $idparametro){
        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablacalendario.' (dia1, dia2, idparametro) VALUES (?, ?, ?)')) {
            $query->execute([$dia1, $dia2, $idparametro]);
            return true;
        } else {
            return false;
        }
    }

    public function editar($id){
        $query = $this->db->connect()->prepare('SELECT c.idcalendario, c.dia1, c.dia2, p.annoperiodo FROM '.$this->tablacalendario.' c JOIN '.$this->tablaparametro.' p on p.idparametro = c.idparametro WHERE c.idcalendario = ?;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    }

    public function editarcalendario($dia1, $dia2, $idcalendario){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablacalendario.' SET dia1 = ?, dia2 = ? WHERE idcalendario = ?')) {
            $stmt->execute([$dia1, $dia2, $idcalendario]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($idcalendario){
        if ($query = $this->db->connect()->prepare('SELECT * FROM '.$this->tablaperiododeclarante.' WHERE idcalendario = ?')) {
            $query->execute([$idcalendario]);
            if ($query->rowCount() > 0) {
                if ( $query2 = $this->db->connect()->prepare('DELETE FROM '.$this->tablaperiododeclarante.' WHERE idcalendario = ? ')) {
                
                    $query2->execute([$idcalendario]);
        
                } else {
                    
                }

            } else {

            }
        }

        if ( $stmt = $this->db->connect()->prepare('DELETE FROM '.$this->tablacalendario.' WHERE idcalendario = ? ')) {
                
            $stmt->execute([$idcalendario]);
            
            return true;
        } else {
            
            return false;
        }
    }

}

?>