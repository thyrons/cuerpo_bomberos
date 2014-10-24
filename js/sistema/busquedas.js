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