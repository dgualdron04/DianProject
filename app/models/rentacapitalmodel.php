<?php 


class Rentacapitalmodel extends Models{

    private $tablarentacapital = "rentacapital";
    private $tablacedulageneral = "cedulageneral";
    private $tablaingresobrutocapital = "ingresobrutocapital";
    private $tablausuarioingresobrutocapital = "usuarioingresobrutocapital";
    private $tablaingresonoconsecapital = "ingresonoconsecapital";
    private $tablausuarioingresonoconsecapital = "usuarioingresonoconsecapital";
    private $tablacostogastosprocecapital = "costogastosprocecapital";
    private $tablausuariocostogastosprocecapital = "usuariocostogastosprocecapital";
    private $tablarentaliqpasececapital = "rentaliqpasececapital";
    private $tablausuariorentaliqpasececapital = "usuariorentaliqpasececapital";
    private $tablarentaexededuccioncapital = "rentaexededuccioncapital";
    private $tablausuariorentaexededuccioncapital = "usuariorentaexededuccioncapital";

    public function crear($idcedulageneral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentacapital.'(rentaliquida, rentasexentasdeduccion, rentaliquidaordinaria, rentaliquidacapital, idcedulageneral) VALUES (?,?,?,?,?)')) {

            $query->execute([0,0,0,0,$idcedulageneral]);

            $idrentacapital = $connect->lastInsertId();

            return $idrentacapital;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT rc.idrentacapital AS "id" FROM '.$this->tablarentacapital.' rc JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rc.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function calcualrrentacapital($id){

        $ingresobrutocapital = $this->db->connect()->prepare('SELECT ibc.ingresobrutocapitaltotal AS "ingresobrutocapital" FROM '.$this->tablaingresobrutocapital.' ibc JOIN '.$this->tablausuarioingresobrutocapital.' uibc ON uibc.idingresobrutocapital = ibc.idingresobrutocapital WHERE uibc.idrentacapital = ?');
        $ingresobrutocapital->execute([$id]);
        $ingresobrutocapital = $ingresobrutocapital->fetch(PDO::FETCH_ASSOC);
        
        $ingresonoconsecapital = $this->db->connect()->prepare('SELECT incc.ingresosnoconsecapitaltotal AS "ingresonoconsecapital" FROM '.$this->tablaingresonoconsecapital.' incc JOIN '.$this->tablausuarioingresonoconsecapital.' uincc ON uincc.idingresonoconsecapital = incc.idingresonoconsecapital  WHERE uincc.idrentacapital = ?');
        $ingresonoconsecapital->execute([$id]);
        $ingresonoconsecapital = $ingresonoconsecapital->fetch(PDO::FETCH_ASSOC);


        $costogastosprocecapital = $this->db->connect()->prepare('SELECT cgpc.valor AS "costogastosprocecapital" FROM '.$this->tablacostogastosprocecapital.' cgpc JOIN '.$this->tablausuariocostogastosprocecapital.' ucgpc ON ucgpc.idcostogastosprocecapital = cgpc.idcostogastosprocecapital WHERE ucgpc.idrentacapital = ?');
        $costogastosprocecapital->execute([$id]);
        $costogastosprocecapital = $costogastosprocecapital->fetch(PDO::FETCH_ASSOC);
        
        $rentaliqpasececapital = $this->db->connect()->prepare('SELECT IF(SUM(rlpcc.valor) != 0,SUM(rlpcc.valor),0) AS "rentaliqpasececapital" FROM '.$this->tablarentaliqpasececapital.' rlpcc JOIN '.$this->tablausuariorentaliqpasececapital.' urlpcc ON urlpcc.idrentaliqpasececapital = rlpcc.idrentaliqpasececapital  WHERE urlpcc.idrentacapital = ?');
        $rentaliqpasececapital->execute([$id]);
        $rentaliqpasececapital = $rentaliqpasececapital->fetch(PDO::FETCH_ASSOC);

        $rentaexededuccioncapital = $this->db->connect()->prepare('SELECT IF(SUM(rdedc.valor) != 0,SUM(rdedc.valor),0) AS "rentaexededuccioncapital" FROM '.$this->tablarentaexededuccioncapital.' rdedc JOIN '.$this->tablausuariorentaexededuccioncapital.' urdedc ON urdedc.idrentaexededuccioncapital = rdedc.idrentaexededuccioncapital  WHERE urdedc.idrentacapital = ?');
        $rentaexededuccioncapital->execute([$id]);
        $rentaexededuccioncapital = $rentaexededuccioncapital->fetch(PDO::FETCH_ASSOC);

        $rentaliquida = $ingresobrutocapital['ingresobrutocapital'] - $ingresonoconsecapital['ingresonoconsecapital'] - $costogastosprocecapital['costogastosprocecapital'];

        $rentaliquidaordinaria = $ingresobrutocapital['ingresobrutocapital'] + $rentaliqpasececapital['rentaliqpasececapital'] - $ingresonoconsecapital['ingresonoconsecapital'] - $costogastosprocecapital['costogastosprocecapital'] - $rentaexededuccioncapital['rentaexededuccioncapital'];
    
        $rentaliquidacapital = $rentaliquidaordinaria;

        $rentaexecapital = ($ingresobrutocapital['ingresobrutocapital'] - $ingresonoconsecapital['ingresonoconsecapital'] + $rentaliqpasececapital['rentaliqpasececapital']) * 40 / 100;

        $noexceder = round(5040 * 34270);

        $valorfinal = $rentaexecapital > $noexceder ? round($noexceder * ($rentaexecapital / $rentaexecapital)) : $rentaexecapital;

        $rentasexentasdeduccion = $valorfinal > $rentaexededuccioncapital['rentaexededuccioncapital'] ? $rentaexededuccioncapital['rentaexededuccioncapital'] : $valorfinal;

        $rentacapital = $this->db->connect()->prepare('UPDATE '.$this->tablarentacapital.' SET rentaliquida = ?, rentasexentasdeduccion = ?, rentaliquidaordinaria = ?, rentaliquidacapital = ? WHERE idrentacapital = ?');
        $rentacapital->execute([$rentaliquida, $rentasexentasdeduccion, $rentaliquidaordinaria, $rentaliquidacapital, $id]);

    }


}


?>