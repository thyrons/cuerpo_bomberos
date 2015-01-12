function buscar_servicios(width){
	jQuery("#tabla_busquedas").jqGrid({
        datatype: "xml",
        url: '../servidor/serviciosAdministrativos/xml_servicios.php',        
        colNames: ['ID','SERVICIOS'],
        colModel:[      
            {name:'id_servicio',index:'id_servicio',frozen:true,align:'left',search:false},
            {name:'nombre_servicio',index:'nombre_servicio',frozen : true,align:'left',search:true},
        ],          
        rowNum: 10,
        autowidth: true, 
        width: '100%', 
        shrinkToFit: true,
        height:200,
        rowList: [10,20,30],
        pager: jQuery('#pager'),        
        sortname: 'id_servicio',
        sortordezr: 'asc',
        caption: 'LISTA DE SERVICIOS ADMINISTRATIVOS',
        viewrecords: true,            
        ondblClickRow: function(rowid) {     
            var gsr = jQuery("#tabla_busquedas").jqGrid('getGridParam','selrow');         
            jQuery("#tabla_busquedas").jqGrid('GridToForm',gsr,"#form_serviciosAdministrativos");  
            $('#modalBusquedas').modal('hide');
            comprobarCamposRequired("form_serviciosAdministrativos");  
            $("#btn_guardarServicios").text("");
            $("#btn_guardarServicios").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     
            
        }
    }).jqGrid('navGrid','#pager',{
            add:false,
            edit:false,
            del:false,           
            refresh:true,
            search:true,
            view:false        
    },
    {
        recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
    },
    {
        reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
    },
    {
        closeOnEscape: true
    },
    {
        closeOnEscape: true,        
        multipleSearch: false, overlay: false

    },
    {
    },
    {
        closeOnEscape: true
    }
    ); 
    //jQuery("#tabla_busquedas").jqGrid('setFrozenColumns');
}
function buscar_tasaServicios(width){
    jQuery("#tabla_busquedas").jqGrid({
        datatype: "xml",
        url: '../servidor/tasasServicios/xml_tasasServicios.php',        
        colNames: ['ID','SERVICIOS','TIPO','PEQUEÑO','MEDIANO','GRANDE','S. GRANDE','id_servicio'],
        colModel:[      
            {name:'id_tasa_servicio',index:'id_tasa_servicio',frozen:true,align:'left',search:false},
            {name:'nombre_servicio',index:'nombre_servicio',frozen : true,align:'left',search:true},
            {name:'nombre_tasa',index:'nombre_tasa',frozen : true,align:'left',search:true},
            {name:'little',index:'little',frozen : true,align:'left',search:true},
            {name:'medium',index:'medium',frozen : true,align:'left',search:true},
            {name:'big',index:'big',frozen : true,align:'left',search:true},
            {name:'sbig',index:'sbig',frozen : true,align:'left',search:true},
            {name:'id_servicio',index:'id_servicio',frozen : true,align:'left',search:true},
        ],          
        rowNum: 10,
        autowidth: true, 
        width: '100%', 
        shrinkToFit: false,
        height:200,
        rowList: [10,20,30],
        pager: jQuery('#pager'),        
        sortname: 'id_tasa_servicio',
        sortordezr: 'asc',
        caption: 'TASA POR SERVICIO ADMINISTRATIVO',
        viewrecords: true,            
        ondblClickRow: function(rowid) {     
            var gsr = jQuery("#tabla_busquedas").jqGrid('getGridParam','selrow');         
            jQuery("#tabla_busquedas").jqGrid('GridToForm',gsr,"#tasa_servicio");  
            $('#modalBusquedas').modal('hide');
            comprobarCamposRequired("tasa_servicio");  
            $("#btn_guardarTasaServicios").text("");
            $("#btn_guardarTasaServicios").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     
            
        }
    }).jqGrid('navGrid','#pager',{
            add:false,
            edit:false,
            del:false,           
            refresh:true,
            search:true,
            view:false        
    },
    {
        recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
    },
    {
        reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
    },
    {
        closeOnEscape: true
    },
    {
        closeOnEscape: true,        
        multipleSearch: false, overlay: false

    },
    {
    },
    {
        closeOnEscape: true
    }
    ); 
    //jQuery("#tabla_busquedas").jqGrid('setFrozenColumns');
    jQuery("#tabla_busquedas").jqGrid('hideCol', "id_servicio");
}
function buscar_usuarios(width){
    jQuery("#tabla_busquedas").jqGrid({
        datatype: "xml",
        url: '../servidor/usuarios/xml_usuarios.php',        
        colNames: ['ID','CI','NOMBRES','USUARIO','TIPO USUARIO','TÉLEFONO','CELULAR','DIRECCIÓN','E-MAIL','id_tipo_usuario','id_clave','nombre_clave'],
        colModel:[      
            {name:'id_usuario',index:'id_usuario',frozen:true,align:'left',search:false},
            {name:'ci_usuario',index:'ci_usuario',frozen : true,align:'left',search:true},
            {name:'nombre_usuario',index:'nombre_usuario',frozen : true,align:'left',search:true},
            {name:'nick_usuario',index:'nick_usuario',frozen : true,align:'left',search:true},
            {name:'nombre_tipo',index:'nombre_tipo',frozen : true,align:'left',search:true},
            {name:'telefono_usuario',index:'telefono_usuario',frozen : true,align:'left',search:true},
            {name:'celular_usuario',index:'celular_usuario',frozen : true,align:'left',search:true},
            {name:'direccion_usuario',index:'direccion_usuario',frozen : true,align:'left',search:true},
            {name:'mail_usuario',index:'mail_usuario',frozen : true,align:'left',search:true},
            {name:'id_tipo_usuario',index:'id_tipo_usuario',frozen : true,align:'left',search:true},
            {name:'id_clave',index:'id_clave',frozen : true,align:'left',search:true},
            {name:'nombre_clave',index:'nombre_clave',frozen : true,align:'left',search:true},
        ],          
        rowNum: 10,
        autowidth: true, 
        width: '100%', 
        shrinkToFit: false,
        height:200,
        rowList: [10,20,30],
        pager: jQuery('#pager'),        
        sortname: 'usuario.id_usuario',
        sortordezr: 'asc',
        caption: 'LISTA DE USUARIOS',
        viewrecords: true,            
        ondblClickRow: function(rowid) {     
            var gsr = jQuery("#tabla_busquedas").jqGrid('getGridParam','selrow');         
            jQuery("#tabla_busquedas").jqGrid('GridToForm',gsr,"#usuarios");  
            $('#modalBusquedas').modal('hide');
            comprobarCamposRequired("usuarios");  
            $("#btn_guardarUsuarios").text("");
            $("#btn_guardarUsuarios").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     
            
        }
    }).jqGrid('navGrid','#pager',{
            add:false,
            edit:false,
            del:false,           
            refresh:true,
            search:true,
            view:false        
    },
    {
        recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
    },
    {
        reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
    },
    {
        closeOnEscape: true
    },
    {
        closeOnEscape: true,        
        multipleSearch: false, overlay: false

    },
    {
    },
    {
        closeOnEscape: true
    }
    ); 
    //jQuery("#tabla_busquedas").jqGrid('setFrozenColumns');
    jQuery("#tabla_busquedas").jqGrid('hideCol', "id_usuario");
    jQuery("#tabla_busquedas").jqGrid('hideCol', "id_tipo_usuario");
    jQuery("#tabla_busquedas").jqGrid('hideCol', "id_clave");
    jQuery("#tabla_busquedas").jqGrid('hideCol', "nombre_clave");
}
function buscar_propietarios(width){
    jQuery("#tabla_busquedas").jqGrid({
        datatype: "xml",
        url: '../servidor/propietarios/xml_propietarios.php',        
        colNames: ['ID','RUC','NOMBRES','DIRECCIÓN','TÉLEFONO','CELULAR'],
        colModel:[      
            {name:'id_propietario',index:'id_propietario',frozen:true,align:'left',search:false},
            {name:'ruc_propietario',index:'ruc_propietario',frozen : true,align:'left',search:true},
            {name:'nombre_propietario',index:'nombre_propietario',frozen : true,align:'left',search:true},
            {name:'direccion_propietario',index:'direccion_propietario',frozen : true,align:'left',search:true},
            {name:'telefono_propietario',index:'telefono_propietario',frozen : true,align:'left',search:true},
            {name:'celular_propietario',index:'celular_propietario',frozen : true,align:'left',search:true},
        ],          
        rowNum: 10,
        autowidth: true, 
        width: '100%', 
        shrinkToFit: false,
        height:200,
        rowList: [10,20,30],
        pager: jQuery('#pager'),        
        sortname: 'id_propietario',
        sortordezr: 'asc',
        caption: 'LISTA DE PROPIETARIOS',
        viewrecords: true,            
        ondblClickRow: function(rowid) {     
            var gsr = jQuery("#tabla_busquedas").jqGrid('getGridParam','selrow');         
            jQuery("#tabla_busquedas").jqGrid('GridToForm',gsr,"#form_propietarios");  
            $('#modalBusquedas').modal('hide');
            comprobarCamposRequired("form_propietarios");  
            $("#btn_guardarPropietarios").text("");
            $("#btn_guardarPropietarios").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     
            
        }
    }).jqGrid('navGrid','#pager',{
            add:false,
            edit:false,
            del:false,           
            refresh:true,
            search:true,
            view:false        
    },
    {
        recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
    },
    {
        reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
    },
    {
        closeOnEscape: true
    },
    {
        closeOnEscape: true,        
        multipleSearch: false, overlay: false

    },
    {
    },
    {
        closeOnEscape: true
    }
    ); 
    //jQuery("#tabla_busquedas").jqGrid('setFrozenColumns');
    jQuery("#tabla_busquedas").jqGrid('hideCol', "id_propietario");
}
function buscar_informe(width){
    jQuery("#tabla_busquedas").jqGrid({
        datatype: "xml",
        url: '../servidor/informe/xml_informe.php',        
        colNames: ['id_informe_general','Se Otorga Permiso','id_empresa','Empresa','RUC','Representante','Actividad','Parroquia','Capital Giro','Dirección','Télefono','Servicio',
                    'Tasa por servicio','Valor Tasa','13','14','15','16','17','18','19','20',
                    '21','22','23','24','25','26','27','28','29','30',
                    '31','32','33','34','35','36','37','38','39','40',
                    '41','42','43','44','45','46','47','48','49','50',
                    '51','52','53','54','55','56','57','58','59','60',
                    '61','62','63','64','65','66','67','68','69','70',
                    '71','72','73','74','75','76','77','78','79','80',
                    '81','82','83','84','85','86','87','88','89','90',
                    '91','92','93','94','95','96','97','98','99','100',
                    '101','102','103','104','105','106','107','108','109','110',
                    '111','112','113','114','115','116','117','118','119','120',
                    '121','122','123','124','125','126','127','128','129','130',
                    '131','132','133','134','135','136','137','138','139','140',
                    '141','142','143','144','145','146','147','148','149','150',
                    '151','152','153','154','155','156','157','158','159'],
                    
        colModel:[      
            {name:'id_informe_empresa',index:'id_informe_empresa',frozen:true,align:'center',search:false,hidden:true},
            {name:'check_permiso',index:'check_permiso',frozen : true,align:'center',search:true},
            {name:'id_empresa',index:'id_empresa',frozen : true,align:'center',search:true,hidden:true},
            {name:'razon_social',index:'razon_social',frozen : true,align:'center',search:true},
            {name:'ruc_informe',index:'ruc_informe',frozen : true,align:'center',search:true},
            {name:'nombres_propietario',index:'nombres_propietario',frozen : true,align:'center',search:true},
            {name:'actividad',index:'actividad',frozen : true,align:'center',search:true},
            {name:'ubicacion',index:'ubicacion',frozen : true,align:'center',search:true},
            {name:'capitalG',index:'capitalG',frozen : true,align:'center',search:true},
            {name:'direccion',index:'direccion',frozen : true,align:'center',search:true},
            {name:'telefono',index:'telefono',frozen:true,align:'center',search:false},
            {name:'id_inputTasa',index:'id_inputTasa',frozen : true,align:'center',search:true},
            {name:'input_tasa',index:'input_tasa',frozen : true,align:'center',search:true},
            {name:'select_valor_i',index:'select_valor_i',frozen : true,align:'center',search:true},
            {name:'area_util',index:'area_util',frozen : true,align:'center',search:true,hidden:true},
            {name:'pe',index:'pe',frozen : true,align:'center',search:true,hidden:true},
            {name:'mmr',index:'mmr',frozen : true,align:'left',search:true,hidden:true},
            {name:'riesgo',index:'riesgo',frozen : true,align:'left',search:true,hidden:true},
            {name:'area_total',index:'area_total',frozen : true,align:'left',search:true,hidden:true},
            {name:'visible',index:'visible',frozen : true,align:'left',search:true,hidden:true},
            {name:'solicitud_nro',index:'solicitud_nro',frozen : true,align:'left',search:true,hidden:true},
            {name:'ocupantes_fijos',index:'ocupantes_fijos',frozen:true,align:'left',search:false,hidden:true},
            {name:'flotantes',index:'flotantes',frozen : true,align:'left',search:true,hidden:true},
            {name:'aforo',index:'23',frozen : true,align:'left',search:true,hidden:true},
            {name:'tipo_construccion',index:'tipo_construccion',frozen : true,align:'left',search:true,hidden:true},
            {name:'techo_cubierta',index:'techo_cubierta',frozen : true,align:'left',search:true,hidden:true},
            {name:'radio_ventilacion',index:'radio_ventilacion',frozen : true,align:'left',search:true,hidden:true},
            {name:'disposicion',index:'disposicion',frozen : true,align:'left',search:true,hidden:true},
            {name:'fecha_general',index:'fecha_general',frozen : true,align:'left',search:true,hidden:true},
            {name:'hora_inicio',index:'hora_inicio',frozen : true,align:'left',search:true,hidden:true},
            {name:'hora_final',index:'hora_final',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_inspeccion',index:'check_inspeccion',frozen:true,align:'left',search:false,hidden:true},            
            {name:'radio_extintor',index:'radio_extintor',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_1',index:'check_incendio_1',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_2',index:'check_incendio_2',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_3',index:'check_incendio_3',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_4',index:'check_incendio_4',frozen : true,align:'left',search:true,hidden:true},
            {name:'disposicionI1',index:'disposicionI1',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantI1',index:'cantI1',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_5',index:'check_incendio_5',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_6',index:'check_incendio_6',frozen:true,align:'left',search:false,hidden:true},
            {name:'check_incendio_7',index:'check_incendio_7',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_8',index:'check_incendio_8',frozen : true,align:'left',search:true,hidden:true},
            {name:'disposicionI2',index:'disposicionI2',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantI2',index:'cantI2',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_9',index:'check_incendio_9',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_10',index:'check_incendio_10',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_11',index:'check_incendio_11',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_12',index:'check_incendio_12',frozen : true,align:'left',search:true,hidden:true},
            {name:'disposicionI3',index:'disposicionI3',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantI3',index:'cantI3',frozen:true,align:'left',search:false,hidden:true},
            {name:'check_incendio_13',index:'check_incendio_13',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_14',index:'check_incendio_14',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_15',index:'check_incendio_15',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_16',index:'check_incendio_16',frozen : true,align:'left',search:true,hidden:true},
            {name:'disposicionI4',index:'disposicionI4',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantI4',index:'cantI4',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_17',index:'check_incendio_17',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_18',index:'check_incendio_18',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_19',index:'check_incendio_19',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_incendio_20',index:'check_incendio_20',frozen:true,align:'left',search:false,hidden:true},
            {name:'disposicionI5',index:'disposicionI5',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantI5',index:'cantI5',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP1',index:'cantP1',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_1',index:'check_prev_1',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA1',index:'cantPA1',frozen : true,align:'left',search:true,hidden:true},            
            {name:'lugarP1',index:'lugarP1',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP2',index:'cantP2',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_2',index:'check_prev_2',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA2',index:'cantPA2',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP2',index:'lugarP2',frozen:true,align:'left',search:false,hidden:true},
            {name:'cantP3',index:'cantP3',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_3',index:'check_prev_3',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA3',index:'cantPA3',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP3',index:'lugarP3',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP4',index:'cantP4',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_4',index:'check_prev_4',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA4',index:'cantPA4',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP4',index:'lugarP4',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP5',index:'cantP5',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_5',index:'81',frozen:true,align:'left',search:false,hidden:true},
            {name:'cantPA5',index:'cantPA5',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP5',index:'lugarP5',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP6',index:'cantP6',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_6',index:'check_prev_6',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA6',index:'cantPA6',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP6',index:'lugarP6',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP7',index:'cantP7',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_7',index:'check_prev_7',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA7',index:'cantPA7',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP7',index:'lugarP7',frozen:true,align:'left',search:false,hidden:true},
            {name:'cantP8',index:'cantP8',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_8',index:'check_prev_8',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA8',index:'cantPA8',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP8',index:'lugarP8',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP9',index:'cantP9',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_9',index:'check_prev_9',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA9',index:'cantPA9',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP9',index:'lugarP9',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP10',index:'cantP10',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_10',index:'check_prev_10',frozen:true,align:'left',search:false,hidden:true},
            {name:'cantPA10',index:'cantPA10',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP10',index:'lugarP10',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP11',index:'cantP11',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_11',index:'check_prev_11',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA11',index:'cantPA11',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP11',index:'lugarP11',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP12',index:'cantP12',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_12',index:'check_prev_12',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA12',index:'cantPA12',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP12',index:'lugarP12',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP13',index:'cantP13',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_prev_13',index:'check_prev_13',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA13',index:'cantPA13',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP13',index:'lugarP13',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantP14',index:'cantP14',frozen:true,align:'left',search:false,hidden:true},
            {name:'check_prev_14',index:'check_prev_14',frozen : true,align:'left',search:true,hidden:true},
            {name:'cantPA14',index:'cantPA14',frozen : true,align:'left',search:true,hidden:true},
            {name:'lugarP14',index:'lugarP14',frozen : true,align:'left',search:true,hidden:true},            
            {name:'check_riesgo1',index:'check_riesgo1',frozen : true,align:'left',search:true,hidden:true},
            {name:'observacionesR_1',index:'observacionesR_1',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_riesgo2',index:'check_riesgo2',frozen : true,align:'left',search:true,hidden:true},
            {name:'observacionesR_2',index:'observacionesR_2',frozen:true,align:'left',search:false,hidden:true},
            {name:'check_riesgo3',index:'check_riesgo3',frozen : true,align:'left',search:true,hidden:true},
            {name:'observacionesR_3',index:'observacionesR_3',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_riesgo4',index:'check_riesgo4',frozen : true,align:'left',search:true,hidden:true},
            {name:'observacionesR_4',index:'observacionesR_4',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_riesgo5',index:'check_riesgo5',frozen : true,align:'left',search:true,hidden:true},
            {name:'observacionesR_5',index:'observacionesR_5',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_riesgo6',index:'check_riesgo6',frozen : true,align:'left',search:true,hidden:true},
            {name:'observacionesR_6',index:'observacionesR_6',frozen : true,align:'left',search:true,hidden:true},
            {name:'observacionesR_7',index:'observacionesR_7',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento1',index:'almacenamiento1',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento2',index:'almacenamiento2',frozen:true,align:'left',search:false,hidden:true},
            {name:'check_alma1',index:'check_alma1',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento3',index:'almacenamiento3',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento4',index:'almacenamiento4',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_alma2',index:'check_alma2',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento5',index:'almacenamiento5',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento6',index:'almacenamiento6',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_alma3',index:'check_alma3',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento7',index:'almacenamiento7',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_alma4',index:'check_alma4',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento8',index:'almacenamiento8',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_alma5',index:'check_alma5',frozen:true,align:'left',search:false,hidden:true},
            {name:'almacenamiento9',index:'almacenamiento9',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_alma6',index:'check_alma6',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento10',index:'almacenamiento10',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento11',index:'almacenamiento11',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_alma7',index:'check_alma7',frozen : true,align:'left',search:true,hidden:true},
            {name:'almacenamiento12',index:'almacenamiento12',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_alma8',index:'check_alma8',frozen : true,align:'left',search:true,hidden:true},
            {name:'disposiciones_finales',index:'disposiciones_finales',frozen : true,align:'left',search:true,hidden:true},
            {name:'observaciones_finales',index:'observaciones_finales',frozen : true,align:'left',search:true,hidden:true},
            {name:'resolucion',index:'resolucion',frozen : true,align:'left',search:true,hidden:true},
            {name:'para_extender_permiso',index:'para_extender_permiso',frozen:true,align:'left',search:false,hidden:true},
            {name:'plazo',index:'plazo',frozen : true,align:'left',search:true,hidden:true},
            {name:'check_anexo',index:'check_anexo',frozen : true,align:'left',search:true,hidden:true},
            {name:'nro_registro',index:'nro_registro',frozen : true,align:'left',search:true,hidden:true},
            {name:'fotos',index:'fotos',frozen : true,align:'left',search:true,hidden:true},                                    
            {name:'documentos_adjuntos',index:'documentos_adjuntos',frozen : true,align:'left',search:true,hidden:true},                                                
            
        ],          
        rowNum: 10,
        autowidth: true, 
        width: '100%', 
        shrinkToFit: false,
        height:200,
        rowList: [10,20,30],
        pager: jQuery('#pager'),        
        sortname: 'informe_general.id_informe_general',
        sortordezr: 'asc',
        caption: 'LISTA DE INFORMES GENERALES',
        viewrecords: true,            
        ondblClickRow: function(rowid) {     
            var gsr = jQuery("#tabla_busquedas").jqGrid('getGridParam','selrow');                     
            jQuery("#tabla_busquedas").jqGrid('GridToForm',gsr,"#form_informe");              
            var ret = jQuery("#tabla_busquedas").jqGrid('getRowData',gsr);                        
            $("#foto").attr("src","../fotos/"+ret.fotos);
            $("#select_valor").find('option').remove();
            $("#select_valor").load("../servidor/informe/carga_tasaB.php?texto="+ret['select_valor_i']+"&ids="+ret['id_inputTasa']);
                       
            $('#modalBusquedas').modal('hide');
            $("#btn_guardarInforme").text("");
            $("#btn_guardarInforme").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     

        }
    }).jqGrid('navGrid','#pager',{
            add:false,
            edit:false,
            del:false,           
            refresh:true,
            search:true,
            view:false        
    },
    {
        recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
    },
    {
        reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
    },
    {
        closeOnEscape: true
    },
    {
        closeOnEscape: true,        
        multipleSearch: false, overlay: false

    },
    {
    },
    {
        closeOnEscape: true
    }
    );      
    //jQuery("#tabla_busquedas").jqGrid('setFrozenColumns');
}
function buscar_productos(width){
    jQuery("#tabla_busquedas").jqGrid({
        datatype: "xml",
        url: '../servidor/productos/xml_productos.php',        
        colNames: ['ID','PRODUCTO','IVA %','PRECIO COMPRA','PRECIO VENTA','STOCK','STOCK MÍNIMO','STOCK MÁXIMO','CARATERISTÍCAS'],
        colModel:[      
            {name:'id_producto',index:'id_producto',frozen:true,align:'center',search:false},
            {name:'nombre_producto',index:'nombre_producto',frozen : true,align:'left',search:true},
            {name:'tipo_iva',index:'tipo_iva',frozen : true,align:'center',search:false},
            {name:'precio_compraProducto',index:'precio_compraProducto',frozen : true,align:'center',search:false},
            {name:'precio_ventaProducto',index:'precio_ventaProducto',frozen : true,align:'center',search:false},
            {name:'stock_producto',index:'stock_producto',frozen : true,align:'center',search:false},
            {name:'stock_minimoProducto',index:'stock_minimoProducto',frozen : true,align:'center',search:false},
            {name:'stock_maximoProducto',index:'stock_maximoProducto',frozen : true,align:'center',search:false},
            {name:'caracteristicas_producto',index:'caracteristicas_producto',frozen : true,align:'center',search:false},
        ],          
        rowNum: 10,
        autowidth: true, 
        width: '100%', 
        shrinkToFit: false,
        height:200,
        rowList: [10,20,30],
        pager: jQuery('#pager'),        
        sortname: 'id_producto',
        sortordezr: 'asc',
        caption: 'LISTA DE PRODUCTOS',
        viewrecords: true,            
        ondblClickRow: function(rowid) {     
            var gsr = jQuery("#tabla_busquedas").jqGrid('getGridParam','selrow');         
            jQuery("#tabla_busquedas").jqGrid('GridToForm',gsr,"#form_productos");  
            $('#modalBusquedas').modal('hide');
            comprobarCamposRequired("form_productos");  
            $("#btn_guardarProductos").text("");
            $("#btn_guardarProductos").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     
            
        }
    }).jqGrid('navGrid','#pager',{
            add:false,
            edit:false,
            del:false,           
            refresh:true,
            search:true,
            view:false        
    },
    {
        recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
    },
    {
        reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
    },
    {
        closeOnEscape: true
    },
    {
        closeOnEscape: true,        
        multipleSearch: false, overlay: false

    },
    {
    },
    {
        closeOnEscape: true
    }
    ); 
    //jQuery("#tabla_busquedas").jqGrid('setFrozenColumns');
}
function buscar_informes_propietarios(width){
    jQuery("#tabla_busquedas").jqGrid({
        datatype: "xml",
        url: '../servidor/informe/informes.php?id_prop='+$("#id_emisionPropietario").val(),                
        colNames: ['id_informe_general','id_empresa','EMPRESA','REPRESENTATE','ACTIVIDAD','RUC','TASA','NOMBRE TASA','VALOR','FEHCA','PERMISO'],
        colModel:[      
            {name:'id_informe_general',index:'id_informe_general',frozen:true,align:'center',search:false},
            {name:'id_empresa',index:'id_empresa',frozen : true,align:'left',search:true},
            {name:'nombre_empresa',index:'nombre_empresa',frozen : true,align:'center',search:true},
            {name:'representante_legal',index:'representante_legal',frozen : true,align:'center',search:true},
            {name:'actividad_empresa',index:'actividad_empresa',frozen : true,align:'center',search:true},
            {name:'ruc_empresa',index:'ruc_empresa',frozen : true,align:'center',search:true},
            {name:'id_tasa',index:'id_tasa',frozen : true,align:'center',search:true},
            {name:'nombre_tasa',index:'nombre_tasa',frozen : true,align:'center',search:true},
            {name:'valor_tasa',index:'valor_tasa',frozen : true,align:'center',search:true},
            {name:'fecha_general',index:'fecha_general',frozen : true,align:'center',search:false},
            {name:'permiso',index:'permiso',frozen : true,align:'center',search:false},            
        ],          
        rowNum: 10,
        autowidth: true, 
        width: '100%', 
        shrinkToFit: false,
        height:200,
        rowList: [10,20,30],        
        pager: jQuery('#pager'),        
        sortname: 'id_informe_general',
        sortordezr: 'asc',
        caption: 'LISTA DE INFORMES GENERALES',
        viewrecords: true,            
        ondblClickRow: function(rowid) {                 
            var gsr = jQuery("#tabla_busquedas").jqGrid('getGridParam','selrow');                                 
            var ret = jQuery("#tabla_busquedas").jqGrid('getRowData',gsr);                        
            var filas = jQuery("#lista_factura").jqGrid("getRowData");
            var rids = $('#lista_factura').jqGrid('getDataIDs');                        
            var per = "PERMISO DE FUNCIONAMIENTO AÑO " +ret.fecha_general.substring(0,4);                        
            if (filas.length === 0) {                
                var datarow = {
                    id_producto: "idf"+ret.id_informe_general,//referente al id informe general
                    tipo: "informe", 
                    detalle: per, 
                    cantidad: '1', 
                    precio_u: "0.00",                     
                    total: "0.00",                     
                };
                su = jQuery("#lista_factura").jqGrid('addRowData', ret.id_informe_general+"idf", datarow);
                var datarow = {
                    id_producto: "idt"+ret.id_tasa,//refernte al id tasa de servicio
                    tipo: "tasa", 
                    detalle: ret.nombre_tasa, 
                    cantidad: '1', 
                    precio_u: ret.valor_tasa,                     
                    total: ret.valor_tasa,                     
                };
                su = jQuery("#lista_factura").jqGrid('addRowData', ret.id_tasa+"idt", datarow);
            }else{
                var repe = 0;
                var pos1 = 0;
                var pos2 = 0;                                
                for (var i = 0; i < filas.length; i++) {
                    var id = filas[i];                                        
                    if (id['tipo'] == "informe") {
                        pos1 = rids[i];                        
                        repe = 1;
                    }else{
                        if (id['tipo'] == "tasa") {
                            pos2 = rids[i];                            
                            repe = 1;
                        }
                    }
                }                
                if(repe == 0){
                    var datarow = {
                        id_producto: "idf"+ret.id_informe_general,//referente al id informe general
                        tipo: "informe", 
                        detalle: per, 
                        cantidad: '1', 
                        precio_u: "0.00",                     
                        total: "0.00",                     
                    };
                    su = jQuery("#lista_factura").jqGrid('addRowData', ret.id_informe_general+"idf", datarow);
                    var datarow = {
                        id_producto: "idt"+ret.id_tasa,//refernte al id tasa de servicio
                        tipo: "tasa", 
                        detalle: ret.nombre_tasa, 
                        cantidad: '1', 
                        precio_u: ret.valor_tasa,                     
                        total: ret.valor_tasa,                     
                    };
                    su = jQuery("#lista_factura").jqGrid('addRowData', ret.id_tasa+"idt", datarow);
                }else{                   
                    var datarow = {
                        id_producto: "idf"+ret.id_informe_general,//referente al id informe general
                        tipo: "informe", 
                        detalle: per, 
                        cantidad: '1', 
                        precio_u: "0.00",                     
                        total: "0.00",                     
                    };                                        
                    jQuery("#lista_factura").jqGrid('setRowData', pos1, datarow)
                    var datarow1 = {
                        id_producto: "idt"+ret.id_tasa,//refernte al id tasa de servicio
                        tipo: "tasa", 
                        detalle: ret.nombre_tasa, 
                        cantidad: '1', 
                        precio_u: ret.valor_tasa,                     
                        total: ret.valor_tasa,                     
                    };
                    jQuery("#lista_factura").jqGrid('setRowData', pos2, datarow1);

                }
            }
            /**/
            //console.log(jQuery('#lista_factura').jqGrid('getRowData'));
            total_factura();
            $('#modalBusquedas').modal('hide');            

        }
    }).jqGrid('navGrid','#pager',{
            add:false,
            edit:false,
            del:false,           
            refresh:true,
            search:true,
            view:false        
    },
    {
        recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
    },
    {
        reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
    },
    {
        closeOnEscape: true
    },
    {
        closeOnEscape: true,        
        multipleSearch: false, overlay: false

    },
    {
    },
    {
        closeOnEscape: true
    }
    ); 
    jQuery("#tabla_busquedas").jqGrid('hideCol', "id_informe_general");
    jQuery("#tabla_busquedas").jqGrid('hideCol', "id_empresa");    
    //jQuery("#tabla_busquedas").jqGrid('setFrozenColumns');
}
function buscar_emision(width){
    jQuery("#tabla_busquedas").jqGrid({
        datatype: "xml",
        url: '../servidor/emision_permisos/xml_emision.php',        
        colNames: ['ID','FECHA FACTURA','NRO FACTURA','RUC','PROPIETARIO','FECHA_CANCELACION','HORA FACTURA'],
        colModel:[      
            {name:'id_emision',index:'id_emision',frozen:true,align:'center',search:false},
            {name:'fecha',index:'fecha',frozen : true,align:'left',search:false},
            {name:'nro_factura',index:'nro_factura',frozen : true,align:'center',search:false},
            {name:'ruc_propietario',index:'ruc_propietario',frozen : true,align:'center',search:true},
            {name:'nombre_propietario',index:'nombre_propietario',frozen : true,align:'center',search:true},
            {name:'fecha_cancelacion',index:'fecha_cancelacion',frozen : true,align:'center',search:false},
            {name:'hora_factura',index:'hora_factura',frozen : true,align:'center',search:false},            
        ],          
        rowNum: 10,
        autowidth: true, 
        width: '100%', 
        shrinkToFit: false,
        height:200,
        rowList: [10,20,30],
        pager: jQuery('#pager'),        
        sortname: 'id_emision',
        sortordezr: 'asc',
        caption: 'EMISION DE PERMISOS',
        viewrecords: true,   
        ondblClickRow: function(rowid) {     
            var gsr = jQuery("#tabla_busquedas").jqGrid('getGridParam','selrow');                     
            cargar_emision(gsr,"emision_permisos","secuencia.php");
            $('#modalBusquedas').modal('hide');            
            $("#btn_guardarEmision").text("");
            $("#btn_guardarEmision").append("<span class='glyphicon glyphicon-log-in'></span> ---------");     
            
        }                 
    }).jqGrid('navGrid','#pager',{
            add:false,
            edit:false,
            del:false,           
            refresh:true,
            search:true,
            view:false        
    },
    {
        recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
    },
    {
        reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
    },
    {
        closeOnEscape: true
    },
    {
        closeOnEscape: true,        
        multipleSearch: false, overlay: false

    },
    {
    },
    {
        closeOnEscape: true
    }
    ); 
    //jQuery("#tabla_busquedas").jqGrid('setFrozenColumns');
}
function buscar_cxc_cliente(width,id){
    jQuery("#tabla_busquedas").jqGrid({
        datatype: "xml",
        url: '../servidor/cxc/xml_cxc.php?id='+id,        
        colNames: ['ID','id_emision','NRO FACTURA','FECHA','F. CANCELACIÓN','SALDO','TOTAL','TIPO DOCUMENTO','RUC','PROPIETARIO','USUARIO'],
        colModel:[      
            {name:'id_cxc',index:'id_cxc',frozen:true,align:'center',search:false},
            {name:'id_emision_permisos',index:'id_emision_permisos',frozen : true,align:'left',search:false},
            {name:'nro_factura',index:'nro_factura',frozen : true,align:'center',search:true},
            {name:'fecha_credito',index:'fecha_credito',frozen : true,align:'center',search:true},
            {name:'fecha_cancelacion',index:'fecha_cancelacion',frozen : true,align:'center',search:true},
            {name:'saldo',index:'saldo',frozen : true,align:'center',search:false},
            {name:'total_factura',index:'total_factura',frozen : true,align:'center',search:false},            
            {name:'tipo_documento',index:'tipo_documento',frozen : true,align:'center',search:false},            
            {name:'ruc_propietario',index:'ruc_propietario',frozen : true,align:'center',search:true},            
            {name:'nombre_propietario',index:'nombre_propietario',frozen : true,align:'center',search:true},            
            {name:'nombre_usuario',index:'nombre_usuario',frozen : true,align:'center',search:false},            
        ],          
        rowNum: 10,
        autowidth: true, 
        width: '100%', 
        shrinkToFit: false,
        height:200,
        rowList: [10,20,30],
        pager: jQuery('#pager'),        
        sortname: 'id_cxc',
        sortordezr: 'asc',
        caption: 'CUENTAS POR COBRAR',
        viewrecords: true,   
        ondblClickRow: function(rowid) {                             
            var gsr = jQuery("#tabla_busquedas").jqGrid('getGridParam','selrow');                                 
            var ret = jQuery("#tabla_busquedas").jqGrid('getRowData',gsr);                        
            var filas = jQuery("#lista_factura").jqGrid("getRowData");
            var rids = $('#lista_factura').jqGrid('getDataIDs');                                                                                                     
            url = "../servidor/cxc/carga_cxc.php?id="+ret.id_cxc; 
            $("#total_saldo").val(ret.saldo);            
            $.ajax({                
                type: "POST",                
                dataType: 'json',       
                url: url,           
                success: function(data) {
                    console.log(data);
                    var tam = data.length;
                    for(var i = 0; i < tam; i++){
                        var datarow = {
                            tipo:"bd", 
                            fecha_pago:data[i].fecha_abono, 
                            forma_pago:data[i].forma_pago, 
                            detalle:data[i].detalle, 
                            valor:data[i].valor,
                        };
                        su = jQuery("#lista_cxc").jqGrid('addRowData', i, datarow);  
                    }
                }
            }); 
            $('#modalBusquedas').modal('hide');            

        }               
    }).jqGrid('navGrid','#pager',{
            add:false,
            edit:false,
            del:false,           
            refresh:true,
            search:true,
            view:false        
    },
    {
        recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
    },
    {
        reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
    },
    {
        closeOnEscape: true
    },
    {
        closeOnEscape: true,        
        multipleSearch: false, overlay: false

    },
    {
    },
    {
        closeOnEscape: true
    }
    ); 
    jQuery("#tabla_busquedas").jqGrid('hideCol', "id_emision_permisos");
    jQuery("#tabla_busquedas").jqGrid('hideCol', "id_cxc");
    //jQuery("#tabla_busquedas").jqGrid('setFrozenColumns'); 
}
