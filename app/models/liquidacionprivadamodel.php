<?php

class Liquidacionprivadamodel extends Models{

    private $tablaliquidacionprivada = "liquidacionprivada";
    private $tablaanticiporenta = "anticiporenta";
    private $tablausuarioanticiporenta = "usuarioanticiporenta";
    private $tablasanciones = "sanciones";
    private $tablausuariosanciones = "usuariosanciones";
    private $tablasaldofavor = "saldofavor";
    private $tablausuariosaldoafavor = "usuariosaldoafavor";
    private $tablaretenciondeclarar = "retenciondeclarar";
    private $tablausuarioretenciondeclarar = "usuarioretenciondeclarar";
    private $tabladescuentoimpuext = "descuentoimpuext";
    private $tablausuariodescuentoimpuext = "usuariodescuentoimpuext";

    public function listar($id){

        $query = $this->db->connect()->prepare('SELECT "Anticipo de Renta" AS clase, ar.nombre AS "nombre", ar.idanticiporenta AS "id", ar.valor AS "valor", ar.descripcion, lp.impuestoneto, lp.impuestooananciaso, lp.impuestocargototal, lp.anticiporentasiguiente, lp.impuestototal, lp.saldopagartotal, lp.saldofavortotal FROM '.$this->tablaanticiporenta.' ar JOIN '.$this->tablausuarioanticiporenta.' uar ON uar.idanticiporenta = ar.idanticiporenta JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = uar.idliquidacionprivada WHERE lp.iddeclaracion = ? UNION SELECT "Sanciones" AS clase, s.nombre AS "nombre", s.idsanciones AS "id", s.valor AS "valor", s.descripcion, lp.impuestoneto, lp.impuestooananciaso, lp.impuestocargototal, lp.anticiporentasiguiente, lp.impuestototal, lp.saldopagartotal, lp.saldofavortotal FROM '.$this->tablasanciones.' s JOIN '.$this->tablausuariosanciones.' us ON us.idsanciones = s.idsanciones JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = us.idliquidacionprivada WHERE lp.iddeclaracion = ? UNION SELECT "Saldo a favor" AS clase, sf.nombre AS "nombre", sf.idsaldofavor AS "id", sf.valor AS "valor", sf.descripcion, lp.impuestoneto, lp.impuestooananciaso, lp.impuestocargototal, lp.anticiporentasiguiente, lp.impuestototal, lp.saldopagartotal, lp.saldofavortotal FROM '.$this->tablasaldofavor.' sf JOIN '.$this->tablausuariosaldoafavor.' usf ON usf.idsaldofavor = sf.idsaldofavor JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = usf.idliquidacionprivada WHERE lp.iddeclaracion = ? UNION SELECT "Retencion a declarar" AS clase, rd.nombre AS "nombre", rd.idretenciondeclarar AS "id", rd.valor AS "valor", rd.descripcion, lp.impuestoneto, lp.impuestooananciaso, lp.impuestocargototal, lp.anticiporentasiguiente, lp.impuestototal, lp.saldopagartotal, lp.saldofavortotal FROM '.$this->tablaretenciondeclarar.' rd JOIN '.$this->tablausuarioretenciondeclarar.' urd ON urd.idretenciondeclarar = rd.idretenciondeclarar JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = urd.idliquidacionprivada WHERE lp.iddeclaracion = ? UNION SELECT "Descuento impuesto exterior" AS clase, die.nombre AS "nombre", die.iddescuentoimpuext AS "id", die.valor AS "valor", die.descripcion, lp.impuestoneto, lp.impuestooananciaso, lp.impuestocargototal, lp.anticiporentasiguiente, lp.impuestototal, lp.saldopagartotal, lp.saldofavortotal FROM '.$this->tabladescuentoimpuext.' die JOIN '.$this->tablausuariodescuentoimpuext.' udie ON udie.iddescuentoimpuext = die.iddescuentoimpuext JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = udie.idliquidacionprivada WHERE lp.iddeclaracion = ?;');
        $query->execute([$id, $id, $id, $id, $id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }
    
    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT idliquidacionprivada AS "id" FROM '.$this->tablaliquidacionprivada.' WHERE iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function crear($iddeclaracion){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablaliquidacionprivada.'(impuestoneto, impuestocargototal, impuestototal, saldopagartotal, saldofavortotal, iddeclaracion ) VALUES (?, ?, ?, ?, ?, ?)')) {

            $query->execute([0, 0, 0, 0, 0, $iddeclaracion]);

            return true;

        } else {

            return false;

        }

    }

}

?>

<?php 


/*

SELECT "Anticipo de Renta" AS clase, 
ar.idanticiporenta AS "id", 
ar.valor AS "valor", ar.descripcion,
lp.impuestoneto, lp.impuestooananciaso, 
lp.impuestocargototal, lp.anticiporentasiguiente, 
lp.impuestototal, lp.saldopagartotal, 
lp.saldofavortotal 
FROM '.$this->tablaanticiporenta.' ar 
JOIN '.$this->tablausuarioanticiporenta.' uar ON uar.idanticiporenta = ar.idanticiporenta 
JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = uar.idliquidacionprivada 
WHERE lp.iddeclaracion = ?
UNION
SELECT "Sanciones" AS clase, 
s.idsanciones AS "id", 
s.valor AS "valor", 
s.descripcion, 
lp.impuestoneto, 
lp.impuestooananciaso, lp.impuestocargototal, 
lp.anticiporentasiguiente, lp.impuestototal, 
lp.saldopagartotal, 
lp.saldofavortotal 
FROM '.$this->tablasanciones.' s 
JOIN '.$this->tablausuariosanciones.' us ON us.idsanciones = s.idsanciones
JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = us.idliquidacionprivada 
WHERE lp.iddeclaracion = ?
UNION
SELECT "Saldo a favor" AS clase,
sf.idsaldofavor AS "id", 
sf.valor AS "valor", 
sf.descripcion, 
lp.impuestoneto, 
lp.impuestooananciaso, 
lp.impuestocargototal, 
lp.anticiporentasiguiente, 
lp.impuestototal, 
lp.saldopagartotal, 
lp.saldofavortotal 
FROM '.$this->tablasaldofavor.' 
sf JOIN '.$this->usuariosaldoafavor.' usf ON usf.idsaldofavor = sf.idsaldofavor 
JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = usf.idliquidacionprivada 
WHERE lp.iddeclaracion = ?
UNION
SELECT "Retencion a declarar" AS clase, 
rd.idretenciondeclarar AS "id", 
rd.valor AS "valor", 
rd.descripcion, 
lp.impuestoneto, 
lp.impuestooananciaso, 
lp.impuestocargototal, 
lp.anticiporentasiguiente, 
lp.impuestototal, 
lp.saldopagartotal, 
lp.saldofavortotal 
FROM '.$this->tablaretenciondeclarar.' rd 
JOIN '.$this->tablausuarioretenciondeclarar.' urd ON urd.idretenciondeclarar = rd.idretenciondeclarar 
JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = urd.idliquidacionprivada 
WHERE lp.iddeclaracion = ?
SELECT "Descuento impuesto exterior" AS clase, die.iddescuentoimpuext AS "id", die.valor AS "valor", die.descripcion, lp.impuestoneto, lp.impuestooananciaso, lp.impuestocargototal, lp.anticiporentasiguiente, lp.impuestototal, lp.saldopagartotal, lp.saldofavortotal FROM '.$this->tabladescuentoimpuext.' die JOIN '.$this->tablausuariodescuentoimpuext.' udie ON udie.iddescuentoimpuext = die.iddescuentoimpuext JOIN '.$this->tablaliquidacionprivada.' lp ON lp.idliquidacionprivada = udie.idliquidacionprivada WHERE lp.iddeclaracion = ?



*/


?>