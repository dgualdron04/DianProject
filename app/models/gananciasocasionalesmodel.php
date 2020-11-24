<?php

class Gananciasocasionalesmodel extends Models{

    private $tablagananciasocasionales = "gananciasocasionales";
    private $tablaingresosganancias = "ingresosganacias";
    private $tablatipoingresosganancias = "tipoingresosganancias";
    private $tablausuarioingresosganancias = "usuarioingresosganancias";
    private $tablaingresonoconseganancias = "ingresonoconseganancias";
    private $tablausuarioingresonoconsegananciasocasionales = "usuarioingresonoconsegananciasocasionales";
    private $tablagananciasnogravadas = "gananciasnogravadas";
    private $tablatipogananciasnogravadas = "tipogananciasnogravadas";
    private $tablausuariogananciasnogravadas = "usuariogananciasnogravadas";

    public function listar($id){

        $query = $this->db->connect()->prepare('SELECT "Ingresos" AS clase, igo.idingresosganacias AS "id", igo.valor AS "valor", igo.idtipoingresosganancias, tigo.nombre AS "tipo", g.gananciasocasionales FROM '.$this->tablaingresosganancias.' igo JOIN '.$this->tablatipoingresosganancias.' tigo ON tigo.idtipoingresosganancias = igo.idtipoingresosganancias JOIN '.$this->tablausuarioingresosganancias.' uig ON uig.idingresosganacias = igo.idingresosganacias JOIN '.$this->tablagananciasocasionales.' g ON g.idgananciasocasionales = uig.idgananciasocasionales WHERE g.iddeclaracion = ? UNION SELECT "Ingresos no constitutivos" AS clase, incg.idingresonoconseganancias AS "id", incg.valor AS "valor", "Sin Tipo" AS "idtipoingresosganancias", "Sin Tipo" AS "tipo", g.gananciasocasionales FROM '.$this->tablaingresonoconseganancias.' incg JOIN '.$this->tablausuarioingresonoconsegananciasocasionales.' uincgo ON uincgo.idingresonoconseganancias = incg.idingresonoconseganancias JOIN '.$this->tablagananciasocasionales.' g ON g.idgananciasocasionales = uincgo.idgananciasocasionales WHERE g.iddeclaracion = ? UNION SELECT "Ganancias Ocasionales no Gravadas y Exentas" AS clase, goge.idgananciasonogravadas AS "id", goge.valor AS "valor", goge.idtipogananciasnogravadas, tgoge.nombre AS "tipo", g.gananciasocasionales FROM '.$this->tablagananciasnogravadas.' goge JOIN '.$this->tablatipogananciasnogravadas.' tgoge ON tgoge.idtipogananciasnogravadas = goge.idtipogananciasnogravadas JOIN '.$this->tablausuariogananciasnogravadas.' ugg ON ugg.idgananciasonogravadas = goge.idgananciasonogravadas JOIN '.$this->tablagananciasocasionales.' g ON g.idgananciasocasionales = ugg.idgananciasocasionales WHERE g.iddeclaracion = ?;');
        $query->execute([$id, $id, $id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT idgananciasocasionales AS "id" FROM '.$this->tablagananciasocasionales.' WHERE iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

    public function crear($iddeclaracion){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablagananciasocasionales.'(gananciasocasionales, iddeclaracion) VALUES (?, ?)')) {

            $query->execute([0, $iddeclaracion]);

            return true;

        } else {

            return false;

        }

    }
    


}

/*

SELECT "Ingresos" AS clase, 
igo.idingresosganacias AS "id", 
igo.valor AS "valor", 
igo.idtipoingresosganancias, 
tigo.nombre AS "tipo", 
g.gananciasocasionales 
FROM '.$this->tablaingresosganancias.' igo 
JOIN '.$this->tablatipoingresosganancias.' tigo ON tigo.idtipoingresosganancias = igo.idtipoingresosganancias 
JOIN '.$this->tablausuarioingresosganancias.' uig ON uig.idingresosganacias = igo.idingresosganacias 
JOIN '.$this->tablagananciasocasionales.' g ON g.idgananciasocasionales = uig.idgananciasocasionales 
WHERE g.iddeclaracion = ?
UNION
SELECT "Ingreos no constitutivos" AS clase, 
incg.idingresonoconseganancias AS "id", 
incg.valor AS "valor", 
"Sin Tipo" AS "idtipoingresosganancias", 
"Sin Tipo" AS "tipo", 
g.gananciasocasionales 
FROM '.$this->tablaingresonoconseganancias.' incg 
JOIN '.$this->tablausuarioingresonoconsegananciasocasionales.' uincgo ON uincgo.idingresonoconseganancias = incg.idingresonoconseganancias 
JOIN '.$this->tablagananciasocasionales.' g ON g.idgananciasocasionales = uincgo.idgananciasocasionales WHERE g.iddeclaracion = ?
UNION
SELECT "Ganancias Ocasionales no Gravadas y Exentas" AS clase, goge.idgananciasonogravadas AS "id", goge.valor AS "valor", goge.idtipogananciasnogravadas, tgoge.nombre AS "tipo", g.gananciasocasionales FROM '.$this->tablagananciasnogravadas.' goge JOIN '.$this->tablatipogananciasnogravadas.' tgoge ON tgoge.idtipogananciasnogravadas = goge.idtipogananciasnogravadas JOIN '.$this->tablausuariogananciasnogravadas.' ugg ON ugg.idgananciasonogravadas = goge.idgananciasonogravadas JOIN '.$this->tablagananciasocasionales.' g ON g.idgananciasocasionales = ugg.idgananciasocasionales WHERE g.iddeclaracion = ?


SELECT "Ingresos" AS clase, igo.idingresosganacias AS "id", igo.valor AS "valor", igo.idtipoingresosganancias, tigo.nombre AS "tipo", g.gananciasocasionales FROM '.$this->tablaingresosganancias.' igo JOIN '.$this->tablatipoingresosganancias.' tigo ON tigo.idtipoingresosganancias = igo.idtipoingresosganancias JOIN '.$this->tablausuarioingresosganancias.' uig ON uig.idingresosganacias = igo.idingresosganacias JOIN '.$this->tablagananciasocasionales.' g ON g.idgananciasocasionales = uig.idgananciasocasionales WHERE g.iddeclaracion = ? UNION 
*/

?>