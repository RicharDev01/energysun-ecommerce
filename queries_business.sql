USE energysun_ecommerce;

-- ++++++++++++++++++++++++++++++ QUERYS DE LOS USUARIOS ++++++++++++++++++++++++

-- TODOS LOS USUARIOS
SELECT *
FROM usuarios;

SELECT r.rol_nombre, u.*
FROM USUARIOS u
       inner join roles r
                  on r.ROL_CODIGO = u.USU_ROL_ID;


-- VERIFICAR SI EL USUARIO YA EXISTE RETORNA 1, SINO RETORNA 0
SELECT COUNT(*)
FROM usuarios u
WHERE u.USU_USERNAME = 'admin';

-- VERIFICAR SI EL USERNAME O EMAIL EXISTEN
SELECT u.USU_CODIGO   AS "CODIGO",
       u.USU_ROL_ID   AS "ROL",
       u.USU_USERNAME AS "USERNAME",
       u.USU_EMAIL    AS "EMAIL"
FROM usuarios u
WHERE u.USU_USERNAME = 'mrpineda@mail.com'
   OR u.USU_EMAIL = 'mrpineda@mail.com';



-- +++++++++++++++ QUERYS PARA PRODUCTOS ++++++++++++++++
-- TODOS LOS PRODUCTOS
SELECT *
FROM productos;

-- PRODUCTOS RELACIONADOS
SELECT C.CAT_NOMBRE, P.*
FROM productos P
INNER JOIN categorias C
    ON C.CAT_CODIGO = P.PROD_CATEGORIA_ID
WHERE C.CAT_CODIGO = 2
  AND P.PROD_CODIGO <> 3
LIMIT 4;

-- PRODUCTOS POR CATEGORIA
SELECT C.CAT_NOMBRE, P.*
FROM productos P
INNER JOIN categorias C
    ON C.CAT_CODIGO = P.PROD_CATEGORIA_ID
WHERE C.CAT_NOMBRE = 'KIT SOLARES';

-- PRECIOS MAS BAJOS
SELECT *
FROM PRODUCTOS
ORDER BY PROD_PRECIO ASC;

-- PRECIOS MAS ALTOS
SELECT PROD_CODIGO, PROD_STOCK, PROD_PRECIO
FROM PRODUCTOS;

-- TOP DE LOS PRODUCTOS MAS VENDIDOS
SELECT P.PROD_NOMBRE, P.PROD_CODIGO, P.PROD_IMAGEN_URL, SUM(DF.DET_CANTIDAD) AS TOTAL_VENDIDO
FROM PRODUCTOS P
INNER JOIN DETALLE_FACTURA DF ON DF.DET_CODIGO_PRODUCTO = P.PROD_CODIGO
GROUP BY P.PROD_CODIGO, P.PROD_NOMBRE, P.PROD_IMAGEN_URL
ORDER BY TOTAL_VENDIDO DESC
LIMIT 4;


-- +++++++++++++ QUERYS PARA CLIENTES ++++++++++
-- TODOS LOS CLIENTES
select *
from clientes;

-- CLIENTE POR SU ID
SELECT *
FROM CLIENTES C
WHERE C.CLI_USUARIO_ID = 1;

-- TOTAL DE LOS CLIENTES
SELECT count(*) as cliente_totales
FROM VW_DATOS_CLIENTES;


-- ++++++++++++++ QUERYS DE VISITAS +++++++++++++
SELECT *
FROM VISITAS;

-- +++++++++++ REPORTES DE FACTURA ++++++++++++
SELECT c.CLI_CODIGO,
       c.CLI_PRIMER_NOM,
       c.CLI_SEGUNDO_NOM,
       c.CLI_PRIMER_APE,
       c.CLI_SEGUNDO_APE,
       c.CLI_TELEFONO,
       f.FAC_CODIGO,
       f.FAC_FECHA_EMISION,
       f.FAC_METODO_PAGO,
       d.DET_CODIGO,
       d.DET_CANTIDAD,
       d.DET_IMPUESTO,
       d.DET_DESCUENTOS,
       d.DET_TOTAL,
       p.PROD_NOMBRE,
       p.PROD_PRECIO
FROM CLIENTES c
       INNER JOIN FACTURAS f
                  ON c.CLI_CODIGO = f.FAC_CODIGO_CLIENTE
       INNER JOIN DETALLE_FACTURA d
                  ON f.FAC_CODIGO = d.DET_CODIGO_FACTURA
       INNER JOIN PRODUCTOS p
                  ON d.DET_CODIGO_PRODUCTO = p.PROD_CODIGO
WHERE f.FAC_CODIGO = 2;


-- total de ordenes registradas
SELECT COUNT(*) AS TOTAL_ORDENES FROM FACTURAS;

SELECT *
FROM FACTURAS;

SELECT *
FROM DETALLE_FACTURA;

-- TOTAL DE DINERO RECIBIDO (DE SIEMPRE)
  SELECT SUM(DF.DET_TOTAL) AS TOTAL_RECAUDADO
  FROM DETALLE_FACTURA DF;

-- +++++++++++++ QUERYS PARA CATEGORIAS +++++++++++++

-- limitar a solo las 5 principales, para menu filtrar
SELECT *
FROM CATEGORIAS
ORDER BY CAT_CODIGO ASC
LIMIT 5;

-- ++++++++++++++ QUERYS DE ENVIOS ++++++++++++
-- TODOS LOS ENVIOS
SELECT ENV_ESTADO
FROM ENVIOS;

-- TOTAL DE LOS ENVIOS REALIZADOS EN ESTADO 'PENDIENTE'; 'EN RUTA'
SELECT COUNT(*) AS TOTAL_DE_ENVIOS
FROM ENVIOS WHERE ENV_ESTADO IN ('PENDIENTE', 'EN RUTA');
