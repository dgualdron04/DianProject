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


/*--- Creación de la tabla intermedia parametrosdeclaracion ---*/

CREATE TABLE parametrosdeclaracion
(idparametrosdeclaracion INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo del parametrodeclaracion',
idparametro INT NOT NULL COMMENT 'Codigo del Parametro',
iddeclaracion INT NOT NULL COMMENT 'Codigo de la Declaración',
PRIMARY KEY (idparametrosdeclaracion),
FOREIGN KEY (idparametro) REFERENCES parametros(idparametro),
FOREIGN KEY (iddeclaracion) REFERENCES declaracion(iddeclaracion));

/*-------------------------------------------------------------*/


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

