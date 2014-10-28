<div id="content">
  <div id="wrapper">
    <div id="steps">
      <form id="formElem" name="formElem" class="form-horizontal " action="" rol="form" method="post">
        <div class="panel-body form-styles">
          <fieldset class="step">
            <legend>DATOS GENERALES</legend>
            <div class="container">
              <div class="form-group col-md-5">
                <label class="col-sm-4 control-label" for='razon_social'> RAZÓN SOCIAL</label>
                <div class="col-sm-8">
                  <div>
                    <div>
                      <div>
                        <input type="text" class="form-control" id='razon_social' name="razon_social" data-toggle="tooltip" data-original-title="Razón social de la empresa"  style="text-transform: uppercase">  
                      </div>
                    </div>
                  </div>
                  <input type="hidden" class="form-control" id='id_informe' name="id_informe" >  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-4 control-label" for='area_total'> ÁREA TOTAL M2</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id='area_total' name="area_total" data-toggle="tooltip" data-original-title="Área total en metros cuadrados" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-5 control-label" for='area_util'> ÁREA ÚTIL M2</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" id='area_util' name="area_util" data-toggle="tooltip" data-original-title="Área útil en metros cuadrados" style="text-transform: uppercase">  
                </div>
              </div>
               <div class="form-group col-md-6">
                <label class="col-sm-1 control-label" for='pe'> PE</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id='pe' name="pe" data-toggle="tooltip" data-original-title="PE" style="text-transform: uppercase">  
                </div>
                <label class="col-sm-1 control-label" for='mmr'> MMR</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id='mmr' name="mmr" data-toggle="tooltip" data-original-title="MMR" style="text-transform: uppercase">  
                </div>
                <label class="col-sm-2 control-label" for='riesgo'> RIESGO</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id='riesgo' name="riesgo" data-toggle="tooltip" data-original-title="Tipo de riesgo" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-4 control-label" for='actividad'> ACTIVIDAD</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='actividad' name="actividad" data-toggle="tooltip" data-original-title="Tipo de actividad del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-4 control-label" for='ruc_propietario'> RUC</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='ruc_propietario' name="ruc_propietario" data-toggle="tooltip" data-original-title="RUC del propietario"  style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-4 control-label" for='nombres_propietario'> RESP LEGAL</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='nombres_propietario' name="nombres_propietario" data-toggle="tooltip" data-original-title="Nombres del responsable legal/Propietario" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-4 control-label" for='direccion'> DIRECCIÓN</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='direccion' name="direccion" data-toggle="tooltip" data-original-title="Dirección del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="col-sm-7 control-label" for='direccion'> VISIBLE/LEGIBLE</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id='direccion' name="direccion" data-toggle="tooltip" data-original-title="Dirección del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-4 control-label" for='ubicacion'> UBICACIÓN</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id='ubicacion' name="ubicacion" data-toggle="tooltip" data-original-title="Ubicación del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-5">
                <label class="col-sm-2 control-label" for='telefono'> TELÉFONO</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id='telefono' name="telefono" data-toggle="tooltip" data-original-title="Teléfono del Negocio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-5 control-label" for='solicitud_nro'> SOLICITUD N.:</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id='solicitud_nro' name="solicitud_nro" data-toggle="tooltip" data-original-title="Nro. de la solicutid"  style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-7 control-label" for='telefono'> NRO. OCUPANTES FIJOS</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id='telefono' name="telefono" data-toggle="tooltip" data-original-title="Nro. fijo de ocupantes"  style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-3 control-label" for='flotantes'> FLOTANTES</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id='flotantes' name="flotantes" data-toggle="tooltip" data-original-title="Nro. fijo de ocupantes"  style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-5 control-label" for='aforo'> AFORO (ORD 122)</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='aforo' name="aforo" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-sm-5 control-label" for='tipo_contruccion'> TIPO DE CONSTRUCCIÓN</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='tipo_contruccion' name="tipo_contruccion" data-toggle="tooltip" data-original-title="Tipo de contrucción" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-5 control-label" for='techo_cubierta'> TECHO CUBIERTA</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='techo_cubierta' name="techo_cubierta" data-toggle="tooltip" data-original-title="Tipo de contrucción" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-6" style="margin-top:10px;" >
                <label class="col-sm-3 control-label"> VENTILACIÓN: </label>
                <label class="radio-inline control-label"> 
                  <input type="radio" name="check" id="radioEnLinea1" value="opcion_1"> NATURAL
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" name="check" id="radioEnLinea2" value="opcion_2"> MECÁNICA
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" name="check" id="radioEnLinea3" value="opcion_3"> FUNCIONAL
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" name="check" id="radioEnLinea4" value="opcion_4"> NO FUNCIONAL
                </label>
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-5 control-label" for='disposicion'> DISPOSICIÓN</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='disposicion' name="disposicion" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="col-sm-5 control-label" for='hora_inicio'> HORA INICIO</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='hora_inicio' name="hora_inicio" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="col-sm-5 control-label" for='hora_final'> HORA FINAL</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id='hora_final' name="hora_final" style="text-transform: uppercase">  
                </div>
              </div>
              <div class="form-group col-md-6"  >
                <label class="radio-inline control-label col-sm-6" > 
                  <input type="radio" name="check1" id="radioEnLinea5" value="opcion_1"> INSPECCIÓN
                </label>
                <label class="radio-inline control-label col-sm-5">
                  <input type="radio" name="check1" id="radioEnLinea6" value="opcion_2"> REINSPECCIÓN
                </label>                
              </div>
              <div class="form-group col-md-4">
                <label class="col-sm-5 control-label" for='fecha'> FECHA</label>
                <div class="col-sm-7">
                  <div>
                    <div>
                      <div>
                      <input type="date" class="form-control" id='fecha' name="fecha" style="text-transform: uppercase">  
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
          <fieldset class="step">
            <legend>EQUIPOS DE PROTECCIÓN CONTRA INCENDIOS</legend>
            <div class="container">
              <div class="form-group col-md-11"  style="margin-top:10px;" >
                <label class="col-sm-2 control-label"> EXTINTORES: </label>
                <label class="radio-inline control-label col-sm-2" > 
                  <input type="radio" name="check3" id="radioEnLinea5" value="opcion_1"> SI
                </label>
                <label class="radio-inline control-label col-sm-2">
                  <input type="radio" name="check3" id="radioEnLinea6" value="opcion_2"> NO
                </label>
                <label class="col-sm-5 control-label"> NA = NO APLICA (UBICAR DONDE CORRESPONDA) </label>
              </div>
              <div class="form-group col-md-10" >
                <table class="table table-bordered equipos_medios">
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
                      <th width="55%">DISPOSICIONES <br> LUGAR A UBICAR LOS EXTINTORES POR ADQUIRIR (SI FALTA ESPACIO EN ANEXOS)</th>
                      <th width="5%">CANT.</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>AGUA</td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>P.Q.S</td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>CO2</td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>ESPUMA</td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>AGENTES LIMPIOS</td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </fieldset>  
          <fieldset class="step">
            <legend>EQUIPOS Y MEDIOS DE PREVENCIÓN Y SEGURIDAD</legend>
            <div class="container">
            <div class="form-group col-md-10" >
                <table class="table table-bordered equipos_medios">
                  <thead>
                    <tr>
                      <th width="15%" >EQIPOS / MEDIOS</th>
                      <th width="7%">CANT.</th>
                      <th width="8%">CUMPLE NORMATIVA</th>
                      <th width="5%">CANT. ADQUIR.</th>
                      <th width="10%">LUGAR A UBICAR</th>
                      <th width="15%">EQUIPOS / MEDIOS</th>
                      <th width="7%">CANT.</th>
                      <th width="7%">CUMPLE NORMATIVA</th>
                      <th width="5%">CANT. ADQUIR.</th>
                      <th width="10%">LUGAR A UBICAR</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>DETECTOR DE CALOR ITEMP</td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1"> 
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        SALIDAS DE EMERGENCIA
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>DETECTOR DE GLP</td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1"> 
                      </td>
                      <td>
                       <input type="text" class="form-control">  
                      </td>
                      <td>
                       <input type="text" class="form-control">  
                      </td>
                      <td>
                        PUERTAS DE EMERGENCIA
                      </td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                       <input type="checkbox" name="check1" value="opcion_1"> 
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>DETECTOR DE HUMO</td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                       <input type="checkbox" name="check1" value="opcion_1"> 
                      </td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                       <input type="text" class="form-control">  
                      </td>
                      <td>
                        LÁMPARAS DE EMERGENCIA
                      </td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>DETECTOR DE LLAMA</td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                       <input type="checkbox" name="check1" value="opcion_1"> 
                      </td>
                      <td>
                       <input type="text" class="form-control">  
                      </td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                        ESCALERAS DE EMERGENCIA
                      </td>
                      <td>
                      <input type="text" class="form-control">   
                      </td>
                      <td>
                       <input type="checkbox" name="check1" value="opcion_1"> 
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>ALARMAS VISUALES</td>
                      <td>
                       <input type="text" class="form-control">  
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                       <input type="text" class="form-control">  
                      </td>
                      <td>
                       SEÑALIZACIÓN 
                      </td>
                      <td>
                      <input type="text" class="form-control">  
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>ALARMAS SONORAS</td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                       <input type="text" class="form-control">  
                      </td>
                      <td>
                       PULSADORES 
                      </td>
                      <td>
                       <input type="text" class="form-control">  
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">  
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>RED HIDRICA</td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                        <input type="checkbox" name="check1" value="opcion_1">
                      </td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                       OTROS 
                      </td>
                      <td>
                        <input type="text" class="form-control"> 
                      </td>
                      <td>
                       <input type="checkbox" name="check1" value="opcion_1"> 
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div> 
            </div>
          </fieldset>
          <fieldset class="step">
            <legend>RIESGOS DE INCENDIOS</legend>
            <div class="container">
              <div class="form-group col-md-5" >
                <table class="table table-bordered equipos_medios">
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
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                      <td style="text-align: left !important">INSTALACIONES ELÉCTRICAS DEFECTUOSAS</td> 
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="text" class="form-control"></td> 
                    </tr>
                    <tr>
                      <td style="text-align: left !important">CAJAS ABIERTAS</td>  
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                      <td style="text-align: left !important">CABLES Y BRAKERS ADECUADOS</td>  
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                      <td style="text-align: left !important">EQUIPO ELÉCTRICO CONECTADO A TIERRA</td>  
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                      <td style="text-align: left !important">POSEE SISTERNA ANTICHISPA</td>  
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="radio" name="check1" value="opcion_1"> </td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </fieldset>  
          <fieldset class="step">
            <legend>Riesgos de Incendios</legend>
            <div class="container">
              <div class="form-group col-md-10" >
              </div>
            </div>
          </fieldset>  
        </div>
      </form>
    </div>
    <div id="navigation" style="display:none;">
      <ul>
        <li class="selected">
            <a href="#">Datos Generales</a>
        </li>
        <li>
            <a href="#">Equipo de Protección</a>
        </li>
        <li>
            <a href="#">Medios de Prevención</a>
        </li>
        <li>
            <a href="#">Settings</a>
        </li>
        <li>
            <a href="#">Confirm</a>
        </li>
      </ul>
    </div>
  </div>
</div>