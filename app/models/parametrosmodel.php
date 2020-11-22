<?php 


class Parametrosmodel extends Models{

    private $tablaparametros = "parametros";
    private $tablacalendario = "calendariofiscal";
    private $tablaperiododeclarante = "periododeclarante";
    private $tablaparametrosdeclaracion = "parametrosdeclaracion";

    public function listar(){

            $query = $this->db->connect()->prepare('SELECT p.idparametro, p.valortributario, p.tope1, p.tope2, p.annoperiodo, p.marcolegal, p.marcocalendario, p.estadoparametro FROM '.$this->tablaparametros.' p ORDER BY p.annoperiodo DESC ;');
            $query->execute();
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            return $myquery;

    }

    public function crear($annoperiodo, $valortributario, $tope1, $tope2, $marcolegal, $marcocalendario){
       

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablaparametros.' (valortributario, tope1, tope2, annoperiodo, marcolegal, marcocalendario, estadoparametro) VALUES (?, ?, ?, ?, ?, ?, ?)')) {
            $query->execute([$valortributario, $tope1, $tope2, $annoperiodo, $marcolegal, $marcocalendario, 1]);
            return true;
        } else {
            return false;
        }
    
    }

    public function editar($id){
        $query = $this->db->connect()->prepare('SELECT p.idparametro,p.valortributario, p.tope1, p.tope2, p.annoperiodo, p.marcolegal, p.marcocalendario, p.estadoparametro FROM parametros p WHERE p.idparametro = ?;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));
    }

    public function editarparametros($valortributario, $tope1, $tope2,$marcolegal, $marcocalendario, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablaparametros.' SET valortributario = ?, tope1 = ?, tope2 = ?, marcolegal = ?, marcocalendario = ? WHERE idparametro = ?')) {
            $stmt->execute([$valortributario, $tope1, $tope2 ,$marcolegal, $marcocalendario, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id){
        if ($query = $this->db->connect()->prepare('SELECT * FROM '.$this->tablacalendario.' WHERE idparametro = ?')) {
            $query->execute([$id]);
            if ($query->rowCount() > 0) {
                $query = $query->fetchAll(PDO::FETCH_ASSOC);

                if ($query2 = $this->db->connect()->prepare('SELECT * FROM '.$this->tablaperiododeclarante.' WHERE idcalendario = ?')) {
                    $query2->execute([$query[0]['idcalendario']]);

                    if ($query2->rowCount() > 0) {
                        
                        if ($query3 = $this->db->connect()->prepare('DELETE FROM '.$this->tablaperiododeclarante.' WHERE idcalendario = ?')) {
                            $query3->execute([$query[0]['idcalendario']]);
                        }

                    }
                }

                if ( $query4 = $this->db->connect()->prepare('DELETE FROM '.$this->tablacalendario.' WHERE idparametro = ? ')) {
                
                    $query4->execute([$id]);
        
                } 

            } 
        }

        if ($query5 = $this->db->connect()->prepare('SELECT * FROM '.$this->tablaparametrosdeclaracion.' WHERE idparametro = ?')) {
            $query5->execute([$id]);

            if ($query6 = $this->db->connect()->prepare('DELETE FROM '.$this->tablaparametrosdeclaracion.' WHERE idparametro = ?')) {
                $query6->execute([$id]);
            }

        }

        if ( $stmt = $this->db->connect()->prepare('DELETE FROM '.$this->tablaparametros.' WHERE idparametro = ? ')) {
                
            $stmt->execute([$id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function topes($year){
        $query = $this->db->connect()->prepare('SELECT tope1, tope2 FROM '.$this->tablaparametros.' WHERE annoperiodo = ? AND estadoparametro = 1');
        $query->execute([$year]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

}

?>