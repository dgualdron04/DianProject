<?php 


class Rentatrabajomodel extends Models{

    private $tablarentatrabajo = "rentatrabajo";
    private $tablacedulageneral = "cedulageneral";
    private $tablaingresobruto = "ingresobruto";
    private $tablausuarioingresobruto = "usuarioingresobruto";
    private $tablaingresonoconse = "ingresonoconse";
    private $tablausuarioingresonoconse = "usuarioingresonoconse";
    private $tabladeducciones = "deducciones";
    private $tablausuariodeducciones = "usuariodeducciones";
    private $tablarentaexenta = "rentaexenta";
    private $tablausuariorentaexenta = "usuariorentaexenta";

    public function crear($idcedulageneral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentatrabajo.'(rentaliquida, rentasexentasdeduccion, rentaliquidatrabajo, idcedulageneral) VALUES (?,?,?,?)')) {

            $query->execute([0,0,0,$idcedulageneral]);

            $idrentatrabajo = $connect->lastInsertId();

            return $idrentatrabajo;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT rt.idrentatrabajo AS "id" FROM '.$this->tablarentatrabajo.' rt JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function calcularrentatrabajo($id){

        $ingresobruto = $this->db->connect()->prepare('SELECT ib.ingresobrutototal AS "ingresobruto" FROM '.$this->tablaingresobruto.' ib JOIN '.$this->tablausuarioingresobruto.' uib ON uib.idingresobruto = ib.idingresobruto WHERE uib.idrentatrabajo = ?');
        $ingresobruto->execute([$id]);
        $ingresobruto = $ingresobruto->fetch(PDO::FETCH_ASSOC);
        
        $ingresonoconse = $this->db->connect()->prepare('SELECT inc.ingresosnoconsetotal AS "ingresnoconse" FROM '.$this->tablaingresonoconse.' inc JOIN '.$this->tablausuarioingresonoconse.' uinc ON uinc.idingresonoconse = inc.idingresonoconse  WHERE uinc.idrentatrabajo = ?');
        $ingresonoconse->execute([$id]);
        $ingresonoconse = $ingresonoconse->fetch(PDO::FETCH_ASSOC);

        $deducciones = $this->db->connect()->prepare('SELECT IF(SUM(d.valor) != 0,SUM(d.valor),0) AS "deducciones" FROM '.$this->tabladeducciones.' d JOIN '.$this->tablausuariodeducciones.' ud ON ud.iddeducciones = d.iddeducciones  WHERE ud.idrentatrabajo = ?');
        $deducciones->execute([$id]);
        $deducciones = $deducciones->fetch(PDO::FETCH_ASSOC);

        $rentaliquida = $ingresobruto['ingresobruto'] - $ingresonoconse['ingresnoconse'];

        $rentaliquidaydeducciones = $rentaliquida - $deducciones['deducciones'];

        $rentaexenta = $this->db->connect()->prepare('SELECT rentaexentatotal AS "rentaexenta" FROM '.$this->tablarentaexenta.' re JOIN '.$this->tablausuariorentaexenta.' ure ON ure.idrentaexenta = ure.idrentaexenta WHERE ure.idrentatrabajo = ?');
        $rentaexenta->execute([$id]);
        $rentaexenta = $rentaexenta->fetch(PDO::FETCH_ASSOC);

        $subtotal = $rentaliquida - $rentaexenta['rentaexenta'];

        $rentasexentasdeduccion = $rentaliquida * 40 / 100;

        $rentaliquidatrabajo = $rentaliquida - $rentasexentasdeduccion;

        $rentatrabajo = $this->db->connect()->prepare('UPDATE '.$this->tablarentatrabajo.' SET rentaliquida = ?, rentasexentasdeduccion = ?, rentaliquidatrabajo = ? WHERE idrentatrabajo = ?');
        $rentatrabajo->execute([$rentaliquida, $rentasexentasdeduccion, $rentaliquidatrabajo, $id]);

    }


}


?>