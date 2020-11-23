<?php

class Gananciasocasionalesmodel extends Models{

    private $tablagananciasocasionales = "gananciasocasionales";
    private $tablaingresosganancias = "ingresosganacias";
    private $tablatipoingresosganancias = "tipoingresosganancias";
    private $tablausuarioingresosganancias = "usuarioingresosganancias";

    public function listar($id){

        $query = $this->db->connect()->prepare('SELECT "Ingresos" AS clase, igo.idingresosganacias AS "id", igo.valor AS "valor", igo.idtipoingresosganancias, tigo.nombre AS "tipo", g.gananciasocasionales FROM '.$this->tablaingresosganancias.' igo JOIN '.$this->tablatipoingresosganancias.' tigo ON tigo.idtipoingresosganancias = igo.idtipoingresosganancias JOIN '.$this->tablausuarioingresosganancias.' uig ON uig.idingresosganacias = igo.idingresosganacias JOIN '.$this->tablagananciasocasionales.' g ON g.idgananciasocasionales = uig.idgananciasocasionales WHERE g.iddeclaracion = ?;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

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

?>