
<?php

class Tipoaporteobligatoriolaboralnoconsemodel extends Models{

    private $tablatipoaporteobligatoriolaboralnoconse = "tipoaporteobligatoriolaboralnoconse";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoaporteobligatoriolaboralnoconse.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT taolnc.idtipoaporteobligatoriolaboralnoconse AS "id", taolnc.nombre, taolnc.descripcion, taolnc.ayuda, "Renta no laboral" AS "renta", "Ingreso no constitutivos" AS "tiporenta", "Tipo de aporte obligatorio" AS aspecto FROM '.$this->tablatipoaporteobligatoriolaboralnoconse.' taolnc WHERE taolnc.idtipoaporteobligatoriolaboralnoconse = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipodeaporteobligatorio($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoaporteobligatoriolaboralnoconse.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoaporteobligatoriolaboralnoconse = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoaporteobligatoriolaboralnoconse.' WHERE idtipoaporteobligatoriolaboralnoconse = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>