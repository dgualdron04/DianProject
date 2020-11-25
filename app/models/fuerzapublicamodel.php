<?php

class Fuerzapublicamodel extends Models{

    private $tablafuerzapublica = "fuerzapublica";
    private $tablarentaexenta = "rentaexenta";
    private $tablausuariorentaexenta = "usuariorentaexenta";
    private $tablarentatrabajo = "rentatrabajo";
    private $tablacedulageneral = "cedulageneral";

    public function crear($idrentaexenta){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablafuerzapublica.'(fuerzapublicatotal, idrentaexenta) VALUES (?, ?)')) {

            $query->execute([0, $idrentaexenta]);

            /* $idingresonoconse = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT fp.idfuerzapublica AS "id" FROM '.$this->tablafuerzapublica.' fp JOIN '.$this->tablarentaexenta.' re ON re.idrentaexenta = fp.idrentaexenta JOIN '.$this->tablausuariorentaexenta.' ure ON ure.idrentaexenta = re.idrentaexenta JOIN '.$this->tablarentatrabajo.' rt ON rt.idrentatrabajo = ure.idrentatrabajo JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}
?>