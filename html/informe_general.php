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
                        <div class="col-sm-8 has-error">
                          <input type="text" class="form-control" id='razon_social' name="razon_social" data-toggle="tooltip" data-original-title="Razón social de la empresa" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
                          <input type="hidden" class="form-control" id='id_informe' name="id_informe" >  
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="col-sm-4 control-label" for='area_total'> ÁREA TOTAL M2</label>
                        <div class="col-sm-8 has-error">
                          <input type="number" class="form-control" id='area_total' name="area_total" data-toggle="tooltip" data-original-title="Área total en metros cuadrados" required pattern="[0-9 ]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="col-sm-5 control-label" for='area_util'> ÁREA ÚTIL M2</label>
                        <div class="col-sm-6 has-error">
                          <input type="number" class="form-control" id='area_util' name="area_util" data-toggle="tooltip" data-original-title="Área útil en metros cuadrados" required pattern="[0-9 ]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                       <div class="form-group col-md-6">
                        <label class="col-sm-1 control-label" for='pe'> PE</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id='pe' name="pe" data-toggle="tooltip" data-original-title="PE"  style="text-transform: uppercase">  
                        </div>
                        <label class="col-sm-1 control-label" for='mmr'> MMR</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id='mmr' name="mmr" data-toggle="tooltip" data-original-title="MMR" minlength="1"  style="text-transform: uppercase">  
                        </div>
                        <label class="col-sm-2 control-label" for='riesgo'> RIESGO</label>
                        <div class="col-sm-4 has-error">
                          <input type="text" class="form-control" id='riesgo' name="riesgo" data-toggle="tooltip" data-original-title="Tipo de riesgo" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="col-sm-4 control-label" for='actividad'> ACTIVIDAD</label>
                        <div class="col-sm-8 has-error">
                          <input type="text" class="form-control" id='actividad' name="actividad" data-toggle="tooltip" data-original-title="Tipo de actividad del Negocio" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="col-sm-4 control-label" for='ruc_propietario'> RUC</label>
                        <div class="col-sm-8 has-error">
                          <input type="text" class="form-control" id='ruc_propietario' name="ruc_propietario" data-toggle="tooltip" data-original-title="RUC del propietario" required pattern="[0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="col-sm-4 control-label" for='nombres_propietario'> RESP LEGAL</label>
                        <div class="col-sm-8 has-error">
                          <input type="text" class="form-control" id='nombres_propietario' name="nombres_propietario" data-toggle="tooltip" data-original-title="Nombres del responsable legal/Propietario" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="col-sm-4 control-label" for='direccion'> DIRECCIÓN</label>
                        <div class="col-sm-8 has-error">
                          <input type="text" class="form-control" id='direccion' name="direccion" data-toggle="tooltip" data-original-title="Dirección del Negocio" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="col-sm-7 control-label" for='direccion'> VISIBLE/LEGIBLE</label>
                        <div class="col-sm-5 has-error">
                          <input type="text" class="form-control" id='direccion' name="direccion" data-toggle="tooltip" data-original-title="Dirección del Negocio" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="col-sm-4 control-label" for='ubicacion'> UBICACIÓN</label>
                        <div class="col-sm-8 has-error">
                          <input type="text" class="form-control" id='ubicacion' name="ubicacion" data-toggle="tooltip" data-original-title="Ubicación del Negocio" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="col-sm-2 control-label" for='telefono'> TELÉFONO</label>
                        <div class="col-sm-6 has-error">
                          <input type="text" class="form-control" id='telefono' name="telefono" data-toggle="tooltip" data-original-title="Teléfono del Negocio" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="col-sm-5 control-label" for='solicitud_nro'> SOLICITUD N.:</label>
                        <div class="col-sm-5 has-error">
                          <input type="text" class="form-control" id='solicitud_nro' name="solicitud_nro" data-toggle="tooltip" data-original-title="Nro. de la solicutid" required pattern="[0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="col-sm-7 control-label" for='telefono'> NRO. OCUPANTES FIJOS</label>
                        <div class="col-sm-5 has-error">
                          <input type="text" class="form-control" id='telefono' name="telefono" data-toggle="tooltip" data-original-title="Nro. fijo de ocupantes" required pattern="[0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="col-sm-3 control-label" for='flotantes'> FLOTANTES</label>
                        <div class="col-sm-4 has-error">
                          <input type="text" class="form-control" id='flotantes' name="flotantes" data-toggle="tooltip" data-original-title="Nro. fijo de ocupantes" required pattern="[0-9]{1,}" minlength="1"  style="text-transform: uppercase">  
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
                        <div class="col-sm-7 has-error">
                          <input type="text" class="form-control" id='tipo_contruccion' name="tipo_contruccion" data-toggle="tooltip" data-original-title="Tipo de contrucción" required pattern="[0-9]{1,}" minlength="1" style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="col-sm-5 control-label" for='techo_cubierta'> TECHO CUBIERTA</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id='techo_cubierta' name="techo_cubierta" data-toggle="tooltip" data-original-title="Tipo de contrucción" required pattern="[0-9]{1,}" minlength="1" style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-6" style="margin-top:15px;" >
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
                        <div class="col-sm-7 has-error">
                          <input type="text" class="form-control" id='hora_inicio' name="hora_inicio" style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="col-sm-5 control-label" for='hora_final'> HORA FINAL</label>
                        <div class="col-sm-7 has-error">
                          <input type="text" class="form-control" id='hora_final' name="hora_final" style="text-transform: uppercase">  
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="col-sm-5 control-label" for='fecha'> FECHA</label>
                        <div class="col-sm-7 has-error">
                          <input type="date" class="form-control" id='fecha' name="fecha" style="text-transform: uppercase">  
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

                    </div>
                </fieldset>
                <fieldset class="step">
                    <legend>Personal Details</legend>
                    <div class="container">
                      <div class="form-group col-md-5">
                        <label class="col-sm-3 control-label" for='nombre_servicio'> SERVICIOS</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id='nombre_servicio' name="nombre_servicio"  style="text-transform: uppercase">  
                        </div>
                    </div>
                </fieldset>  
                 <fieldset class="step">
                    <legend>Personal Details</legend>
                    <div class="container">
                      <div class="form-group col-md-5">
                        <label class="col-sm-3 control-label" for='nombre_servicio'> SERVICIOS</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id='nombre_servicio' name="nombre_servicio"  style="text-transform: uppercase">  
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
                    <a href="#">Personal Details</a>
                </li>
                <li>
                    <a href="#">Payment</a>
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