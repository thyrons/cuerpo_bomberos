<form class="form-horizontal " action="" rol="form" id="form_informe" method="post">
  <div class="col-sm-12" id="tab_informe">
    <div class="tab-content ">
      <div id="tab_general" class="tab-pane active cambio">
        <div class="panel panel-default">
          <div class="panel-heading">DATOS GENERALES</div>
          <div class="panel-body form-group">
            <div class="container ">
              <div class="form-group col-md-5">
                <label class="col-sm-3 control-label" for='razon_social'> RAZÓN SOCIAL</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='razon_social' name="razon_social" data-toggle="tooltip" data-original-title="Razón social de la empresa"  style="text-transform: uppercase">  
                  <input type="hidden" class="form-control" id='id_informe' name="id_informe" >  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-4 control-label" for='area_total'> ÁREA TOTAL M2</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" id='area_total' name="area_total" data-toggle="tooltip" data-original-title="Área total en metros cuadrados" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="col-sm-5 control-label" for='area_util'> ÁREA ÚTIL M2</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" id='area_util' name="area_util" data-toggle="tooltip" data-original-title="Área útil en metros cuadrados" style="text-transform: uppercase">  
                </div>
              </div>
               <div class="form-group col-md-7">
                <label class="col-sm-1 control-label" for='pe'> PE</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id='pe' name="pe" data-toggle="tooltip" data-original-title="PE" style="text-transform: uppercase">  
                </div>
                <label class="col-sm-1 control-label" for='mmr'> MMR</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id='mmr' name="mmr" data-toggle="tooltip" data-original-title="MMR" style="text-transform: uppercase">  
                </div>
                <label class="col-sm-1 control-label" for='riesgo'> RIESGO</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id='riesgo' name="riesgo" data-toggle="tooltip" data-original-title="Tipo de riesgo" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-3 control-label" for='actividad'> ACTIVIDAD</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='actividad' name="actividad" data-toggle="tooltip" data-original-title="Tipo de actividad del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-3 control-label" for='nombres_propietario'> RESP LEGAL</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='nombres_propietario' name="nombres_propietario" data-toggle="tooltip" data-original-title="Nombres del responsable legal/Propietario" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-3 control-label" for='ruc_propietario'> RUC</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='ruc_propietario' name="ruc_propietario" data-toggle="tooltip" data-original-title="RUC del propietario"  style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-3 control-label" for='direccion'> DIRECCIÓN</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='direccion' name="direccion" data-toggle="tooltip" data-original-title="Dirección del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-4 control-label" for='direccion'> VISIBLE/LEGIBLE</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='direccion' name="direccion" data-toggle="tooltip" data-original-title="Dirección del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="col-sm-3 control-label" for='ubicacion'> UBICACIÓN</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='ubicacion' name="ubicacion" data-toggle="tooltip" data-original-title="Ubicación del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="col-sm-4 control-label" for='telefono'> TELÉFONO</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='telefono' name="telefono" data-toggle="tooltip" data-original-title="Teléfono del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-4 control-label" for='solicitud_nro'> SOLICITUD N.:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='solicitud_nro' name="solicitud_nro" data-toggle="tooltip" data-original-title="Nro. de la solicutid"  style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-7 control-label" for='telefono'> NRO. OCUPANTES FIJOS</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id='telefono' name="telefono" data-toggle="tooltip" data-original-title="Nro. fijo de ocupantes"  style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-2">
                <label class="col-sm-5 control-label" for='flotantes'> FLOTANTES</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id='flotantes' name="flotantes" data-toggle="tooltip" data-original-title="Nro. fijo de ocupantes"  style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-5 control-label" for='aforo'> AFORO (ORD 122)</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id='aforo' name="aforo" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-sm-4 control-label" for='tipo_contruccion'> TIPO DE CONSTRUCCIÓN</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='tipo_contruccion' name="tipo_contruccion" data-toggle="tooltip" data-original-title="Tipo de contrucción" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-5 control-label" for='techo_cubierta'> TECHO CUBIERTA</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id='techo_cubierta' name="techo_cubierta" data-toggle="tooltip" data-original-title="Tipo de contrucción" style="text-transform: uppercase">  
                </div>
              </div>
               <div class="form-group col-md-6">
                <label class="col-sm-2 control-label"> VENTILACIÓN: </label>
                <label class="radio-inline control-label col-sm-2"> 
                  NATURAL <input type="radio" name="check" id="radioEnLinea1" value="opcion_1"> 
                </label>
                <label class="radio-inline control-label col-sm-2">
                  MECÁNICA <input type="radio" name="check" id="radioEnLinea2" value="opcion_2"> 
                </label>
                <label class="radio-inline control-label col-sm-2">
                  FUNCIONAL <input type="radio" name="check" id="radioEnLinea3" value="opcion_3"> 
                </label>
                <label class="radio-inline control-label col-sm-3">
                  NO FUNCIONAL <input type="radio" name="check" id="radioEnLinea4" value="opcion_4">
                </label>
              </div>
              <div class="form-group col-md-10">
                <label class="col-sm-2 control-label" for='disposicion'> DISPOSICIÓN</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id='disposicion' name="disposicion" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="col-sm-5 control-label" for='hora_inicio'> HORA INICIO</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id='hora_inicio' name="hora_inicio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="col-sm-5 control-label" for='hora_final'> HORA FINAL</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id='hora_final' name="hora_final" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4"  >
                <label class="radio-inline control-label col-sm-5" > 
                  INSPECCIÓN <input type="radio" name="check1" id="radioEnLinea5" value="opcion_1"> 
                </label>
                <label class="radio-inline control-label col-sm-5">
                  REINSPECCIÓN <input type="radio" name="check1" id="radioEnLinea6" value="opcion_2"> 
                </label>                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tab2" class="tab-pane cambio">tab2 content</div>
      <div id="tab3" class="tab-pane cambio">tab3 content</div>
      <div id="tab4" class="tab-pane cambio">tab4 content</div>
    </div>
    <ul  class="nav nav-pills" id="navegador">
      <li class="active"><a href="#tab_general" data-toggle="tab">Datos Generales</a></li>
      <li><a href="#tab2" data-toggle="tab">Ingreso de Proveedores</a></li>
      <li><a href="#tab3" data-toggle="tab">Tipos de Usuarios</a></li>
      <li><a href="#tab4" data-toggle="tab">Cálculo de Precios</a></li>
    </ul>

  </div>
</form>

 
