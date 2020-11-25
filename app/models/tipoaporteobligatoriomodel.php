<?php

class Tipoaporteobligatoriomodel extends Models{

    private $tablatipoaporteobligatorio = "tipoaporteobligatorio";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tao.idtipoaporteobligatorio, tao.nombre, tao.descripcion, tao.ayuda FROM '.$this->tablatipoaporteobligatorio.' tao ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoaporteobligatorio.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tao.idtipoaporteobligatorio AS "id", tao.nombre, tao.descripcion, tao.ayuda, "Renta de Trabajo" AS "renta", "Ingresos No Constitutivos" AS "tiporenta", "Tipo Aporte Obligatorio" AS aspecto FROM '.$this->tablatipoaporteobligatorio.' tao WHERE tao.idtipoaporteobligatorio = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }


    public function editartipoaporteobligatorio($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoaporteobligatorio.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoaporteobligatorio = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoaporteobligatorio.' WHERE idtipoaporteobligatorio = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }


}
