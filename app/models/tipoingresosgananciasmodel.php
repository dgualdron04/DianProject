<?php

class Tipoingresosgananciasmodel extends Models{

    private $tablatipoingresosganancias = "tipoingresosganancias";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tig.idtipoingresosganancias, tig.nombre, tig.descripcion, tig.ayuda FROM '.$this->tablatipoingresosganancias.' tig ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoingresosganancias.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tig.idtipoingresosganancias, tig.nombre, tig.descripcion, tig.ayuda FROM '.$this->tablatipoingresosganancias.' tig WHERE tig.idtipoingresosganancias = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editaringresosganancias($nombre, $descripcion, $ayuda, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoingresosganancias.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoingresosganancias = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoingresosganancias.' WHERE idtipoingresosganancias = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}





?>