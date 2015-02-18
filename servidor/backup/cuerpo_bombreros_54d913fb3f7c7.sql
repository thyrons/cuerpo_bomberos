
CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
SET search_path = public, pg_catalog;
SET client_encoding=LATIN1;
CREATE FUNCTION fn_log_audit() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    IF (TG_OP = 'DELETE') THEN
      INSERT INTO tbl_audit ("nombre_tabla", "operacion", "valor_anterior", "valor_nuevo", "fecha_cambio", "usuario")
             VALUES (TG_TABLE_NAME, 'D', OLD, NULL, now(), USER);
      RETURN OLD;
    ELSIF (TG_OP = 'UPDATE') THEN
      INSERT INTO tbl_audit ("nombre_tabla", "operacion", "valor_anterior", "valor_nuevo", "fecha_cambio", "usuario")
             VALUES (TG_TABLE_NAME, 'U', OLD, NEW, now(), USER);
      RETURN NEW;
    ELSIF (TG_OP = 'INSERT') THEN
      INSERT INTO tbl_audit ("nombre_tabla", "operacion", "valor_anterior", "valor_nuevo", "fecha_cambio", "usuario")
             VALUES (TG_TABLE_NAME, 'I', NULL, NEW, now(), USER);
      RETURN NEW;
    END IF;
    RETURN NULL;
END;
$$;
LANGUAGE 'plpgsql' VOLATILE COST 100;
ALTER FUNCTION public.fn_log_audit() OWNER TO postgres;
--
-- Estrutura de la tabla 'c_x_cobrar'
--

DROP TABLE c_x_cobrar CASCADE;
CREATE TABLE c_x_cobrar (
id_cxc int4 NOT NULL,
id_emsion_permisos int4,
adelanto text,
fecha_credito date,
fecha_cancelacion date,
id_usuario int4,
tipo_documento text,
saldo text,
total_factura text,
estado int4
);

--
-- Creating data for 'c_x_cobrar'
--



--
-- Creating index for 'c_x_cobrar'
--

ALTER TABLE ONLY  c_x_cobrar  ADD CONSTRAINT  c_x_cobrar_pkey  PRIMARY KEY  (id_cxc);

--
-- Estrutura de la tabla 'claves'
--

DROP TABLE claves CASCADE;
CREATE TABLE claves (
id_clave int4 NOT NULL,
nombre_clave text,
id_usuario int4
);

--
-- Creating data for 'claves'
--

INSERT INTO claves VALUES ('1','admin','1');


--
-- Creating index for 'claves'
--

ALTER TABLE ONLY  claves  ADD CONSTRAINT  claves_pkey  PRIMARY KEY  (id_clave);

--
-- Estrutura de la tabla 'detalle_devolucion_venta'
--

DROP TABLE detalle_devolucion_venta CASCADE;
CREATE TABLE detalle_devolucion_venta (
id_detalle_devolucion int4 NOT NULL,
id_devolucion_venta int4,
cod_productos int4,
cantidad text,
precio_venta text,
total_venta text,
estado text
);

--
-- Creating data for 'detalle_devolucion_venta'
--



--
-- Creating index for 'detalle_devolucion_venta'
--

ALTER TABLE ONLY  detalle_devolucion_venta  ADD CONSTRAINT  detalle_devolucion_venta_pkey  PRIMARY KEY  (id_detalle_devolucion);

--
-- Estrutura de la tabla 'detalles_cxc'
--

DROP TABLE detalles_cxc CASCADE;
CREATE TABLE detalles_cxc (
id_detalle_cxc int4 NOT NULL,
id_cxc int4,
fecha_abono date,
valor text,
detalle text,
forma_pago text,
id_usuario int4
);

--
-- Creating data for 'detalles_cxc'
--



--
-- Creating index for 'detalles_cxc'
--

ALTER TABLE ONLY  detalles_cxc  ADD CONSTRAINT  detalles_cxc_pkey  PRIMARY KEY  (id_detalle_cxc);

--
-- Estrutura de la tabla 'detalles_emision
--

DROP TABLE detalles_emision CASCADE;
CREATE TABLE detalles_emision (
id_detalle_emision int4 NOT NULL,
tipo text,
id_informe text,
id_tasa text,
id_producto text,
cantidad text,
precio_unitario text,
precio_total text,
id_emsion int4,
detalle text
);

--
-- Creating data for 'detalles_emision'
--



--
-- Creating index for 'detalles_emision'
--

ALTER TABLE ONLY  detalles_emision  ADD CONSTRAINT  detalles_emision_pkey  PRIMARY KEY  (id_detalle_emision);

--
-- Estrutura de la tabla  'detalles_fc'
--

DROP TABLE detalles_fc CASCADE;
CREATE TABLE detalles_fc (
id_dfc int4 NOT NULL,
id_producto int4,
cantidad text,
precio_u text,
precio_total text,
id_fc int4
);

--
-- Creating data for 'detalles_fc'
--



--
-- Creating index for 'detalles_fc'
--

ALTER TABLE ONLY  detalles_fc  ADD CONSTRAINT  detalles_fc_pkey  PRIMARY KEY  (id_dfc);

--
-- Estrutura de la tabla 'devolucion_venta'
--

DROP TABLE devolucion_venta CASCADE;
CREATE TABLE devolucion_venta (
id_devolucion_venta int4 NOT NULL,
id_usuario int4,
id_emision int4,
id_propietario int4,
fecha_actual text,
hora_actual text,
tipo_comprobante text,
subtotal text,
iva0 text,
iva12 text,
total_venta text,
estado text
);

--
-- Creating data for 'devolucion_venta'
--

INSERT INTO devolucion_venta VALUES ('1','1','1','1','2015-01-21','4:12:27 PM','Factura','13.00','0.00','0.00','13.00','0');
INSERT INTO devolucion_venta VALUES ('2','1','1','1','2015-01-21','4:12:47 PM','Factura','1.00','0.00','0.00','1.00','0');
INSERT INTO devolucion_venta VALUES ('3','1','2','1','2015-01-21','4:14:41 PM','Factura','12.00','0.00','0.00','12.00','0');
INSERT INTO devolucion_venta VALUES ('4','1','1','1','2015-01-21','4:15:12 PM','Factura','1.00','0.00','0.00','1.00','0');
INSERT INTO devolucion_venta VALUES ('5','1','1','1','2015-01-21','4:18:02 PM','Factura','1.00','0.00','0.00','1.00','0');
INSERT INTO devolucion_venta VALUES ('6','1','1','1','2015-01-21','4:43:08 PM','Factura','12.00','0.00','0.00','12.00','0');


--
-- Creating index for 'devolucion_venta'
--

ALTER TABLE ONLY  devolucion_venta  ADD CONSTRAINT  devolucion_venta_pkey  PRIMARY KEY  (id_devolucion_venta);

--
-- Estrutura de la tabla 'emision_permisos'
--

DROP TABLE emision_permisos CASCADE;
CREATE TABLE emision_permisos (
id_emision int4 NOT NULL,
fecha text,
nro text,
nro1 text,
nro_factura text,
sutotal text,
iva0 text,
iva12 text,
total text,
fecha_cancelacion text,
id_tipo_pago int4,
hora_factura text,
id_usuario int4,
id_propietario int4
);

--
-- Creating data for 'emision_permisos'
--

INSERT INTO emision_permisos VALUES ('1','2015-01-20','001','001','000000001','1368.00','0.00','0.00','1368.00','2015-01-20','1','3:29:04 PM','1','1');
INSERT INTO emision_permisos VALUES ('2','2015-01-20','001','001','000000002','132.00','0.00','0.00','132.00','2015-01-20','1','3:38:11 PM','1','1');
INSERT INTO emision_permisos VALUES ('3','2015-01-22','001','001','000000003','12.00','0.00','0.00','12.00','2015-01-22','2','1:39:53 PM','1','1');


--
-- Creating index for 'emision_permisos'
--

ALTER TABLE ONLY  emision_permisos  ADD CONSTRAINT  emsion_permisos_pkey  PRIMARY KEY  (id_emision);

--
-- Estrutura de la tabla 'empresa'
--

DROP TABLE empresa CASCADE;
CREATE TABLE empresa (
id_empresa int4 NOT NULL,
id_propietario int4,
nombre_empresa text,
direccion_empresa text,
telefono_empresa text,
representante_legal text,
ruc_empresa text,
actividad_empresa text,
parroquia text,
capital_giro text,
estado text
);

--
-- Creating data for 'empresa'
--



--
-- Creating index for 'empresa'
--

ALTER TABLE ONLY  empresa  ADD CONSTRAINT  empresa_pkey  PRIMARY KEY  (id_empresa);

--
-- Estrutura de la tabla 'factura_compra'
--

DROP TABLE factura_compra CASCADE;
CREATE TABLE factura_compra (
id_fc int4 NOT NULL,
fecha text,
fecha_cancelacion text,
hora_compra text,
nro text,
nro1 text,
nro_factura text,
ruc_proveedor text,
nombre_proveedor text,
empresa text,
base12 text,
base0 text,
iva12 text,
total text,
id_tipo_pago int4,
id_usuario int4
);

--
-- Creating data for 'factura_compra'
--

INSERT INTO factura_compra VALUES ('1','2015-01-28','2015-01-28','10:13:05 AM','001','001','123123123','123123123','QWEQWEQ','QWEQWE','0.00','264.00','0.00','264.00','1','1');


--
-- Creating index for 'factura_compra'
--

ALTER TABLE ONLY  factura_compra  ADD CONSTRAINT  factura_compra_pkey  PRIMARY KEY  (id_fc);

--
-- Estrutura de la tabla 'informe_confirmar'
--

DROP TABLE informe_confirmar CASCADE;
CREATE TABLE informe_confirmar (
id_confirmar int4 NOT NULL,
id_informe_general int4,
disposiciones_finales text,
observaciones_finales text,
resolucion text,
para_extender text,
plazo text,
anexo text,
permiso text,
foto text,
documentos text,
id_usuario int4
);

--
-- Creating data for 'informe_confirmar'
--



--
-- Creating index for 'informe_confirmar'
--

ALTER TABLE ONLY  informe_confirmar  ADD CONSTRAINT  informe_confirmar_pkey  PRIMARY KEY  (id_confirmar);

--
-- Estrutura de la tabla 'informe_general'
--

DROP TABLE informe_general CASCADE;
CREATE TABLE informe_general (
id_informe_general int4 NOT NULL,
id_empresa int4,
area_total_m2 text,
area_util_m2 text,
pe text,
mmr text,
riesgo text,
visible_legible text,
ubicacion text,
solicitud_nro text,
nro_ocupantes_fijos text,
nro_flotantes text,
aforo text,
tipo_construccion text,
ventilacion text,
disposicion text,
hora_inicio text,
hora_fin text,
tipo_inspeccion text,
techo text,
nro_registro text,
id_tasa int4,
valor_tasa text,
fecha_general date,
estado_informe int4
);

--
-- Creating data for 'informe_general'
--



--
-- Creating index for 'informe_general'
--

ALTER TABLE ONLY  informe_general  ADD CONSTRAINT  informe_general_pkey  PRIMARY KEY  (id_informe_general);

--
-- Estrutura de la tabla ' informe_incendios'
--

DROP TABLE  informe_incendios CASCADE;
CREATE TABLE  informe_incendios (
id_incendios int4 NOT NULL,
id_informe_general int4,
riesgo1 text,
observacion1 text,
riesgo2 text,
observacion2 text,
riesgo3 text,
observacion3 text,
riesgo4 text,
observacion4 text,
riesgo5 text,
observacion5 text,
riesgo6 text,
observacion6 text,
observacion7 text,
alma1 text,
alma2 text,
tipo_alma1 text,
alma3 text,
alma4 text,
tipo_alma2 text,
alma5 text,
alma6 text,
tipo_alma3 text,
alma7 text,
tipo_alma4 text,
alma8 text,
tipo_alma5 text,
alma9 text,
tipo_alma6 text,
alma10 text,
alma11 text,
tipo_alma7 text,
alma12 text,
tipo_alma8 text
);

--
-- Creating data for ' informe_incendios'
--


--
-- Estrutura de la tabla 'informe_prevencion'
--

DROP TABLE informe_prevencion CASCADE;
CREATE TABLE informe_prevencion (
id_prevencion int4 NOT NULL,
id_informe_general int4,
cant1 text,
cumple1 text,
cant_a1 text,
lugar1 text,
cant2 text,
cumple2 text,
cant_a2 text,
lugar2 text,
cant3 text,
cumple3 text,
cant_a3 text,
lugar3 text,
cant4 text,
cumple4 text,
cant_a4 text,
lugar4 text,
cant5 text,
cumple5 text,
cant_a5 text,
lugar5 text,
cant6 text,
cumple6 text,
cant_a6 text,
lugar6 text,
cant7 text,
cumple7 text,
cant_a7 text,
lugar7 text,
cant8 text,
cumple8 text,
cant_a8 text,
lugar8 text,
cant9 text,
cumple9 text,
cant_a9 text,
lugar9 text,
cant10 text,
cumple10 text,
cant_a10 text,
lugar10 text,
cant11 text,
cumple11 text,
cant_a11 text,
lugar11 text,
cant12 text,
cumple12 text,
cant_a12 text,
lugar12 text,
cant13 text,
cumple13 text,
cant_a13 text,
lugar13 text,
cant14 text,
cumple14 text,
cant_a14 text,
lugar14 text
);

--
-- Creating data for 'informe_prevencion'
--



--
-- Creating index for 'informe_prevencion'
--

ALTER TABLE ONLY  informe_prevencion  ADD CONSTRAINT  informe_prevencion_pkey  PRIMARY KEY  (id_prevencion);

--
-- Estrutura de la tabla 'informe_proteccion'
--

DROP TABLE informe_proteccion CASCADE;
CREATE TABLE informe_proteccion (
id_proteccion int4 NOT NULL,
id_informe_general int4,
extinto text,
agua text,
oper_1 text,
no_oper_1 text,
cumple_1 text,
disposiciones_1 text,
cant_1 text,
pqs text,
oper_2 text,
no_oper_2 text,
cumple_2 text,
disposiciones_2 text,
cant_2 text,
co2 text,
oper_3 text,
no_oper_3 text,
cumple_3 text,
disposiciones_3 text,
cant_3 text,
espuma text,
oper_4 text,
no_oper_4 text,
cumple_4 text,
disposiciones_4 text,
cant_4 text,
agentes text,
oper_5 text,
no_oper_5 text,
cumple_5 text,
disposiciones_5 text,
cant_5 text
);

--
-- Creating data for 'informe_proteccion'
--



--
-- Creating index for 'informe_proteccion'
--

ALTER TABLE ONLY  informe_proteccion  ADD CONSTRAINT  informe_proteccion_pkey  PRIMARY KEY  (id_proteccion);

--
-- Estrutura de la tabla 'productos'
--

DROP TABLE productos CASCADE;
CREATE TABLE productos (
id_producto int4 NOT NULL,
nombre_producto text,
valor_iva text,
precio_compra text,
precio_venta text,
stock text,
stock_minimo text,
stock_maximo text,
caracteristicas_producto text
);

--
-- Creating data for 'productos'
--

INSERT INTO productos VALUES ('1','QWEQWE','0','123','12','12','12','12',NULL);
INSERT INTO productos VALUES ('2','FGHFGHF','12','0.00','0.00','0','0','0',NULL);


--
-- Creating index for 'productos'
--

ALTER TABLE ONLY  productos  ADD CONSTRAINT  productos_pkey  PRIMARY KEY  (id_producto);

--
-- Estrutura de la tabla 'propietario'
--

DROP TABLE propietario CASCADE;
CREATE TABLE propietario (
id_propietario int4 NOT NULL,
ruc_propietario text,
nombre_propietario text,
direccion_propietario text,
telefono_propietario text,
celular_propietario text
);

--
-- Creating data for 'propietario'
--



--
-- Creating index for 'propietario'
--

ALTER TABLE ONLY  propietario  ADD CONSTRAINT  propietario_pkey  PRIMARY KEY  (id_propietario);

--
-- Estrutura de la tabla 'servicios_administrativos'
--

DROP TABLE servicios_administrativos CASCADE;
CREATE TABLE servicios_administrativos (
id_servicio int4 NOT NULL,
nombre_servicio text,
estado int4
);

--
-- Creating data for 'servicios_administrativos'
--

INSERT INTO servicios_administrativos VALUES ('1','QWEQWE','1');


--
-- Creating index for 'servicios_administrativos'
--

ALTER TABLE ONLY  servicios_administrativos  ADD CONSTRAINT  servicios_administrativos_pkey  PRIMARY KEY  (id_servicio);

--
-- Estrutura de la tabla 'tasa_servicio'
--

DROP TABLE tasa_servicio CASCADE;
CREATE TABLE tasa_servicio (
id_tasa_servicio int4 NOT NULL,
little text,
medium text,
big text,
sbig text,
id_servicio int4,
nombre_tasa text
);

--
-- Creating data for 'tasa_servicio'
--

INSERT INTO tasa_servicio VALUES ('1001','1212','12','12','12','1','QWEQWE');


--
-- Creating index for 'tasa_servicio'
--

ALTER TABLE ONLY  tasa_servicio  ADD CONSTRAINT  tasa_servicio_pkey  PRIMARY KEY  (id_tasa_servicio);

--
-- Estrutura de la tabla 'tbl_audit'
--

DROP TABLE tbl_audit CASCADE;
CREATE SEQUENCE tbl_audit_pk_audit_seq
    START WITH 8214
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
CREATE TABLE tbl_audit (
pk_audit int4 NOT NULL DEFAULT nextval('tbl_audit_pk_audit_seq'::regclass) ,
nombre_tabla text NOT NULL,
operacion character(1) NOT NULL,
valor_anterior text,
valor_nuevo text,
fecha_cambio timestamp NOT NULL,
usuario text NOT NULL
);

--
-- Creating data for 'tbl_audit'
--

INSERT INTO tbl_audit VALUES ('8077','usuario','U','(1,Admin,,,,,2015-01-29,1,0,admin,999999999)','(1,Admin,,,,,2015-01-30,1,0,admin,999999999)','2015-01-30 09:56:22.777','postgres');
INSERT INTO tbl_audit VALUES ('8078','usuario','U','(1,Admin,,,,,2015-01-30,1,0,admin,999999999)','(1,Admin,,,,,2015-02-02,1,0,admin,999999999)','2015-02-02 09:20:13.972','postgres');
INSERT INTO tbl_audit VALUES ('8079','usuario','U','(1,Admin,,,,,2015-02-02,1,0,admin,999999999)','(1,Admin,,,,,2015-02-02,1,0,admin,999999999)','2015-02-02 09:20:14.372','postgres');
INSERT INTO tbl_audit VALUES ('8080','tipo_usuario','U','(1,Admin,0)','(1,Administrados,0)','2015-02-02 09:58:23.181','postgres');
INSERT INTO tbl_audit VALUES ('8081','tipo_usuario','U','(1,Administrados,0)','(1,Administrador,0)','2015-02-02 09:58:24.813','postgres');
INSERT INTO tbl_audit VALUES ('8082','tipo_usuario','D','(2,Secretario,1)',NULL,'2015-02-02 09:58:54.006','postgres');
INSERT INTO tbl_audit VALUES ('8083','tipo_usuario','U','(3,Tecnico,1)','(2,Tecnico,1)','2015-02-02 09:58:55.701','postgres');
INSERT INTO tbl_audit VALUES ('8084','tipo_usuario','U','(4,Bombero,1)','(3,Bombero,1)','2015-02-02 09:58:56.916','postgres');
INSERT INTO tbl_audit VALUES ('8085','tipo_usuario','U','(5,Inspector,1)','(4,Inspector,1)','2015-02-02 09:58:57.9','postgres');
INSERT INTO tbl_audit VALUES ('8086','tipo_usuario','U','(2,Tecnico,1)','(2,"Tecnico(a)",1)','2015-02-02 09:59:00.924','postgres');
INSERT INTO tbl_audit VALUES ('8087','tipo_usuario','U','(3,Bombero,1)','(3,"Bombero(a)",1)','2015-02-02 09:59:04.876','postgres');
INSERT INTO tbl_audit VALUES ('8088','tipo_usuario','U','(4,Inspector,1)','(4,"Inspector(a)",1)','2015-02-02 09:59:07.404','postgres');
INSERT INTO tbl_audit VALUES ('8089','usuario','I',NULL,'(2,AEQWEQW,"","",QWEWEQ,"",2015-02-02,1,1,qwe,1002910345)','2015-02-02 10:13:26.971','postgres');
INSERT INTO tbl_audit VALUES ('8090','claves','I',NULL,'(2,123123123,2)','2015-02-02 10:13:27.001','postgres');
INSERT INTO tbl_audit VALUES ('8091','usuario','I',NULL,'(3,QWEQWE,"","",QWEQWE,"",2015-02-02,1,1,wwww,9999999999)','2015-02-02 10:16:54.858','postgres');
INSERT INTO tbl_audit VALUES ('8092','claves','I',NULL,'(3,123123123,3)','2015-02-02 10:16:54.875','postgres');
INSERT INTO tbl_audit VALUES ('8093','usuario','I',NULL,'(4,QWEQWE,1,"",QWEQWE,"",2015-02-02,1,1,weweq,77777777777)','2015-02-02 10:19:11.61','postgres');
INSERT INTO tbl_audit VALUES ('8094','claves','I',NULL,'(4,123123,4)','2015-02-02 10:19:11.625','postgres');
INSERT INTO tbl_audit VALUES ('8095','usuario','D','(4,QWEQWE,1,"",QWEQWE,"",2015-02-02,1,1,weweq,77777777777)',NULL,'2015-02-02 10:28:07.12','postgres');
INSERT INTO tbl_audit VALUES ('8096','claves','D','(4,123123,4)',NULL,'2015-02-02 10:28:07.12','postgres');
INSERT INTO tbl_audit VALUES ('8097','usuario','D','(3,QWEQWE,"","",QWEQWE,"",2015-02-02,1,1,wwww,9999999999)',NULL,'2015-02-02 10:28:07.141','postgres');
INSERT INTO tbl_audit VALUES ('8098','claves','D','(3,123123123,3)',NULL,'2015-02-02 10:28:07.141','postgres');
INSERT INTO tbl_audit VALUES ('8099','usuario','D','(2,AEQWEQW,"","",QWEWEQ,"",2015-02-02,1,1,qwe,1002910345)',NULL,'2015-02-02 10:28:07.142','postgres');
INSERT INTO tbl_audit VALUES ('8100','claves','D','(2,123123123,2)',NULL,'2015-02-02 10:28:07.142','postgres');
INSERT INTO tbl_audit VALUES ('8101','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:29:20.724','postgres');
INSERT INTO tbl_audit VALUES ('8102','claves','I',NULL,'(2,123123,2)','2015-02-02 10:29:20.746','postgres');
INSERT INTO tbl_audit VALUES ('8103','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:29:39.39','postgres');
INSERT INTO tbl_audit VALUES ('8104','claves','D','(2,123123,2)',NULL,'2015-02-02 10:29:39.39','postgres');
INSERT INTO tbl_audit VALUES ('8105','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:36:13.782','postgres');
INSERT INTO tbl_audit VALUES ('8106','claves','I',NULL,'(2,123123,2)','2015-02-02 10:36:13.797','postgres');
INSERT INTO tbl_audit VALUES ('8107','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:38:34.99','postgres');
INSERT INTO tbl_audit VALUES ('8108','claves','D','(2,123123,2)',NULL,'2015-02-02 10:38:34.99','postgres');
INSERT INTO tbl_audit VALUES ('8109','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:38:38.351','postgres');
INSERT INTO tbl_audit VALUES ('8110','claves','I',NULL,'(2,123123,2)','2015-02-02 10:38:38.365','postgres');
INSERT INTO tbl_audit VALUES ('8111','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:39:12.902','postgres');
INSERT INTO tbl_audit VALUES ('8112','claves','D','(2,123123,2)',NULL,'2015-02-02 10:39:12.902','postgres');
INSERT INTO tbl_audit VALUES ('8113','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:39:14.04','postgres');
INSERT INTO tbl_audit VALUES ('8114','claves','I',NULL,'(2,123123,2)','2015-02-02 10:39:14.046','postgres');
INSERT INTO tbl_audit VALUES ('8115','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:39:31.622','postgres');
INSERT INTO tbl_audit VALUES ('8116','claves','D','(2,123123,2)',NULL,'2015-02-02 10:39:31.622','postgres');
INSERT INTO tbl_audit VALUES ('8117','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:39:37.614','postgres');
INSERT INTO tbl_audit VALUES ('8118','claves','I',NULL,'(2,123123,2)','2015-02-02 10:39:37.63','postgres');
INSERT INTO tbl_audit VALUES ('8119','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:41:46.888','postgres');
INSERT INTO tbl_audit VALUES ('8120','claves','D','(2,123123,2)',NULL,'2015-02-02 10:41:46.888','postgres');
INSERT INTO tbl_audit VALUES ('8121','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:41:50.196','postgres');
INSERT INTO tbl_audit VALUES ('8122','claves','I',NULL,'(2,123123,2)','2015-02-02 10:41:50.212','postgres');
INSERT INTO tbl_audit VALUES ('8123','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:42:20.193','postgres');
INSERT INTO tbl_audit VALUES ('8124','claves','D','(2,123123,2)',NULL,'2015-02-02 10:42:20.193','postgres');
INSERT INTO tbl_audit VALUES ('8125','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:42:23.78','postgres');
INSERT INTO tbl_audit VALUES ('8126','claves','I',NULL,'(2,123123,2)','2015-02-02 10:42:23.78','postgres');
INSERT INTO tbl_audit VALUES ('8127','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:44:03.997','postgres');
INSERT INTO tbl_audit VALUES ('8128','claves','D','(2,123123,2)',NULL,'2015-02-02 10:44:03.997','postgres');
INSERT INTO tbl_audit VALUES ('8129','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:44:05.596','postgres');
INSERT INTO tbl_audit VALUES ('8130','claves','I',NULL,'(2,123123,2)','2015-02-02 10:44:05.599','postgres');
INSERT INTO tbl_audit VALUES ('8131','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:46:32.997','postgres');
INSERT INTO tbl_audit VALUES ('8132','claves','D','(2,123123,2)',NULL,'2015-02-02 10:46:32.997','postgres');
INSERT INTO tbl_audit VALUES ('8133','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:46:38.452','postgres');
INSERT INTO tbl_audit VALUES ('8134','claves','I',NULL,'(2,123123,2)','2015-02-02 10:46:38.471','postgres');
INSERT INTO tbl_audit VALUES ('8135','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:47:03.719','postgres');
INSERT INTO tbl_audit VALUES ('8136','claves','D','(2,123123,2)',NULL,'2015-02-02 10:47:03.719','postgres');
INSERT INTO tbl_audit VALUES ('8137','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:47:07.235','postgres');
INSERT INTO tbl_audit VALUES ('8138','claves','I',NULL,'(2,123123,2)','2015-02-02 10:47:07.235','postgres');
INSERT INTO tbl_audit VALUES ('8139','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:48:38.594','postgres');
INSERT INTO tbl_audit VALUES ('8140','claves','D','(2,123123,2)',NULL,'2015-02-02 10:48:38.594','postgres');
INSERT INTO tbl_audit VALUES ('8141','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:48:42.554','postgres');
INSERT INTO tbl_audit VALUES ('8142','claves','I',NULL,'(2,123123,2)','2015-02-02 10:48:42.554','postgres');
INSERT INTO tbl_audit VALUES ('8143','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:48:56.281','postgres');
INSERT INTO tbl_audit VALUES ('8144','claves','D','(2,123123,2)',NULL,'2015-02-02 10:48:56.281','postgres');
INSERT INTO tbl_audit VALUES ('8145','usuario','I',NULL,'(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)','2015-02-02 10:48:59.523','postgres');
INSERT INTO tbl_audit VALUES ('8146','claves','I',NULL,'(2,123123,2)','2015-02-02 10:48:59.538','postgres');
INSERT INTO tbl_audit VALUES ('8147','usuario','D','(2,QWEQWE,"","",QWEQ,"",2015-02-02,1,1,qweq,1002910345)',NULL,'2015-02-02 10:50:52.237','postgres');
INSERT INTO tbl_audit VALUES ('8148','claves','D','(2,123123,2)',NULL,'2015-02-02 10:50:52.237','postgres');
INSERT INTO tbl_audit VALUES ('8149','usuario','U','(1,Admin,,,,,2015-02-02,1,0,admin,999999999)','(1,Admin,,,,,2015-02-03,1,0,admin,999999999)','2015-02-03 09:27:42.048','postgres');
INSERT INTO tbl_audit VALUES ('8150','usuario','U','(1,Admin,,,,,2015-02-03,1,0,admin,999999999)','(1,Admin,,,,,2015-02-03,1,0,admin,999999999)','2015-02-03 09:27:42.679','postgres');
INSERT INTO tbl_audit VALUES ('8151','usuario','U','(1,Admin,,,,,2015-02-03,1,0,admin,999999999)','(1,Admin,,,,,2015-02-03,1,0,admin,999999999)','2015-02-03 14:45:21.389','postgres');
INSERT INTO tbl_audit VALUES ('8152','usuario','U','(1,Admin,,,,,2015-02-03,1,0,admin,999999999)','(1,Admin,,,,,2015-02-03,1,0,admin,999999999)','2015-02-03 14:53:46.329','postgres');
INSERT INTO tbl_audit VALUES ('8153','usuario','U','(1,Admin,,,,,2015-02-03,1,0,admin,999999999)','(1,Admin,,,,,2015-02-04,1,0,admin,999999999)','2015-02-04 09:11:10.001','postgres');
INSERT INTO tbl_audit VALUES ('8154','usuario','U','(1,Admin,,,,,2015-02-04,1,0,admin,999999999)','(1,Admin,,,,,2015-02-05,1,0,admin,999999999)','2015-02-05 12:52:22.22','postgres');
INSERT INTO tbl_audit VALUES ('8155','usuario','U','(1,Admin,,,,,2015-02-05,1,0,admin,999999999)','(1,Admin,,,,,2015-02-06,1,0,admin,999999999)','2015-02-06 10:59:54.654','postgres');
INSERT INTO tbl_audit VALUES ('8156','usuario','U','(1,Admin,,,,,2015-02-06,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 10:48:42.044','postgres');
INSERT INTO tbl_audit VALUES ('8157','usuario','I',NULL,'(2,QWE,"","",123,"",2015-02-09,1,1,qweqwe,1002910345)','2015-02-09 11:32:48.866','postgres');
INSERT INTO tbl_audit VALUES ('8158','claves','I',NULL,'(2,123123,2)','2015-02-09 11:32:49.022','postgres');
INSERT INTO tbl_audit VALUES ('8159','usuario','I',NULL,'(3,QWE,"","",123,"",2015-02-09,1,1,wwwww,9999999999)','2015-02-09 11:33:10.875','postgres');
INSERT INTO tbl_audit VALUES ('8160','claves','I',NULL,'(3,123123,3)','2015-02-09 11:33:10.882','postgres');
INSERT INTO tbl_audit VALUES ('8161','usuario','D','(3,QWE,"","",123,"",2015-02-09,1,1,wwwww,9999999999)',NULL,'2015-02-09 11:33:24.452','postgres');
INSERT INTO tbl_audit VALUES ('8162','claves','D','(3,123123,3)',NULL,'2015-02-09 11:33:24.452','postgres');
INSERT INTO tbl_audit VALUES ('8163','usuario','D','(2,QWE,"","",123,"",2015-02-09,1,1,qweqwe,1002910345)',NULL,'2015-02-09 11:33:24.546','postgres');
INSERT INTO tbl_audit VALUES ('8164','claves','D','(2,123123,2)',NULL,'2015-02-09 11:33:24.546','postgres');
INSERT INTO tbl_audit VALUES ('8165','usuario','I',NULL,'(2,QWE,"","",123,"",2015-02-09,1,1,wwwww,9999999999)','2015-02-09 11:33:31.48','postgres');
INSERT INTO tbl_audit VALUES ('8166','claves','I',NULL,'(2,123123,2)','2015-02-09 11:33:31.486','postgres');
INSERT INTO tbl_audit VALUES ('8167','usuario','D','(2,QWE,"","",123,"",2015-02-09,1,1,wwwww,9999999999)',NULL,'2015-02-09 11:33:39.608','postgres');
INSERT INTO tbl_audit VALUES ('8168','claves','D','(2,123123,2)',NULL,'2015-02-09 11:33:39.608','postgres');
INSERT INTO tbl_audit VALUES ('8169','usuario','I',NULL,'(2,QWE,"","",123,"",2015-02-09,1,1,wwwww,9999999999)','2015-02-09 11:33:46.912','postgres');
INSERT INTO tbl_audit VALUES ('8170','claves','I',NULL,'(2,123123,2)','2015-02-09 11:33:46.918','postgres');
INSERT INTO tbl_audit VALUES ('8171','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:07:13.393','postgres');
INSERT INTO tbl_audit VALUES ('8172','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:10:34.548','postgres');
INSERT INTO tbl_audit VALUES ('8173','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:13:45.864','postgres');
INSERT INTO tbl_audit VALUES ('8174','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:13:46.389','postgres');
INSERT INTO tbl_audit VALUES ('8175','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:13:49.707','postgres');
INSERT INTO tbl_audit VALUES ('8176','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:13:57.038','postgres');
INSERT INTO tbl_audit VALUES ('8177','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:14:19.883','postgres');
INSERT INTO tbl_audit VALUES ('8178','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:14:23.675','postgres');
INSERT INTO tbl_audit VALUES ('8179','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:14:28.803','postgres');
INSERT INTO tbl_audit VALUES ('8180','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:14:38.683','postgres');
INSERT INTO tbl_audit VALUES ('8181','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:16:50.05','postgres');
INSERT INTO tbl_audit VALUES ('8182','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:17:40.943','postgres');
INSERT INTO tbl_audit VALUES ('8183','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:17:43.717','postgres');
INSERT INTO tbl_audit VALUES ('8184','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:18:07.9','postgres');
INSERT INTO tbl_audit VALUES ('8185','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:18:13.931','postgres');
INSERT INTO tbl_audit VALUES ('8186','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:18:22.182','postgres');
INSERT INTO tbl_audit VALUES ('8187','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:18:44.564','postgres');
INSERT INTO tbl_audit VALUES ('8188','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:18:47.614','postgres');
INSERT INTO tbl_audit VALUES ('8189','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:18:48.108','postgres');
INSERT INTO tbl_audit VALUES ('8190','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:18:54.149','postgres');
INSERT INTO tbl_audit VALUES ('8191','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:19:21.81','postgres');
INSERT INTO tbl_audit VALUES ('8192','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:19:46.594','postgres');
INSERT INTO tbl_audit VALUES ('8193','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:20:04.756','postgres');
INSERT INTO tbl_audit VALUES ('8194','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:22:29.103','postgres');
INSERT INTO tbl_audit VALUES ('8195','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:41:39.403','postgres');
INSERT INTO tbl_audit VALUES ('8196','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:41:59.49','postgres');
INSERT INTO tbl_audit VALUES ('8197','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:42:16.752','postgres');
INSERT INTO tbl_audit VALUES ('8198','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:42:30.065','postgres');
INSERT INTO tbl_audit VALUES ('8199','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:42:44.774','postgres');
INSERT INTO tbl_audit VALUES ('8200','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:43:13.257','postgres');
INSERT INTO tbl_audit VALUES ('8201','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:43:30.626','postgres');
INSERT INTO tbl_audit VALUES ('8202','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 12:44:07.403','postgres');
INSERT INTO tbl_audit VALUES ('8203','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 13:02:36.994','postgres');
INSERT INTO tbl_audit VALUES ('8204','usuarios_permisos','U','(1,1,"{1,1,1,1}","{1,1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0}")','(1,1,"{1,1,1,1}","{1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1}")','2015-02-09 13:03:05.112','postgres');
INSERT INTO tbl_audit VALUES ('8205','usuario','U','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','(1,Admin,,,,,2015-02-09,1,0,admin,999999999)','2015-02-09 13:03:10.959','postgres');
INSERT INTO tbl_audit VALUES ('8206','usuario','D','(2,QWE,"","",123,"",2015-02-09,1,1,wwwww,9999999999)',NULL,'2015-02-09 13:07:28.494','postgres');
INSERT INTO tbl_audit VALUES ('8207','usuarios_permisos','D','(2,2,"{1,1,1,1}","{1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1}")',NULL,'2015-02-09 13:07:28.494','postgres');
INSERT INTO tbl_audit VALUES ('8208','claves','D','(2,123123,2)',NULL,'2015-02-09 13:07:28.494','postgres');
INSERT INTO tbl_audit VALUES ('8209','c_x_cobrar','D','(1,3,1,2015-01-22,2015-01-22,1,"Emisión de Permisos / Ventas",11,12.00,0)',NULL,'2015-02-09 13:07:36.262','postgres');
INSERT INTO tbl_audit VALUES ('8210','detalles_cxc','D','(1,1,2015-01-22,1,"Abono Inicial",Efectivo,1)',NULL,'2015-02-09 13:07:36.262','postgres');
INSERT INTO tbl_audit VALUES ('8211','detalle_devolucion_venta','D','(1,6,1,12,1,12.00,0)',NULL,'2015-02-09 13:07:47.19','postgres');
INSERT INTO tbl_audit VALUES ('8212','detalles_emision','D','(1,PRODUCTO,"","",1,1,12,12.00,3,QWEQWE)',NULL,'2015-02-09 13:07:54.198','postgres');
INSERT INTO tbl_audit VALUES ('8213','detalles_fc','D','(1,1,22,12,264.00,1)',NULL,'2015-02-09 13:07:59.278','postgres');


--
-- Creating index for 'tbl_audit'
--

ALTER TABLE ONLY  tbl_audit  ADD CONSTRAINT  pk_audit  PRIMARY KEY  (pk_audit);

--
-- Estrutura de la tabla 'tipo_pago'
--

DROP TABLE tipo_pago CASCADE;
CREATE TABLE tipo_pago (
id_tipo_pago int4 NOT NULL,
tipo_pago text,
 estado text
);

--
-- Creating data for 'tipo_pago'
--

INSERT INTO tipo_pago VALUES ('1','CONTADO','1');
INSERT INTO tipo_pago VALUES ('2','CREDITO','1');


--
-- Creating index for 'tipo_pago'
--

ALTER TABLE ONLY  tipo_pago  ADD CONSTRAINT  tipo_pago_pkey  PRIMARY KEY  (id_tipo_pago);

--
-- Estrutura de la tabla 'tipo_usuario'
--

DROP TABLE tipo_usuario CASCADE;
CREATE TABLE tipo_usuario (
id_tipo_usuario int4 NOT NULL,
nombre_tipo text,
 estado_tipo text
);

--
-- Creating data for 'tipo_usuario'
--

INSERT INTO tipo_usuario VALUES ('1','Administrador','0');
INSERT INTO tipo_usuario VALUES ('2','Tecnico(a)','1');
INSERT INTO tipo_usuario VALUES ('3','Bombero(a)','1');
INSERT INTO tipo_usuario VALUES ('4','Inspector(a)','1');


--
-- Creating index for 'tipo_usuario'
--

ALTER TABLE ONLY  tipo_usuario  ADD CONSTRAINT  tipo_usuario_pkey  PRIMARY KEY  (id_tipo_usuario);

--
-- Estrutura de la tabla 'usuario'
--

DROP TABLE usuario CASCADE;
CREATE TABLE usuario (
id_usuario int4 NOT NULL,
nombre_usuario text,
telefono_usuario text,
celular_usuario text,
direccion_usuario text,
mail_usuario text,
fecha_usuario date,
id_tipo_usuario int4,
estado_usuario int4,
nick_usuario text,
 ci_usuario text
);

--
-- Creating data for 'usuario'
--

INSERT INTO usuario VALUES ('1','Admin',NULL,NULL,NULL,NULL,'2015-02-09','1','0','admin','999999999');


--
-- Creating index for 'usuario'
--

ALTER TABLE ONLY  usuario  ADD CONSTRAINT  usuario_pkey  PRIMARY KEY  (id_usuario);


--
-- Creating relacionships for 'c_x_cobrar'
--

ALTER TABLE ONLY c_x_cobrar ADD CONSTRAINT fk_emisionPermisos_cxc FOREIGN KEY (id_emsion_permisos) REFERENCES emision_permisos(id_emision) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'claves'
--

ALTER TABLE ONLY claves ADD CONSTRAINT r_clave_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'detalles_cxc'
--

ALTER TABLE ONLY detalles_cxc ADD CONSTRAINT fk_detallecxc_cxc FOREIGN KEY (id_cxc) REFERENCES c_x_cobrar(id_cxc) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'detalles_emision'
--

ALTER TABLE ONLY detalles_emision ADD CONSTRAINT fk_detalle_emision FOREIGN KEY (id_emsion) REFERENCES emision_permisos(id_emision) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'detalles_fc'
--

ALTER TABLE ONLY detalles_fc ADD CONSTRAINT fk_fc_dfc FOREIGN KEY (id_fc) REFERENCES factura_compra(id_fc) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'detalles_permiso'
--

ALTER TABLE ONLY detalles_permiso ADD CONSTRAINT fk_permisos_detalles FOREIGN KEY (id_permiso) REFERENCES permisos(id_permisos) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'devolucion_venta'
--

ALTER TABLE ONLY devolucion_venta ADD CONSTRAINT fk_emision_devolucionVenta FOREIGN KEY (id_emision) REFERENCES emision_permisos(id_emision) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'emision_permisos'
--

ALTER TABLE ONLY emision_permisos ADD CONSTRAINT fk_tipoPago_emsion FOREIGN KEY (id_tipo_pago) REFERENCES tipo_pago(id_tipo_pago) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'empresa'
--

ALTER TABLE ONLY empresa ADD CONSTRAINT fk_propietario_empresa FOREIGN KEY (id_propietario) REFERENCES propietario(id_propietario) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'factura_compra'
--

ALTER TABLE ONLY factura_compra ADD CONSTRAINT fk_fc_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'informe_confirmar'
--

ALTER TABLE ONLY informe_confirmar ADD CONSTRAINT fk_usuario_reporteConfirmar FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'informe_confirmar'
--

ALTER TABLE ONLY informe_confirmar ADD CONSTRAINT fk_informeGeneral_informeConfirmar FOREIGN KEY (id_informe_general) REFERENCES informe_general(id_informe_general) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'informe_general'
--

ALTER TABLE ONLY informe_general ADD CONSTRAINT fk_empresa_informe FOREIGN KEY (id_empresa) REFERENCES empresa(id_empresa) ON UPDATE CASCADE ON DELETE CASCADE DEFERRABLE;

--
-- Creating relacionships for 'informe_incendios'
--

ALTER TABLE ONLY informe_incendios ADD CONSTRAINT fk_informeGeneral_riesgoIncendio FOREIGN KEY (id_informe_general) REFERENCES informe_general(id_informe_general) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'informe_prevencion'
--

ALTER TABLE ONLY informe_prevencion ADD CONSTRAINT fk_informeGeneral_Prevencion FOREIGN KEY (id_informe_general) REFERENCES informe_general(id_informe_general) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'informe_proteccion'
--

ALTER TABLE ONLY informe_proteccion ADD CONSTRAINT fk_informeGeneral_informeProteccion FOREIGN KEY (id_informe_general) REFERENCES informe_general(id_informe_general) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'tasa_servicio'
--

ALTER TABLE ONLY tasa_servicio ADD CONSTRAINT fk_servicio_tasaServicio FOREIGN KEY (id_servicio) REFERENCES servicios_administrativos(id_servicio) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'usuario'
--

ALTER TABLE ONLY usuario ADD CONSTRAINT fk_tipoUsuario_usuario FOREIGN KEY (id_tipo_usuario) REFERENCES tipo_usuario(id_tipo_usuario) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Creating relacionships for 'usuarios_permisos'
--

ALTER TABLE ONLY usuarios_permisos ADD CONSTRAINT fk_usuarios_permisosUser FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;
--
-- Estrutura de la tabla 'usuarios_permisos'
--

DROP TABLE usuarios_permisos CASCADE;
CREATE TABLE usuarios_permisos (
id_usuario_permiso int4 NOT NULL,
id_usuario int4,
estados_principales _int4,
 estados_segundarios _int4
);

--
-- Creating data for 'usuarios_permisos'
--

INSERT INTO usuarios_permisos VALUES ('1','1','{1,1,1,1}','{1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1}');


--
-- Creating index for 'usuarios_permisos'
--

ALTER TABLE ONLY  usuarios_permisos  ADD CONSTRAINT  usuarios_permisos_pkey  PRIMARY KEY  (id_usuario_permiso);

--
-- Estrutura de la tabla 'detalles_permiso'
--

DROP TABLE detalles_permiso CASCADE;
CREATE TABLE detalles_permiso (
id_detalle_permiso int4 NOT NULL,
id_permiso int4,
nro_detalle text,
nombre_detalle text,
 estado_detalle text
);

--
-- Creating data for 'detalles_permiso'
--

INSERT INTO detalles_permiso VALUES ('1','1','1.1','Inicio','1');
INSERT INTO detalles_permiso VALUES ('2','1','1.2','Servicios Administrativos','1');
INSERT INTO detalles_permiso VALUES ('3','1','1.3','Tasa Servicios','1');
INSERT INTO detalles_permiso VALUES ('4','1','1.4','Propietario','1');
INSERT INTO detalles_permiso VALUES ('5','1','1.5','Empresas','1');
INSERT INTO detalles_permiso VALUES ('6','1','1.6','Informe General','1');
INSERT INTO detalles_permiso VALUES ('7','1','1.7','Reportes','1');
INSERT INTO detalles_permiso VALUES ('8','2','2.1','Ingreso Propietarios','1');
INSERT INTO detalles_permiso VALUES ('9','2','2.2','Emision Permisos','1');
INSERT INTO detalles_permiso VALUES ('10','2','2.3','Notas de Credito','1');
INSERT INTO detalles_permiso VALUES ('11','2','2.4','Cuentas por cobrar','1');
INSERT INTO detalles_permiso VALUES ('12','2','2.5','Reporte Ventas','1');
INSERT INTO detalles_permiso VALUES ('13','3','3.1','Compras','1');
INSERT INTO detalles_permiso VALUES ('14','3','3.2','Reporte Compras','1');
INSERT INTO detalles_permiso VALUES ('15','4','4.1','Ingreso Usuarios','1');
INSERT INTO detalles_permiso VALUES ('16','4','4.2','Backup','1');
INSERT INTO detalles_permiso VALUES ('17','4','4.3','Reporte Generales','1');
INSERT INTO detalles_permiso VALUES ('18','4','4.4','Subir Informacion','1');
INSERT INTO detalles_permiso VALUES ('19','4','4.5','Permisos','1');


--
-- Creating index for 'detalles_permiso'
--

ALTER TABLE ONLY  detalles_permiso  ADD CONSTRAINT  detalles_permiso_pkey  PRIMARY KEY  (id_detalle_permiso);

--
-- Estrutura de la tabla 'permisos'
--

DROP TABLE permisos CASCADE;
CREATE TABLE permisos (
id_permisos int4 NOT NULL,
nro_permiso int4,
nombre_permiso text,
 estado_permiso text
);

--
-- Creating data for 'permisos'
--

INSERT INTO permisos VALUES ('1','1','Datos Generales','1');
INSERT INTO permisos VALUES ('2','2','Facturacion','1');
INSERT INTO permisos VALUES ('3','3','Gastos','1');
INSERT INTO permisos VALUES ('4','4','Administracion','1');


--
-- Creating index for 'permisos'
--

ALTER TABLE ONLY  permisos  ADD CONSTRAINT  permisos_pkey  PRIMARY KEY  (id_permisos);

CREATE TRIGGER c_x_cobrar_tg_audit AFTER INSERT OR UPDATE OR DELETE ON c_x_cobrar FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER claves_tg_audit AFTER INSERT OR UPDATE OR DELETE ON claves FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER detalle_devolucion_venta_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalle_devolucion_venta FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER detalles_cxc_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalles_cxc FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER detalles_emision_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalles_emision FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER detalles_fc_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalles_fc FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER devolucion_venta_tg_audit AFTER INSERT OR UPDATE OR DELETE ON devolucion_venta FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER emision_permisos_tg_audit AFTER INSERT OR UPDATE OR DELETE ON emision_permisos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER empresa_tg_audit AFTER INSERT OR UPDATE OR DELETE ON empresa FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER factura_compra_tg_audit AFTER INSERT OR UPDATE OR DELETE ON factura_compra FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER informe_confirmar_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_confirmar FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER informe_general_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_general FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER informe_incendios_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_incendios FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER informe_prevencion_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_prevencion FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER informe_proteccion_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_proteccion FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER productos_tg_audit AFTER INSERT OR UPDATE OR DELETE ON productos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER propietario_tg_audit AFTER INSERT OR UPDATE OR DELETE ON propietario FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER servicios_administrativos_tg_audit AFTER INSERT OR UPDATE OR DELETE ON servicios_administrativos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER tasa_servicio_tg_audit AFTER INSERT OR UPDATE OR DELETE ON tasa_servicio FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER tipo_pago_tg_audit AFTER INSERT OR UPDATE OR DELETE ON tipo_pago FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER tipo_usuario_tg_audit AFTER INSERT OR UPDATE OR DELETE ON tipo_usuario FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER usuario_tg_audit AFTER INSERT OR UPDATE OR DELETE ON usuario FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER usuarios_permisos_tg_audit AFTER INSERT OR UPDATE OR DELETE ON usuarios_permisos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER detalles_permiso_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalles_permiso FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();
CREATE TRIGGER permisos_permiso_tg_audit AFTER INSERT OR UPDATE OR DELETE ON permisos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();