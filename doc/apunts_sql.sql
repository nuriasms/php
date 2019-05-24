CREATE DATABASE IF NOT EXISTS restaurante;
USE restaurante;
CREATE TABLE IF NOT EXISTS plats(
	nom VARCHAR(50) PRIMARY KEY,
	tipus VARCHAR(10) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS distribuidor(
	cif VARCHAR(10) PRIMARY KEY,
	nom VARCHAR(20) NOT NULL,
    	poblacio VARCHAR(20) NOT NULL 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS vi(
	codi int(4) PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(50) NOT NULL,
   	collita VARCHAR(10) NOT NULL,
    	varietat VARCHAR(50) NOT NULL,
    	preu FLOAT(4,2) NOT NULL,
cif_distribuidor VARCHAR(10),
	FOREIGN KEY (cif_distribuidor) REFERENCES distribuidor(cif)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS combina(
	nom_plat VARCHAR(50),
	codi_vi int(4),	
	FOREIGN KEY (nom_plat) REFERENCES plats(nom)
	ON UPDATE CASCADE
	ON DELETE RESTRICT,
	FOREIGN KEY (codi_vi) REFERENCES vi(codi)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS compra(
	cif_distribuidor VARCHAR(10),
	codi_vi int(4),	
	FOREIGN KEY (cif_distribuidor) REFERENCES distribuidor(cif)
	ON UPDATE CASCADE
	ON DELETE RESTRICT,
	FOREIGN KEY (codi_vi) REFERENCES vi(codi)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



--DROP DATABASE IF EXISTS restaurante;

