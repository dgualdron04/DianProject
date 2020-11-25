<?php

class Rentaexentamodel extends Models{

    private $tablarentaexenta = "rentaexenta";
    private $tablausuariorentaexenta = "usuariorentaexenta";
    private $tablarentatrabajo = "rentatrabajo";
    private $tablacedulageneral = "cedulageneral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentaexenta.'(rentaexentatotal) VALUES (?)')) {

            $query->execute([0]);

            $idrentaexenta = $connect->lastInsertId();

            return $idrentaexenta;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT re.idrentaexenta AS "id" FROM '.$this->tablarentaexenta.' re JOIN '.$this->tablausuariorentaexenta.' ure ON ure.idrentaexenta = re.idrentaexenta JOIN '.$this->tablarentatrabajo.' rt ON rt.idrentatrabajo = ure.idrentatrabajo JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}
?>