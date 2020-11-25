<?php

class Tipovalorbrutoventaslaboralmodel extends Models{

    private $tablatipovalorbrutoventaslaboral = "tipovalorbrutoventaslaboral";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tvbvl.idtipovalorbrutoventaslaboral, tvbvl.nombre, tvbvl.descripcion, tvbvl.ayuda FROM '.$this->tablatipovalorbrutoventaslaboral.' tvbvl ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipovalorbrutoventaslaboral.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tvbvl.idtipovalorbrutoventaslaboral AS "id", tvbvl.nombre, tvbvl.descripcion, tvbvl.ayuda, "Renta no laboral" AS "renta", "Ingreso Bruto" AS "tiporenta", "Tipo valor bruto de ventas" AS aspecto FROM '.$this->tablatipovalorbrutoventaslaboral.' tvbvl WHERE tvbvl.idtipovalorbrutoventaslaboral = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipovalorbrutodeventas($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipovalorbrutoventaslaboral.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipovalorbrutoventaslaboral = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipovalorbrutoventaslaboral.' WHERE idtipovalorbrutoventaslaboral = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>