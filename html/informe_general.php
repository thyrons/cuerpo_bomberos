<form class="form-horizontal " action="" rol="form" id="form_informe" method="post">
  <div class="" id="tab_informe">
    <div class="tab-content">
      <div id="tab_general" class="tab-pane active cambio">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-11 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"> DATOS GENERALES</div>
                <div class="panel-body form-group">
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">                      
                      <input type="text" class="form-control" id='ruc_informe' placeholder="NRO. RUC" name="ruc_informe" data-toggle="tooltip" data-original-title="RUC de la empresa"  style="text-transform: uppercase">  
                      <input type="hidden" class="form-control" id='id_empresa' name="id_empresa">  
                      <input type="hidden" class="form-control" id='id_informe_empresa' name="id_informe_empresa">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='nombres_propietario' placeholder="RESP LEGAL" name="nombres_propietario" data-toggle="tooltip" data-original-title="Nombres del responsable legal/Propietario" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="number" class="form-control soloNumeros" id='area_util' placeholder="ÁREA ÚTIL M2" name="area_util" data-toggle="tooltip" data-original-title="Área útil en metros cuadrados" style="text-transform: uppercase">  
                    </div>
                  </div>
                   <div class="form-group col-md-3">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='pe' placeholder="PE" name="pe" data-toggle="tooltip" data-original-title="PE" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='mmr' placeholder="MMR" name="mmr" data-toggle="tooltip" data-original-title="MMR" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='riesgo' placeholder="RIESGO" name="riesgo" data-toggle="tooltip" data-original-title="Tipo de riesgo" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='actividad' placeholder="ACTIVIDAD" name="actividad" data-toggle="tooltip" data-original-title="Tipo de actividad del Negocio" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='razon_social' placeholder="NOMBRE COMERCIAL" name="razon_social" data-toggle="tooltip" data-original-title="Razón social de la empresa"  style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="number" class="form-control soloNumeros" placeholder="ÁREA TOTAL M2" id='area_total' name="area_total" data-toggle="tooltip" data-original-title="Área total en metros cuadrados" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='direccion' placeholder="DIRECCIÓN" name="direccion" data-toggle="tooltip" data-original-title="Dirección del Negocio" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='visible' placeholder="VISIBLE/LEGIBLE" name="visible" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='ubicacion' placeholder="UBICACIÓN" name="ubicacion" data-toggle="tooltip" data-original-title="Ubicación del Negocio" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='telefono' placeholder="TELÉFONO" name="telefono" data-toggle="tooltip" data-original-title="Teléfono del Negocio" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="number" class="form-control soloNumeros" id='solicitud_nro' placeholder="SOLICITUD NRO." name="solicitud_nro" data-toggle="tooltip" data-original-title="Nro. de la solicutid"  style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="col-sm-12">
                      <input type="number" class="form-control soloNumeros" id='ocupantes_fijos' placeholder=" NRO. OCUPANTES FIJOS" name="ocupantes_fijos" data-toggle="tooltip" data-original-title="Nro. fijo de ocupantes"  style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="col-sm-12">
                      <input type="number" class="form-control soloNumeros" id='flotantes' placeholder="FLOTANTES" name="flotantes" data-toggle="tooltip" data-original-title="Nro. fijo de ocupantes"  style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='aforo' placeholder="AFORO (ORD 122)" name="aforo" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" placeholder="TIPO DE CONSTRUCCIÓN" id='tipo_construccion' name="tipo_construccion" data-toggle="tooltip" data-original-title="Tipo de construcción" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='techo_cubierta' placeholder="TECHO CUBIERTA" name="techo_cubierta" data-toggle="tooltip" data-original-title="Techo cubierta" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-8">
                    <label class="col-sm-2 control-label"> VENTILACIÓN: </label>
                    <div class="col-sm-2">
                      <input type="radio" name="radio_ventilacion" id="radioEnLinea1" class="col-sm-2" value="NATURAL" checked> 
                      <label class="radio-inline control-label col-sm-10" for="radioEnLinea1"> NATURAL</label>
                    </div>
                    <div class="col-sm-2">
                      <input type="radio" name="radio_ventilacion" id="radioEnLinea2" class="col-sm-2" value="MECÁNICA"> 
                      <label class="radio-inline control-label col-sm-10" for="radioEnLinea2">MECÁNICA</label>
                    </div>
                    <div class="col-sm-2">
                      <input type="radio" name="radio_ventilacion" id="radioEnLinea3" class="col-sm-2" value="FUNCIONAL"> 
                      <label class="radio-inline control-label col-sm-10" for="radioEnLinea3">FUNCIONAL </label>
                    </div>
                    <div class="col-sm-3">
                      <input type="radio" name="radio_ventilacion" id="radioEnLinea4" class="col-sm-1" value="NO FUNCIONAL">  
                      <label class="radio-inline control-label col-sm-11" for="radioEnLinea4">NO FUNCIONAL </label>
                    </div>
                  </div>
                  <div class="form-group col-md-11">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='disposicion' placeholder="DISPOSICIÓN" name="disposicion" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id='fecha_general' placeholder="FECHA" name="fecha_general" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="col-sm-12">
                      <input type="time" class="form-control" id='hora_inicio' placeholder="HORA INICIO" name="hora_inicio" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="col-sm-12">
                      <input type="time" class="form-control" id='hora_final' placeholder="HORA FINAL" name="hora_final" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-6" id="tipo_inspeccion"  >
                    <div class="col-sm-6">
                      <label class="radio-inline control-label col-sm-7" for="check_inspeccion" >INSPECCIÓN</label>
                      <input type="checkbox" class="col-sm-1" name="check_inspeccion" id="check_inspeccion" value="INSPECCION" checked> 
                    </div>
                    <div class="col-sm-6">
                      <label class="radio-inline control-label col-sm-7" for="check_reinsperccion">REINSPECCIÓN</label>                
                      <input type="checkbox" name="check_inspeccion" class="col-sm-1" id="check_reinsperccion" value="REINSPECCION"> 
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tab_proteccion_incendios" class="tab-pane cambio">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-11 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">EQUIPOS DE PROTECCIÓN CONTRA INCENDIOS</div>
                <div class="panel-body form-group">
                  <div class="form-group col-md-12" id="extintores">
                    <div class="col-sm-2">
                      <label class="col-sm-12 control-label"> EXTINTORES: </label>
                    </div>
                    <div class="col-sm-1">
                      <input type="checkbox" name="radio_extintor" id="check_extintor_si" class="col-sm-4" value="SI"> 
                      <label class="radio-inline control-label col-sm-8" for="check_extintor_si"> SI</label>
                    </div>
                    <div class="col-sm-1">
                      <input type="checkbox" name="radio_extintor" id="check_extintor_no" class="col-sm-4" value="NO"> 
                      <label class="radio-inline control-label col-sm-8" for="check_extintor_no">NO</label>
                    </div>
                    <div class="ocultar">
                      <input type="checkbox" name="radio_extintor" id="check_extintor_sm" class="col-sm-4" value="SM" checked> 
                      <label class="radio-inline control-label col-sm-8" for="check_extintor_sm">SM</label>  <!-- Sin marcar -->
                    </div>
                    <div class="col-sm-8">
                       <label class="col-sm-12 control-label"> NA = NO APLICA (UBICAR DONDE CORRESPONDA) </label>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="table-responsive">
                      <table class="table table-bordered equipos_medios table-condensed" id="tabla_incendios" >
                        <thead>
                          <tr>
                            <th width="5%" >AGENTE</th>
                            <th width="5%">5</th>
                            <th width="5%">10</th>
                            <th width="5%">20</th>
                            <th width="5%">50 +</th>
                            <th width="5%">OPER.</th>
                            <th width="5%">NO OPER.</th>
                            <th width="5%">CUMPLE NORMATIVA</th>
                            <th width="53%">DISPOSICIONES <br> LUGAR A UBICAR LOS EXTINTORES POR ADQUIRIR (SI FALTA ESPACIO EN ANEXOS)</th>
                            <th width="7%">CANT.</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>AGUA</td>
                            <td>
                              <input type="checkbox" name="check_incendio_1" id="checkI_1" value="5">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_1" id="checkI_2" value="10">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_1" id="checkI_3" value="20">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_1" id="checkI_4" value="50">
                              <input type="checkbox" name="check_incendio_1" class="ocultar" id="checkI_5" value="SM" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_2" id="checkI_6" value="SI">
                              <input type="checkbox" name="check_incendio_2" id="checkI_7" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_3" id="checkI_8" value="SI">
                              <input type="checkbox" name="check_incendio_3" id="checkI_9" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_4" id="checkI_10" value="SI">
                              <input type="checkbox" name="check_incendio_4" id="checkI_11" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="text" class="form-control" id="disposicionI1" name="disposicionI1">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantI1" name="cantI1">
                            </td>
                          </tr>
                          <tr>
                            <td>P.Q.S</td>
                            <td>
                              <input type="checkbox" name="check_incendio_5" id="checkI_12" value="5">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_5" id="checkI_13" value="10">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_5" id="checkI_14" value="20">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_5" id="checkI_15" value="50">
                              <input type="checkbox" name="check_incendio_5" class="ocultar" id="checkI_16" value="SM" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_6" id="checkI_17" value="SI">
                              <input type="checkbox" name="check_incendio_6" id="checkI_18" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_7" id="checkI_19" value="SI">
                              <input type="checkbox" name="check_incendio_7" id="checkI_20" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_8" id="checkI_21" value="SI">
                              <input type="checkbox" name="check_incendio_8" id="checkI_22" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="text" class="form-control" id="disposicionI2" name="disposicionI2">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantI2" name="cantI2">
                            </td>
                          </tr>
                          <tr>
                            <td>CO2</td>
                            <td>
                              <input type="checkbox" name="check_incendio_9" id="checkI_23" value="5">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_9" id="checkI_24" value="10">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_9" id="checkI_25" value="20">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_9" id="checkI_26" value="50">
                              <input type="checkbox" name="check_incendio_9" class="ocultar" id="checkI_27" value="SM" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_10" id="checkI_28" value="SI">
                              <input type="checkbox" name="check_incendio_10" id="checkI_29" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_11" id="checkI_30" value="SI">
                              <input type="checkbox" name="check_incendio_11" id="checkI_31" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_12" id="checkI_32" value="SI">
                              <input type="checkbox" name="check_incendio_12" id="checkI_33" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="text" class="form-control" id="disposicionI3" name="disposicionI3">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantI3" name="cantI3">
                            </td>
                          </tr>
                          <tr>
                            <td>ESPUMA</td>
                            <td>
                              <input type="checkbox" name="check_incendio_13" id="checkI_34" value="5">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_13" id="checkI_35" value="10">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_13" id="checkI_36" value="20">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_13" id="checkI_37" value="50">
                              <input type="checkbox" name="check_incendio_13" class="ocultar" id="checkI_38" value="SM" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_14" id="checkI_39" value="SI">
                              <input type="checkbox" name="check_incendio_14" id="checkI_40" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_15" id="checkI_41" value="SI">
                              <input type="checkbox" name="check_incendio_15" id="checkI_42" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_16" id="checkI_43" value="SI">
                              <input type="checkbox" name="check_incendio_16" id="checkI_44" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="text" class="form-control" id="disposicionI4" name="disposicionI4">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantI4" name="cantI4">
                            </td>
                          </tr>
                          <tr>
                            <td>AGENTES LIMPIOS</td>
                            <td>
                              <input type="checkbox" name="check_incendio_17" id="checkI_45" value="5">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_17" id="checkI_46" value="10">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_17" id="checkI_47" value="20">
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_17" id="checkI_48" value="50">
                              <input type="checkbox" name="check_incendio_17" class="ocultar" id="checkI_49" value="SM" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_18" id="checkI_50" value="SI">
                              <input type="checkbox" name="check_incendio_18" id="checkI_51" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_19" id="checkI_52" value="SI">
                              <input type="checkbox" name="check_incendio_19" id="checkI_53" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="checkbox" name="check_incendio_20" id="checkI_54" value="SI">
                              <input type="checkbox" name="check_incendio_20" id="checkI_55" value="NO" class="ocultar" checked>
                            </td>
                            <td>
                              <input type="text" class="form-control" id="disposicionI5" name="disposicionI5">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantI5" name="cantI5">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
      <div id="tab_prevencion_seguridad" class="tab-pane cambio">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-11 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">EQUIPOS Y MEDIOS DE PREVENCIÓN Y SEGURIDAD</div>
                <div class="panel-body form-group">  
                  <div class="form-group col-md-12">
                    <div class="table-responsive">
                      <table class="table table-bordered equipos_medios table-condensed" id="tabla_prevencion">
                        <thead>
                          <tr>
                            <th width="15%" >EQIPOS / MEDIOS</th>
                            <th width="7%">CANT.</th>
                            <th width="8%">CUMPLE NORMATIVA</th>
                            <th width="7%">CANT. ADQUIR.</th>
                            <th width="13%">LUGAR A UBICAR</th>
                            <th width="15%">EQUIPOS / MEDIOS</th>
                            <th width="7%">CANT.</th>
                            <th width="8%">CUMPLE NORMATIVA</th>
                            <th width="7%">CANT. ADQUIR.</th>
                            <th width="13%">LUGAR A UBICAR</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>DETECTOR DE CALOR ITEMP</td>
                            <td>
                              <input type="text" class="form-control" id="cantP1"  name="cantP1"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_1" id="check_CN1" value="SI">
                              <input type="checkbox" name="check_prev_1" id="check_CN2" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA1" name="cantPA1">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP1" name="lugarP1">
                            </td>
                            <td>
                              SALIDAS DE EMERGENCIA
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantP2"  name="cantP2"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_2" id="check_CN3" value="SI">
                              <input type="checkbox" name="check_prev_2" id="check_CN4" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA2" name="cantPA2">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP2" name="lugarP2">
                            </td>
                          </tr>
                          <tr>
                            <td>DETECTOR DE GLP</td>
                            <td>
                              <input type="text" class="form-control" id="cantP3"  name="cantP3"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_3" id="check_CN5" value="SI">
                              <input type="checkbox" name="check_prev_3" id="check_CN6" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA3" name="cantPA3">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP3" name="lugarP3">
                            </td>
                            <td>
                              PUERTAS DE EMERGENCIA
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantP4"  name="cantP4"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_4" id="check_CN7" value="SI">
                              <input type="checkbox" name="check_prev_4" id="check_CN8" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA4" name="cantPA4">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP4" name="lugarP4">
                            </td>
                          </tr>
                          <tr>
                            <td>DETECTOR DE HUMO</td>
                            <td>
                              <input type="text" class="form-control" id="cantP5"  name="cantP5"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_5" id="check_CN9" value="SI">
                              <input type="checkbox" name="check_prev_5" id="check_CN10" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA5" name="cantPA5">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP5" name="lugarP5">
                            </td>
                            <td>
                              LÁMPARAS DE EMERGENCIA
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantP6"  name="cantP6"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_6" id="check_CN11" value="SI">
                              <input type="checkbox" name="check_prev_6" id="check_CN12" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA6" name="cantPA6">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP6" name="lugarP6">
                            </td>
                          </tr>
                          <tr>
                            <td>DETECTOR DE LLAMA</td>
                            <td>
                              <input type="text" class="form-control" id="cantP7"  name="cantP7"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_7" id="check_CN13" value="SI">
                              <input type="checkbox" name="check_prev_7" id="check_CN14" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA7" name="cantPA7">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP7" name="lugarP7">
                            </td>
                            <td>
                              ESCALERAS DE EMERGENCIA
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantP8"  name="cantP8"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_8" id="check_CN15" value="SI">
                              <input type="checkbox" name="check_prev_8" id="check_CN16" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA8" name="cantPA8">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP8" name="lugarP8">
                            </td>
                          </tr>
                          <tr>
                            <td>ALARMAS VISUALES</td>
                            <td>
                              <input type="text" class="form-control" id="cantP9"  name="cantP9"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_9" id="check_CN17" value="SI">
                              <input type="checkbox" name="check_prev_9" id="check_CN18" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA9" name="cantPA9">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP9" name="lugarP9">
                            </td>
                            <td>
                             SEÑALIZACIÓN 
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantP10"  name="cantP10"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_10" id="check_CN19" value="SI">
                              <input type="checkbox" name="check_prev_10" id="check_CN20" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA10" name="cantPA10">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP10" name="lugarP10">
                            </td>
                          </tr>
                          <tr>
                            <td>ALARMAS SONORAS</td>
                            <td>
                              <input type="text" class="form-control" id="cantP11"  name="cantP11"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_11" id="check_CN21" value="SI">
                              <input type="checkbox" name="check_prev_11" id="check_CN22" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA11" name="cantPA11">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP11" name="lugarP11">
                            </td>
                            <td>
                             PULSADORES 
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantP12"  name="cantP12"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_12" id="check_CN23" value="SI">
                              <input type="checkbox" name="check_prev_12" id="check_CN24" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA12" name="cantPA12">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP12" name="lugarP12">
                            </td>
                          </tr>
                          <tr>
                            <td>RED HIDRICA</td>
                            <td>
                              <input type="text" class="form-control" id="cantP13"  name="cantP13"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_13" id="check_CN25" value="SI">
                              <input type="checkbox" name="check_prev_13" id="check_CN26" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA13" name="cantPA13">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP13" name="lugarP13">
                            </td>
                            <td>
                             OTROS 
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantP14"  name="cantP14"> 
                            </td>
                            <td>
                              <input type="checkbox" name="check_prev_14" id="check_CN27" value="SI">
                              <input type="checkbox" name="check_prev_14" id="check_CN28" value="NO" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="cantPA14" name="cantPA14">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="lugarP14" name="lugarP14">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tab_riesgos" class="tab-pane cambio">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-11 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">RIESGOS DE INCENDIOS</div>
                <div class="panel-body form-group"> 
                  <div class="form-group col-md-6">
                    <div class="table-responsive">
                      <table class="table table-bordered equipos_medios table-condensed" id="tabla_sistemaE">  
                        <thead>
                          <tr>
                            <th width="57%">SISTEMA ELÉCTRICO</th>
                            <th width="5%">SI</th>
                            <th width="5%">NO</th>
                            <th width="33%">OBSERVACIONES</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="text-align: left !important">INSTALACIONES ELÉCTRICAS IMPROVISADAS</td>  
                            <td>
                              <input type="checkbox" name="check_riesgo1" id="checkR1" value="SI">                              
                            </td>
                            <td>
                              <input type="checkbox" name="check_riesgo1" id="checkR2" value="NO">                              
                              <input type="checkbox" name="check_riesgo1" id="checkR3" value="SM" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="observacionesR_1" name="observacionesR_1">
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left !important">INSTALACIONES ELÉCTRICAS DEFECTUOSAS</td> 
                            <td>
                              <input type="checkbox" name="check_riesgo2" id="checkR4" value="SI">                              
                            </td>
                            <td>
                              <input type="checkbox" name="check_riesgo2" id="checkR5" value="NO">                              
                              <input type="checkbox" name="check_riesgo2" id="checkR6" value="SM" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="observacionesR_2" name="observacionesR_2">
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left !important">CAJAS ABIERTAS</td>  
                            <td>
                              <input type="checkbox" name="check_riesgo3" id="checkR7" value="SI">                              
                            </td>
                            <td>
                              <input type="checkbox" name="check_riesgo3" id="checkR8" value="NO">                              
                              <input type="checkbox" name="check_riesgo3" id="checkR9" value="SM" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="observacionesR_3" name="observacionesR_3">
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left !important">CABLES Y BRAKERS ADECUADOS</td>  
                            <td>
                              <input type="checkbox" name="check_riesgo4" id="checkR10" value="SI">                              
                            </td>
                            <td>
                              <input type="checkbox" name="check_riesgo4" id="checkR11" value="NO">                              
                              <input type="checkbox" name="check_riesgo4" id="checkR12" value="SM" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="observacionesR_4" name="observacionesR_4">
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left !important">EQUIPO ELÉCTRICO CONECTADO A TIERRA</td>  
                            <td>
                              <input type="checkbox" name="check_riesgo5" id="checkR13" value="SI">                              
                            </td>
                            <td>
                              <input type="checkbox" name="check_riesgo5" id="checkR14" value="NO">                              
                              <input type="checkbox" name="check_riesgo5" id="checkR15" value="SM" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="observacionesR_5" name="observacionesR_5">
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left !important">POSEE SISTERNA ANTICHISPA</td>  
                            <td>
                              <input type="checkbox" name="check_riesgo6" id="checkR16" value="SI">                              
                            </td>
                            <td>
                              <input type="checkbox" name="check_riesgo6" id="checkR17" value="NO">                              
                              <input type="checkbox" name="check_riesgo6" id="checkR18" value="SM" class="ocultar" checked>                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="observacionesR_6" name="observacionesR_6">
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left !important">OTROS</td>  
                            <td colspan="3"><input type="text" class="form-control" id="observacionesR_7" name="observacionesR_7"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="table-responsive">
                      <table class="table table-bordered equipos_medios table-condensed" id="tabla_almacenamiento">  
                        <thead>
                          <tr>
                            <th width="85" colspan="5">ALMACENAMIENTO</th>  
                            <th width="5%">In.</th>  
                            <th width="5%">Ex.</th>  
                            <th width="5%">Al.</th>  
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="25%">ALMACENAMIENTO GLP</td>  
                            <td width="5%">CANT./ LLENO</td>  
                            <td width="25%">
                              <input type="text" class="form-control" id="almacenamiento1" name="almacenamiento1">
                            </td>  
                            <td width="5%">CANT. / VAC </td>  
                            <td width="25%">
                              <input type="text" class="form-control" id="almacenamiento2" name="almacenamiento2">
                            </td>  
                            <td width="5%">
                              <input type="checkbox" name="check_alma1" id="checkAl1" value="IN">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma1" id="checkAl2" value="EX">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma1" id="checkAl3" value="AL">                                                            
                              <input type="checkbox" name="check_alma1" id="checkAl4" value="SM" class="ocultar" checked>                                                            
                            </td>
                          </tr>
                          <tr>
                            <td width="25%">LIQUIDOS INFLAMABLES</td>  
                            <td width="5%">TIPO</td>  
                            <td width="25%">
                              <input type="text" class="form-control" id="almacenamiento3" name="almacenamiento3" >
                            </td>  
                            <td width="5%">CANT. </td>  
                            <td width="25%">
                            <input type="text" class="form-control" id="almacenamiento4" name="almacenamiento4">
                            </td>  
                            <td width="5%">
                              <input type="checkbox" name="check_alma2" id="checkAl5" value="IN">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma2" id="checkAl6" value="EX">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma2" id="checkAl7" value="AL">                                                            
                              <input type="checkbox" name="check_alma2" id="checkAl8" value="SM" class="ocultar" checked>                                                            
                            </td>
                          </tr>
                          <tr >
                            <td width="25%">LIQUIDOS COMBUSTIBLES</td>  
                            <td width="5%">TIPO</td>  
                            <td width="25%">
                              <input type="text" class="form-control" id="almacenamiento5" name="almacenamiento5">
                            </td>  
                            <td width="5%">CANT.</td>  
                            <td width="25%">
                            <input type="text" class="form-control" id="almacenamiento6" name="almacenamiento6">
                            </td>  
                            <td width="5%">
                              <input type="checkbox" name="check_alma3" id="checkAl9" value="IN">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma3" id="checkAl10" value="EX">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma3" id="checkAl11" value="AL">                                                            
                              <input type="checkbox" name="check_alma3" id="checkAl12" value="SM" class="ocultar" checked>                                                            
                            </td>
                          </tr>
                          <tr >
                            <td width="25%">SÓLIDOS COMBUSTIBLES</td>  
                            <td width="5%">TIPO</td>  
                            <td width="55%" colspan="3">
                              <input type="text" class="form-control" id="almacenamiento7" name="almacenamiento7">
                            </td>  
                            <td width="5%">
                              <input type="checkbox" name="check_alma4" id="checkAl13" value="IN">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma4" id="checkAl14" value="EX">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma4" id="checkAl15" value="AL">                                                            
                              <input type="checkbox" name="check_alma4" id="checkAl16" value="SM" class="ocultar" checked>                                                            
                            </td>
                          </tr>
                          <tr >
                            <td width="25%">BODEGAJE</td>  
                            <td width="5%">TIPO MAT.</td>  
                            <td width="55%" colspan="3">
                              <input type="text" class="form-control" id="almacenamiento8" name="almacenamiento8">
                            </td>  
                            <td width="5%">
                              <input type="checkbox" name="check_alma5" id="checkAl17" value="IN">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma5" id="checkAl18" value="EX">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma5" id="checkAl19" value="AL">                                                            
                              <input type="checkbox" name="check_alma5" id="checkAl20" value="SM" class="ocultar" checked>                                                            
                            </td>
                          </tr>
                          <tr >
                            <td width="25%">ORDEN Y LIMPIEZA</td>  
                            <td width="60%" colspan="4">
                              <input type="text" class="form-control" id="almacenamiento9" name="almacenamiento9">
                            </td>  
                            <td width="5%"></td>
                            <td width="5%"></td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma6" id="checkAl21" value="AL">                                                            
                              <input type="checkbox" name="check_alma6" id="checkAl22" value="SM" class="ocultar" checked>                                                            
                            </td>
                          </tr>
                          <tr >
                            <td width="25%">QUÍMICOS</td>  
                            <td width="5%">TIPO</td>  
                            <td width="25%">
                              <input type="text" class="form-control" id="almacenamiento10" name="almacenamiento10">
                            </td>  
                            <td width="5%">CANT. / VAC</td>  
                            <td width="25%">
                              <input type="text" class="form-control" id="almacenamiento11" name="almacenamiento11">
                            </td>  
                            <td width="5%">
                              <input type="checkbox" name="check_alma7" id="checkAl23" value="IN">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma7" id="checkAl24" value="EX">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma7" id="checkAl25" value="AL">                                                            
                              <input type="checkbox" name="check_alma7" id="checkAl26" value="SM" class="ocultar" checked>                                                            
                            </td>
                          </tr>
                          <tr id="check_val2">
                            <td width="25%">INSTALACIONES ELÉCTRICAS</td>  
                            <td width="60%" colspan="4">
                              <input type="text" class="form-control" id="almacenamiento12" name="almacenamiento12">
                            </td>  
                            <td width="5%">
                              <input type="checkbox" name="check_alma8" id="checkAl27" value="IN">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma8" id="checkAl28" value="EX">                                                            
                            </td>
                            <td width="5%">
                              <input type="checkbox" name="check_alma8" id="checkAl30" value="SM" class="ocultar" checked>                                                            
                              <input type="checkbox" name="check_alma8" id="checkAl29" value="AL">                                                                                          
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <div id="tab_confirmacion" class="tab-pane cambio">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-11 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">CONFIRMACIÓN</div>
                <div class="panel-body form-group">
                  <div class="form-group col-md-12">
                    <div class="col-sm-2">
                      <label class="col-sm-12 control-label" for='disposiciones_finales'> DISPOSICIONES</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id='disposiciones_finales' name="disposiciones_finales" data-toggle="tooltip" data-original-title="Disposiciones finales del informe" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="col-sm-2">
                      <label class="col-sm-12 control-label" for='observaciones_finales'> OBSERVACIONES</label>
                    </div>
                    <div class="col-sm-10">
                      <textarea class="form-control" id='observaciones_finales' name="observaciones_finales" data-toggle="tooltip" data-original-title="Observaciones del informe" style="text-transform: uppercase"></textarea> 
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="col-sm-2">
                      <label class="col-sm-12 control-label" for='resolucion'> RESOLUCIÓN</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id='resolucion' name="resolucion" data-toggle="tooltip" data-original-title="Resolución del informe" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="col-sm-4">
                      <label class="col-sm-12 control-label" for='para_extender_permiso'> PARA EXTENDER PERMISO PRESENTAR</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id='para_extender_permiso' name="para_extender_permiso" data-toggle="tooltip" data-original-title="Documentos que toca presentar para dar el permiso" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="col-sm-4">
                      <label class="col-sm-12 control-label" for='documentos_adjuntos'> DOCUMENTOS QUE SE ADJUNTAN</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id='documentos_adjuntos' name="documentos_adjuntos" data-toggle="tooltip" data-original-title="Documentos que se adjuntaron al informe" style="text-transform: uppercase">  
                    </div>
                  </div>
                  <div class="form-group col-sm-12">
                    <div class="row">
                      <div class="col-sm-12">                        
                        <div class="row">
                          <div class="col-md-9">
                            <div class="col-md-6">                                                              
                              <label class="col-sm-2 control-label" for='plazo'> PLAZO</label>                            
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id='plazo' name="plazo" data-toggle="tooltip" data-original-title="Plazo" style="text-transform: uppercase">  
                              </div>                              
                            </div>
                            <div class="col-md-6">                                                              
                              <div class="col-sm-2">
                                <label class="col-sm-12 control-label"> ANEXO</label>
                              </div>
                              <div class="col-sm-5">
                                <label class="radio-inline control-label col-sm-10" for="check_an1"> SI</label>
                                <input type="checkbox" name="check_anexo" id="check_an1" value="SI">
                              </div>
                              <div class="col-sm-5">
                                <label class="radio-inline control-label col-sm-10" for="check_an2"> NO</label>
                                <input type="checkbox" name="check_anexo" id="check_an2" value="NO">                                                            
                                <input type="checkbox" name="check_anexo" id="check_an3" value="SM" class="ocultar" checked>                                                            
                              </div>                          
                            </div>
                            <div class="col-md-12">                                                              
                              <label class="col-sm-3 control-label" for='nro_registro'> NRO. REGISTRO</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id='nro_registro' placeholder="NRO. DE REGISTRO" name="nro_registro" data-toggle="tooltip" data-original-title="Nro del documento" style="text-transform: uppercase">  
                              </div>                              
                            </div>
                            <div class="col-sm-12">                              
                              <label class="col-sm-7 control-label"> SE OTORGA PERMISO DE FUNCIONAMIENTO</label>                              
                              <div id="check_val3">
                                <div class="col-sm-2">
                                  <label class="radio-inline control-label col-sm-5" for="check_per1"> SI</label>
                                  <input type="checkbox" name="check_permiso" id="check_per1" value="SI">                                                            
                                </div>
                                <div class="col-sm-3">
                                  <label class="radio-inline control-label col-sm-5" for="check_per2"> NO</label>
                                  <input type="checkbox" name="check_permiso" id="check_per2" value="NO" checked>                                                            
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <input type="file" class="form-control" name="archivo" id="archivo" placeholder="NRO. DE REGISTRO" data-toggle="tooltip" data-original-title="Nro del documento" style="text-transform: uppercase" onchange='Test.UpdatePreview(this)' accept="image/*">  
                            </div>                                                
                          </div>
                          <div class="col-sm-3" >                                                        
                              <img src="" class="form-control" style="height:150px;width:100%;margin-left:-15px;" id="foto" name="foto">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-9">
                    <div class="col-sm-5">
                      <label class="col-sm-12 control-label"> TASA SERVICIO ADMINISTRATIVO</label>
                    </div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id='id_inputTasa' name="id_inputTasa" />
                    </div>
                    <div class="col-sm-5">                      
                      <input type="text" class="form-control" id='input_tasa' name="input_tasa" style="text-transform: uppercase" />
                    </div>
                  </div>
                   <div class="form-group col-md-3">                    
                    <div class="col-sm-12">
                      <select class="form-control" id='select_valor' name="select_valor" style="text-transform: uppercase">
                      </select>  
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="col-sm-2">
                      <button class="btn btn-primary col-sm-12" id="btn_guardarInforme" type="button">  
                      <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
                    </div>
                    <div class="col-sm-2">
                      <button class="btn btn-primary col-sm-12" id="btn_buscarInforme" type="button">  
                      <span class="glyphicon glyphicon-search"></span> Buscar</button>
                    </div>                    
                    
                    <div class="col-sm-2">
                      <button class="btn btn-primary col-sm-12" id="btn_limpiarInforme" type="button">  
                      <span class="glyphicon glyphicon-trash"></span> Limpiar</button>
                    </div>
                    <div class="col-sm-2">
                      <button class="btn btn-primary col-sm-12" id="btn_imprimirInforme" type="button">  
                      <span class="glyphicon glyphicon-print"></span> Imprimir</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      
    </div>
    <ul  class="devian" id="navegador">
      <li id="t_a" class="active"><a href="#tab_general" data-toggle="tab">Datos Generales</a></li>
      <li id="t_b"><a href="#tab_proteccion_incendios" data-toggle="tab">Equipos de Protección</a></li>
      <li id="t_c"><a href="#tab_prevencion_seguridad" data-toggle="tab">Equipos de Prevencion</a></li>
      <li id="t_d"><a href="#tab_riesgos" data-toggle="tab">Riesgos de Incendios</a></li>
      <li id="t_e"><a href="#tab_confirmacion" data-toggle="tab">Confirmación</a></li>
    </ul>

  </div>
</form>

