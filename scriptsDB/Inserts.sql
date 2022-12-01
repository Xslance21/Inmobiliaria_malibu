USE inmobiliaria_malibu;

-- Countrie's inserts

INSERT INTO `countries`(`country`) VALUES ("Pakistan"),("Colombia"),("Japon"),("Estados Unidos"),("España"),("Italia");

-- type_propertie's inserts

INSERT INTO `type_properties`(`type`) VALUES ("Casa"),("Apartamento"),("Terreno");

-- citie's inserts

INSERT INTO `cities`(`id_countries`,`city`) VALUES (1,"Karachi"),(1,"Lahore"),(2,"Bogota"),(2,"Medellín"),(3,"Tokyo"),(3,"Osaka"),(4,"Washington D.C."),(4,"New York"),
(5,"Madrid"),(5,"Barcelona"),(6,"Roma"),(6,"Venecia");

-- architect's inserts

INSERT INTO `architects`(`id_countries`,`name`) VALUES(1,"Yasmeen Lari"),(1,"Vedat Dalokay"),(2,"Rogelio Salmona"),(2,"Germán Samper Gnecco"),
(3,"Kengo Kuma"),(3,"Iwao Yamawaki"),(4,"Robert Venturi"),(4,"Frank Gehry"),(5,"Rafael Moneo"),(5,"Alberto Campo Baeza"),(6,"Stefano Boeri"),(6,"Renzo Piano");

-- neighborhood's inserts

INSERT INTO `neighborhood`(`id_cities`,`neighborhood`) VALUES (1,"Nazimabad del Norte."),(1,"Orangi."),(2,"gate lahore"),(2,"lahore fort"),(3,"Siete de agosto"),(3,"Modelo"),
(4,"Manrique"),(4,"Aranjuez"),(5,"Sumida"),(5,"Adachi"),(6,"Minami"),(6,"Tobita Shinchi"),(7,"Brookland."),(7,"Columbia Heights."),(8,"Manhattan"),(8,"Brooklyn"),(9,"Imperial"),(9,"Imperial"),
(10,"Barceloneta"),(10,"La Ribera"),(11,"Campo Marzio"),(11,"Monti"),(12,"Cannaregio"),(12,"Santa Croce");

-- propertie's inserts

INSERT INTO `properties`(`id_type_properties`,`id_users`,`id_architects`,`id_neighborhood`,`measures`,`designe`,`price`,`image_1`) VALUES 
(4,1,1,1,"270 m2","Moderno",100000,"./images/Casa1.jpeg"),
(4,1,2,2,"550 m2","Moderno",500000,"./images/Casa2.jpeg"),
(4,1,3,3,"250 m2","Clasico",200000,"./images/Casa3.jpeg"),
(4,1,4,4,"550 m2","Moderno",400000,"./images/Casa4.jpeg"),
(5,1,5,5,"170 m2","Moderno",90000,"./images/Apartamento1.jpeg"),
(5,1,6,6,"190 m2","Moderno",120000,"./images/Apartamento2.jpeg"),
(5,1,7,7,"100 m2","Clasico",70000,"./images/Apartamento3.jpeg"),
(5,1,8,8,"150 m2","Moderno",100000,"./images/Apartamento4.jpeg"),
(6,1,null,9,"400 m2",null,200000,"./images/Terreno1.jpeg"),
(6,1,null,10,"500 m2",null,250000,"./images/Terreno2.jpeg"),
(6,1,null,11,"450 m2",null,220000,"./images/Terreno3.jpeg"),
(6,1,null,12,"900 m2",null,600000,"./images/Terreno4.jpeg");