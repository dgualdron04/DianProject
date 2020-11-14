<?php 

class Periododeclarantemodel extends Models{

    private $tablaperiododeclarante = "periododeclarante";
    private $tablacalendario = "calendariofiscal";

    public function listar($id){
        $query = $this->db->connect()->prepare('SELECT p.idperiododeclarante,p.digito1, p.digito2, p.dia, p.idcalendario FROM '.$this->tablaperiododeclarante.' p WHERE p.idcalendario = ? ORDER BY p.dia ASC;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    }

    public function crear($digito1, $digito2,$fecha, $idcalendario){

        if ($query = $this->db->connect()->prepare('SELECT c.dia1, c.dia2 FROM '.$this->tablacalendario.' c WHERE c.idcalendario = ?')) {
            $query->execute([$idcalendario]);
            $query = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($query[0]['dia1'] > $fecha || $query[0]['dia2'] < $fecha) {
                return false;
            }else{
                
                if ($query2 = $this->db->connect()->prepare('INSERT INTO '.$this->tablaperiododeclarante.' (digito1, digito2, dia, idcalendario) VALUES (?, ?, ?, ?)')) {
                    $query2->execute([$digito1, $digito2, $fecha, $idcalendario]);

                    return true;
                } else{
                    return false;
                }
                
            }
        }

    }

    public function editar($idperiodo){

        $query = $this->db->connect()->prepare('SELECT p.idperiododeclarante,p.digito1, p.digito2, p.dia, p.idcalendario FROM '.$this->tablaperiododeclarante.' p WHERE p.idperiododeclarante = ?;');
        $query->execute([$idperiodo]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editarperiodo($digito1, $digito2, $fecha, $idperiodo){

        if ($query = $this->db->connect()->prepare('SELECT c.dia1, c.dia2 FROM '.$this->tablaperiododeclarante.' pd JOIN '.$this->tablacalendario.' c ON c.idcalendario = pd.idcalendario WHERE pd.idperiododeclarante = ?')) {
            $query->execute([$idperiodo]);
            $query = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($query[0]['dia1'] > $fecha || $query[0]['dia2'] < $fecha) {
                return false;
            }else{

                if ($query2 = $this->db->connect()->prepare('UPDATE '.$this->tablaperiododeclarante.' SET digito1 = ?, digito2 = ?, dia = ? WHERE idperiododeclarante = ?')) {
                    $query2->execute([$digito1, $digito2, $fecha, $idperiodo]);
                    return true;
                }else{
                    return false;
                }

            }
        }

    }

    public function eliminar($idperiodo){
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablaperiododeclarante.' WHERE idperiododeclarante = ? ')) {
                
            $query->execute([$idperiodo]);
            return true;
        } else{
            return false;
        }
    }

}

?>