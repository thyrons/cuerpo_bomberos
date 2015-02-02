<form class="form-horizontal " action="" rol="form" id="form_archivosExcel" method="post" enctype="multipart/form-data">
    <div class="panel panel-default">
      <div class="panel-heading"><span class="glyphicon glyphicon-book"></span> <b> Archivos en Excel </b></div>
        <div class="panel-body form-styles">
          <div class="container">
            <div class="form-group col-md-10">
              <div class="alert alert-info">
                  <h4><b>RECOMENDACIONES</b></h4>                    
                  <strong>Poner tipos numéricos y texto en las celdas que corresponde caso contrario saldra error de sintaxis.</strong>
                  <br /><br />
                  <strong>Tener en cuenta de no repetir los articulos.</strong>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="col-sm-2 control-label" for=''> DOCUMENTO EN EXCEL</label>
              <label class="col-sm-1 control-label" for=''> SELECCIONAR</label>
              <div class="col-sm-5">                                
                <input type="file" class="form-control" id='archivo_excel' name="archivo_excel" data-toggle="tooltip" data-original-title="Seleccione un archivo en excel" >  
              </div>
              <div class="col-sm-4">                                
                <button class="btn btn-primary" id='btnGuardarCargar'><i class="icon-save"></i> Guardar y Cargar</button>
              </div>
            </div>  
            <div class="col-sm-10" style="height:300px;border-color:rgb(204, 201, 201);overflow:auto;width:80% !important;">
              <table class="table table-bordered table-hover table-condensed" id="tabla_excel">
                <thead>
                  <tr>
                      <th style="width:20%;text-align:center;">RUC</th>
                      <th style="width:40%;text-align:center;">PROPIETARIO</th>
                      <th style="width:35%;text-align:center;">ESTADO</th>
                      <th style="width:5%;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                  </tr>
              </table>
            </div>                        
          </div>
        </div>
      <div class="panel-footer form-footer">
      </div>
    </div>
 </form>


  
