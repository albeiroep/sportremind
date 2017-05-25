CREATE TABLE usuario (
	id               	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombre           	VARCHAR(30)  NOT NULL,
	apellidos        	VARCHAR(40)  NOT NULL,
	deporte          	VARCHAR(30)  NOT NULL,
	ciudad           	VARCHAR(50)  NOT NULL,
	correo           	VARCHAR(50)  NOT NULL,
	nombre_usuario   	VARCHAR(50)  NOT NULL,
	contraseña       	VARCHAR(50)  NOT NULL,
	olvidoContrasenia	INT(11),
	tipo_usuario		VARCHAR(20)	 NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT tipo_usuario_valido CHECK (tipo_usuario IN ('Administrador', 'Deportista'))

) ENGINE = InnoDB;

INSERT INTO usuario VALUES ('1', 'administrador', 'sportremind' , 'Ciclismo', 'Medellin', 'admin@sportremind.com', 'admin', 'admin123', '', 'Administrador');

CREATE TABLE deporte (
	nombre           	VARCHAR(30)  NOT NULL,
	tipo_deporte        VARCHAR(40)  NOT NULL,
	PRIMARY KEY (nombre)

) ENGINE = InnoDB;


INSERT INTO deporte VALUES ('Ciclismo', 'Individual');
INSERT INTO deporte VALUES ('Atletismo', 'Individual');
INSERT INTO deporte VALUES ('Natación', 'Acuático');

CREATE TABLE entrenamiento (
	id               	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_usuario 		 	INT UNSIGNED NOT NULL,
	nombre           	VARCHAR(20) NOT NULL,
	duracion     		INT(10)  	NOT NULL,
	calorias_perdidas   INT(5)  	NOT NULL,
	fecha				Date 		NOT NULL,
	lugar				VARCHAR(50) NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT id_usuario FOREIGN KEY (id_usuario) REFERENCES usuario (id)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE eventodeportivo (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre_evento  VARCHAR(50)   NOT NULL,
	temperatura_esperada VARCHAR (20)  NOT NULL,
	lugar VARCHAR (20)  NOT NULL,
	fecha DATE NOT NULL,
	direccion_url  VARCHAR(50)   NOT NULL,
	categoria VARCHAR(50)   NULL
) ENGINE = InnoDB;

CREATE TABLE eventoComentario (
    idEvento INT,
    comentario VARCHAR(200)
);

CREATE TABLE resultados_futbol(
	idEvento INT,
	nombre_usuario VARCHAR(100),
	nombre_equipo1 VARCHAR(100),
	nombre_equipo2 VARCHAR(100),
	marcador_equipo1 INT,
	marcador_equipo2 INT
);

CREATE TABLE resultados_baloncesto (
	idEvento INT,
	nombre_usuario VARCHAR(100),
	nombre_equipo1 VARCHAR(100),
	nombre_equipo2 VARCHAR(100),
	marcador_equipo1 INT,
	marcador_equipo2 INT
);

CREATE TABLE resultados_pesas (
	idEvento INT,
	nombre_usuario VARCHAR(100),
	peso_levantado FLOAT
);


