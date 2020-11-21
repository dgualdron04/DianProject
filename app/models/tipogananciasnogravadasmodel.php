<?php

class Tipogananciasnogravadasmodel extends Models{

    private $tablatipogananciasnogravadas = "tipogananciasnogravadas";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tgng.idtipogananciasnogravadas, tgng.nombre, tgng.descripcion, tgng.ayuda FROM '.$this->tablatipogananciasnogravadas.' tgng ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipogananciasnogravadas.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tgng.idtipogananciasnogravadas, tgng.nombre, tgng.descripcion, tgng.ayuda FROM '.$this->tablatipogananciasnogravadas.' tgng WHERE tgng.idtipogananciasnogravadas = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editargananciasnogravadas($nombre, $descripcion, $ayuda, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipogananciasnogravadas.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipogananciasnogravadas = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipogananciasnogravadas.' WHERE idtipogananciasnogravadas = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}





?>