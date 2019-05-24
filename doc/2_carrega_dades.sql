use empresa;

-- EMPLEATS

INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (101,'Antonio Viguer',45,12,'representante','1986-10-20',104,300000,305000);
INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (102,'Alvaro Jaumes',48,21,'representante','1986-12-20',108,350000,474000);
INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (103,'Juan Rovira',29,12,'representante','1987-03-01',104,275000,286000);
INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (104,'Jose González',33,12,'dir vendes','1987-03-01',106,200000,143000);
INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (105,'Vicente Pantalla',37,13,'representante','1988-02-12',104,350000,368000);
INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (106,'Luis Antonio',52,11,'dir general','1988-06-14',NULL,275000,299000);
INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (107,'Jorge Gutiérrez',49,22,'representante','1988-11-14',108,300000,186000);
INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (108,'Ana Bustamante',62,21,'dir vendes','1989-10-12',106,350000,361000);
INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (109,'Maria Sunta',31,11,'representante','1999-10-12',106,300000,392000);
INSERT INTO EMPLEATS (numemp,nom,edat,oficina,titol,contracte,cap,salari,vendes) VALUES (110,'Juan Victor',41,NULL,'representante','1990-01-13',104,0,76000);


-- OFICINES

INSERT INTO OFICINES (oficina, ciutat,regio,dir,objectiu,vendes) VALUES (11,'Valencia','este',106,575000,693000);
INSERT INTO OFICINES (oficina, ciutat,regio,dir,objectiu,vendes) VALUES (12,'Alicante','este',104,800000,735000);
INSERT INTO OFICINES (oficina, ciutat,regio,dir,objectiu,vendes) VALUES (13,'Castellón','este',105,350000,368000);
INSERT INTO OFICINES (oficina, ciutat,regio,dir,objectiu,vendes) VALUES (21,'Badajoz','oeste',108,725000,836000);
INSERT INTO OFICINES (oficina, ciutat,regio,dir,objectiu,vendes) VALUES (22,'A Coruña','oeste',108,300000,186000);
INSERT INTO OFICINES (oficina, ciutat,regio,dir,objectiu,vendes) VALUES (23,'Madrid','centro',108,NULL,NULL);
INSERT INTO OFICINES (oficina, ciutat,regio,dir,objectiu,vendes) VALUES (24,'Madrid','centro',108,250000,150000);
INSERT INTO OFICINES (oficina, ciutat,regio,dir,objectiu,vendes) VALUES (26,'Pamplona','norte',108,NULL,NULL);
INSERT INTO OFICINES (oficina, ciutat,regio,dir,objectiu,vendes) VALUES (28,'Valencia','este',108,900000,0);

-- CLIENTS

INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2101,'Luís García Antón',65000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2102,'Álvaro Rodríguez',65000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2103,'Jaime Llorens',50000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2105,'Antonio Canales',45000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2106,'Juan Suárez',65000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2107,'Julian López',35000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2108,'Julia Antequera',55000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2109,'Alberto Juanes',25000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2111,'Cristóbal García',50000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2112,'María Silva',50000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2113,'Luisa Maron',20000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2114,'Cristina Bulini',20000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2115,'Vicente Martínez',20000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2117,'Carlos Tena',35000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2118,'Junípero Alvarez',60000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2119,'Salomon Bueno',25000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2120,'Juan Malo',50000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2121,'Vicente Ríos',45000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2122,'José Marchante',30000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2123,'José Libros',40000);
INSERT INTO CLIENTS (numclie, nom,limitcredit) VALUES (2124,'Juan Bolto',40000);
-- PRODUCTES

INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('aci','41001','arandela',58,277);
INSERT INTO PRODUCTES(codfab, codprod,descr,preu,existencies) VALUES ('aci','41002','bisagra',80,167);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('aci','41003','art t3',112,207);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('aci','41004','art t4',123,139);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('aci','4100x','junta',26,37);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('aci','4100y','extractor',2888,25);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('aci','4100z','mont',2625,28);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('bic','41003','manivela',652,3);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('bic','41089','rodamiento',225,78);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('bic','41672','plato',180,0);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('fea','112','cubo',148,115);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('fea','114','cubo',243,15);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('imm','773c','reostato',975,28);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('imm','775c','reostato 2',1425,5);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('imm','779c','reostato 3',1875,0);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('imm','887h','caja clavos',54,223);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('imm','887p','perno',25,24);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('imm','887x','manivela',475,32);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('qsa','xk47','red',355,38);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('qsa','xk48','red',134,203);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('qsa','xk48a','red',117,37);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('rei','2a44g','pas',350,14);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('rei','2a44l','bomba l',4500,12);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('rei','2a44r','bomba r',4500,12);
INSERT INTO PRODUCTES (codfab, codprod,descr,preu,existencies) VALUES ('rei','2a45c','junta',79,210);

-- COMANDA

INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (110036,'1997-01-02',2107,110,22500);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112963,'1997-05-10',2103,105,3276);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112968,'1990-01-11',2102,101,3978);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112975,'1997-02-11',2111,103,2100);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112979,'1989-10-12',2114,108,15000);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112983,'1997-05-10',2103,105,702);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112987,'1997-01-01',2103,105,27500);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112989,'1997-12-10',2101,106,1458);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112992,'1990-04-15',2118,108,760);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112993,'1997-03-10',2106,102,1896);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (112997,'1997-04-04',2124,107,652);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113003,'1997-02-05',2108,109,5625);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113007,'1997-01-01',2112,108,2925);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113012,'1997-05-05',2111,105,3745);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113013,'1997-08-06',2118,108,652);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113024,'1997-07-04',2114,108,7100);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113027,'1997-02-05',2103,105,4104);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113034,'1997-11-05',2107,110,632);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113042,'1997-01-01',2113,101,22500);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113045,'1997-07-02',2112,108,45000);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113048,'1997-02-02',2120,102,3750);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113049,'1997-04-04',2118,108,776);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113051,'1997-07-06',2118,108,1420);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113055,'1997-04-01',2108,101,150);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113057,'1997-11-01',2111,103,600);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113058,'1989-07-04',2108,109,1480);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113062,'1997-07-04',2124,107,2430);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113065,'1997-06-03',2106,102,2130);
INSERT INTO COMANDA (numcomanda,data,clie,rep_ven,import_total) VALUES (113069,'1997-08-01',2109,107,31350);


-- LINIA_COMANDA

INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (110036,1,'aci','4100z',9,22500);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (110036,2,'rei','2a44l',7,31500);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112963,1,'aci','41004',28,3276);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112968,1,'aci','41004',34,3978);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112975,1,'rei','2a44g',6,2100);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112975,2,'aci','4100z',6,15000);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112979,1,'aci','4100z',6,15000);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112983,1,'aci','41004',6,702);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112987,1,'aci','4100y',11,27500);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112987,2,'fea','114',6,1458);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112989,1,'fea','114',6,1458);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112989,2,'aci','41002',10,760);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112992,1,'aci','41002',10,760);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112993,1,'rei','2a45c',24,1896);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112993,2,'bic','41003',1,652);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112993,3,'imm','779c',3,5625);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112997,1,'bic','41003',1,652);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (112997,2,'imm','779c',3,5625);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113003,1,'imm','779c',3,5625);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113007,1,'imm','773c',3,2925);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113007,2,'aci','41003',35,3745);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113012,1,'aci','41003',35,3745);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113012,2,'bic','41003',1,652);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113013,1,'bic','41003',1,652);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113013,2,'qsa','xk47',20,7100);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113013,3,'aci','41002',54,4104);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113013,4,'rei','2a44r',10,45000);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113024,1,'qsa','xk47',20,7100);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113027,1,'aci','41002',54,4104);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113027,2,'rei','2a45c',8,632);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113034,1,'rei','2a45c',8,632);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113042,1,'rei','2a44r',5,22500);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113045,1,'rei','2a44r',10,45000);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113045,2,'imm','779c',2,3750);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113048,1,'imm','779c',2,3750);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113048,2,'qsa','xk47',2,776);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113049,1,'qsa','xk47',2,776);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113051,1,'qsa','xk47',4,1420);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113055,1,'aci','4100x',6,150);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113057,1,'aci','4100x',24,600);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113057,2,'fea','112',10,1480);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113058,1,'fea','112',10,1480);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113062,1,'bic','41003',10,2430);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113065,1,'qsa','xk47',6,2130);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113065,2,'imm','773c',22,31350);
INSERT INTO LINIA_COMANDA (numcomanda,lin_com,codfab,codprod,quant,import) VALUES (113069,1,'imm','773c',22,31350);
