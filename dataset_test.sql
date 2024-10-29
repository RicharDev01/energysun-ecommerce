USE ENERGYSUN_ECOMMERCE;

-- ++++++++++++++++++++++++++++++ INSERCIONES INICIALES DE LA BASE DE DATOS ++++++++++++++++++++++++

INSERT INTO ROLES(ROL_NOMBRE, ROL_FECHA_REGISTRO, ROL_FUM)
VALUES ('ADMINISTRADOR', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP()),
       ('VISITADOR', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP()),
       ('CLIENTE', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());

-- ROL: administrador
-- EMAIL: mrpineda@mail.com
-- PASSWORD: mrpineda
INSERT INTO USUARIOS(USU_ROL_ID, USU_USERNAME, USU_EMAIL, USU_CLAVE, USU_FECHA_REGISTRO, USU_FUM)
VALUES (1,
        'mrpineda',
        'mrpineda@mail.com',
        '$2y$04$eBF/pYCEjuwIWhkO8GMBQuIlprKCsUwmi8ImdCVFrjfkKz7E4jAfm',
        CURRENT_TIMESTAMP(),
        CURRENT_TIMESTAMP());

-- ROL: administrador
-- EMAIL: admin@mail.com
-- PASSWORD: admin
INSERT INTO USUARIOS(USU_ROL_ID, USU_USERNAME, USU_EMAIL, USU_CLAVE, USU_FECHA_REGISTRO, USU_FUM)
VALUES (1,
        'admin',
        'admin@mail.com',
        '$2y$04$bc.6VSQX9tARU98JAyNV4.2Fs2LP9BOCqYD2INqsW/I2VfghkP2pu',
        CURRENT_TIMESTAMP(),
        CURRENT_TIMESTAMP());

-- ROL: administrador
-- EMAIL: sealas@mail.com
-- PASSWORD: sealas - $2y$04$ljoI5H/XKOijjKGXDyOchevlahj5BuQpIPULci3ULKcEFeGLtZZm6
INSERT INTO USUARIOS(USU_ROL_ID, USU_USERNAME, USU_EMAIL, USU_CLAVE)
VALUES (1,
        'sealas',
        'sealas@mail.com',
        '$2y$04$ljoI5H/XKOijjKGXDyOchevlahj5BuQpIPULci3ULKcEFeGLtZZm6');

-- ROL: administrador
-- EMAIL: fegonzalez@mail.com
-- PASSWORD: fegonzalez - $2y$04$clYQHmjpKZam7H86iBvDb.yejU4aIeaf0SMZdABN6uEb7fdsS.sr6
INSERT INTO USUARIOS(USU_ROL_ID, USU_USERNAME, USU_EMAIL, USU_CLAVE)
VALUES (1,
        'fegonzalez',
        'fegonzalez@mail.com',
        '$2y$04$clYQHmjpKZam7H86iBvDb.yejU4aIeaf0SMZdABN6uEb7fdsS.sr6');

-- ROL: visitador
-- EMAIL: jahernandez@mail.com
-- PASSWORD: jahernandez - $2y$04$Zp4mDP/EDvN4VVvASR4FouzDokmuQ3kr04CiP2jVXjXNy6MflRAo.
INSERT INTO USUARIOS(USU_ROL_ID, USU_USERNAME, USU_EMAIL, USU_CLAVE)
VALUES (2,
        'jahernandez',
        'jahernandez@mail.com',
        '$2y$04$Zp4mDP/EDvN4VVvASR4FouzDokmuQ3kr04CiP2jVXjXNy6MflRAo.');

-- ROL: visitador
-- EMAIL: mpLopez@mail.com
-- PASSWORD: mpLopez - $2y$04$km1.O2NdDmg87l5IAHgEiuri04n/LsAs1o64CRCYbNIlpbsQGdMCG
INSERT INTO USUARIOS(USU_ROL_ID, USU_USERNAME, USU_EMAIL, USU_CLAVE)
VALUES (2,
        'mpLopez',
        'mpLopez@mail.com',
        '$2y$04$km1.O2NdDmg87l5IAHgEiuri04n/LsAs1o64CRCYbNIlpbsQGdMCG');

-- ROL: visitador
-- EMAIL: jdespinoza@mail.com
-- PASSWORD: jdespinoza - $2y$04$zi4RiNT0WgAAi2QehD/bWuK2fa5.w86PI33ARA8EXQ6ay1YBlzfT2
INSERT INTO USUARIOS(USU_ROL_ID, USU_USERNAME, USU_EMAIL, USU_CLAVE)
VALUES (2,
        'jdespinoza',
        'jdespinoza@mail.com',
        '$2y$04$zi4RiNT0WgAAi2QehD/bWuK2fa5.w86PI33ARA8EXQ6ay1YBlzfT2');

-- ROL: cliente
-- EMAIL: cliente@mail.com
-- PASSWORD: cliente - $2y$04$BQH911eD2rnF7BcrXyCSH.Ym4ycsk2Y7M3SfO60diipY7AGGpKDQu
CALL SP_REGISTRO_CLIENTE(3,
                         'cliente',
                         'cliente@mail.com',
                         '$2y$04$BQH911eD2rnF7BcrXyCSH.Ym4ycsk2Y7M3SfO60diipY7AGGpKDQu',
                         '2000-01-01',
                         'CLI_NOMBRE',
                         NULL,
                         'CLI_APELLIDO',
                         NULL,
                         '78787878');

-- ROL: cliente
-- EMAIL: jiserrano@mail.com
-- PASSWORD: jiserrano - $2y$04$8JLQx4YsSWU2Nawe0AioL.2xdwvH51I/i/w9c44vw6yUtnX6wVGie
CALL SP_REGISTRO_CLIENTE(3,
                         'jiserrano',
                         'jiserrano@mail.com',
                         '$2y$04$8JLQx4YsSWU2Nawe0AioL.2xdwvH51I/i/w9c44vw6yUtnX6wVGie',
                         '1999-05-15',
                         'Josue',
                         'Isaac',
                         'Serrano',
                         'Vasquez',
                         '72983928');

-- ROL: cliente
-- EMAIL: kvvillanueva@mail.com
-- PASSWORD: kvvillanueva - $$2y$04$fH2vjstMAaUIv8vRDus3xOG/ghb0Kc13SMXGWJvVNJ06bLd1VbGMi
CALL SP_REGISTRO_CLIENTE(3,
                         'kvvillanueva',
                         'kvvillanueva@mail.com',
                         '$2y$04$fH2vjstMAaUIv8vRDus3xOG/ghb0Kc13SMXGWJvVNJ06bLd1VbGMi',
                         '1999-05-15',
                         'Kevin',
                         'Valentino',
                         'Villanueva',
                         'Sorto',
                         '72932998');


-- ROL: cliente
-- EMAIL: ljmartinez@mail.com
-- PASSWORD: ljmartinez - $2y$04$N3TXpXudmEfeXZMXbrzviu9ovxK9AiGlnNEyMWW4rghlMVloJSrUm
CALL SP_REGISTRO_CLIENTE(3,
                         'ljmartinez',
                         'ljmartinez@mail.com',
                         '$2y$04$N3TXpXudmEfeXZMXbrzviu9ovxK9AiGlnNEyMWW4rghlMVloJSrUm',
                         '2003-05-15',
                         'Levi',
                         'Julian',
                         'Martinez',
                         'Gonzales',
                         '72893032');



INSERT INTO categorias(CAT_NOMBRE,
                       CAT_DESCRIPCION)
VALUES ('KIT SOLARES',
        'OFERCEMOS SOLUCIONES COMPLETAS CON NUESTROS KIT COMPLETO PARA INSTALACIONES ELECTRICAS DE PANELES SOLARES'),   -- #1,

       ('PANELES SOLARES',
        'OFRECEMOS LOS MEJORES PANELES SOLARES, CON LA MEJOR CALIDAD Y DURACION'),                                      -- #2

       ('BATERIAS',
        'BATERIAS PARA NUESTROS PANELES SOLARES, CON LA MEJOR CALIDAD Y DURACION'),                                     -- #3

       ('INVERSORES',
        'NUESTROS INVERSORES TRANSFORMAN LA ENERGIA OBTENIDA POR LAS FOTOCELDAS Y TRASFORMARLAS EN CORRIENTE ALTERNA'), -- #4

       ('REGULADORES DE CARGA',
        'NUESTROS REGULADORES DE ALTA CALIDAD QUE PROTEGEN A SUS BATERIAS');                                            -- #5



-- ++++++++++++++++++++++++++++++ 5 TIPOS PRODUCTOS ++++++++++++++++++++++++

-- ++++++++++++++++++++++++++++++ KIT SOLARES ++++++++++++++++++++++++
INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION,
                      PROD_IMAGEN_URL, PROD_STOCK, PROD_DESCUENTO)
VALUES (1, -- Este valor debe corresponder al ID de la categoria a la que pertenece el producto, por ejemplo, 1 para "KIT SOLARES".
        'Kit Solar Vivienda Aislada 5200W 48V con Bateria Litio DC Solar',
        4200.08,
        'Este conjunto se compone principalmente de 8 paneles solares, 2 baterias de litio y 1 inversor cargador, además de los componentes eléctricos básicos necesarios para una instalación adecuada',

        'Este Kit Solar Vivienda Aislada 5200W 48V con Batería Litio DC Solar está diseñado para abastecer las necesidades energéticas de una vivienda unifamiliar que no cuenta con acceso a la red eléctrica convencional. Este conjunto se compone principalmente de 8 paneles solares, 2 baterías de litio y 1 inversor cargador, además de los componentes eléctricos básicos necesarios para una instalación adecuada.
        El funcionamiento de este kit es sencillo: los paneles solares captan la radiación solar y la dirigen al inversor, donde se realiza la conversión de la energía, de corriente continua (CC) a corriente alterna CA. A partir de aquí, puede utilizarse para alimentar los dispositivos eléctricos de la vivienda o para cargar las baterías. El inversordel fabricante Tensite, desempeña un papel crucial al incorporar una función de carga de batería.
        En resumen, este Kit Solar Vivienda Aislada 5200W 48V con Batería Litio DC Solar representa una solución que permite lograr la independencia energética, especialmente en lugares donde la red eléctrica no llega, garantizando el suministro de energía de manera sostenible y autónoma.',

        'https://cdn.autosolar.es/images/kits-solares-aislada/kit-solar-vivienda-aislada-5200w-48v-con-bateria-litio-dc-solar_thumb_main.jpg',
        25,
        0.35);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK, PROD_DESCUENTO)
VALUES (1, -- Este valor debe corresponder al ID de la categoría a la que pertenece el producto, por ejemplo, 1 para "KIT SOLARES".
        'Kit Paneles Solares Autoconsumo Fotovoltaico Huawei 3000W',
        1300.49,
        'El Kit Conexión Red Huawei 3000W 16100Whdia se trata de un sistema de autoconsumo directo de coste muy económico y rápida amortización',

        'El Kit Conexión Red Huawei 3000W 16100Whdia se trata de un sistema de autoconsumo directo de coste muy económico y rápida amortización. Este kit de conexión a red incorpora una avanzada monitorización de la producción, su inversor incluye 2 maximizadores MPPT, compatibible con las baterías de alto voltaje Huawei LUNA2000 y todo ello con la mejor garantía de fiabilidad, ya que el inversor tiene 10 años de garantía. Mediante este sistema de Huawei podremos partir de una instalación de conexión a red más económica para amortizar antes la instalación solar, pero con la posibilidad de instalar un sistema de acumulación en baterías de litio para aumentar nuestro grado de autoconsumo y reducir aún más nuestro gasto de electricidad.',

        'https://cdn.autosolar.es/images/kits-solares-conexion-red/kit-paneles-solares-autoconsumo-fotovoltaico-huawei-3000w_thumb_main.jpg',
        35,
        0.35);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK, PROD_DESCUENTO)
VALUES (1, -- Este valor debe corresponder al ID de la categoría a la que pertenece el producto, por ejemplo, 1 para "KIT SOLARES".
        'Kit Instalación Placas Solares Autoconsumo 5000W con batería Huawei Luna',
        4600.50,

        'El Kit Autoconsumo Huawei 5000W 25000Whdia se trata de un sistema de autoconsumo de gran rendimiento y a muy bajo coste',

        'El Kit Autoconsumo Huawei 5000W 25000Whdia se trata de un sistema de autoconsumo de gran rendimiento y a muy bajo coste. Este kit de conexión a red incorpora una batería de litio de alto voltaje de Huawei, avanzada monitorización de la producción, su inversor incluye 2 maximizadores MPPT y todo ello con la mejor garantía de fiabilidad, ya que el inversor y batería tienen 10 años de garantía. Mediante este sistema de Huawei podremos tener un sistema completo de autoconsumo para poder almacenar el excedente de la producción solar. En horario de menor producción o por la noche, podremos hacer uso de la energía almacenada para reducir nuestra dependencia energética. Si lo necesitáramos, se podría ampliar la capacidad de la batería con más módulos. Se incluye también un vatímetro que se encarga de medir la energía que demandamos para nuestro consumo y para la recarga de la batería y así no verter el excedente de producción a la red si así lo deseamos No requiere de mantenimiento en ninguno de sus componentes y están incluidos todos los elementos necesarios para poner la instalación en marcha, incluido el cableado y las estructuras para los paneles solares.
         Kit Solar Híbrido 5000W
         El kit solar híbrido 5000W ofrece flexibilidad al premitir que el sistema utilice energía del sol directamente de los paneles solares en horas de producción solar alta, pero al mismo tiempo trabaja con baterías de almacenamiento cuando no hay radiación solar. Esto es útil para maximizar la eficiencia y la autonomía del kit solar híbrido 5000W, especialmente en entornos donde la energía solar puede no estar disponible todo el tiempo.',

        'https://cdn.autosolar.es/images/kits-solares-conexion-red/kit-instalacion-placas-solares-autoconsumo-5000w-con-bateria-huawei-luna_thumb_main.jpg',
        43,
        0.35);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK, PROD_DESCUENTO)
VALUES (1, -- Este valor debe corresponder al ID de la categoría a la que pertenece el producto, por ejemplo, 1 para "KIT SOLARES".
        'Kit Placa Solar Camper 200W 12V con batería DC Solar 1000Whdia',
        390.30,

        'El Kit Placa Solar Camper 200W 12V con batería DC Solar 1000Whdia es un sistema fotovoltaico que incluye la batería DC Solar perfecto para su instalación en furgonetas camper',

        'El Kit Placa Solar Camper 200W 12V con batería DC Solar 1000Whdia es un sistema fotovoltaico que incluye la batería DC Solar perfecto para su instalación en furgonetas camper. Podemos disponer de una energía extra en nuestros vehículos con la instalación del Kit Placa Solar Camper 200W 12V con batería DC Solar 1000Whdia. Este kit dispone de batería DC Solar que es perfectamente adaptable para su instalación debajo del asiento de la camper, ahorrando sitio disponible. El sistema al completo suministra energía a 12 V que se conectan a la salida del regulador, que puedes controlar con el dispositivo bluetooth que lleva incorporado',

        'https://cdn.autosolar.es/images/kit-solar-camper/kit-placa-solar-camper-200w-12v-con-bateria-dc-solar-1000whdia_thumb_main.jpg',
        49,
        0.35);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK, PROD_DESCUENTO)
VALUES (1, -- Este valor debe corresponder al ID de la categoría a la que pertenece el producto, por ejemplo, 1 para "KIT SOLARES".
        'Kit Bomba de Agua Solar Sumergible Hasta 70m',
        1500.80,
        'El Kit Bombeo Solar sumergible y hasta 70m de altura es un bombeo solar directo incluye la bomba sumergible Shurflo de funcionamiento en corriente continua a 24V.',

        'El Kit Bombeo Solar sumergible y hasta 70m de altura es un bombeo solar directo incluye la bomba sumergible Shurflo de funcionamiento en corriente continua a 24V. Mediante un único panel y gracias al controlador de bombeo, haremos funcionar directamente la bomba con energía solar, sin necesidad de baterías y ningún componente adicional. Un kit muy indicado para bombeos con una elevación límite de 70m y con un caudal máximo de 300l/hora si aprovechamos la altura tope de servicio, incrementándose el caudal a unos 450l/hora para alturas inferiores. es un bombeo solar directo únicamente podrá funcionar en horas solares, reduciendo al máximo los costes dado que no tendremos baterías ni componentes más costosos que alargarían el tiempo de amortización.',

        'https://cdn.autosolar.es/images/kit-solar-camper/kit-placa-solar-camper-200w-12v-con-bateria-dc-solar-1000whdia_thumb_main.jpg',
        23,
        0.35);


-- ++++++++++++++++++++++++++++++ PANELES SOLARES ++++++++++++++++++++++++
INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (2, -- Este valor debe corresponder al ID de la categoría a la que pertenece el producto, por ejemplo, 1 para "KIT SOLARES".
        'Kit Placa Solar 12V 600W',
        580.00,
        'El Kit Panel Solar 600W 12V 1000Whdia con Batería de Gel se trata de un kit solar de pequeñas dimensiones para poder alimentar bajos consumos en una caseta de campo o de uso de fin de semana',
        'El Kit Panel Solar 600W 12V 1000Whdia con Batería de Gel se trata de un kit solar de pequeñas dimensiones para poder alimentar bajos consumos en una caseta de campo o de uso de fin de semana',
        'https://cdn.autosolar.es/images/kits-solares-aislada/kit-panel-solar-600w-12v-1000whdia-con-bateria-de-gel_thumb_main.jpg',
        28);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (2, -- Este valor debe corresponder al ID de la categoría a la que pertenece el producto, por ejemplo, 1 para "KIT SOLARES".
        'Placa Solar Portátil 60W 12V Ecoflow',
        150.00,
        'La Placa Solar Portátil 60W 12V Ecoflow ofrece un diseño ligero y portátil de construcción duradera y resistente para su uso en el exterior',
        'La Placa Solar Portátil 60W 12V Ecoflow ofrece un diseño ligero y portátil de construcción duradera y resistente para su uso en el exterior',
        'https://cdn.autosolar.es/images/paneles-solares-portatiles/placa-solar-portatil-60w-12v-ecoflow_thumb_main2x.jpg',
        58);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (2, -- Este valor debe corresponder al ID de la categoría a la que pertenece el producto, por ejemplo, 1 para "KIT SOLARES".
        'Kit Placa Solar 24V 6000W 10950kWhaño Ingeteam',
        3600.90,
        'El Kit Solar Autoconsumo Fotovoltaico 6000W 30kWhdia Ingeteam está diseñado para proporcionar energía a una casa con consumos medios - altos de forma constante y eficiente',
        'El Kit Solar Autoconsumo Fotovoltaico 6000W 30kWhdia Ingeteam está diseñado para proporcionar energía a una casa con consumos medios - altos de forma constante y eficiente',
        'https://cdn.autosolar.es/images/kits-solares-conexion-red/kit-solar-autoconsumo-fotovoltaico-6000w-10950kwhano-ingeteam_thumb_main.jpg',
        21);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (2, -- Este valor debe corresponder al ID de la categoría a la que pertenece el producto, por ejemplo, 1 para "KIT SOLARES".
        'Panel Solar Flexible 100W 12V',
        90.85,
        'El Panel Solar Flexible 100W 12V es de alta eficiencia y con una flexibilidad para poder tenerlo con una curvatura máxima de 15-20°',
        'El Panel Solar Flexible 100W 12V es de alta eficiencia y con una flexibilidad para poder tenerlo con una curvatura máxima de 15-20°',
        'https://cdn.autosolar.es/images/paneles-solares-flexibles/panel-solar-flexible-100w-12v_thumb_main.jpg',
        47);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (2,
        'Pallet Paneles Solares 410W Monocristalinos PERC Tensite',
        4100.80,
        'El pallet del Panel Solar 410W Monocristalino PERC Tensite es la la solución ideal para adquirir y recibir en un solo pallet varias unidades de este panel solar tan versátil, de dimensiones contenidas y con una eficiencia alta demostrada',
        'El pallet del Panel Solar 410W Monocristalino PERC Tensite es la la solución ideal para adquirir y recibir en un solo pallet varias unidades de este panel solar tan versátil, de dimensiones contenidas y con una eficiencia alta demostrada',
        'https://cdn.autosolar.es/images/paneles-solares/pallet-paneles-solares-410w-monocristalinos-perc-tensite_thumb_main.jpg',
        15);

-- ++++++++++++++++++++++++++++++ BATERIAS ++++++++++++++++++++++++
INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (3,
        'Batería AGM 12V 100Ah Tensite',
        120.00,
        'La Batería AGM 100Ah 12V Tensite es un producto de material fotovoltaico el cual destaca por no requerir de mantenimiento',
        'La Batería AGM 100Ah 12V Tensite es un producto de material fotovoltaico el cual destaca por no requerir de mantenimiento',
        'https://cdn.autosolar.es/images/baterias-agm/bateria-agm-12v-100ah-tensite_thumb_main.jpg',
        34);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (3,
        'Batería para Placas Solares GEL 12V 98Ah Ultracell UCG-98-12',
        130.00,
        'La Batería para Placas Solares GEL 12V 98Ah Ultracell UCG-98-12 es una batería de GEL de tamaño compacto pero de grandes prestaciones.',
        'La Batería para Placas Solares GEL 12V 98Ah Ultracell UCG-98-12 es una batería de GEL de tamaño compacto pero de grandes prestaciones.',
        'https://cdn.autosolar.es/images/baterias-gel/bateria-para-placas-solares-gel-12v-98ah-ultracell-ucg-98-12_thumb_main.jpg',
        48);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (3,
        'Batería Coche 12V 52Ah EFB VARTA',
        100.00,
        'La Batería Coche 12V 52Ah VARTA representa una solución eficiente y confiable para satisfacer las necesidades energéticas de vehículos convencionales',
        'La Batería Coche 12V 52Ah VARTA representa una solución eficiente y confiable para satisfacer las necesidades energéticas de vehículos convencionales',
        'https://cdn.autosolar.es/images/baterias-efb/bateria-coche-12v-52ah-efb-varta_thumb_main.jpg ',
        33);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (3,
        'Batería Estacionaria BAE 12V 695Ah',
        2150.90,
        'Batería estacionaria BAE 695Ah 12V, utilizada en aplicaciones solares y sistemas híbridos',
        'Batería estacionaria BAE 695Ah 12V, utilizada en aplicaciones solares y sistemas híbridos',
        'https://cdn.autosolar.es/images/baterias-estacionarias/bateria-estacionaria-bae-12v-695ah_thumb_main.jpg',
        36);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (3,
        'Batería Solar 2V 721Ah SOPzS Formula Star',
        2250.90,
        'La Bateria Batería Solar 2V 721Ah SOPzS Formula Star es un tipo de batería estacionaria con su envase de tipo traslúcido que ofrece características similares a una batería OPzS a un precio inferior',
        'La Bateria Batería Solar 2V 721Ah SOPzS Formula Star es un tipo de batería estacionaria con su envase de tipo traslúcido que ofrece características similares a una batería OPzS a un precio inferior',
        'https://cdn.autosolar.es/images/baterias-estacionarias/bateria-solar-2v-721ah-sopzs-formula-star_thumb_main.jpg',
        14);


-- ++++++++++++++++++++++++++++++ INVERSORES ++++++++++++++++++++++++
INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (4,
        'Inversor Híbrido FRONIUS Primo GEN24 3kW Plus',
        1650.80,
        'El Inversor Híbrido FRONIUS Primo GEN24 3kW es un inversor de conexión a red monofásico y sin transformador',
        'El Inversor Híbrido FRONIUS Primo GEN24 3kW es un inversor de conexión a red monofásico y sin transformador',
        'https://cdn.autosolar.es/images/inversores-conexion-red/inversor-hibrido-fronius-primo-gen24-3kw-plus_thumb_main.jpg',
        21);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (4,
        'Inversor Trifásico Híbrido Growatt MOD 3000TL3-XH',
        830.50,
        'El Inversor Trifásico Híbrido Growatt MOD 3000TL3-XH es un inversor de conexión a red perfecto para instalaciones fotovoltaicas de autoconsumo de tamaño reducido',
        'El Inversor Trifásico Híbrido Growatt MOD 3000TL3-XH es un inversor de conexión a red perfecto para instalaciones fotovoltaicas de autoconsumo de tamaño reducido',
        'https://cdn.autosolar.es/images/inversores-conexion-red/inversor-trifasico-hibrido-growatt-mod-3000tl3-xh_thumb_main.jpg',
        28);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (4,
        'Inversor de Red Tensite 6kW Monofásico AR6M-2',
        630.30,
        'El Inversor de Red Tensite 6kW AR6M-2 es un nuevo inversor monofásico con unas características muy novedosas y distintivas de la más alta gama de inversores',
        'El Inversor de Red Tensite 6kW AR6M-2 es un nuevo inversor monofásico con unas características muy novedosas y distintivas de la más alta gama de inversores',
        'https://cdn.autosolar.es/images/inversores-conexion-red/inversor-de-red-tensite-6kw-monofasico-ar6m-2_thumb_main.jpg',
        35);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (4,
        'Microinversor APS DS3 880W 230V',
        200,
        'Los micro inversores de APSystems son una solución innovadora para las instalaciones domésticas de autoconsumo',
        'Los micro inversores de APSystems son una solución innovadora para las instalaciones domésticas de autoconsumo',
        'https://cdn.autosolar.es/images/micro-inversores/microinversor-aps-ds3-880w-230v_thumb_main.jpg',
        33);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (4,
        'Convertidor 24V-12V 5A Victron Orion-Tr',
        15,
        'El Convertidor 24V-12V 5A VICTRON ORION 60W TR es un pequeño dispositivo electrónico perfecto para alimentar un consumo de 12V a partir de una tensión de 24V',
        'El Convertidor 24V-12V 5A VICTRON ORION 60W TR es un pequeño dispositivo electrónico perfecto para alimentar un consumo de 12V a partir de una tensión de 24V',
        'https://cdn.autosolar.es/images/convertidores-corriente/convertidor-24v-12v-5a-victron-orion-tr_thumb_main.jpg',
        37);

-- ++++++++++++++++++++++++++++++ REGULADORES DE CARGA ++++++++++++++++++++++++
INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (5,
        'Regulador 12V / 24V 10A PWM Must Solar',
        21,
        'El Regulador 12V / 24V 10A PWM Must Solar está preparado para poderse utilizar en instalaciones solares de pequeño tamaño tanto de 12 como de 24V',
        'El Regulador 12V / 24V 10A PWM Must Solar está preparado para poderse utilizar en instalaciones solares de pequeño tamaño tanto de 12 como de 24V',
        'https://cdn.autosolar.es/images/reguladores-carga/regulador-12v-24v-10a-pwm-must-solar_thumb_main.jpg',
        23);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (5,
        'Regulador PWM 12/24V Dual 20A LCD',
        45,
        'El Regulador PWM 12/24V Dual 20A LCD es un controlador de carga solar que permite recargar dos baterías no conectadas entre sí con la energía de un panel solar',
        'El Regulador PWM 12/24V Dual 20A LCD es un controlador de carga solar que permite recargar dos baterías no conectadas entre sí con la energía de un panel solar',
        'https://cdn.autosolar.es/images/reguladores-carga/regulador-pwm-1224v-dual-20a-lcd_thumb_main.jpg',
        28);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (5,
        'Cable VE.Direct 1.8m Victron',
        10,
        'El Cable VE.Direct de Victron 1.8m es la interfaz necesario para conectar los monitores MPPT Control de Victron a los propios reguladores, y los monitores de batería BMV700',
        'El Cable VE.Direct de Victron 1.8m es la interfaz necesario para conectar los monitores MPPT Control de Victron a los propios reguladores, y los monitores de batería BMV700',
        'https://cdn.autosolar.es/images/accesorios-inversores/cable-vedirect-18m-victron_thumb_main.jpg',
        45);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_DESCRIPCION, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (5,
        'Regulador Victron Bluesolar Duo 20A PWM',
        46,
        'El Regulador de Carga Victron Bluesolar Duo 20A figura entre los mejores componentes para una instalación solar fotovoltaica',
        'El Regulador de Carga Victron Bluesolar Duo 20A figura entre los mejores componentes para una instalación solar fotovoltaica',
        'https://cdn.autosolar.es/images/reguladores-carga/regulador-victron-bluesolar-duo-20a-pwm_thumb_main.jpg',
        38);

INSERT INTO PRODUCTOS(PROD_CATEGORIA_ID, PROD_NOMBRE, PROD_PRECIO, PROD_EXTRACT, PROD_IMAGEN_URL,
                      PROD_STOCK)
VALUES (5,
        'Regulador MPPT 150V 60A LCD 12/24/48V',
        223,
        'El Regulador MPPT 150V 60A LCD 12/24/48V es un avanzado controlador de carga solar con maximizador MPPT',
        'https://cdn.autosolar.es/images/reguladores-carga/regulador-mppt-150v-60a-lcd-122448v_thumb_main.jpg',
        19);



-- ++++++++++++++++++++++++++++++ VISITAS ++++++++++++++++++++++++

-- Visita 1: Estado PENDIENTE ASIGNAR
INSERT INTO VISITAS(VIS_CODIGO_CLIENTE, VIS_CODIGO_USUARIO, VIS_FECHA, VIS_HORA, VIS_DIRECCION, VIS_ESTADO, VIS_FECHA_REGISTRO
) VALUES (
    1, -- ID del cliente
    NULL, -- Ningún usuario asignado aún
    '2023-11-01',
    '10:00:00',
    'Av. Siempre Viva 123, San Salvador',
    'PENDIENTE ASIGNAR',
    CURRENT_TIMESTAMP()
);

-- Visita 2: Estado EN RUTA
INSERT INTO VISITAS(
    VIS_CODIGO_CLIENTE,
    VIS_CODIGO_USUARIO,
    VIS_FECHA,
    VIS_HORA,
    VIS_DIRECCION,
    VIS_ESTADO,
    VIS_FECHA_REGISTRO
) VALUES (
    2,
    3, -- Usuario con rol de visitador
    '2023-11-02',
    '14:30:00',
    'Calle Los Pinos, San Salvador',
    'EN RUTA',
    CURRENT_TIMESTAMP()
);

-- Visita 3: Estado FINALIZADA
INSERT INTO VISITAS(
    VIS_CODIGO_CLIENTE,
    VIS_CODIGO_USUARIO,
    VIS_FECHA,
    VIS_HORA,
    VIS_DIRECCION,
    VIS_ESTADO,
    VIS_FECHA_REGISTRO
) VALUES (
    3,
    4,
    '2023-11-03',
    '08:45:00',
    'Col. Escalón, San Salvador',
    'FINALIZADA',
    CURRENT_TIMESTAMP()
);

-- Visita 4: Estado CANCELADA
INSERT INTO VISITAS(
    VIS_CODIGO_CLIENTE,
    VIS_CODIGO_USUARIO,
    VIS_FECHA,
    VIS_HORA,
    VIS_DIRECCION,
    VIS_ESTADO,
    VIS_FECHA_REGISTRO
) VALUES (
    4,
    5,
    '2023-11-05',
    '12:15:00',
    'Santa Tecla, La Libertad',
    'CANCELADA',
    CURRENT_TIMESTAMP()
);

-- Visita 5: Estado PENDIENTE ASIGNAR
INSERT INTO VISITAS(
    VIS_CODIGO_CLIENTE,
    VIS_CODIGO_USUARIO,
    VIS_FECHA,
    VIS_HORA,
    VIS_DIRECCION,
    VIS_ESTADO,
    VIS_FECHA_REGISTRO
) VALUES (
    4,
    NULL, -- Ningún usuario asignado aún
    '2023-11-07',
    '09:30:00',
    'Boulevard del Hipódromo, San Salvador',
    'PENDIENTE ASIGNAR',
    CURRENT_TIMESTAMP()
);

-- ++++++++++++++++++++++++++++++ FACTURAS ++++++++++++++++++++++++
-- Factura 1
INSERT INTO FACTURAS(
    FAC_CODIGO_CLIENTE,
    FAC_FECHA_EMISION,
    FAC_METODO_PAGO
) VALUES (
    1, -- ID del cliente
    CURRENT_TIMESTAMP(),
    'Medio Electrónico'
);

-- Factura 2
INSERT INTO FACTURAS(
    FAC_CODIGO_CLIENTE,
    FAC_FECHA_EMISION,
    FAC_METODO_PAGO
) VALUES (
    2,
    CURRENT_TIMESTAMP(),
    'Medio Electrónico'
);

-- Factura 3
INSERT INTO FACTURAS(
    FAC_CODIGO_CLIENTE,
    FAC_FECHA_EMISION,
    FAC_METODO_PAGO
) VALUES (
    3,
    CURRENT_TIMESTAMP(),
    'Medio Electrónico'
);

-- Factura 4
INSERT INTO FACTURAS(
    FAC_CODIGO_CLIENTE,
    FAC_FECHA_EMISION,
    FAC_METODO_PAGO
) VALUES (
    4,
    CURRENT_TIMESTAMP(),
    'Medio Electrónico'
);

-- Factura 5
INSERT INTO FACTURAS(
    FAC_CODIGO_CLIENTE,
    FAC_FECHA_EMISION,
    FAC_METODO_PAGO
) VALUES (
    2,
    CURRENT_TIMESTAMP(),
    'Medio Electrónico'
);

-- Factura 6
INSERT INTO FACTURAS(
    FAC_CODIGO_CLIENTE,
    FAC_FECHA_EMISION,
    FAC_METODO_PAGO
) VALUES (
    4,
    CURRENT_TIMESTAMP(),
    'Medio Electrónico'
);




-- ++++++++++++++++++++++++++++++ DETALLES FACTURA ++++++++++++++++++++++++
-- Detalle Factura 1
INSERT INTO DETALLE_FACTURA(
    DET_CODIGO_FACTURA,
    DET_CODIGO_PRODUCTO,
    DET_CANTIDAD,
    DET_IMPUESTO,
    DET_DESCUENTOS,
    DET_TOTAL
) VALUES (
    1, -- ID de la factura
    1, -- ID del producto
    2, -- Cantidad de productos comprados
    0.13, -- Impuesto aplicado (13%)
    0.35, -- Descuento aplicado (35%)
    (2 * 4200.08) * 1.13 * (1 - 0.35) -- Cálculo del total con impuestos y descuento
);


-- Detalle Factura 2
INSERT INTO DETALLE_FACTURA(
    DET_CODIGO_FACTURA,
    DET_CODIGO_PRODUCTO,
    DET_CANTIDAD,
    DET_IMPUESTO,
    DET_DESCUENTOS,
    DET_TOTAL
) VALUES (
    2, -- ID de la factura
    5, -- ID del producto
    1, -- Cantidad de productos comprados
    0.13, -- Impuesto aplicado (13%)
    0.35, -- Descuento aplicado (35%)
    (1 * 1500.80) * 1.13 * (1 - 0.35) -- Cálculo del total con impuestos y descuento
);


-- Detalle Factura 3
INSERT INTO DETALLE_FACTURA(
    DET_CODIGO_FACTURA,
    DET_CODIGO_PRODUCTO,
    DET_CANTIDAD,
    DET_IMPUESTO,
    DET_TOTAL
) VALUES (
    3, -- ID de la factura
    8, -- ID del producto
    1, -- Cantidad de productos comprados
    0.13, -- Impuesto aplicado (13%)
    (1 * 3600.90) * 1.13 * (1 - 0.0) -- Cálculo del total con impuestos y descuento
);

-- Detalle Factura 4
INSERT INTO DETALLE_FACTURA(
    DET_CODIGO_FACTURA,
    DET_CODIGO_PRODUCTO,
    DET_CANTIDAD,
    DET_IMPUESTO,
    DET_TOTAL
) VALUES (
    4, -- ID de la factura
    10, -- ID del producto
    3, -- Cantidad de productos comprados
    0.13, -- Impuesto aplicado (13%)
    (3 * 4100.80) * 1.13 * (1 - 0.0) -- Cálculo del total con impuestos y descuento
);

-- DETALLE FACTURA 5
  INSERT INTO DETALLE_FACTURA(
    DET_CODIGO_FACTURA,
    DET_CODIGO_PRODUCTO,
    DET_CANTIDAD,
    DET_IMPUESTO,
    DET_DESCUENTOS,
    DET_TOTAL
) VALUES (
    5, -- ID de la factura
    5, -- ID del producto
    2, -- Cantidad de productos comprados
    0.13, -- Impuesto aplicado (13%)
    0.35, -- Descuento aplicado (35%)
    (2 * 1500.80) * 1.13 * (1 - 0.35) -- Cálculo del total con impuestos y descuento
);

-- DETALLE FACTURA 6
  INSERT INTO DETALLE_FACTURA(
    DET_CODIGO_FACTURA,
    DET_CODIGO_PRODUCTO,
    DET_CANTIDAD,
    DET_IMPUESTO,
    DET_TOTAL
) VALUES (
    6, -- ID de la factura
    9, -- ID del producto
    5, -- Cantidad de productos comprados
    0.13, -- Impuesto aplicado (13%)
    (5 * 90.85) * 1.13 * (1 - 0.0) -- Cálculo del total con impuestos y descuento
);


-- ++++++++++++++++++++++++++++++ ENVIOS ++++++++++++++++++++++++
-- Envío 1: Estado PENDIENTE
INSERT INTO ENVIOS(
    ENV_CODIGO_CLIENTE,
    ENV_MUNICIPIO,
    ENV_DIRECCION,
    ENV_COMENTARIO,
    ENV_ESTADO
) VALUES (
    1, -- ID del cliente
    'San Salvador',
    'Av. Siempre Viva 123, Colonia Centro',
    'COMENTARIO DE LA VIISTA #1',
    'PENDIENTE'
);

-- Envío 2: Estado EN RUTA
INSERT INTO ENVIOS(
    ENV_CODIGO_CLIENTE,
    ENV_MUNICIPIO,
    ENV_DIRECCION,
    ENV_COMENTARIO,
    ENV_ESTADO
) VALUES (
    2,
    'Santa Tecla',
    'Blvd. Del Hipódromo 456, Colonia Escalón',
    'COMENTARIO DE LA VIISTA #2',
    'EN RUTA'
);

-- Envío 3: Estado ENTREGADO
INSERT INTO ENVIOS(
    ENV_CODIGO_CLIENTE,
    ENV_MUNICIPIO,
    ENV_DIRECCION,
    ENV_COMENTARIO,
    ENV_ESTADO
) VALUES (
    3,
    'Mejicanos',
    'Calle Los Pinos 789, Residencial Las Flores',
    'COMENTARIO DE LA VIISTA #3',
    'ENTREGADO'
);

-- Envío 4: Estado CANCELADO
INSERT INTO ENVIOS(
    ENV_CODIGO_CLIENTE,
    ENV_MUNICIPIO,
    ENV_DIRECCION,
    ENV_COMENTARIO,
    ENV_ESTADO
) VALUES (
    4,
    'Soyapango',
    'Calle Principal 101, Colonia Santa Lucia',
    'COMENTARIO DE LA VIISTA #4',
    'CANCELADO'
);
