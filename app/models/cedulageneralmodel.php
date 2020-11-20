<?php

class Cedulageneralmodel extends Models{

    /* Renta de trabajo */
    private $tablatipoprestacion = "tipoprestacion";
    private $tablatipoaporteobligatorio = "tipoaporteobligatorio";
    private $tipoaportevoluntario = "tipoaportevoluntario";
    private $tipopagoalimentario = "tipopagoalimen";
    private $tipodeduccion = "tipodeduccion";
    private $tipoindemnizacion = "tipoindemnizacion";
    private $tipoprimacancilleria = "tipoprimacancilleria";
    /* --------------- */

    /* Renta de capital */
    private $tablatipointeresrendicapital = "tipointeresesrendicapital";
    private $tablatipootrosingresoscapital = "tipootrosingresoscapital";
    private $tablatipoaporteobligatoriocapital = "tipoaporteobligatoriocapital";
    private $tablatipoaportevoluntariocapital = "tipoaportevoluntariocapital";
    private $tablatipootroscostogastocapital = "tipootroscostogastocapital";
    private $tablatiporentaexededuccioncapital = "tiporentaexededuccioncapital";

    /*----------------- */

    /* Renta no laboral */

    private $tablatipovalorbrutoventaslaboral = "tipovalorbrutoventaslaboral";
    private $tablatipoaporteobligatoriolaboralnoconse = "tipoaporteobligatoriolaboralnoconse";
    private $tablatipootroscostogastolaboral = "tipootroscostogastolaboral";
    private $tablatiporentaexededuccionlaboral = "tiporentaexededuccionlaboral";

    /*------------------*/

    public function listar(){

        $query = $this->db->connect()->prepare(
            'SELECT tp.idtipoprestacion AS "id", tp.nombre, tp.descripcion, tp.ayuda, "Renta de trabajo" AS "renta", "Ingreso Bruto" AS "tipoderenta", "Tipo de Prestación" AS "aspecto" FROM '.$this->tablatipoprestacion.' tp
            UNION
            SELECT tao.idtipoaporteobligatorio, tao.nombre, tao.descripcion, tao.ayuda, "Renta de trabajo" AS "renta", "Ingreso no constitutivos" AS "tipoderenta", "Tipo de aporte obligatorio" AS "aspecto" FROM '.$this->tablatipoaporteobligatorio.' tao
            UNION
            SELECT tav.idtipoaportevoluntario, tav.nombre, tav.descripcion, tav.ayuda, "Renta de trabajo" AS "renta", "Ingreso no constitutivos" AS "tipoderenta", "Tipo de aporte voluntario" AS "aspecto" FROM '.$this->tipoaportevoluntario.' tav
            UNION
            SELECT tpa.idtipopagoalimen, tpa.parentesco, tpa.descripcion, tpa.ayuda, "Renta de trabajo" AS "renta", "Ingreso no constitutivos" AS "tipoderenta", "Tipo pago alimenticio" AS "aspecto" FROM '.$this->tipopagoalimentario.' tpa
            UNION
            SELECT td.idtipodeduccion, td.nombre, td.descripcion, td.ayuda, "Renta de trabajo" AS "renta", "Deducciones" AS "tipoderenta", "Tipo de deducción" AS "aspecto" FROM '.$this->tipodeduccion.' td
            UNION
            SELECT ti.idtipoindemnizacion, ti.nombre, ti.descripcion, ti.ayuda, "Renta de trabajo" AS "renta", "Renta Exenta" AS "tipoderenta", "Tipo de indemnización" AS "aspecto" FROM '.$this->tipoindemnizacion.' ti
            UNION
            SELECT tpc.idtipoprimacancilleria, tpc.nombre, tpc.descripcion, tpc.ayuda, "Renta de trabajo" AS "renta", "Renta Exenta" AS "tipoderenta", "Tipo de prima" AS "aspecto" FROM '.$this->tipoprimacancilleria.' tpc
            UNION 
            SELECT tir.idtipointeresesrendicapital, tir.nombre, tir.descripcion, tir.ayuda, "Renta de capital" AS "renta", "Ingreso Bruto" AS "tipoderenta", "Tipo intereses rendimiento" AS "aspecto" FROM '.$this->tablatipointeresrendicapital.' tir
            UNION
            SELECT toi.idtipootrosingresoscapital, toi.nombre, toi.descripcion, toi.ayuda, "Renta de capital" AS "renta", "Ingreso Bruto" AS "tipoderenta", "Tipo otros ingresos" AS "aspecto" FROM '.$this->tablatipootrosingresoscapital.' toi
            UNION
            SELECT taoc.idtipoaporteobligatoriocapital, taoc.nombre, taoc.descripcion, taoc.ayuda, "Renta de capital" AS "renta", "Ingreso no constitutivos" AS "tipoderenta", "Tipo de aporte obligatorio" AS "aspecto" FROM '.$this->tablatipoaporteobligatoriocapital.' taoc
            UNION
            SELECT tavc.idtipoaportevoluntariocapital, tavc.nombre, tavc.descripcion, tavc.ayuda, "Renta de capital" AS "renta", "Ingreso no constitutivos" AS "tipoderenta", "Tipo de aporte voluntario" AS "aspecto" FROM '.$this->tablatipoaportevoluntariocapital.' tavc
            UNION
            SELECT tocgc.idtipootroscostogastocapital, tocgc.nombre, tocgc.descripcion, tocgc.ayuda, "Renta de capital" AS "renta", "Costos y deducciones procedentes" AS "tipoderenta", "Tipo otros costos gastos" AS "aspecto" FROM '.$this->tablatipootroscostogastocapital.' tocgc
            UNION
            SELECT tredc.idtiporentaexededuccioncapital, tredc.nombre, tredc.descripcion, tredc.ayuda, "Renta de capital" AS "renta", "Renta exenta deducción" AS "tipoderenta", "Tipo renta exenta deducción" AS "aspecto" FROM '.$this->tablatiporentaexededuccioncapital.' tredc
            UNION
            SELECT tvbvl.idtipovalorbrutoventaslaboral, tvbvl.nombre, tvbvl.descripcion, tvbvl.ayuda, "Renta no laboral" AS "renta", "Ingreso bruto" AS "tipoderenta", "Tipo valor bruto de ventas" AS "aspecto" FROM '.$this->tablatipovalorbrutoventaslaboral.' tvbvl
            UNION
            SELECT taolnc.idtipoaporteobligatoriolaboralnoconse, taolnc.nombre, taolnc.descripcion, taolnc.ayuda, "Renta no laboral" AS "renta", "Ingreso no constitutivos" AS "tipoderenta", "Tipo de aporte obligatorio" AS "aspecto" FROM '.$this->tablatipoaporteobligatoriolaboralnoconse.' taolnc
            UNION
            SELECT tocgl.idtipootroscostogastolaboral, tocgl.nombre, tocgl.descripcion, tocgl.ayuda, "Renta no laboral" AS "renta", "Costos y deducciones procedentes" AS "tipoderenta", "Tipo otros costos gastos" AS "aspecto" FROM '.$this->tablatipootroscostogastolaboral.' tocgl
            UNION
            SELECT tredl.idtiporentaexededuccionlaboral, tredl.nombre, tredl.descripcion, tredl.ayuda, "Renta no laboral" AS "renta", "Renta exenta deducción" AS "tipoderenta", "Tipo renta exenta deducción" AS "aspecto" FROM '.$this->tablatiporentaexededuccionlaboral.' tredl;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

}



/*

SELECT tp.idtipoprestacion, tp.nombre, tp.descripcion, tp.ayuda, 'Renta de trabajo' AS "renta", 'Ingreso Bruto' AS "tipoderenta", 'Tipo de Prestación' AS "aspecto" FROM tipoprestacion tp
UNION
SELECT tao.idtipoaporteobligatorio, tao.nombre, tao.descripcion, tao.ayuda, 'Renta de trabajo' AS "renta", 'Ingreso no constitutivos' AS "tipoderenta", 'Tipo de aporte obligatorio' AS "aspecto" FROM tipoaporteobligatorio tao
UNION
SELECT tav.idtipoaportevoluntario, tav.nombre, tav.descripcion, tav.ayuda, 'Renta de trabajo' AS "renta", 'Ingreso no constitutivos' AS "tipoderenta", 'Tipo de aporte voluntario' AS "aspecto" FROM tipoaportevoluntario tav
UNION
SELECT tpa.idtipopagoalimen, tpa.parentesco, tpa.descripcion, tpa.ayuda, 'Renta de trabajo' AS "renta", 'Ingreso no constitutivos' AS "tipoderenta", 'Tipo pago alimenticio' AS "aspecto" FROM tipopagoalimen tpa
UNION
SELECT td.idtipodeduccion, td.nombre, td.descripcion, td.ayuda, 'Renta de trabajo' AS "renta", 'Deducciones' AS "tipoderenta", 'Tipo de deducción' AS "aspecto" FROM tipodeduccion td
UNION
SELECT ti.idtipoindemnizacion, ti.nombre, ti.descripcion, ti.ayuda, 'Renta de trabajo' AS "renta", 'Renta Exenta' AS "tipoderenta", 'Tipo de indemnización' AS "aspecto" FROM tipoindemnizacion ti
UNION
SELECT tpc.idtipoprimacancilleria, tpc.nombre, tpc.descripcion, tpc.ayuda, 'Renta de trabajo' AS "renta", 'Renta Exenta' AS "tipoderenta", 'Tipo de prima' AS "aspecto" FROM tipoprimacancilleria tpc
UNION 
SELECT tir.idtipointeresesrendicapital, tir.nombre, tir.descripcion, tir.ayuda, 'Renta de capital' AS "renta", 'Ingreso Bruto' AS "tipoderenta", 'Tipo intereses rendimiento' AS "aspecto" FROM tipointeresesrendicapital tir
UNION
SELECT toi.idtipootrosingresoscapital, toi.nombre, toi.descripcion, toi.ayuda, 'Renta de capital' AS "renta", 'Ingreso Bruto' AS "tipoderenta", 'Tipo otros ingresos' AS "aspecto" FROM tipootrosingresoscapital toi
UNION
SELECT taoc.idtipoaporteobligatoriocapital, taoc.nombre, taoc.descripcion, taoc.ayuda, 'Renta de capital' AS "renta", 'Ingresos no constitutivos' AS "tipoderenta", 'Tipo aporte obligatorio' AS "aspecto" FROM tipoaporteobligatoriocapital taoc
UNION
SELECT tavc.idtipoaportevoluntariocapital, tavc.nombre, tavc.descripcion, tavc.ayuda, 'Renta de capital' AS "renta", 'Ingresos no constitutivos' AS "tipoderenta", 'Tipo aporte voluntario' AS "aspecto" FROM tipoaportevoluntariocapital tavc
UNION
SELECT tocgc.idtipootroscostogastocapital, tocgc.nombre, tocgc.descripcion, tocgc.ayuda, 'Renta de capital' AS "renta", 'Costos y deducciones procedentes' AS "tipoderenta", 'Tipo otros costos gastos' AS "aspecto" FROM tipootroscostogastocapital tocgc
UNION
SELECT tredc.idtiporentaexededuccioncapital, tredc.nombre, tredc.descripcion, tredc.ayuda, 'Renta de capital' AS "renta", 'Renta exenta deducción' AS "tipoderenta", 'Tipo renta exenta deducción' AS "aspecto" FROM tiporentaexededuccioncapital tredc
UNION
SELECT tvbvl.idtipovalorbrutoventaslaboral, tvbvl.nombre, tvbvl.descripcion, tvbvl.ayuda, 'Renta no laboral' AS "renta", 'Ingreso bruto' AS "tipoderenta", 'Tipo valor bruto de ventas' AS "aspecto" FROM tipovalorbrutoventaslaboral tvbvl
UNION
SELECT taolnc.idtipoaporteobligatoriolaboralnoconse, taolnc.nombre, taolnc.descripcion, taolnc.ayuda, 'Renta no laboral' AS "renta", 'Ingresos no constitutivos' AS "tipoderenta", 'Tipo aporte obligatorio' AS "aspecto" FROM tipoaporteobligatoriolaboralnoconse taolnc
UNION
SELECT tocgl.idtipootroscostogastolaboral, tocgl.nombre, tocgl.descripcion, tocgl.ayuda, 'Renta no laboral' AS "renta", 'Costos y deducciones procedentes' AS "tipoderenta", 'Tipo otros costos gastos' AS "aspecto" FROM tipootroscostogastolaboral tocgl
UNION
SELECT tredl.idtiporentaexededuccionlaboral, tredl.nombre, tredl.descripcion, tredl.ayuda, 'Renta no laboral' AS "renta", 'Renta exenta deducción' AS "tipoderenta", 'Tipo renta exenta deducción' AS "aspecto" FROM tiporentaexededuccionlaboral tredl;

*/

?>