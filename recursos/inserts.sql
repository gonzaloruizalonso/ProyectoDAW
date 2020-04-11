INSERT INTO repartidores(id_repartidor,nombre,apellidos,salario) VALUES ('R0001','David','Perez Serrano','1400');
INSERT INTO repartidores(id_repartidor,nombre,apellidos,salario) VALUES ('R0002','Ana','Lopez Banana','1600');
INSERT INTO repartidores(id_repartidor,nombre,apellidos,salario) VALUES ('R0003','Elisa','Sanchez Romero','1600');
INSERT INTO repartidores(id_repartidor,nombre,apellidos,salario) VALUES ('R0004','Jose','Rull Sanchez','1800');
INSERT INTO repartidores(id_repartidor,nombre,apellidos,salario) VALUES ('R0005','Maria','Castejon Ruiz','1400');

INSERT INTO municipios(id_municipio,nombre,id_repartidor_encargado) VALUES ('M001','Ajalvir','R0002');
INSERT INTO municipios(id_municipio,nombre,id_repartidor_encargado) VALUES ('M002','Chapinería','R0001');
INSERT INTO municipios(id_municipio,nombre,id_repartidor_encargado) VALUES ('M003','Leganés','R0003');
INSERT INTO municipios(id_municipio,nombre,id_repartidor_encargado) VALUES ('M004','Perales de Tajuña','R0004');
INSERT INTO municipios(id_municipio,nombre,id_repartidor_encargado) VALUES ('M005','Madrid','R0003');
INSERT INTO municipios(id_municipio,nombre,id_repartidor_encargado) VALUES ('M006','Talamanca de Jarama','R0001');
INSERT INTO municipios(id_municipio,nombre,id_repartidor_encargado) VALUES ('M007','Tres Cantos','R0004');
INSERT INTO municipios(id_municipio,nombre,id_repartidor_encargado) VALUES ('M008','Getafe','R0005');
INSERT INTO municipios(id_municipio,nombre,id_repartidor_encargado) VALUES ('M009','Villarejo de Salvanés','R0005');

INSERT INTO platos(cod_plato,nombre,descripcion,precio) VALUES ('1','Pizza Peperoni','Pizza de peperoni','10');
INSERT INTO platos(cod_plato,nombre,descripcion,precio) VALUES ('2','Pizza 4 quesos','Pizza de cuatro quesos','11');
INSERT INTO platos(cod_plato,nombre,descripcion,precio) VALUES ('3','Pizza Barbacoa','Pizza de barbacoa','15');
INSERT INTO platos(cod_plato,nombre,descripcion,precio) VALUES ('4','Pizza Queso De Cabra','Pizza de queso de cabra','13');
INSERT INTO platos(cod_plato,nombre,descripcion,precio) VALUES ('5','Pizza Queso De Cabramelizada','Pizza de queso de cabra con cebolla caramelizada','12');
INSERT INTO platos(cod_plato,nombre,descripcion,precio) VALUES ('6','Pizza Jamon Y Queso','Pizza de jamon y queso','9');
INSERT INTO platos(cod_plato,nombre,descripcion,precio) VALUES ('7','Pizza Peperoni y jalapeños','Pizza de peperoni y jalapeños','16');
INSERT INTO platos(cod_plato,nombre,descripcion,precio) VALUES ('8','Arroz 3 delicias','Arroz con huevo guisantes y jamon','5');
INSERT INTO platos(cod_plato,nombre,descripcion,precio) VALUES ('9','Arroz con calamares en su tinta','','10');

INSERT INTO login(dni,password) VALUES ('12345678R','gonzalo');
INSERT INTO login(dni,password) VALUES ('12345678L','alvaro');
INSERT INTO login(dni,password) VALUES ('12345678T','jose');

INSERT INTO `pedidos` (`dni`, `cod_pedido`, `fecha_pedido`, `fecha_entrega`, `precio_total`) VALUES ('1F', '1', '2000-05-05', '2000-05-10', '20');
INSERT INTO `detallepedido` (`cod_detallepedido`, `cod_pedido`, `cod_plato`, `cantidad`) VALUES ('1', '1', '1', '2');