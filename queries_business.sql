USE energysun_ecommerce;

-- ++++++++++++++++++++++++++++++ QUERYS A LA BASE DE DATOS ++++++++++++++++++++++++

SELECT count(*) as cliente_totales
FROM VW_DATOS_CLIENTES;

SELECT r.rol_nombre, u.*
FROM USUARIOS u
       inner join roles r
                  on r.ROL_CODIGO = u.USU_ROL_ID;


SELECT *
FROM CLIENTES;

SELECT *
FROM usuarios;

select *
from envios e;

SELECT *
FROM VISITAS;

-- VERIFICAR SI EL USUARIO YA EXISTE RETORNA 1, SINO RETORNA 0
SELECT COUNT(*)
FROM usuarios u
WHERE u.USU_USERNAME = 'admin';

SELECT u.USU_CODIGO   AS "CODIGO",
       u.USU_ROL_ID   AS "ROL",
       u.USU_USERNAME AS "USERNAME",
       u.USU_EMAIL    AS "EMAIL"
FROM usuarios u
WHERE u.USU_USERNAME = 'mrpineda@mail.com'
   OR u.USU_EMAIL = 'mrpineda@mail.com';

SELECT *
FROM usuarios;

-- limitar a solo las 5 principales, para menu filtrar
SELECT *
FROM CATEGORIAS
ORDER BY CAT_CODIGO ASC
LIMIT 5;


SELECT *
FROM productos;

SELECT C.CAT_NOMBRE, P.*
FROM productos P
       INNER JOIN categorias C
                  ON C.CAT_CODIGO = P.PROD_CATEGORIA_ID
WHERE C.CAT_CODIGO = 2
  AND P.PROD_CODIGO <> 3;

SELECT C.CAT_NOMBRE, P.*
FROM productos P
       INNER JOIN categorias C
                  ON C.CAT_CODIGO = P.PROD_CATEGORIA_ID
WHERE C.CAT_NOMBRE = 'KIT SOLARES';

select *
from clientes;

SELECT *
FROM CLIENTES C
WHERE C.CLI_USUARIO_ID = 1;

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

SELECT *
FROM FACTURAS;

SELECT *
FROM DETALLE_FACTURA;


-- PRECIOS MAS BAJOS
SELECT *
FROM PRODUCTOS ORDER BY PROD_PRECIO ASC;

-- PRECIOS MAS ALTOS
SELECT PROD_CODIGO, PROD_STOCK, PROD_PRECIO
FROM PRODUCTOS ;

SELECT * FROM productos P WHERE P.PROD_CATEGORIA_ID = 2 AND P.PROD_CODIGO <> 1 LIMIT 2;
