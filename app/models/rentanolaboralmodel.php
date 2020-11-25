<?php 


class Rentanolaboralmodel extends Models{

    private $tablarentanolaboral = "rentanolaboral";
    private $tablacedulageneral = "cedulageneral";
    private $tablaingresobruto ="ingresobrutolaboral";
    private $tablausuarioingresobruto = "usuarioingresobrutolaboral";
    private $tabladevdescreblaboral = "devdescreblaboral";
    private $tablausuariodevdescreblaboral = "usuariodevdescreblaboral";
    private $tablaingresosnoconselaboral ="ingresosnoconselaboral";
    private $tablausuarioingresonoconselaboral = "usuarioingresonoconselaboral";
    private $tablacostogastosproce = "costogastosproce";
    private $tablacostogastosprocelaboral = "costogastosprocelaboral";
    private $tablarentaliqpasecelaboral = "rentaliqpasecelaboral";
    private $tablausuariorentaliqpasecelaboral = "usuariorentaliqpasecelaboral";
    private $tablarentaexededuccionlaboral = "rentaexededuccionlaboral";
    private $tablausuariorentaexededuccionlaboral = "usuariorentaexededuccionlaboral";

    public function crear($idcedulageneral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentanolaboral.'(rentaliquida, rentasexentasdeduccion, rentaliquidaordinaria, rentaliquidanolaboral, idcedulageneral) VALUES (?,?,?,?,?)')) {

            $query->execute([0,0,0,0,$idcedulageneral]);

            $idrentanolaboral = $connect->lastInsertId();

            return $idrentanolaboral;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT rl.idrentanolaboral AS "id" FROM '.$this->tablarentanolaboral.' rl JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rl.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function calcularrentanolaboral($id){

        $ingresobruto = $this->db->connect()->prepare('SELECT ib.ingresobrutototal AS "ingresobruto" FROM '.$this->tablaingresobruto.' ib JOIN '.$this->tablausuarioingresobruto.' uib ON uib.idingresobrutolaboral = ib.idingresobrutolaboral WHERE uib.idrentanolaboral = ?');
        $ingresobruto->execute([$id]);
        $ingresobruto = $ingresobruto->fetch(PDO::FETCH_ASSOC);
        
        $devdescreblaboral = $this->db->connect()->prepare('SELECT IF(SUM(ddl.valor) != 0,SUM(ddl.valor),0) AS "devdescreblaboral" FROM '.$this->tabladevdescreblaboral.' ddl JOIN '.$this->tablausuariodevdescreblaboral.' uddl ON uddl.iddevdescreblaboral = ddl.iddevdescreblaboral  WHERE uddl.idrentanolaboral = ?');
        $devdescreblaboral->execute([$id]);
        $devdescreblaboral = $devdescreblaboral->fetch(PDO::FETCH_ASSOC);

        $ingresosnoconselaboral = $this->db->connect()->prepare('SELECT ib.ingresosnoconsetotal AS "ingresosnoconsetotal" FROM '.$this->tablaingresosnoconselaboral.' ib JOIN '.$this->tablausuarioingresonoconselaboral.' uib ON uib.idingresosnoconselaboral = ib.idingresosnoconselaboral WHERE uib.idrentanolaboral = ?');
        $ingresosnoconselaboral->execute([$id]);
        $ingresosnoconselaboral = $ingresosnoconselaboral->fetch(PDO::FETCH_ASSOC);

        /* $rentaliquida = $ingresobruto['ingresobruto'] - $ingresonoconse['ingresnoconse'];

        $rentaliquidaydeducciones = $rentaliquida - $deducciones['deducciones'];

        $rentaexenta = $this->db->connect()->prepare('SELECT rentaexentatotal AS "rentaexenta" FROM '.$this->tablarentaexenta.' re JOIN '.$this->tablausuariorentaexenta.' ure ON ure.idrentaexenta = ure.idrentaexenta WHERE ure.idrentanolaboral = ?');
        $rentaexenta->execute([$id]);
        $rentaexenta = $rentaexenta->fetch(PDO::FETCH_ASSOC);

        $subtotal = $rentaliquida - $rentaexenta['rentaexenta'];

        $rentasexentasdeduccion = $rentaliquida * 40 / 100;

        $rentaliquidatrabajo = $rentaliquida - $rentasexentasdeduccion; */

        /* $rentatrabajo = $this->db->connect()->prepare('UPDATE '.$this->tablarentatrabajo.' SET rentaliquida = ?, rentasexentasdeduccion = ?, rentaliquidatrabajo = ? WHERE idrentatrabajo = ?');
        $rentatrabajo->execute([$rentaliquida, $rentasexentasdeduccion, $rentaliquidatrabajo, $id]); */

    }


}


?>