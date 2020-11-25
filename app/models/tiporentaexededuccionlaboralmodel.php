<?php

class Tiporentaexededuccionlaboralmodel extends Models{

    private $tablatiporentaexededuccionlaboral = "tiporentaexededuccionlaboral";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tre.idtiporentaexededuccionlaboral, tre.nombre, tre.descripcion, tre.ayuda FROM '.$this->tablatiporentaexededuccionlaboral.' tre ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatiporentaexededuccionlaboral.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tredl.idtiporentaexededuccionlaboral AS "id", tredl.nombre, tredl.descripcion, tredl.ayuda, "Renta no laboral" AS "renta", "Renta exenta deduccion" AS "tiporenta", "Tipo renta exenta deduccion" AS aspecto FROM '.$this->tablatiporentaexededuccionlaboral.' tredl WHERE tredl.idtiporentaexededuccionlaboral = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartiporentaexentadeduccion($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatiporentaexededuccionlaboral.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtiporentaexededuccionlaboral = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatiporentaexededuccionlaboral.' WHERE idtiporentaexededuccionlaboral = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>