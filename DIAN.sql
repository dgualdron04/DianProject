CREATE DATABASE dianproject COLLATE utf8mb4_spanish_ci;

USE dianproject;

/*---Creacion de la tabla usuario y sus tablas anexas---*/

    CREATE TABLE rol
    (idrol INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del RolUsuario',
    tiporol VARCHAR(40) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Tipo del RolUsuario',
    PRIMARY KEY (idrol));

    CREATE TABLE estadousuario
    (idestado INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del EstadoUsuario',
    tipoestado VARCHAR(40) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Tipo de EstadoUsuario',
    PRIMARY KEY (idestado));

    CREATE TABLE usuario
    (idusuario INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuario',
    nombre VARCHAR(40) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del usuario',
    apellido VARCHAR(40) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Apellido del usuario',
    cedula BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Cedula del usuario',
    telefono BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Telefono del usuario',
    correo varchar(80) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Correo del usuario',
    password varchar(120) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Password del usuario',
    idrol INT NOT NULL COMMENT 'Codigo del Rol',
    idestado INT NOT NULL COMMENT 'Codigo del Estado',
    PRIMARY KEY (idusuario),
    FOREIGN KEY (idrol) REFERENCES rol(idrol),
    FOREIGN KEY (idestado) REFERENCES estadousuario(idestado));

    CREATE TABLE tipoactividadeconomica
    (idtipoactividad INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de Actividad Economica',
    nombre VARCHAR(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de actividad economica',
    descripcion VARCHAR(90) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripcion del tipo de actividad economica',
    ayuda VARCHAR(90) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de actividad economica',
    PRIMARY KEY (idtipoactividad));

    CREATE TABLE actividadeconomica
    (idactividadeconomica INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la Actividad Economica',
    idtipoactividad INT NOT NULL COMMENT 'Codigo del tipo de actividad economica',
    idusuario INT NOT NULL COMMENT 'Codigo del Usuario que tiene esta actividad economica',
    PRIMARY KEY (idactividadeconomica),
    FOREIGN KEY (idtipoactividad) REFERENCES tipoactividadeconomica(idtipoactividad),
    FOREIGN KEY (idusuario) REFERENCES usuario(idusuario));

    CREATE TABLE tipodireccionseccional
    (idtipodireccionseccional INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de la dirección seccional',
    nombre VARCHAR(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de la dirección seccional',
    descripcion VARCHAR(90) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripcion del tipo de la dirección seccional',
    ayuda VARCHAR(90) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de la dirección seccional',
    PRIMARY KEY (idtipodireccionseccional));

    CREATE TABLE direccionseccional
    (iddireccionseccional INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la Dirección Seccional',
    idtipodireccionseccional INT NOT NULL COMMENT 'Codigo del tipo de la Dirección Seccional',
    idusuario INT NOT NULL COMMENT 'Codigo del Usuario que tiene esta dirección seccional',
    PRIMARY KEY (iddireccionseccional),
    FOREIGN KEY (idtipodireccionseccional) REFERENCES tipodireccionseccional(idtipodireccionseccional),
    FOREIGN KEY (idusuario) REFERENCES usuario(idusuario));
/*------------------------------------------------------*/

/*--- Creación de la tabla Parametros y sus tablas anexas ---*/

CREATE TABLE parametros
(idparametro INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del parametro',
valortributario BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Valor tributario segun la normativa de la DIAN',
tope1 BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Tope 1 segun la normativa de la DIAN',
tope2 BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Tope 2 segun la normativa de la DIAN',
annoperiodo INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Anno segun el periodo fiscal', 
marcolegal VARCHAR(90) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Marco legal del periodo fiscal segun la normativa de la dian',
marcocalendario VARCHAR(90) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Marco del Calendario fiscal',
estadoparametro BOOLEAN NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Estado del parametro',
PRIMARY KEY (idparametro));

CREATE TABLE calendariofiscal
(idcalendario INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del calendario fiscal',
dia1 DATE NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Dia de inicio del calendario fiscal',
dia2 DATE NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Dia de finalización del calendario fiscal',
idparametro INT NOT NULL COMMENT 'Codigo del parametro',
PRIMARY KEY (idcalendario),
FOREIGN KEY (idparametro) REFERENCES parametros(idparametro));

CREATE TABLE periododeclarante
(idperiododeclarante INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del periodo que le corresponde al declarante para presentar su declaración',
digito1 BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Primer digito de la cedula que puede presentar su declaración este día.',
digito2 BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Segundo digito de la cedula que puede presentar su declaración este día.',
dia DATE NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Dia en el que se va a presentar la declaración.',
idcalendario INT NOT NULL COMMENT 'Codigo del calendario',
PRIMARY KEY (idperiododeclarante),
FOREIGN KEY (idcalendario) REFERENCES calendariofiscal(idcalendario));

/*---------------------------------------*/

/*--- Creación de la tabla Declaración ---*/

CREATE TABLE declaracion
(iddeclaracion INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la declaración',
pagototal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El pago total de la declaración',
estadoarchivo BOOLEAN NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Estado del archivo',
estadorevision BOOLEAN NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Estado de la revisión',
estadodeclaracion BOOLEAN NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Estado de la declaración',
observaciones varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Correo del usuario',
idusuario INT NOT NULL COMMENT 'Codigo del Usuario que tiene esta declaración',
PRIMARY KEY (iddeclaracion),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario));

/*----------------------------------------*/


/*--- Creación de la tabla Exogenas ---*/

CREATE TABLE exogenas
(idexogenas INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la exogena',
iddeclaracion INT NOT NULL COMMENT 'Codigo de la Declaración',
ruta varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ruta de la exogena',
PRIMARY KEY (idexogenas),
FOREIGN KEY (iddeclaracion) REFERENCES declaracion(iddeclaracion));

/*-------------------------------------------------------------*/


/*--- Creación de la tabla intermedia parametrosdeclaracion ---*/

CREATE TABLE parametrosdeclaracion
(idparametrosdeclaracion INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del parametrodeclaracion',
idparametro INT NOT NULL COMMENT 'Codigo del Parametro',
iddeclaracion INT NOT NULL COMMENT 'Codigo de la Declaración',
PRIMARY KEY (idparametrosdeclaracion),
FOREIGN KEY (idparametro) REFERENCES parametros(idparametro),
FOREIGN KEY (iddeclaracion) REFERENCES declaracion(iddeclaracion));

/*-------------------------------------------------------------*/



/*--- Creación de la tabla patrimonio ---*/

CREATE TABLE patrimonio
(idpatrimonio INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del patrimonio',
patliquitotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El total de patrimonio liquido',
deudatotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El total de la deuda',
patbrutototal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El total de patrimonio bruto',
iddeclaracion INT NOT NULL COMMENT 'Codigo de la Declaración',
PRIMARY KEY (idpatrimonio),
FOREIGN KEY (iddeclaracion) REFERENCES declaracion(iddeclaracion));

/*---------------------------------------*/


/*--- Creación de la tabla modelo ---*/

CREATE TABLE modelo
(idmodelo INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del modelo',
tipomodelo varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de modelo',
PRIMARY KEY (idmodelo));

/*-----------------------------------*/


/*--- Creación de la tabla tipomoneda*/

CREATE TABLE tipomoneda
(idtipomoneda INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de moneda',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de moneda',
PRIMARY KEY (idtipomoneda));

/*-----------------------------------*/


/*--- Creación de la tabla Bienes y sus tablas anexas ---*/

CREATE TABLE tipobien
(idtipobien INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de bien',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de bien',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de bien',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo bien',
PRIMARY KEY (idtipobien));

CREATE TABLE bien
(idbien INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del bien',
valorbien BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del bien',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del bien',
idtipobien INT NOT NULL COMMENT 'Codigo del tipo de bien',
idtipomoneda INT NOT NULL COMMENT 'Codigo del tipo de moneda',
idmodelo INT NOT NULL COMMENT 'Codigo del modelo',
PRIMARY KEY (idbien),
FOREIGN KEY (idtipobien) REFERENCES tipobien(idtipobien),
FOREIGN KEY (idtipomoneda) REFERENCES tipomoneda(idtipomoneda),
FOREIGN KEY (idmodelo) REFERENCES modelo(idmodelo));

CREATE TABLE usuariobien
(idusuariobien INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariobien',
idbien INT NOT NULL COMMENT 'Codigo del bien',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idpatrimonio INT NOT NULL COMMENT 'Codigo del patrimonio',
PRIMARY KEY (idusuariobien),
FOREIGN KEY (idbien) REFERENCES bien(idbien),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idpatrimonio) REFERENCES patrimonio(idpatrimonio));

/*---------------------------*/


/*--- Creación de la tabla Deudas y sus tablas anexas ---*/

CREATE TABLE tipodeuda
(idtipodeuda INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de deuda',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de deuda',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de deuda',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo deuda',
PRIMARY KEY (idtipodeuda));

CREATE TABLE deuda
(iddeuda INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la deuda',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de la deuda',
valordeuda BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la deuda',
idtipodeuda INT NOT NULL COMMENT 'Codigo del tipo de deuda',
idtipomoneda INT NOT NULL COMMENT 'Codigo del tipo de moneda',
idmodelo INT NOT NULL COMMENT 'Codigo del modelo',
PRIMARY KEY (iddeuda),
FOREIGN KEY (idtipodeuda) REFERENCES tipodeuda(idtipodeuda),
FOREIGN KEY (idtipomoneda) REFERENCES tipomoneda(idtipomoneda),
FOREIGN KEY (idmodelo) REFERENCES modelo(idmodelo));

CREATE TABLE usuariodeuda
(idusuariodeuda INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariodeuda',
iddeuda INT NOT NULL COMMENT 'Codigo de la deuda',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idpatrimonio INT NOT NULL COMMENT 'Codigo del patrimonio',
PRIMARY KEY (idusuariodeuda),
FOREIGN KEY (iddeuda) REFERENCES deuda(iddeuda),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idpatrimonio) REFERENCES patrimonio(idpatrimonio));

/*-------------------------------------------------------*/


/*---- Tabla cedula general ----*/

CREATE TABLE cedulageneral
(idcedulageneral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de prestación',
iddeclaracion INT NOT NULL COMMENT 'Codigo de la declaración',
rentaliquidageneral BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Rentas Liquida General',
rentasexentasdeduccion BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Rentas Exenta Deduccion',
rentaliquidaordinaria BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Rentas Liquida Ordinaria',
rentaliquidagravable BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Rentas Liquida Gravable',
PRIMARY KEY (idcedulageneral),
FOREIGN KEY (iddeclaracion) REFERENCES declaracion(iddeclaracion));

/*------------------------------*/


/*---- Tabla renta de trabajo ----*/

CREATE TABLE rentatrabajo
(idrentatrabajo INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la renta de trabajo',
idcedulageneral INT NOT NULL COMMENT 'Codigo de la cedula general',
rentaliquida BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta liquida', 
rentasexentasdeduccion BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Rentas exentas deduccion',
rentaliquidatrabajo BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta liquida de trabajo',
PRIMARY KEY (idrentatrabajo),
FOREIGN KEY (idcedulageneral) REFERENCES cedulageneral(idcedulageneral));

/*--------------------------------*/


/*---- Tabla ingresobruto ----*/

CREATE TABLE ingresobruto
(idingresobruto INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del ingreso bruto',
ingresobrutototal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ingreso bruto total',
PRIMARY KEY (idingresobruto));

/*----------------------------*/


/*---- Tabla Salario -----*/

CREATE TABLE salario
(idsalario INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del salario',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del Salario',
meseslaborados INT NOT NULL COMMENT 'Meses laborados',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del salario',
idingresobruto INT NOT NULL COMMENT 'Codigo del ingreso bruto',
PRIMARY KEY (idsalario),
FOREIGN KEY (idingresobruto) REFERENCES ingresobruto(idingresobruto));

/*------------------------*/


/*---- Tabla Viaticos -----*/

CREATE TABLE viaticos
(idviaticos INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de los viaticos',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de los viaticos',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del salario',
idingresobruto INT NOT NULL COMMENT 'Codigo del ingreso bruto',
PRIMARY KEY (idviaticos),
FOREIGN KEY (idingresobruto) REFERENCES ingresobruto(idingresobruto));

/*------------------------*/


/*---- Tabla Honorarios -----*/

CREATE TABLE honorarios
(idhonorarios INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de los honorarios',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del honorario',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de los honorarios',
idingresobruto INT NOT NULL COMMENT 'Codigo del ingreso bruto',
PRIMARY KEY (idhonorarios),
FOREIGN KEY (idingresobruto) REFERENCES ingresobruto(idingresobruto));

/*--------------------------*/


/*---- Tabla Otros Pagos -----*/

CREATE TABLE otrospagos
(idotrospagos INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de otros pagos',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de otros pagos',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de los otros pagos',
idingresobruto INT NOT NULL COMMENT 'Codigo del ingreso bruto',
PRIMARY KEY (idotrospagos),
FOREIGN KEY (idingresobruto) REFERENCES ingresobruto(idingresobruto));

/*--------------------------*/

/*----- Tabla prestación social y sus tablas anexas ----*/

CREATE TABLE tipoprestacion
(idtipoprestacion INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de prestación',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de prestación',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de prestación',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de prestación',
PRIMARY KEY (idtipoprestacion));

CREATE TABLE prestasociales
(idprestasociales INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la prestación social',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de las prestaciones sociales',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la prestación social',
idtipoprestacion INT NOT NULL COMMENT 'Codigo del tipo de prestación',
idingresobruto INT NOT NULL COMMENT 'Codigo del ingreso bruto',
PRIMARY KEY (idprestasociales),
FOREIGN KEY (idtipoprestacion) REFERENCES tipoprestacion(idtipoprestacion),
FOREIGN KEY (idingresobruto) REFERENCES ingresobruto(idingresobruto));

/*------------------------------------------------------*/


/*---- Tabla Renta exenta ----*/

CREATE TABLE rentaexenta
(idrentaexenta INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la renta exenta',
rentaexentatotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta exenta total', 
PRIMARY KEY (idrentaexenta));

/*----------------------------*/



/*---- Tabla Cesantia Intereses ----*/

CREATE TABLE cesantiaintereses
(idcesantiasintereses INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la cesantias intereses',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de las cesantiaintereses',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la prestación social',
idingresobruto INT NOT NULL COMMENT 'Codigo del ingreso bruto',
idrentaexenta INT NOT NULL COMMENT 'Codigo de la renta exenta',
PRIMARY KEY (idcesantiasintereses),
FOREIGN KEY (idingresobruto) REFERENCES ingresobruto(idingresobruto),
FOREIGN KEY (idrentaexenta) REFERENCES rentaexenta(idrentaexenta));

/*----------------------------*/


/*---- Tabla indemnización y sus tablas anexas ----*/

CREATE TABLE tipoindemnizacion
(idtipoindemnizacion INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de indemnizacion',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de indeminzación',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de indemnización',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de indemnización',
PRIMARY KEY (idtipoindemnizacion));

CREATE TABLE indemnizacion
(idindemnizacion INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la indemnizacion',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de Indemnizacion',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la prestación social',
idtipoindemnizacion INT NOT NULL COMMENT 'Codigo del tipo de indemnizacion',
idrentaexenta INT NOT NULL COMMENT 'Codigo de la rentaexenta',
PRIMARY KEY (idindemnizacion),
FOREIGN KEY (idtipoindemnizacion) REFERENCES tipoindemnizacion(idtipoindemnizacion),
FOREIGN KEY (idrentaexenta) REFERENCES rentaexenta(idrentaexenta));

/*-----------------------------*/


/*---- Tabla gastosrepresentacion ----*/

CREATE TABLE gastosrepresentacion
(idgastosrepresentacion INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del gasto de representacion',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del gasto de representacion',
idrentaexenta INT NOT NULL COMMENT 'Codigo de la rentaexenta',
PRIMARY KEY (idgastosrepresentacion),
FOREIGN KEY (idrentaexenta) REFERENCES rentaexenta(idrentaexenta));

/*------------------------------------*/


/*---- Tabla primacancilleria y sus tablas anexas ----*/

CREATE TABLE tipoprimacancilleria
(idtipoprimacancilleria INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de prima cancilleria',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de prima cancilleria',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de prima cancilleria',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de prima cancilleria',
PRIMARY KEY (idtipoprimacancilleria));

CREATE TABLE primacancilleria
(idprimacancilleria INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la prima cancilleria',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la prima cancilleria',
idtipoprimacancilleria INT NOT NULL COMMENT 'Codigo del tipo de prima cancilleria',
idrentaexenta INT NOT NULL COMMENT 'Codigo de la rentaexenta',
PRIMARY KEY (idprimacancilleria),
FOREIGN KEY (idtipoprimacancilleria) REFERENCES tipoprimacancilleria(idtipoprimacancilleria),
FOREIGN KEY (idrentaexenta) REFERENCES rentaexenta(idrentaexenta));

/*-----------------------------*/


/*---- Tabla fuerzapublica y sus tablas anexas ----*/

CREATE TABLE fuerzapublica
(idfuerzapublica INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la fuerzapublica',
fuerzapublicatotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor total de la fuerza publica',
idrentaexenta INT NOT NULL COMMENT 'Codigo de la rentaexenta',
PRIMARY KEY (idfuerzapublica),
FOREIGN KEY (idrentaexenta) REFERENCES rentaexenta(idrentaexenta));

CREATE TABLE seguromuerte
(idseguromuerte INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del seguro de muerte',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del seguro de muerte',
idfuerzapublica INT NOT NULL COMMENT 'Codigo de la fuerza publica',
PRIMARY KEY (idseguromuerte), 
FOREIGN KEY (idfuerzapublica) REFERENCES fuerzapublica(idfuerzapublica));

CREATE TABLE excesosalariobasico
(idexcesosalariobasico INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del exceso de salario basico',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del exceso de salario basico',
idfuerzapublica INT NOT NULL COMMENT 'Codigo de la fuerza publica',
PRIMARY KEY (idexcesosalariobasico),
FOREIGN KEY (idfuerzapublica) REFERENCES fuerzapublica(idfuerzapublica));

/*-----------------------------*/


/*---- Tabla usuario ingreso bruto ----*/

CREATE TABLE usuarioingresobruto
(idusuarioingresobruto INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioingresobruto',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idingresobruto INT NOT NULL COMMENT 'Codigo del ingreso bruto',
idrentatrabajo INT NOT NULL COMMENT 'Codigo de la renta de trabajo',
PRIMARY KEY (idusuarioingresobruto),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idingresobruto) REFERENCES ingresobruto(idingresobruto),
FOREIGN KEY (idrentatrabajo) REFERENCES rentatrabajo(idrentatrabajo));

/*--------------------------------*/


/*--- Tabla usuariorentaexenta ---*/

CREATE TABLE usuariorentaexenta
(idusuariorentaexenta INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariorentaexenta',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idrentaexenta INT NOT NULL COMMENT 'Codigo de la rentaexenta',
idrentatrabajo INT NOT NULL COMMENT 'Codigo de la renta de trabajo',
PRIMARY KEY (idusuariorentaexenta),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idrentaexenta) REFERENCES rentaexenta(idrentaexenta),
FOREIGN KEY (idrentatrabajo) REFERENCES rentatrabajo(idrentatrabajo));

/*--------------------------------*/


/*--- Tabla deducciones y sus tablas anexas ---*/


CREATE TABLE tipodeduccion
(idtipodeduccion INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de deduccion',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de deduccion',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de deduccion',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de deduccion',
PRIMARY KEY (idtipodeduccion));

CREATE TABLE deducciones
(iddeducciones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la deduccion',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de Deduccion',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la deduccion',
idtipodeduccion INT NOT NULL COMMENT 'Codigo del tipo de deduccion',
PRIMARY KEY (iddeducciones),
FOREIGN KEY (idtipodeduccion) REFERENCES tipodeduccion(idtipodeduccion));

/*---------------------------------------------*/


/*--- Tabla usuariodeducciones ---*/

CREATE TABLE usuariodeducciones
(idusuariodeducciones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariodeducciones',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
iddeducciones INT NOT NULL COMMENT 'Codigo de la deduccion',
idrentatrabajo INT NOT NULL COMMENT 'Codigo de la renta de trabajo',
PRIMARY KEY (idusuariodeducciones),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (iddeducciones) REFERENCES deducciones(iddeducciones),
FOREIGN KEY (idrentatrabajo) REFERENCES rentatrabajo(idrentatrabajo));

/*--------------------------------*/


/*---- Tabla ingresonoconse ----*/

CREATE TABLE ingresonoconse
(idingresonoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del ingreso no conse',
ingresosnoconsetotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ingreso no consecutivo total', 
PRIMARY KEY (idingresonoconse));

/*----------------------------*/


/*--- Tabla aporte obligatorios y sus tablas anexas ---*/

CREATE TABLE tipoaporteobligatorio
(idtipoaporteobligatorio INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de aporte obligatorio',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de aporte obligatorio',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de aporte obligatorio',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de aporte obligatorio',
PRIMARY KEY (idtipoaporteobligatorio));

CREATE TABLE aporteobligatorio
(idaporteobligatorio INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del aporte obligatorio',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de aporteobligatorio',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del aporte obligatorio',
idtipoaporteobligatorio INT NOT NULL COMMENT 'Codigo del tipo de aporte obligatorio',
idingresonoconse INT NOT NULL COMMENT 'Codigo del ingreso no consecutivo',
PRIMARY KEY (idaporteobligatorio),
FOREIGN KEY (idtipoaporteobligatorio) REFERENCES tipoaporteobligatorio(idtipoaporteobligatorio),
FOREIGN KEY (idingresonoconse) REFERENCES ingresonoconse(idingresonoconse));

/*---------------------------------------------*/


/*--- Tabla aporte voluntario y sus tablas anexas ---*/

CREATE TABLE tipoaportevoluntario
(idtipoaportevoluntario INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de aporte voluntario',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de aporte voluntario',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de aporte voluntario',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de aporte voluntario',
PRIMARY KEY (idtipoaportevoluntario));

CREATE TABLE aportevoluntario
(idaportevoluntario INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del aporte voluntario',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de aporteobligatorio',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del aporte voluntario',
idtipoaportevoluntario INT NOT NULL COMMENT 'Codigo del tipo de aporte voluntario',
idingresonoconse INT NOT NULL COMMENT 'Codigo del ingreso no consecutivo',
idrentaexenta INT NOT NULL COMMENT 'Codigo de la renta exenta',
PRIMARY KEY (idaportevoluntario),
FOREIGN KEY (idtipoaportevoluntario) REFERENCES tipoaportevoluntario(idtipoaportevoluntario),
FOREIGN KEY (idingresonoconse) REFERENCES ingresonoconse(idingresonoconse),
FOREIGN KEY (idrentaexenta) REFERENCES rentaexenta(idrentaexenta));

/*---------------------------------------------*/


/*--- Tabla aporteeconoedu ---*/

CREATE TABLE aporteseconoedu
(idaporteseconoedu INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del aporteseconoedu',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de aporteeconoedu',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del aporteseconoedu',
idingresonoconse INT NOT NULL COMMENT 'Codigo del ingreso no consecutivo',
PRIMARY KEY (idaporteseconoedu),
FOREIGN KEY (idingresonoconse) REFERENCES ingresonoconse(idingresonoconse));

/*---------------------------------------------*/


/*--- Tabla pagos alimentarios y sus tablas anexas ---*/

CREATE TABLE tipopagoalimen
(idtipopagoalimen INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de pagos alimentarios',
parentesco varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Parentesco del pago alimentario',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del pago alimentario',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del pago alimentario',
PRIMARY KEY (idtipopagoalimen));

CREATE TABLE pagosalimen
(idpagosalimen INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del pago alimentario',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de pagos alimenticios',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del pago alimentario',
cantidadmeses INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Cantidad de meses',
idtipopagoalimen INT NOT NULL COMMENT 'Codigo del tipo de pago alimentario',
idingresonoconse INT NOT NULL COMMENT 'Codigo del ingreso no consecutivo',
PRIMARY KEY (idpagosalimen),
FOREIGN KEY (idtipopagoalimen) REFERENCES tipopagoalimen(idtipopagoalimen),
FOREIGN KEY (idingresonoconse) REFERENCES ingresonoconse(idingresonoconse));

/*---------------------------------------------*/


/*--- Tabla usuarioingresonoconse ---*/

CREATE TABLE usuarioingresonoconse
(idusuarioingresonoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioingresonoconse',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idingresonoconse INT NOT NULL COMMENT 'Codigo del ingreso no conse',
idrentatrabajo INT NOT NULL COMMENT 'Codigo de la renta de trabajo',
PRIMARY KEY (idusuarioingresonoconse),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idingresonoconse) REFERENCES ingresonoconse(idingresonoconse),
FOREIGN KEY (idrentatrabajo) REFERENCES rentatrabajo(idrentatrabajo));

/*--------------------------------*/


/*---- Tabla renta de trabajo ----*/

CREATE TABLE rentacapital
(idrentacapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la renta capital',
idcedulageneral INT NOT NULL COMMENT 'Codigo de la cedula general',
rentaliquida BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta liquida', 
rentasexentasdeduccion BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Rentas exentas deduccion',
rentaliquidaordinaria BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta liquida ordinaria',
rentaliquidacapital BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta liquida capital',
PRIMARY KEY (idrentacapital),
FOREIGN KEY (idcedulageneral) REFERENCES cedulageneral(idcedulageneral));

/*--------------------------------*/


/*---- Tabla ingresobruto renta capital ----*/

CREATE TABLE ingresobrutocapital
(idingresobrutocapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del ingreso bruto de la renta capital',
ingresobrutocapitaltotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ingreso bruto capital total',
PRIMARY KEY (idingresobrutocapital));

/*----------------------------*/


/*--- Tabla intereses rendimientos y sus tablas anexas ---*/

CREATE TABLE tipointeresesrendicapital
(idtipointeresesrendicapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de intereses rendimientos capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de interes',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de interes',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de interes',
PRIMARY KEY (idtipointeresesrendicapital));

CREATE TABLE interesesrendimientoscapital
(idinteresesrendimientoscapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del interes rendimiento capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de intereses rendimientos capital',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del pago alimentario',
idtipointeresesrendicapital INT NOT NULL COMMENT 'Codigo del tipo de interess rendimientos capital',
idingresobrutocapital INT NOT NULL COMMENT 'Codigo del ingreso bruto capital',
PRIMARY KEY (idinteresesrendimientoscapital),
FOREIGN KEY (idtipointeresesrendicapital) REFERENCES tipointeresesrendicapital(idtipointeresesrendicapital),
FOREIGN KEY (idingresobrutocapital) REFERENCES ingresobrutocapital(idingresobrutocapital));

/*---------------------------------------------*/


/*--- Tabla otros ingresos de la renta capital y sus tablas anexas ---*/

CREATE TABLE tipootrosingresoscapital
(idtipootrosingresoscapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de otros ingresos de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de otros ingresos',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción de otros ingresos',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de otros ingresos',
PRIMARY KEY (idtipootrosingresoscapital));

CREATE TABLE otrosingresoscapital
(idotrosingresoscapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de otros ingresos capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del otros ingresos',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de otros ingresos capital',
idtipootrosingresoscapital INT NOT NULL COMMENT 'Codigo del tipo de otros ingresos capital',
idingresobrutocapital INT NOT NULL COMMENT 'Codigo del ingreso bruto capital',
PRIMARY KEY (idotrosingresoscapital),
FOREIGN KEY (idtipootrosingresoscapital) REFERENCES tipootrosingresoscapital(idtipootrosingresoscapital),
FOREIGN KEY (idingresobrutocapital) REFERENCES ingresobrutocapital(idingresobrutocapital));

/*---------------------------------------------*/


/*---- Tabla usuario ingreso bruto Renta capital ----*/

CREATE TABLE usuarioingresobrutocapital
(idusuarioingresobrutocapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioingresobruto de la renta capital',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idingresobrutocapital INT NOT NULL COMMENT 'Codigo del ingreso bruto capital',
idrentacapital INT NOT NULL COMMENT 'Codigo de la renta capital',
PRIMARY KEY (idusuarioingresobrutocapital),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idingresobrutocapital) REFERENCES ingresobrutocapital(idingresobrutocapital),
FOREIGN KEY (idrentacapital) REFERENCES rentacapital(idrentacapital));

/*--------------------------------*/

/*---- Tabla ingreso no consecutivos renta capital ----*/

CREATE TABLE ingresonoconsecapital
(idingresonoconsecapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del ingreso bruto de la renta capital',
ingresosnoconsecapitaltotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ingreso no consecutivos capital total',
PRIMARY KEY (idingresonoconsecapital));

/*----------------------------*/


/*--- Tabla aporte obligatorio de la renta capital y sus tablas anexas ---*/

CREATE TABLE tipoaporteobligatoriocapital
(idtipoaporteobligatoriocapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de aporte obligatorio de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de aporte obligatorio de la renta capital',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción de aporte obligatorio de la renta capital',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de aporte obligatorio de la renta capital',
PRIMARY KEY (idtipoaporteobligatoriocapital));

CREATE TABLE aporteobligatoriocapital
(idaporteobligatoriocapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del aporte obligatorio de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de aporte obligatorio',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del aporte obligatorio de la renta capital',
idtipoaporteobligatoriocapital INT NOT NULL COMMENT 'Codigo del tipo de aporte obligatorio de la renta capital',
idingresonoconsecapital INT NOT NULL COMMENT 'Codigo del ingreso no consecutivo',
PRIMARY KEY (idaporteobligatoriocapital),
FOREIGN KEY (idtipoaporteobligatoriocapital) REFERENCES tipoaporteobligatoriocapital(idtipoaporteobligatoriocapital),
FOREIGN KEY (idingresonoconsecapital) REFERENCES ingresonoconsecapital(idingresonoconsecapital));

/*---------------------------------------------*/


/*--- Tabla aporte voluntario de la renta capital y sus tablas anexas ---*/

CREATE TABLE tipoaportevoluntariocapital
(idtipoaportevoluntariocapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de aporte voluntario de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de aporte voluntario de la renta capital',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción de aporte voluntario de la renta capital',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de aporte voluntario de la renta capital',
PRIMARY KEY (idtipoaportevoluntariocapital));

CREATE TABLE aportevoluntariocapital
(idaportevoluntariocapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del aporte voluntario de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de aporte voluntario',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del aporte voluntario de la renta capital',
idtipoaportevoluntariocapital INT NOT NULL COMMENT 'Codigo del tipo de aporte obligatorio de la renta capital',
idingresonoconsecapital INT NOT NULL COMMENT 'Codigo del ingreso no consecutivo',
PRIMARY KEY (idaportevoluntariocapital),
FOREIGN KEY (idtipoaportevoluntariocapital) REFERENCES tipoaportevoluntariocapital(idtipoaportevoluntariocapital),
FOREIGN KEY (idingresonoconsecapital) REFERENCES ingresonoconsecapital(idingresonoconsecapital));

/*---------------------------------------------*/


/*---- Tabla usuario ingreso no consecutivos Renta capital ----*/

CREATE TABLE usuarioingresonoconsecapital
(idusuarioingresonoconsecapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioingresonoconse de la renta capital',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idingresonoconsecapital INT NOT NULL COMMENT 'Codigo del ingreso no consecutivo capital',
idrentacapital INT NOT NULL COMMENT 'Codigo de la renta capital',
PRIMARY KEY (idusuarioingresonoconsecapital),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idingresonoconsecapital) REFERENCES ingresonoconsecapital(idingresonoconsecapital),
FOREIGN KEY (idrentacapital) REFERENCES rentacapital(idrentacapital));

/*--------------------------------*/


/*---- Tabla rentaliqpasECE de la renta capital ----*/

CREATE TABLE rentaliqpasececapital
(idrentaliqpasececapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la rentaliqpasece de la renta capital',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la rentaliqpasece de la renta capital',
PRIMARY KEY (idrentaliqpasececapital));

/*----------------------------*/


/*---- Tabla usuario rentaliqpasECE Renta capital ----*/

CREATE TABLE usuariorentaliqpasececapital
(idusuariorentaliqpasececapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariorentaliqpasece de la renta capital',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idrentaliqpasececapital INT NOT NULL COMMENT 'Codigo de la rentaliqpasECE capital',
idrentacapital INT NOT NULL COMMENT 'Codigo de la renta capital',
PRIMARY KEY (idusuariorentaliqpasececapital),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idrentaliqpasececapital) REFERENCES rentaliqpasececapital(idrentaliqpasececapital),
FOREIGN KEY (idrentacapital) REFERENCES rentacapital(idrentacapital));

/*--------------------------------*/


/*--- Tabla aporte voluntario de la renta capital y sus tablas anexas ---*/

CREATE TABLE tiporentaexededuccioncapital
(idtiporentaexededuccioncapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de renta exenta de deduccion de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de renta exenta de deduccion de la renta capital',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de renta exenta de deduccion de la renta capital',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de renta exenta de deduccion de la renta capital',
PRIMARY KEY (idtiporentaexededuccioncapital));

CREATE TABLE rentaexededuccioncapital
(idrentaexededuccioncapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la renta exenta de deduccion de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de renta exenta deduccion capital',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la renta exenta de deduccion de la renta capital',
idtiporentaexededuccioncapital INT NOT NULL COMMENT 'Codigo de la renta exenta de deduccion de la renta capital',
PRIMARY KEY (idrentaexededuccioncapital),
FOREIGN KEY (idtiporentaexededuccioncapital) REFERENCES tiporentaexededuccioncapital(idtiporentaexededuccioncapital));

/*---------------------------------------------*/


/*---- Tabla usuario renta exenta de deduccion de la Renta capital ----*/

CREATE TABLE usuariorentaexededuccioncapital
(idusuariorentaexededuccioncapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuario renta exenta de deduccion de la Renta capital',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idrentaexededuccioncapital INT NOT NULL COMMENT 'Codigo de la rentaexededuccion de la renta capital',
idrentacapital INT NOT NULL COMMENT 'Codigo de la renta capital',
PRIMARY KEY (idusuariorentaexededuccioncapital),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idrentaexededuccioncapital) REFERENCES rentaexededuccioncapital(idrentaexededuccioncapital),
FOREIGN KEY (idrentacapital) REFERENCES rentacapital(idrentacapital));

/*--------------------------------*/


/*---- Tabla costos de gastos procedentes de la renta capital ----*/

CREATE TABLE costogastosprocecapital
(idcostogastosprocecapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del costo de gastos procedentes de la renta capital',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del costo de gastos procedentes de la renta capital',
PRIMARY KEY (idcostogastosprocecapital));

/*----------------------------*/


/*---- Tabla intereses de prestamos de la renta capital ----*/

CREATE TABLE interesesprestamoscapital
(idinteresesprestamoscapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de los intereses de prestamos de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de interesesprestamoscapital',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de los intereses de prestamos de la renta capital',
idcostogastosprocecapital INT NOT NULL COMMENT 'Codigo del costo de gastos procedentes de la renta capital',
PRIMARY KEY (idinteresesprestamoscapital),
FOREIGN KEY (idcostogastosprocecapital) REFERENCES costogastosprocecapital(idcostogastosprocecapital));

/*----------------------------*/


/*--- Tabla otros costos de gastos de la renta capital y sus tablas anexas ---*/

CREATE TABLE tipootroscostogastocapital
(idtipootroscostogastocapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de otros costos de gastos de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de otros costos de gastos de la renta capital',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de otros costos de gastos de la renta capital',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de otros costos de gastos de la renta capital',
PRIMARY KEY (idtipootroscostogastocapital));

CREATE TABLE otroscostogastoscapital
(idotroscostogastoscapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de otros costos de gastos de la renta capital',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de otros costos gastos capital',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de otros costos de gastos de la renta capital',
idtipootroscostogastocapital INT NOT NULL COMMENT 'Codigo del tipo de otros costos de gastos de la renta capital',
idcostogastosprocecapital INT NOT NULL COMMENT 'Codigo del costo de gastos procedentes de la renta capital',
PRIMARY KEY (idotroscostogastoscapital),
FOREIGN KEY (idtipootroscostogastocapital) REFERENCES tipootroscostogastocapital(idtipootroscostogastocapital),
FOREIGN KEY (idcostogastosprocecapital) REFERENCES costogastosprocecapital(idcostogastosprocecapital));

/*---------------------------------------------*/


/*---- Tabla usuario costos de gastos procedentes de la Renta capital ----*/

CREATE TABLE usuariocostogastosprocecapital
(idusuariocostogastosprocecapital INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuario costo de gastos procedentes de la Renta capital',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idcostogastosprocecapital INT NOT NULL COMMENT 'Codigo del costo de gastos procedentes de la renta capital',
idrentacapital INT NOT NULL COMMENT 'Codigo de la renta capital',
PRIMARY KEY (idusuariocostogastosprocecapital),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idcostogastosprocecapital) REFERENCES costogastosprocecapital(idcostogastosprocecapital),
FOREIGN KEY (idrentacapital) REFERENCES rentacapital(idrentacapital));

/*--------------------------------*/


/*---- Tabla renta de trabajo ----*/

CREATE TABLE rentanolaboral
(idrentanolaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la renta no laboral',
idcedulageneral INT NOT NULL COMMENT 'Codigo de la cedula general',
rentaliquida BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta liquida', 
rentasexentasdeduccion BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Rentas exentas deduccion',
rentaliquidaordinaria BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta liquida ordinaria',
rentaliquidanolaboral BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta liquida no laboral',
PRIMARY KEY (idrentanolaboral),
FOREIGN KEY (idcedulageneral) REFERENCES cedulageneral(idcedulageneral));

/*--------------------------------*/


/*--- Tabla devdescreb de las rentas no laborales ---*/

CREATE TABLE devdescreblaboral
(iddevdescreblaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de devdescreb de la renta no laboral',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de devdescreblaboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de devdescreb de la renta no laboral',
PRIMARY KEY (iddevdescreblaboral));

/*---------------------------------------------*/


/*---- Tabla usuariodevdescreb de la Renta no laboral ----*/

CREATE TABLE usuariodevdescreblaboral
(idusuariodevdescreblaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariodevdescreb de la Renta no laboral',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
iddevdescreblaboral INT NOT NULL COMMENT 'Codigo de devdescreb de la renta no laboral',
idrentanolaboral INT NOT NULL COMMENT 'Codigo de la renta no laboral',
PRIMARY KEY (idusuariodevdescreblaboral),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (iddevdescreblaboral) REFERENCES devdescreblaboral(iddevdescreblaboral),
FOREIGN KEY (idrentanolaboral) REFERENCES rentanolaboral(idrentanolaboral));

/*--------------------------------*/


/*--- Tabla ingresobruto de las rentas no laborales ---*/

CREATE TABLE ingresobrutolaboral
(idingresobrutolaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de ingreso bruto de la renta no laboral',
ingresobrutototal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El ingreso bruto total de la renta no laboral',
PRIMARY KEY (idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla ingresos no clasifican de las rentas no laborales ---*/

CREATE TABLE ingresosnoclasificanlaboral
(idingresosnoclasificanlaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de ingreso no clasificado de la renta no laboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de ingreso no clasificado de la renta no laboral',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
PRIMARY KEY (idingresosnoclasificanlaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla indemnizacion no laboral de las rentas no laborales ---*/

CREATE TABLE indemnizacionnolaboral
(idindemnizacionnolaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de indemnización no laboral de la renta no laboral',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de la indemnización',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de indemnizacion no laboral de la renta no laboral',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
PRIMARY KEY (idindemnizacionnolaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla derechos explotacion propiedad de las rentas no laborales ---*/

CREATE TABLE derechosexplotpropielaboral
(idderechosexplotpropielaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de derechos explotacion propiedad de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del derecho explot propie laboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de derechos explotacion propiedad de las rentas no laborales',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
PRIMARY KEY (idderechosexplotpropielaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla recibidos gananciales de las rentas no laborales ---*/

CREATE TABLE recibidosganancialeslaboral
(idrecibidosganancialeslaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de recibidos gananciales de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de recibidosganancialeslaboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de recibidos gananciales de las rentas no laborales',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
PRIMARY KEY (idrecibidosganancialeslaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla recompensas de las rentas no laborales ---*/

CREATE TABLE recompensaslaboral
(idrecompensaslaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de recompensas de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de la recompensa',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de recompensas de las rentas no laborales',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
PRIMARY KEY (idrecompensaslaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla explotacion de franquicias de las rentas no laborales ---*/

CREATE TABLE explotfranquiciaslaboral
(idexplotfranquiciaslaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de explotacion de franquicias de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del explotfranquiciaslaboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de explotacion de franquicias de las rentas no laborales',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
PRIMARY KEY (idexplotfranquiciaslaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla de retiros de dineros de fondos de las rentas no laborales ---*/

CREATE TABLE retirodinerosfondovolulaboral
(idretirodinerosfondovolulaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de retiros de dineros de fondos de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de retirodinerosfondovolulaboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de retiros de dineros de fondos de las rentas no laborales',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
PRIMARY KEY (idretirodinerosfondovolulaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla de campannias politicas de las rentas no laborales ---*/

CREATE TABLE campanniaspoliticaslaboral
(idcampanniaspoliticaslaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de campannias politicas de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de la campania politica',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de campannias politicas de las rentas no laborales',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
PRIMARY KEY (idcampanniaspoliticaslaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla de apoyos con el estado de las rentas no laborales ---*/

CREATE TABLE apoyoseconoestadolaboral
(idapoyoseconoestadolaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de apoyos con el estado de las rentas no laborales ',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de apoyoseconoestadolaboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de apoyos con el estado de las rentas no laborales ',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
PRIMARY KEY (idapoyoseconoestadolaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*--- Tabla de valor bruto de las ventas de las rentas no laborales y sus tablas anexas ---*/

CREATE TABLE tipovalorbrutoventaslaboral
(idtipovalorbrutoventaslaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de valor bruto de las ventas de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de valor bruto de las ventas de las rentas no laborales',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de valor bruto de las ventas de las rentas no laborales',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de valor bruto de las ventas de las rentas no laborales',
PRIMARY KEY (idtipovalorbrutoventaslaboral));

CREATE TABLE valorbrutoventaslaboral
(idvalorbrutoventaslaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de valor bruto de las ventas de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de valor bruto ventas no laborales',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de valor bruto de las ventas de las rentas no laborales',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo del ingreso bruto de la renta no laboral',
idtipovalorbrutoventaslaboral INT NOT NULL COMMENT 'Codigo del tipo de valor bruto de las ventas de las rentas no laborales',
PRIMARY KEY (idvalorbrutoventaslaboral),
FOREIGN KEY (idtipovalorbrutoventaslaboral) REFERENCES tipovalorbrutoventaslaboral(idtipovalorbrutoventaslaboral),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral));

/*---------------------------------------------*/


/*---- Tabla usuarioingresobruto de la Renta no laboral ----*/

CREATE TABLE usuarioingresobrutolaboral
(idusuarioingresobrutolaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuario ingreso bruto de la Renta no laboral',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idingresobrutolaboral INT NOT NULL COMMENT 'Codigo de ingreso bruto de la renta no laboral',
idrentanolaboral INT NOT NULL COMMENT 'Codigo de la renta no laboral',
PRIMARY KEY (idusuarioingresobrutolaboral),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idingresobrutolaboral) REFERENCES ingresobrutolaboral(idingresobrutolaboral),
FOREIGN KEY (idrentanolaboral) REFERENCES rentanolaboral(idrentanolaboral));

/*--------------------------------*/


/*--- Tabla ingresosnoconse de las rentas no laborales ---*/

CREATE TABLE ingresosnoconselaboral
(idingresosnoconselaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
ingresosnoconsetotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El ingreso no consecutivo total de la renta no laboral',
PRIMARY KEY (idingresosnoconselaboral));

/*---------------------------------------------*/


/*--- Tabla de honorarios de las rentas no laborales ---*/

CREATE TABLE honorariosdesaproyeclaboral
(idhonorariosdesaproyeclaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de honorarios de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de los honorarios',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de honorarios de las rentas no laborales',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
PRIMARY KEY (idhonorariosdesaproyeclaboral),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral));

/*---------------------------------------------*/


/*--- Tabla de recibidos gananciales de las rentas no laborales no consecutivas ---*/

CREATE TABLE recibidosganancialeslaboralnoconse
(idrecibidosganancialeslaboralnoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de  recibidos gananciales de las rentas no laborales no consecutivas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de recibidosganancialeslaboralnoconse',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de  recibidos gananciales de las rentas no laborales no consecutivas',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
PRIMARY KEY (idrecibidosganancialeslaboralnoconse),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral));

/*---------------------------------------------*/


/*--- Tabla de recompensas de las rentas no laborales no consecutivas ---*/

CREATE TABLE recompensaslaboralnoconse
(idrecompensaslaboralnoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de recompensas de las rentas no laborales no consecutivas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de recompensaslaboralnoconse',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de recompensas de las rentas no laborales no consecutivas',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
PRIMARY KEY (idrecompensaslaboralnoconse),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral));

/*---------------------------------------------*/


/*--- Tabla de aportes obligatorios de las rentas no laborales no consecutivas y sus tablas anexas ---*/

CREATE TABLE tipoaporteobligatoriolaboralnoconse
(idtipoaporteobligatoriolaboralnoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de aportes obligatorios de las rentas no laborales no consecutivas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de aportes obligatorios de las rentas no laborales no consecutivas',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de aportes obligatorios de las rentas no laborales no consecutivas',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de aportes obligatorios de las rentas no laborales no consecutivas',
PRIMARY KEY (idtipoaporteobligatoriolaboralnoconse));

CREATE TABLE aportesobligatorioslaboralnoconse
(idaportesobligatorioslaboralnoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de aportes obligatorios de las rentas no laborales no consecutivas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del aporte obligatorios no laborales no conse',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de aportes obligatorios de las rentas no laborales no consecutivas',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
idtipoaporteobligatoriolaboralnoconse INT NOT NULL COMMENT 'Codigo del tipo de aportes obligatorios de las rentas no laborales no consecutivas',
PRIMARY KEY (idaportesobligatorioslaboralnoconse),
FOREIGN KEY (idtipoaporteobligatoriolaboralnoconse) REFERENCES tipoaporteobligatoriolaboralnoconse(idtipoaporteobligatoriolaboralnoconse),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral));

/*---------------------------------------------*/


/*--- Tabla de aportes voluntarios de las rentas no laborales no consecutivas ---*/

CREATE TABLE aportesvoluntarioslaboralnoconse
(idaportesvoluntarioslaboralnoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de aportes voluntarios de las rentas no laborales no consecutivas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del aporte voluntario laborales no conse',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de aportes voluntarios de las rentas no laborales no consecutivas',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
PRIMARY KEY (idaportesvoluntarioslaboralnoconse),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral));

/*---------------------------------------------*/


/*--- Tabla de aportes economicos educacion de las rentas no laborales no consecutivas ---*/

CREATE TABLE aporteseconoedulaboralnoconse
(idaporteseconoedulaboralnoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de aportes economicos educacion de las rentas no laborales no consecutivas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de aporteseconoedulaboralnoconse',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de aportes economicos educacion de las rentas no laborales no consecutivas',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
PRIMARY KEY (idaporteseconoedulaboralnoconse),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral));

/*---------------------------------------------*/


/*--- Tabla de indemnizacion de aseguradores de las rentas no laborales no consecutivas ---*/

CREATE TABLE indemnizaaseguradoreslaboralnoconse
(idindemnizaaseguradoreslaboralnoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de indemnizacion de aseguradores de las rentas no laborales no consecutivas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de indemnizaaseguradoreslaboralnoconse',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de indemnizacion de aseguradores de las rentas no laborales no consecutivas',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
PRIMARY KEY (idindemnizaaseguradoreslaboralnoconse),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral));

/*---------------------------------------------*/


/*--- Tabla de campannias politicas de las rentas no laborales no consecutivas ---*/

CREATE TABLE campanniaspoliticaslaboralnoconse
(idcampanniaspoliticaslaboralnoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de campannias politicas de las rentas no laborales no consecutivas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de campannias politicas',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de campannias politicas de las rentas no laborales no consecutivas',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
PRIMARY KEY (idcampanniaspoliticaslaboralnoconse),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral));

/*---------------------------------------------*/


/*--- Tabla de agro ingreso seguro de las rentas no laborales no consecutivas ---*/

CREATE TABLE agroingresosegurolaboralnoconse
(idagroingresosegurolaboralnoconse INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de agro ingreso seguro de las rentas no laborales no consecutivas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de agroingresosegurolaboralnoconse',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de agro ingreso seguro de las rentas no laborales no consecutivas',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
PRIMARY KEY (idagroingresosegurolaboralnoconse),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral));

/*---------------------------------------------*/


/*---- Tabla usuarioingresonoconse de la Renta no laboral ----*/

CREATE TABLE usuarioingresonoconselaboral
(idusuarioingresonoconselaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuario ingreso no consecutivo de la Renta no laboral',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idingresosnoconselaboral INT NOT NULL COMMENT 'Codigo de ingreso no consecutivo de la renta no laboral',
idrentanolaboral INT NOT NULL COMMENT 'Codigo de la renta no laboral',
PRIMARY KEY (idusuarioingresonoconselaboral),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idingresosnoconselaboral) REFERENCES ingresosnoconselaboral(idingresosnoconselaboral),
FOREIGN KEY (idrentanolaboral) REFERENCES rentanolaboral(idrentanolaboral));

/*--------------------------------*/


/*--- Tabla rentaliqpasECE de la Renta no laboral no conse ---*/

CREATE TABLE rentaliqpasecelaboral
(idrentaliqpasecelaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de rentaliqpasECE de la Renta no laboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la rentaliqpasECE de la Renta no laboral',
PRIMARY KEY (idrentaliqpasecelaboral));

/*---------------------------------------------*/


/*---- Tabla usuariorentaliqpasECE de la Renta no laboral no conse ----*/

CREATE TABLE usuariorentaliqpasecelaboral
(idusuariorentaliqpasecelaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariorentaliqpasECE de la Renta no laboral',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idrentaliqpasecelaboral INT NOT NULL COMMENT 'Codigo de renta liquidacion pasECE',
idrentanolaboral INT NOT NULL COMMENT 'Codigo de la renta no laboral',
PRIMARY KEY (idusuariorentaliqpasecelaboral),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idrentaliqpasecelaboral) REFERENCES rentaliqpasecelaboral(idrentaliqpasecelaboral),
FOREIGN KEY (idrentanolaboral) REFERENCES rentanolaboral(idrentanolaboral));

/*--------------------------------*/


/*--- Tabla de renta exenta de deduccion de la Renta no laboral ---*/

CREATE TABLE tiporentaexededuccionlaboral
(idtiporentaexededuccionlaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de renta exenta de deduccion de la Renta no laboral',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de renta exenta de deduccion de la Renta no laboral',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de renta exenta de deduccion de la Renta no laboral',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de renta exenta de deduccion de la Renta no laboral',
PRIMARY KEY (idtiporentaexededuccionlaboral));

CREATE TABLE rentaexededuccionlaboral
(idrentaexededuccionlaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de renta exenta de deduccion de la Renta no laboral',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de renta exenta deduccion laboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de renta exenta de deduccion de la Renta no laboral',
idtiporentaexededuccionlaboral INT NOT NULL COMMENT 'Codigo del tipo de renta exenta de deduccion de la Renta no laboral',
PRIMARY KEY (idrentaexededuccionlaboral),
FOREIGN KEY (idtiporentaexededuccionlaboral) REFERENCES tiporentaexededuccionlaboral(idtiporentaexededuccionlaboral));

/*---------------------------------------------*/


/*---- Tabla usuariorentaexededuccion de la Renta no laboral ----*/

CREATE TABLE usuariorentaexededuccionlaboral
(idusuariorentaexededuccionlaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariorentaexededuccion de la Renta no laboral',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idrentaexededuccionlaboral INT NOT NULL COMMENT 'Codigo de la renta exenta de deduccion de la Renta no laboral',
idrentanolaboral INT NOT NULL COMMENT 'Codigo de la renta no laboral',
PRIMARY KEY (idusuariorentaexededuccionlaboral),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idrentaexededuccionlaboral) REFERENCES rentaexededuccionlaboral(idrentaexededuccionlaboral),
FOREIGN KEY (idrentanolaboral) REFERENCES rentanolaboral(idrentanolaboral));

/*--------------------------------*/


/*--- Tabla costo gastos procedentes de la Renta no laboral ---*/

CREATE TABLE costogastosprocelaboral
(idcostogastosprocelaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de costo gastos procedentes de la Renta no laboral',
ingresocostogastoprocetotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor total del costo gastos procedentes de la Renta no laboral',
PRIMARY KEY (idcostogastosprocelaboral));

/*---------------------------------------------*/


/*--- Tabla de intereses de prestamos de las rentas no laborales ---*/

CREATE TABLE interesesprestamoslaboral
(idinteresesprestamoslaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de intereses de prestamos de las rentas no laborales',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de interesesprestamoslaboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de intereses de prestamos de las rentas no laborales',
idcostogastosprocelaboral INT NOT NULL COMMENT 'Codigo de costos gastos procedentes de la renta no laboral',
PRIMARY KEY (idinteresesprestamoslaboral),
FOREIGN KEY (idcostogastosprocelaboral) REFERENCES costogastosprocelaboral(idcostogastosprocelaboral));

/*---------------------------------------------*/


/*--- Tabla de costo fiscal de las rentas no laborales ---*/

CREATE TABLE costofiscallaboral
(idcostofiscallaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de costo fiscal de las rentas no laborales',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de costo fiscal de las rentas no laborales',
idcostogastosprocelaboral INT NOT NULL COMMENT 'Codigo de costos gastos procedentes de la renta no laboral',
PRIMARY KEY (idcostofiscallaboral),
FOREIGN KEY (idcostogastosprocelaboral) REFERENCES costogastosprocelaboral(idcostogastosprocelaboral));

/*---------------------------------------------*/


/*--- Tabla de otros costos de gastos de la Renta no laboral ---*/

CREATE TABLE tipootroscostogastolaboral
(idtipootroscostogastolaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de otros costos de gastos de la Renta no laboral',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de otros costos de gastos de la Renta no laboral',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de otros costos de gastos de la Renta no laboral',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de otros costos de gastos de la Renta no laboral',
PRIMARY KEY (idtipootroscostogastolaboral));

CREATE TABLE otroscostogastolaboral
(idotroscostogastolaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de otros costos de gastos de la Renta no laboral',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del otros costos gastos no laboral',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de otros costos de gastos de la Renta no laboral',
idtipootroscostogastolaboral INT NOT NULL COMMENT 'Codigo del tipo de otros costos de gastos de la Renta no laboral',
idcostogastosprocelaboral INT NOT NULL COMMENT 'Codigo de costos gastos procedentes de la renta no laboral',
PRIMARY KEY (idotroscostogastolaboral),
FOREIGN KEY (idtipootroscostogastolaboral) REFERENCES tipootroscostogastolaboral(idtipootroscostogastolaboral),
FOREIGN KEY (idcostogastosprocelaboral) REFERENCES costogastosprocelaboral(idcostogastosprocelaboral));

/*---------------------------------------------*/


/*---- Tabla usuariocostogastosproce de la Renta no laboral  ----*/

CREATE TABLE usuariocostogastosprocelaboral
(idusuariocostogastosprocelaboral INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariocostogastosproce de la Renta no laboral',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idcostogastosprocelaboral INT NOT NULL COMMENT 'Codigo del consto de gastos procedentes de la Renta no laboral',
idrentanolaboral INT NOT NULL COMMENT 'Codigo de la renta no laboral',
PRIMARY KEY (idusuariocostogastosprocelaboral),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idcostogastosprocelaboral) REFERENCES costogastosprocelaboral(idcostogastosprocelaboral),
FOREIGN KEY (idrentanolaboral) REFERENCES rentanolaboral(idrentanolaboral));

/*--------------------------------*/


/*---- Tabla cedula pensiones ----*/

CREATE TABLE cedulapensiones
(idcedulapensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de prestación',
iddeclaracion INT NOT NULL COMMENT 'Codigo de la declaración',
rentaliquida BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta Liquida',
rentaliquidagravable BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta liquida gravable',
PRIMARY KEY (idcedulapensiones),
FOREIGN KEY (iddeclaracion) REFERENCES declaracion(iddeclaracion));

/*------------------------------*/


/*--- Tabla de ingresos brutos de la cedula de pensiones ---*/

CREATE TABLE ingresosbrutospensiones
(idingresosbrutospensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de ingresos brutos de la cedula de pensiones',
ingresobrutototal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor total del ingreso bruto',
PRIMARY KEY (idingresosbrutospensiones));

/*---------------------------------------------*/


/*--- Tabla de indemnización sustituta de la cedula de pensiones ---*/

CREATE TABLE indemnizacionsustitutaspensiones
(idindemnizacionsustitutaspensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de indemnización sustituta de la cedula de pensiones',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de indemnizacionsustitutaspensiones',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de indemnización sustituta de la cedula de pensiones',
idingresosbrutospensiones INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Codigo de ingresobruto',
PRIMARY KEY (idindemnizacionsustitutaspensiones),
FOREIGN KEY (idingresosbrutospensiones) REFERENCES ingresosbrutospensiones(idingresosbrutospensiones));

/*---------------------------------------------*/


/*--- Tabla de pensiones exterior de la cedula de pensiones ---*/

CREATE TABLE pensionesexteriorpensiones
(idpensionesexteriorpensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de pensiones exterior',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de pensionesexteriorpensiones',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de indemnización sustituta de la cedula de pensiones',
idingresosbrutospensiones INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Codigo de ingresobruto',
PRIMARY KEY (idpensionesexteriorpensiones),
FOREIGN KEY (idingresosbrutospensiones) REFERENCES ingresosbrutospensiones(idingresosbrutospensiones));

/*---------------------------------------------*/


/*--- Tabla de devoluciones ahorro de la cedula de pensiones ---*/

CREATE TABLE devolucionesahorropensiones
(iddevolucionesahorropensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de devoluciones ahorro de la cedula de pensiones',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de devolucionesahorropensiones   ',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de indemnización sustituta de la cedula de pensiones',
idingresosbrutospensiones INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Codigo de ingresobruto',
PRIMARY KEY (iddevolucionesahorropensiones),
FOREIGN KEY (idingresosbrutospensiones) REFERENCES ingresosbrutospensiones(idingresosbrutospensiones));

/*---------------------------------------------*/


/*--- Tabla de Ingresos pensiones y sus tablas anexas ---*/

CREATE TABLE tipoingresospensiones
(idtipoingresospensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de Ingresos pensiones',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de Ingresos pensiones',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de Ingresos pensiones',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de Ingresos pensiones',
PRIMARY KEY (idtipoingresospensiones));

CREATE TABLE ingresospensiones
(idingresospensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de ingresos de pensiones',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de ingresos pensiones',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de indemnización sustituta de la cedula de pensiones',
idingresosbrutospensiones INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Codigo de ingresobruto',
idtipoingresospensiones INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Codigo del tipo de Ingresos pensiones',
PRIMARY KEY (idingresospensiones),
FOREIGN KEY (idingresosbrutospensiones) REFERENCES ingresosbrutospensiones(idingresosbrutospensiones),
FOREIGN KEY (idtipoingresospensiones) REFERENCES tipoingresospensiones(idtipoingresospensiones));

/*---------------------------------------------*/


/*---- Tabla usuarioingresobrutopensiones de la cedula de pensiones  ----*/

CREATE TABLE usuarioingresobrutopensiones
(idusuarioingresobrutopensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariocostogastosproce de la cedula de pensiones',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idcedulapensiones INT NOT NULL COMMENT 'Codigo de la cedula de pensiones',
idingresosbrutospensiones INT NOT NULL COMMENT 'Codigo del ingreso bruto de pensiones',
PRIMARY KEY (idusuarioingresobrutopensiones),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idcedulapensiones) REFERENCES cedulapensiones(idcedulapensiones),
FOREIGN KEY (idingresosbrutospensiones) REFERENCES ingresosbrutospensiones(idingresosbrutospensiones));

/*--------------------------------*/


/*--- Tabla de ingresos no conse total de la cedula de pensiones ---*/

CREATE TABLE ingresonoconsepensiones
(idingresonoconsepensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de ingresos no conse total de la cedula de pensiones',
ingresosnoconsetotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor total de ingresos no conse total de la cedula de pensiones',
PRIMARY KEY (idingresonoconsepensiones));

/*---------------------------------------------*/


/*--- Tabla de Aportes obligatorios y sus tablas anexas ---*/

CREATE TABLE tipoaportesobligatoriospensiones
(idtipoaportesobligatoriospensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de Aportes obligatorios',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de Aportes obligatorios',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de Aportes obligatorios',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de Aportes obligatorios',
PRIMARY KEY (idtipoaportesobligatoriospensiones));

CREATE TABLE aportesobligatoriospensiones
(idaportesobligatoriospensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de ingresos de pensiones',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de aportes obligatorios pensiones',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de indemnización sustituta de la cedula de pensiones',
idingresonoconsepensiones INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Codigo de ingresos no conse total de la cedula de pensiones',
idtipoaportesobligatoriospensiones INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Codigo del tipo de Ingresos pensiones',
PRIMARY KEY (idaportesobligatoriospensiones),
FOREIGN KEY (idingresonoconsepensiones) REFERENCES ingresonoconsepensiones(idingresonoconsepensiones),
FOREIGN KEY (idtipoaportesobligatoriospensiones) REFERENCES tipoaportesobligatoriospensiones(idtipoaportesobligatoriospensiones));

/*---------------------------------------------*/


/*---- Tabla usuarioingresonoconse de la cedula de pensiones  ----*/

CREATE TABLE usuarioingresonoconsepensiones
(idusuarioingresonoconsepensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioingresonoconsepensiones de la cedula de pensiones',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idcedulapensiones INT NOT NULL COMMENT 'Codigo de la cedula de pensiones',
idingresonoconsepensiones INT NOT NULL COMMENT 'Codigo ingreso no conse de pensiones',
PRIMARY KEY (idusuarioingresonoconsepensiones),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idcedulapensiones) REFERENCES cedulapensiones(idcedulapensiones),
FOREIGN KEY (idingresonoconsepensiones) REFERENCES ingresonoconsepensiones(idingresonoconsepensiones));

/*--------------------------------*/


/*--- Tabla de la renta exenta de la cedula de pensiones ---*/

CREATE TABLE rentaexentapensiones
(idrentaexentapensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la renta exenta de la cedula de pensiones',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor total de la renta exenta de la cedula de pensiones',
PRIMARY KEY (idrentaexentapensiones));

/*---------------------------------------------*/


/*---- Tabla usuariorentaexenta de la cedula de pensiones  ----*/

CREATE TABLE usuariorentaexentapensiones
(idusuariorentaexentapensiones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariorentaexenta de la cedula de pensiones',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idcedulapensiones INT NOT NULL COMMENT 'Codigo de la cedula de pensiones',
idrentaexentapensiones INT NOT NULL COMMENT 'Codigo ingreso no conse de pensiones',
PRIMARY KEY (idusuariorentaexentapensiones),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idcedulapensiones) REFERENCES cedulapensiones(idcedulapensiones),
FOREIGN KEY (idrentaexentapensiones) REFERENCES rentaexentapensiones(idrentaexentapensiones));

/*--------------------------------*/


/*---- Tabla Ganancias Ocasionales ----*/

CREATE TABLE gananciasocasionales
(idgananciasocasionales INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de las ganancias ocasionales',
iddeclaracion INT NOT NULL COMMENT 'Codigo de la declaración',
gananciasocasionales BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ganacias Ocasionales',
PRIMARY KEY (idgananciasocasionales),
FOREIGN KEY (iddeclaracion) REFERENCES declaracion(iddeclaracion));

/*------------------------------*/


/*--- Tabla de ingresos ganancias y sus tablas anexas ---*/

CREATE TABLE tipoingresosganancias
(idtipoingresosganancias INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de ingreo de ganancias',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de ingreso de ganancias',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de ingreo de ganancias',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de ingreo de ganancias',
PRIMARY KEY (idtipoingresosganancias));

CREATE TABLE ingresosganacias
(idingresosganacias INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de ingresos de ganacias',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de ingresos de ganacias',
idtipoingresosganancias INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Codigo del tipo de ingresos de ganacias',
PRIMARY KEY (idingresosganacias),
FOREIGN KEY (idtipoingresosganancias) REFERENCES tipoingresosganancias(idtipoingresosganancias));

/*---------------------------------------------*/


/*---- Tabla usuarioingresosganancias de las ganancias ocasionales  ----*/

CREATE TABLE usuarioingresosganancias
(idusuarioingresosganancias INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioingresosganancias de las ganancias ocasionales',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idgananciasocasionales INT NOT NULL COMMENT 'Codigo de las ganancias ocasionales',
idingresosganacias INT NOT NULL COMMENT 'Codigo de ingresos ganancias',
PRIMARY KEY (idusuarioingresosganancias),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idgananciasocasionales) REFERENCES gananciasocasionales(idgananciasocasionales),
FOREIGN KEY (idingresosganacias) REFERENCES ingresosganacias(idingresosganacias));

/*--------------------------------*/


/*--- Tabla de las ganancias no gravadas y sus tablas anexas ---*/

CREATE TABLE tipogananciasnogravadas
(idtipogananciasnogravadas INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de las ganancias no gravadas',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del tipo de las ganancias no gravadas',
descripcion varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripción del tipo de las ganancias no gravadas',
ayuda varchar(250) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Ayuda del tipo de las ganancias no gravadas',
PRIMARY KEY (idtipogananciasnogravadas));

CREATE TABLE gananciasnogravadas
(idgananciasonogravadas INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de las ganancias no gravadas',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de las ganancias no gravadas',
idtipogananciasnogravadas INT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Codigo del tipo de las ganancias no gravadas',
PRIMARY KEY (idgananciasonogravadas),
FOREIGN KEY (idtipogananciasnogravadas) REFERENCES tipogananciasnogravadas(idtipogananciasnogravadas));

/*---------------------------------------------*/


/*---- Tabla usuariogananciasnogravadas de las ganancias ocasionales  ----*/

CREATE TABLE usuariogananciasnogravadas
(idusuariogananciasnogravadas INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioingresosganancias de las ganancias ocasionales',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idgananciasocasionales INT NOT NULL COMMENT 'Codigo de las ganancias ocasionales',
idgananciasonogravadas INT NOT NULL COMMENT 'Codigo de las ganancias no gravadas',
PRIMARY KEY (idusuariogananciasnogravadas),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idgananciasocasionales) REFERENCES gananciasocasionales(idgananciasocasionales),
FOREIGN KEY (idgananciasonogravadas) REFERENCES gananciasnogravadas(idgananciasonogravadas));

/*--------------------------------*/


/*--- Tabla de los ingresos no consecutivos de las ganancias ocasionales ---*/

CREATE TABLE ingresonoconseganancias
(idingresonoconseganancias INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de los ingresos no consecutivos de las ganancias ocasionales',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de los ingresos no consecutivos de las ganancias ocasionales',
PRIMARY KEY (idingresonoconseganancias));

/*---------------------------------------------*/


/*---- Tabla usuarioingresonoconse de las ganancias ocasionales  ----*/

CREATE TABLE usuarioingresonoconsegananciasocasionales
(idusuarioingresonoconsegananciasocasionales INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioingresonoconsegananciasocasionales de las ganancias ocasionales',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idgananciasocasionales INT NOT NULL COMMENT 'Codigo de las ganancias ocasionales',
idingresonoconseganancias INT NOT NULL COMMENT 'Codigo de las ganancias no gravadas',
PRIMARY KEY (idusuarioingresonoconsegananciasocasionales),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idgananciasocasionales) REFERENCES gananciasocasionales(idgananciasocasionales),
FOREIGN KEY (idingresonoconseganancias) REFERENCES ingresonoconseganancias(idingresonoconseganancias));

/*--------------------------------*/


/*---- Tabla Liquidación Privada ----*/

CREATE TABLE liquidacionprivada
(idliquidacionprivada INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de Liquidacion privada',
iddeclaracion INT NOT NULL COMMENT 'Codigo de la declaración',
impuestoneto BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Impuesto Neto',
impuestocargototal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Impuesto de cargo total',
impuestototal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Impuesto total',
saldopagartotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Salgo a pagar total',
saldofavortotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Salgo a favor total',
PRIMARY KEY (idliquidacionprivada),
FOREIGN KEY (iddeclaracion) REFERENCES declaracion(iddeclaracion));

/*------------------------------*/


/*--- Tabla del impuesto de renta liquida de la liquidacion privada ---*/

CREATE TABLE impuestorentaliq
(idimpuestorentaliq INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del impuesto de renta liquida de la liquidacion privada',
generalpensiones BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor general de las pensiones',
rentapresuntivapen BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Renta presuntiva de las pensiones',
diviparti2016 BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Dividendos y participaciones 2016',
divipartisubcedula1a BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Dividendos y participaciones cedula 1a',
divipartisubcedula2a BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Dividendos y participaciones cedula 2a',
impuestorentaliqtotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Impuesto renta liquida total',
PRIMARY KEY (idimpuestorentaliq));

/*---------------------------------------------*/


/*---- Tabla usuarioimpuestorentaliq de la liquidacion privada  ----*/

CREATE TABLE usuarioimpuestorentaliq
(idusuarioimpuestorentaliq INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioimpuestorentaliq de la liquidacion privada',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idliquidacionprivada INT NOT NULL COMMENT 'Codigo de la liquidacion privada',
idimpuestorentaliq INT NOT NULL COMMENT 'Codigo del impuesto renta liquida',
PRIMARY KEY (idusuarioimpuestorentaliq),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idliquidacionprivada) REFERENCES liquidacionprivada(idliquidacionprivada),
FOREIGN KEY (idimpuestorentaliq) REFERENCES impuestorentaliq(idimpuestorentaliq));

/*--------------------------------*/


/*--- Tabla del anticipo de renta de la liquidacion privada ---*/

CREATE TABLE anticiporenta
(idanticiporenta INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del anticipo de renta',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de anticiporenta',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del anticipo de renta',
descripcion VARCHAR(200) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripcion del anticipo de renta',
PRIMARY KEY (idanticiporenta));

/*---------------------------------------------*/



/*---- Tabla usuarioanticiporenta de la liquidacion privada  ----*/

CREATE TABLE usuarioanticiporenta
(idusuarioanticiporenta INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioanticiporenta de la liquidacion privada',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idliquidacionprivada INT NOT NULL COMMENT 'Codigo de la liquidacion privada',
idanticiporenta INT NOT NULL COMMENT 'Codigo del anticipo de renta',
PRIMARY KEY (idusuarioanticiporenta),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idliquidacionprivada) REFERENCES liquidacionprivada(idliquidacionprivada),
FOREIGN KEY (idanticiporenta) REFERENCES anticiporenta(idanticiporenta));

/*--------------------------------*/


/*--- Tabla de las sanciones de la liquidacion privada ---*/

CREATE TABLE sanciones
(idsanciones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de las sanciones',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de sanciones',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la sancion',
descripcion VARCHAR(200) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripcion de la sancion',
PRIMARY KEY (idsanciones));

/*---------------------------------------------*/


/*---- Tabla usuariosanciones de la liquidacion privada  ----*/

CREATE TABLE usuariosanciones
(idusuariosanciones INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariosanciones de la liquidacion privada',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idliquidacionprivada INT NOT NULL COMMENT 'Codigo de la liquidacion privada',
idsanciones INT NOT NULL COMMENT 'Codigo de las sanciones',
PRIMARY KEY (idusuariosanciones),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idliquidacionprivada) REFERENCES liquidacionprivada(idliquidacionprivada),
FOREIGN KEY (idsanciones) REFERENCES sanciones(idsanciones));

/*--------------------------------*/


/*--- Tabla del saldo a favor de la liquidacion privada ---*/

CREATE TABLE saldofavor
(idsaldofavor INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del saldo a favor',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre del saldo a favor',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del saldo a favor',
descripcion VARCHAR(200) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripcion del saldo a favor',
PRIMARY KEY (idsaldofavor));

/*---------------------------------------------*/


/*---- Tabla usuariosaldoafavor de la liquidacion privada  ----*/

CREATE TABLE usuariosaldoafavor
(idusuariosaldoafavor INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariosaldoafavor de la liquidacion privada',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idliquidacionprivada INT NOT NULL COMMENT 'Codigo de la liquidacion privada',
idsaldofavor INT NOT NULL COMMENT 'Codigo del saldo a favor',
PRIMARY KEY (idusuariosaldoafavor),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idliquidacionprivada) REFERENCES liquidacionprivada(idliquidacionprivada),
FOREIGN KEY (idsaldofavor) REFERENCES saldofavor(idsaldofavor));

/*--------------------------------*/


/*--- Tabla de la retencion a declarar de la liquidacion privada ---*/

CREATE TABLE retenciondeclarar
(idretenciondeclarar INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la retencion a declarar',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de retencion declarar',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la retencion a declarar',
descripcion VARCHAR(200) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripcion de la retencion a declarar',
PRIMARY KEY (idretenciondeclarar));

/*---------------------------------------------*/


/*---- Tabla usuarioretenciondeclarar de la liquidacion privada  ----*/

CREATE TABLE usuarioretenciondeclarar
(idusuarioretenciondeclarar INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioretenciondeclarar de la liquidacion privada',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idliquidacionprivada INT NOT NULL COMMENT 'Codigo de la liquidacion privada',
idretenciondeclarar INT NOT NULL COMMENT 'Codigo de la retencion a declarar',
PRIMARY KEY (idusuarioretenciondeclarar),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idliquidacionprivada) REFERENCES liquidacionprivada(idliquidacionprivada),
FOREIGN KEY (idretenciondeclarar) REFERENCES retenciondeclarar(idretenciondeclarar));

/*--------------------------------*/


/*--- Tabla de los descuentos de la liquidacion privada ---*/

CREATE TABLE descuentos
(iddescuentos INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del descuento',
impuestoexterior BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El impuesto exterior',
donaciones BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Donaciones',
otros BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'otros',
descuentostributotal BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descuentos tribtarios totales',
PRIMARY KEY (iddescuentos));

/*---------------------------------------------*/


/*---- Tabla usuariodescuentos de la liquidacion privada  ----*/

CREATE TABLE usuariodescuentos
(idusuariodescuentos INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariodescuentos de la liquidacion privada',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idliquidacionprivada INT NOT NULL COMMENT 'Codigo de la liquidacion privada',
iddescuentos INT NOT NULL COMMENT 'Codigo de la retencion a declarar',
PRIMARY KEY (idusuariodescuentos),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idliquidacionprivada) REFERENCES liquidacionprivada(idliquidacionprivada),
FOREIGN KEY (iddescuentos) REFERENCES descuentos(iddescuentos));

/*--------------------------------*/


/*--- Tabla del descuento impuesto exterior de la liquidacion privada ---*/

CREATE TABLE descuentoimpuext
(iddescuentoimpuext INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del descuento impuesto exterior',
nombre varchar(50) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Nombre de descuentoimpuext',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor del descuento impuesto exterior',
descripcion VARCHAR(200) NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Descripcion del descuento impuesto exterior',
PRIMARY KEY (iddescuentoimpuext));

/*---------------------------------------------*/


/*---- Tabla usuariodescuentoimpuext de la liquidacion privada  ----*/

CREATE TABLE usuariodescuentoimpuext
(idusuariodescuentoimpuext INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioretenciondeclarar de la liquidacion privada',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idliquidacionprivada INT NOT NULL COMMENT 'Codigo de la liquidacion privada',
iddescuentoimpuext INT NOT NULL COMMENT 'Codigo de la retencion a declarar',
PRIMARY KEY (idusuariodescuentoimpuext),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idliquidacionprivada) REFERENCES liquidacionprivada(idliquidacionprivada),
FOREIGN KEY (iddescuentoimpuext) REFERENCES descuentoimpuext(iddescuentoimpuext));

/*--------------------------------*/


/*---- Tabla Cedula dividendos y Participaciones ----*/

CREATE TABLE ceduladiviparti
(idceduladiviparti INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de Liquidacion privada',
iddeclaracion INT NOT NULL COMMENT 'Codigo de la declaración',
rentaliquida BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Valor de la renta liquida',
rentaexenta BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'Valor de la renta exenta',
PRIMARY KEY (idceduladiviparti),
FOREIGN KEY (iddeclaracion) REFERENCES declaracion(iddeclaracion));

/*------------------------------*/


/*--- Tabla de los dividendos y participaciones del 2016 ---*/

CREATE TABLE diviparti2016
(iddiviparti2016 INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de los dividendos y participaciones del 2016',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de los dividendos y participaciones del 2016',
PRIMARY KEY (iddiviparti2016));

/*---------------------------------------------*/


/*---- Tabla usuariodiviparti2016 de la cedula de dividendos y participaciones  ----*/

CREATE TABLE usuariodiviparti2016
(idusuariodiviparti2016 INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariodiviparti2016 de la cedula de dividendos y participaciones',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idceduladiviparti INT NOT NULL COMMENT 'Codigo de la Cedula de dividendos y participaciones',
iddiviparti2016 INT NOT NULL COMMENT 'Codigo de los dividendos y participaciones del 2016',
PRIMARY KEY (idusuariodiviparti2016),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idceduladiviparti) REFERENCES ceduladiviparti(idceduladiviparti),
FOREIGN KEY (iddiviparti2016) REFERENCES diviparti2016(iddiviparti2016));

/*--------------------------------*/


/*--- Tabla de los dividendos y participaciones del 2016 ---*/

CREATE TABLE subcedula1a
(idsubcedula1a INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la subcedula 1a',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la subcedula1a',
PRIMARY KEY (idsubcedula1a));

/*---------------------------------------------*/


/*---- Tabla usuariosubcedula1a de la cedula de dividendos y participaciones  ----*/

CREATE TABLE usuariosubcedula1a
(idusuariosubcedula1a INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariosubcedula1a de la cedula de dividendos y participaciones',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idceduladiviparti INT NOT NULL COMMENT 'Codigo de la Cedula de dividendos y participaciones',
idsubcedula1a INT NOT NULL COMMENT 'Codigo de la subcedula 1a',
PRIMARY KEY (idusuariosubcedula1a),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idceduladiviparti) REFERENCES ceduladiviparti(idceduladiviparti),
FOREIGN KEY (idsubcedula1a) REFERENCES subcedula1a(idsubcedula1a));

/*--------------------------------*/


/*--- Tabla de la Renta liquida de los pasivos de dividendos ---*/

CREATE TABLE rentaliqpasecedividendos
(idrentaliqpasecedividendos INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la Renta liquida de los pasivos de dividendos',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la Renta liquida de los pasivos de dividendos',
PRIMARY KEY (idrentaliqpasecedividendos));

/*---------------------------------------------*/


/*---- Tabla usuariorentaliqpasecedividendos de la cedula de dividendos y participaciones  ----*/

CREATE TABLE usuariorentaliqpasecedividendos
(idusuariorentaliqpasecedividendos INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariorentaliqpasecedividendos de la cedula de dividendos y participaciones',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idceduladiviparti INT NOT NULL COMMENT 'Codigo de la Cedula de dividendos y participaciones',
idrentaliqpasecedividendos INT NOT NULL COMMENT 'Codigo de la subcedula 1a',
PRIMARY KEY (idusuariorentaliqpasecedividendos),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idceduladiviparti) REFERENCES ceduladiviparti(idceduladiviparti),
FOREIGN KEY (idrentaliqpasecedividendos) REFERENCES rentaliqpasecedividendos(idrentaliqpasecedividendos));

/*--------------------------------*/


/*--- Tabla de Ingreso no constitutivo de la cedula de dividendos y participaciones ---*/

CREATE TABLE ingresonoconsedividendos
(idingresonoconsedividendos INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del ingreso no constitutivo de renta',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la Renta liquida de los pasivos de dividendos',
PRIMARY KEY (idingresonoconsedividendos));

/*---------------------------------------------*/


/*--- Tabla de los dividendos y participaciones del 2016 ---*/

CREATE TABLE subcedula2a
(idsubcedula2a INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la subcedula 2a',
valor BIGINT NOT NULL COLLATE utf8mb4_spanish_ci COMMENT 'El valor de la subcedula1a',
PRIMARY KEY (idsubcedula2a));

/*---------------------------------------------*/


/*---- Tabla usuariosubcedula2a de la cedula de dividendos y participaciones  ----*/

CREATE TABLE usuariosubcedula2a
(idusuariosubcedula2a INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuariosubcedula2a de la cedula de dividendos y participaciones',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idceduladiviparti INT NOT NULL COMMENT 'Codigo de la Cedula de dividendos y participaciones',
idsubcedula2a INT NOT NULL COMMENT 'Codigo de la subcedula 1a',
PRIMARY KEY (idusuariosubcedula2a),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idceduladiviparti) REFERENCES ceduladiviparti(idceduladiviparti),
FOREIGN KEY (idsubcedula2a) REFERENCES subcedula2a(idsubcedula2a));

/*--------------------------------*/


/*---- Tabla usuarioingresonoconse de la cedula de dividendos y participaciones  ----*/

CREATE TABLE usuarioingresonoconsedividendos
(idusuarioingresonoconsedividendos INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuarioingresonoconsedividendos de la cedula de dividendos y participaciones',
idusuario INT NOT NULL COMMENT 'Codigo del usuario',
idceduladiviparti INT NOT NULL COMMENT 'Codigo de la Cedula de dividendos y participaciones',
idingresonoconsedividendos INT NOT NULL COMMENT 'Codigo del ingreso no constitutivo de renta',
PRIMARY KEY (idusuarioingresonoconsedividendos),
FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
FOREIGN KEY (idceduladiviparti) REFERENCES ceduladiviparti(idceduladiviparti),
FOREIGN KEY (idingresonoconsedividendos) REFERENCES ingresonoconsedividendos(idingresonoconsedividendos));

/*--------------------------------*/


/*-----Inserción de datos de la tabla ESTADOUSUARIO-----*/

INSERT INTO `estadousuario`(`tipoestado`) VALUES ('Activo'), ('Inactivo');

/*------------------------------------------------------*/


/*-----Inserción de datos de la tabla ROLUSUARIO-----*/

INSERT INTO `rol`(`tiporol`) VALUES ('SuperAdmin'), ('Coordinador'), ('Contador'), ('Declarante');

/*---------------------------------------------------*/


/*--- Inserción de usuario administrador ---*/

INSERT INTO `usuario` (`nombre`, `apellido`, `cedula`, `telefono`, `correo`, `password`, `idrol`, `idestado`) VALUES ('El Super', 'Admin', '0000000000', '000000000', 'admin@prueba.com', '$2y$10$oid4hwBA8SKdnB0KRMRglOnJyOIybbeaQgQ4lul4yK7M9RmXF2uVG', '1', '1');

/* 
Usuario de iniciar sesión: admin@prueba.com
Password: prueba
*/

/*-------------------------------------------*/


/*--- Insercion de otras cuentas ---*/

/* Cuenta de coordinador. Usuario: coordinador@prueba.com   Password: prueba*/
INSERT INTO `usuario` (`nombre`, `apellido`, `cedula`, `telefono`, `correo`, `password`, `idrol`, `idestado`) VALUES ('el', 'coordinador', '0000000000', '000000000', 'coordinador@prueba.com', '$2y$10$74LnSe/8ituYBEh0pqRX0uxpi.R7.ERYr4w8StgvItHRLYXqN/oxG', '2', '1');

/* Cuenta de contador. Usuario: contador@prueba.com   Password: prueba*/
INSERT INTO `usuario` (`nombre`, `apellido`, `cedula`, `telefono`, `correo`, `password`, `idrol`, `idestado`) VALUES ('el', 'contador', '0000000000', '000000000', 'contador@prueba.com', '$2y$10$cyzIbacwrSnjVvs1LpYPgemKKhZTg6B0fAUNFO3o2QlH2RSwxLTQK', '3', '1');

/* Cuenta de contador. Usuario: declarante@prueba.com   Password: prueba*/
INSERT INTO `usuario` (`nombre`, `apellido`, `cedula`, `telefono`, `correo`, `password`, `idrol`, `idestado`) VALUES ('el', 'declarante', '0000000000', '000000000', 'declarante@prueba.com', '$2y$10$h5Rmpyf6KTZ42/EzZo/nMejny.pzfbUibQCV.TfCVZhvnnOFlCbaG', '4', '1');

/*----------------------------------*/


/*--- Inserción de parametros ---*/

INSERT INTO `parametros` (`valortributario`, `tope1`, `tope2`, `annoperiodo`, `marcolegal`, `marcocalendario`, `estadoparametro`) VALUES ('35607', '154215000', '47978000', '2019', 'Decreto 2345 del 23 Diciembre 2019', 'Calendario tributario 2020', '1');

/*-------------------------------*/


/*--- Inserción de calendario fiscal ---*/

INSERT INTO `calendariofiscal` ( `dia1`, `dia2`, `idparametro`) VALUES ('2020-08-11', '2020-10-21', '1');

/*--------------------------------------*/


/*-- Inserción de Periodo de declaración --*/

INSERT INTO `periododeclarante` (`digito1`, `digito2`, `dia`, `idcalendario`) VALUES ('99', '00', '2020-08-11', '1'), ('97', '98', '2020-08-12', '1'), ('95', '96', '2020-08-13', '1'), ('93', '94', '2020-08-14', '1'), ('91', '92', '2020-08-18', '1'), ('89', '90', '2020-08-19', '1'), ('87', '88', '2020-08-20', '1'), ('85', '86', '2020-08-21', '1'), ('83', '84', '2020-08-24', '1'), ('81', '82', '2020-08-25', '1'), ('79', '80', '2020-08-26', '1'), ('77', '78', '2020-08-27', '1'), ('75', '76', '2020-08-28', '1'), ('73', '74', '2020-08-31', '1');

/*-----------------------------------------*/


/*--- Inserción del Modelo ---*/

INSERT INTO `modelo` (`tipomodelo`) VALUES ('Nacional'), ('Internacional');

/*----------------------------*/


/*--- Inserción de tipo de moneda ---*/

INSERT INTO `tipomoneda` (`nombre`) VALUES ('Peso Colombiano');

/*-----------------------------------*/


/*--- Inserción tipo dirección seccional ---*/

INSERT INTO `tipodireccionseccional` (`nombre`, `descripcion`, `ayuda`) VALUES ('Impuesto y Aduanas de Armenia', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.'), ('Impuestos de Barranquilla', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.'), ('Aduanas de Bogotá', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.'), ('Impuesto y Aduanas de Bucaramanga', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.'), ('Impuestos de Cali', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.'), ('Impuestos de Cartagena', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.'), ('Impuestos de Cúcuta', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.'), ('Impuestos y Aduanas de Girardot', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.'), ('Impuestos y Aduanas de Ibagué', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.'), ('Impuestos y Aduanas de Manizales', 'Sin descripción', 'Registre en esta casilla el código de la Dirección Seccional que corresponde al domicilio o asiento principal de su actividad o negocio, según lo informado en la casilla 12 de la hoja principal del Registro Único Tributario RUT.');

/*-----------------------------------------*/


/*--- Inserción actividad economica ---*/

INSERT INTO `tipoactividadeconomica` (`nombre`, `descripcion`, `ayuda`) VALUES ('Asalariados', '0010', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.'), ('Sin actividad económica', '0081', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.'), ('Personas naturales subsidiadas por terceros', '0082', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.'), ('Rentistas de capital', '0090', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.'), ('Cultivo de cereales (excepto arroz), legumbre y semillas oleaginosas.', '0111', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.'), ('Cultivo de arroz', '0112', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.'), ('Cultivo de hortalizas, raices y tubercúlos', '0113', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.'), ('Cultivo de tabaco', '0114', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.'), ('Cultivo de plantas textiles', '0115', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.'), ('Otros cultivos transitorios', '0119', 'Digite el código de la actividad económica que le generó el mayor valor de ingresos operacionales en el periodo a declarar.');

/*------------------------------------*/


/*--- Inserción tipo bien ---*/

INSERT INTO `tipobien` (`nombre`, `descripcion`, `ayuda`) VALUES ('Terrenos', 'Sin descripción', 'Escrituras'), ('Vehículos', 'Sin descripción', 'Tarjeta de propiedad'), ('Muebles y enseres', 'Sin descripción', 'Sin ayuda'), ('Construcciones', 'Corresponde a casas, apartamentos y oficinas', 'Escrituras'), ('Inversiones', 'Sin descripción', 'Sin ayuda'), ('Acciones', 'Sin descripción', 'Sin ayuda'), ('Cuentas bancarias', 'Sin descripción', 'Saldo total o extractos bancarios en cuentas de ahorro o corriente, se puede ayudar revisando el certificado de costos financiero.'), ('Título valores', 'Sin descripción', 'Sin ayuda');

/*---------------------------*/


/*--- Inserción tipo deuda ---*/

INSERT INTO `tipodeuda` (`nombre`, `descripcion`, `ayuda`) VALUES ('Pagarés', 'Sin descripción', 'Ingrese el valor de los saldos finales de su deuda.'), ('Hipotecas', 'Sin descripción', 'Ingrese el valor de los saldos finales de su deuda.'), ('Letras', 'Sin descripción', 'Ingrese el valor de los saldos finales de su deuda.'), ('Deudas', 'Sin descripción', 'Ingrese el valor de los saldos finales de su deuda.'), ('Préstamos', 'Sin descripción', 'Ingrese el valor de los saldos finales de su deuda.'), ('Cuentas por pagar', 'Sin descripción', 'Ingrese el valor de los saldos finales de su deuda.');

/*----------------------------*/


/*--- Inserción tipo prestación ---*/

INSERT INTO `tipoprestacion` (`nombre`, `descripcion`, `ayuda`) VALUES ('Prima', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.'), ('Vacaciones', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.');

/*----------------------------------*/


/*--- Inserción tipo aporte obligatorio renta trabajo ---*/

INSERT INTO `tipoaporteobligatorio` (`nombre`, `descripcion`, `ayuda`) VALUES ('Pensión y Fondo de solidaridad pensional (FSP)', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.'), ('Salud', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.');

/*-------------------------------------------------------*/


/*--- Inserción tipo aporte voluntario renta trabajo ---*/

INSERT INTO `tipoaportevoluntario` (`nombre`, `descripcion`, `ayuda`) VALUES ('Cuentas AFC o AVC', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.'), ('Regimen de ahorro individual con solidaridad - RAIS', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.');

/*------------------------------------------------------*/


/*--- Inserción pago de alimentación ---*/

INSERT INTO `tipopagoalimen` (`parentesco`, `descripcion`, `ayuda`) VALUES ('Hijo', 'Sin descripción', 'Sin ayuda'), ('Padre', 'Sin descripción', 'Sin ayuda'), ('Madre', 'Sin descripción', 'Sin ayuda');

/*--------------------------------------*/


/*--- Inserción tipo deducción ---*/

INSERT INTO `tipodeduccion` (`nombre`, `descripcion`, `ayuda`) VALUES ('Pago de intereses de vivienda o costo financiero leasing habitacional', 'Límite máximo 1,200 UVT anuales ($39.787.000) ', 'Sin ayuda'), ('Deducción por dependiente', 'Sin descripción', 'Sin ayuda'), ('Pagos por medicina prepagada durante el año 2019', 'Límite máximo a deducir es de 16 UVT mensuales ($548.320), 192 UVT al año ($6.580.000)', 'Sin ayuda'), ('Valor de los aportes voluntarios a fondo de cesantias', 'Límite máximo anual de 2,500 UVT ($85.675.000)', ''), ('Valor del 50% del GMF que se haya pagado durante el 2019', 'GMF = Gravamen a Monto Financiero', 'Sin ayuda');

/*---------------------------------*/


/*--- Inserción tipo Indemnización ---*/

INSERT INTO `tipoindemnizacion` (`nombre`, `descripcion`, `ayuda`) VALUES ('Por accidente de trabajo', 'Sin descripción', 'Sin ayuda'), ('Por enfermedad', 'Sin descripción', 'Sin ayuda'), ('Por protección', 'Sin descripción', 'Sin ayuda'), ('Por gastos de entierro', 'Sin descripción', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo prima ---*/

INSERT INTO `tipoprimacancilleria` (`nombre`, `descripcion`, `ayuda`) VALUES ('Prima especial', 'Sin descripción', 'Sin ayuda'), ('Prima costo de vida', 'Sin descripción', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo intereses rendimiento renta capital ---*/

INSERT INTO `tipointeresesrendicapital` (`nombre`, `descripcion`, `ayuda`) VALUES ('Con entidades financieras', 'Sin descripción', 'Sin ayuda'), ('Con otras personas naturales', 'Sin descripción', 'Sin ayuda'), ('Intereses presuntivos por préstamos de dinero', 'Sin descripción', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo otros ingresos renta capital ---*/

INSERT INTO `tipootrosingresoscapital` (`nombre`, `descripcion`, `ayuda`) VALUES ('Ingresos por diferencia en cambio', 'Sin descripción ', 'Sin ayuda'), ('Arrendamientos de bienes muebles e inmuebles', 'Sin descripción', 'Sin ayuda'), ('Regalias por derechos de autor', 'Sin descripción', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo aporte obligatorio renta capital ---*/

INSERT INTO `tipoaporteobligatoriocapital` (`nombre`, `descripcion`, `ayuda`) VALUES ('Pensión y Fondo de solidaridad pensional (FSP)', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.'), ('Salud', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.');

/*-----------------------------------*/


/*--- Inserción Tipo aporte voluntario renta capital ---*/

INSERT INTO `tipoaportevoluntariocapital` (`nombre`, `descripcion`, `ayuda`) VALUES ('Cuentas AFC o AVC', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.'), ('Regimen de ahorro individual con solidaridad - RAIS', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.');

/*-----------------------------------*/


/*--- Inserción Tipo otros costos gastos renta capital ---*/

INSERT INTO `tipootroscostogastocapital` (`nombre`, `descripcion`, `ayuda`) VALUES ('Pago intereses de préstamos', 'Hace referencia a los pagos de intereses de préstamos con bancos y particulares, sin incluir el crédito de vivienda.', 'Sin ayuda'), ('Gastos', 'Hace referencia a los gastos de personal, mensajería, mantenimientos, seguros, impuestos prediales, impuesto industria y comercio.', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo renta exenta deducción renta capital ---*/

INSERT INTO `tiporentaexededuccioncapital` (`nombre`, `descripcion`, `ayuda`) VALUES ('Intereses pagados por un solo crédito hipotecario', 'Sin descripción', 'Sin ayuda'), ('Aportes voluntarios a fondos de cesantias deducibles', 'Sin descripción', 'Sin ayuda'), ('50% de los GMF', 'Sin descripción', 'Sin ayuda'), ('Por regalias derechos de autor sobre obras editadas e impresoras en Colombia', 'Sin descripción', 'Sin ayuda'), ('Aportes voluntarios a fondos de pensiones y cuentas AFC', 'Sin descripción', 'Sin ayuda'), ('Rentas por ingresos de renta de capital obtenidos en paises de la CAN', 'Sin descripción', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo valor bruto ventas renta no laboral ---*/

INSERT INTO `tipovalorbrutoventaslaboral` (`nombre`, `descripcion`, `ayuda`) VALUES ('En ventas de ganadería o cultivos', 'Sin descripción', 'Sin ayuda'), ('En ventas de activos fijos poseidos por menor de dos años', 'Sin descripción', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo aporte obligatorio renta no laboral ---*/

INSERT INTO `tipoaporteobligatoriolaboralnoconse` (`nombre`, `descripcion`, `ayuda`) VALUES ('Pensión y Fondo de solidaridad pensional (FSP)', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.'), ('Salud', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.');

/*-----------------------------------*/


/*--- Inserción Tipo otros costosgastos renta no laboral ---*/

INSERT INTO `tipootroscostogastolaboral` (`nombre`, `descripcion`, `ayuda`) VALUES ('Pago intereses de préstamos', 'Hace referencia a los pagos de intereses de préstamos con bancos y particulares, sin incluir el crédito de vivienda.', 'Sin ayuda'), ('Gastos', 'Hace referencia a los gastos de personal, mensajería, mantenimientos, seguros, impuestos prediales, impuesto industria y comercio.', 'Sin ayuda'), ('Costo fiscal', 'Hace referencia a los activos fijos vendidos y poseidos por menos de 2 años.', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo renta exenta deducción renta no laboral ---*/ 

INSERT INTO `tiporentaexededuccionlaboral` (`nombre`, `descripcion`, `ayuda`) VALUES ('Intereses pagados por un solo crédito hipotecario', 'Sin descripción', 'Sin ayuda'), ('Aportes voluntarios a fondos de cesantias deducibles', 'Sin descripción', 'Sin ayuda'), ('50% de los GMF', 'Sin descripción', 'Sin ayuda'), ('Aportes voluntarios a fondos de pensiones y cuentas AFC', 'Sin descripción', 'Sin ayuda'), ('Rentas por ingresos de renta de capital obtenidos en paises de la CAN', 'Sin descripción', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo ingresos pensiones ---*/

INSERT INTO `tipoingresospensiones` (`nombre`, `descripcion`, `ayuda`) VALUES ('Por pensión', 'Sin descripción', 'Sin ayuda'), ('Por indemnización', 'Sin descripción', 'Sin ayuda'), ('Por pensión de fuente extranjera', 'Sin descripción', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo aporte obligatorio cedula pensiones ---*/

INSERT INTO `tipoaportesobligatoriospensiones` (`nombre`, `descripcion`, `ayuda`) VALUES ('Pensión y Fondo de solidaridad pensional (FSP)', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.'), ('Salud', 'Sin descripción', 'Se encuentra consignada en el Certificado de ingresos y retenciones por rentas de trabajo y de pensiones - Formulario 220.');

/*-----------------------------------*/


/*--- Inserción Tipo ingresos ganancias ---*/ 

INSERT INTO `tipoingresosganancias` (`nombre`, `descripcion`, `ayuda`) VALUES ('Herencias, legados o donaciones', 'Sin descripción', 'Sin ayuda'), ('Rifas, loterías, apuestas y similares', 'Sin descripción', 'Sin ayuda'), ('Utilidad en la venta de un activo fijo', 'Sin descripción', 'Sin ayuda'), ('Liquidación de sociedades', 'Sin descripción', 'Sin ayuda'), ('Indemnización por seguro de vida', 'Sin descripción', 'Sin ayuda'), ('Premios en títulos de capitalización', 'Sin descripción', 'Sin ayuda'), ('Ventas inmuebles', 'Sin descripción', 'Sin ayuda');

/*-----------------------------------*/


/*--- Inserción Tipo ganancias no gravadas ---*/

INSERT INTO `tipogananciasnogravadas` (`nombre`, `descripcion`, `ayuda`) VALUES ('Vivienda urbana del causante', 'Las primeras 7,700 UVT del valor de un inmueble de vivienda urbana de propiedad del causante.', 'Sin ayuda'), ('Inmueble rural de causante', 'Las primeras 7,700 UVT de un inmueble rural de propiedad del causante, independientemente de que dicho inmueble haya estado destinado a vivienda o a explotación económica.', 'Sin ayuda'), ('Asignación de porción conyugal, legados y herencias', 'Las primeras 3,490 UVT del valor de las asignaciones que por concepto de porción conyugal o de herencia o legado reciban el cónyuge supérstite y cada uno de los herederos o legatarios.', 'Sin ayuda'), ('Mobiliario del causante', 'Los libros, las ropas y utensilios de uso personal y el mobiliario de la casa del causante.', 'Sin ayuda'), ('Indemnización por seguro de vida', 'Sin descripción ', 'Sin ayuda');

/*-----------------------------------*/


