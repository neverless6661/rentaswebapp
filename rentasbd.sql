CREATE DATABASE rentas;
USE rentas;
CREATE TABLE usuarios(
    id INT AUTO_INCREMENT,
    correo VARCHAR(50) NOT NULL,
    contrasenia TINYTEXT NOT NULL,
    rol CHAR(3) NOT NULL DEFAULT 'usr',
    PRIMARY KEY(id)
);
CREATE TABLE lote(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE asignacion_lotes(
    id INT AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_lote INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY(id_lote) REFERENCES lote(id)
);
CREATE TABLE inmueble(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    id_tipo INT NOT NULL,
    dia_pago TINYINT,
    id_imagen INT,
    precio_renta DECIMAL(10,2),
    PRIMARY KEY(id),
    FOREIGN KEY(id_tipo) REFERENCES tipo_inmueble(id)
    FOREIGN KEY(id_imagen) REFERENCES imagen(id)
);
CREATE TABLE asignacion_inmueble(
    id INT AUTO_INCREMENT,
    id_lote INT NOT NULL,
    id_inmueble INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_lote) REFERENCES lote(id),
    FOREIGN KEY(id_inmueble) REFERENCES inmueble(id)
);

CREATE TABLE tipo_inmueble(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);


CREATE TABLE registro_renta(
    id INT AUTO_INCREMENT,
    id_inmueble INT NOT NULL,
    id_inquilino INT NOT NULL,
    fecha_pago DATETIME,
    fecha_ult_pago DATETIME,
    fecha_prox_pago DATETIME,
    incremento_pago DECIMAL(10,2),
    deuda_pago DECIMAL(10,2),
    num_predial INT,
    PRIMARY KEY(id),
    FOREIGN KEY(id_inmueble) REFERENCES inmueble(id),
    FOREIGN KEY(id_inquilino) REFERENCES inquilino(id)
);

CREATE TABLE inquilino(
    id INT AUTO_INCREMENT,
    nombres VARCHAR(30),
    apellidos VARCHAR (30),
    id_contrato INT,
    factura_option BOOLEAN,
    comentarios VARCHAR(100),
    PRIMARY KEY(id),
    FOREIGN KEY(id_contrato) REFERENCES contrato(id)
);

CREATE TABLE registro_pagos(
    id INT AUTO_INCREMENT,
    id_inmueble INT NOT NULL,
    id_inquilino INT NOT NULL,
    cantidad_pago DECIMAL(10,2),
    fecha_pago DATETIME,
    fecha_ult_pago DATETIME,
    PRIMARY KEY(id),
    FOREIGN KEY(id_inmueble) REFERENCES inmueble(id),
    FOREIGN KEY(id_inquilino) REFERENCES inquilino(id)
);

CREATE TABLE contrato(
    id INT AUTO_INCREMENT,
    name VARCHAR(50),
    ruta VARCHAR(300),
    PRIMARY KEY(id)
);

CREATE TABLE imagen(
    id INT AUTO_INCREMENT,
    name VARCHAR(50),
    ruta VARCHAR(300),
    PRIMARY KEY(id)
);

CREATE TABLE asignacion_imagen(
    id INT AUTO_INCREMENT,
    id_imagen INT NOT NULL,
    id_inmueble INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_imagen) REFERENCES imagen(id),
    FOREIGN KEY(id_inmueble) REFERENCES inmueble(id)
);

CREATE TABLE facturacion(
    id INT AUTO_INCREMENT,
    rfc VARCHAR(20),
    correo VARCHAR(50),
    razon_nombre VARCHAR(100),
    id_regimen INT NOT NULL,
    id_cfdi INT NOT NULL,
    id_payment INT NOT NULL,
    calle VARCHAR(50),
    ext_num VARCHAR(10),
    int_num VARCHAR(10),
    colonia VARCHAR(50),
    codigo_postal INT,
    municipio VARCHAR(50),
    estado VARCHAR(50),
    comentarios VARCHAR(100),
    PRIMARY KEY(id),
    FOREIGN KEY(id_regimen) REFERENCES regimen_fiscal(id),
    FOREIGN KEY(id_cfdi) REFERENCES cfdi(id),
    FOREIGN KEY(id_payment) REFERENCES payment(id)
);

CREATE TABLE regimen_fiscal(
    id INT AUTO_INCREMENT,
    clave VARCHAR(10),
    name VARCHAR(100),
    fisica BOOLEAN,
    moral BOOLEAN,
    PRIMARY KEY(id)
);

CREATE TABLE cfdi(
    id INT AUTO_INCREMENT,
    name VARCHAR(100),
    PRIMARY KEY(id)
);

CREATE TABLE payment(
    id INT AUTO_INCREMENT,
    name VARCHAR(100),
    PRIMARY KEY(id)
);

CREATE TABLE servicios(
    id INT AUTO_INCREMENT,
    name VARCHAR(100),
    PRIMARY KEY(id)
);

CREATE TABLE asignacion_servicio(
    id INT AUTO_INCREMENT,
    id_inmueble INT NOT NULL,
    id_servicio INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_inmueble) REFERENCES inmueble(id),
    FOREIGN KEY(id_servicio) REFERENCES servicios(id)
);




////////////////////////////////////////////////////////////////////////////////////////////

CREATE TABLE tipo(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(20),
    PRIMARY KEY(id)
);
CREATE TABLE asignación_tipo(
    id INT AUTO_INCREMENT,
    id_tipo INT NOT NULL,
    id_inmueble INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY id_tipo REFERENCES tipo(id),
    FOREIGN KEY id_inmueble REFERENCES inmueble(id)
);
CREATE TABLE renta(
    id INT AUTO_INCREMENT,
    precio DECIMAL(10,2),
    PRIMARY KEY(id)
);
CREATE TABLE asignacion_renta(
    id INT AUTO_INCREMENT,
    id_inmueble INT NOT NULL,
    id_renta INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_inmueble) REFERENCES inmueble(id),
    FOREIGN KEY(id_renta) REFERENCES renta(id)
);
CREATE TABLE dia_pago(
    id INT AUTO_INCREMENT,
    dia TINYINT,
    id_inmueble INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_inmueble) REFERENCES inmueble(id),
);
CREATE TABLE ultimo_pago(
    id INT AUTO_INCREMENT,
    fecha DATETIME NOT NULL
    id_inmueble INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_inmueble) REFERENCES inmueble(id),
);
CREATE TABLE prox_pago(
    id INT AUTO_INCREMENT,
    fecha DATETIME NOT NULL
    id_inmueble INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_inmueble) REFERENCES inmueble(id),
);
CREATE TABLE cliente(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE incremento_pago(
    id INT AUTO_INCREMENT,
    fecha DATETIME NOT NULL,
    porcentaje DECIMAL(2,2),
    PRIMARY KEY(id)
);
CREATE TABLE asignacion_incremento(
    id INT AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    id_inmueble INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY id_cliente REFERENCES cliente(id),
    FOREIGN KEY id_inmueble REFERENCES inmueble(id)
);