
<?php

class Tipootroscostogastolaboralmodel extends Models{

    private $tablatipootroscostogastolaboral = "tipootroscostogastolaboral";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipootroscostogastolaboral.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tocgl.idtipootroscostogastolaboral AS "id", tocgl.nombre, tocgl.descripcion, tocgl.ayuda, "Renta no laboral" AS "renta", "Costos y deducciones procedentes" AS "tiporenta", "Tipo otros costos gastos" AS aspecto FROM '.$this->tablatipootroscostogastolaboral.' tocgl WHERE tocgl.idtipootroscostogastolaboral = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipootroscostosgastos($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipootroscostogastolaboral.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipootroscostogastolaboral = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipootroscostogastolaboral.' WHERE idtipootroscostogastolaboral = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>